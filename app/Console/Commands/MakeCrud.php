<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeCrud extends Command
{
    protected $signature = 'make:crud {name}';
    protected $description = 'Generate a complete CRUD with roles, permissions & policies';

    public function handle()
    {
        $name = Str::studly($this->argument('name')); // Model Name in PascalCase
        $snakeName = Str::snake($name); // snake_case
        $varName = lcfirst($name); // camelCase
        $tableName = Str::plural($snakeName); // Ensure Table Name is Plural
        $routeName = Str::kebab(Str::plural($name)); // Kebab-case for API routes
        $pluralName = Str::plural($name); // Plural Model Name

        // Paths
        $modelPath = app_path("Models/{$name}.php");
        $controllerPath = app_path("Http/Controllers/Api/v1/{$name}Controller.php");
        $interfacePath = app_path("Repositories/Interfaces/{$name}RepositoryInterface.php");
        $repositoryPath = app_path("Repositories/{$name}Repository.php");
        $requestPath = app_path("Http/Requests/{$name}Request.php");
        $requestfilterPath = app_path("Http/Requests/{$name}FilterRequest.php");
        $policyPath = app_path("Policies/{$name}Policy.php");

        // Create Policy
        $this->call('make:policy', ['name' => "{$name}Policy", '--model' => $name]);

        // Register Policy in AuthServiceProvider
        $this->updateAuthServiceProvider($name);

        // Update Permissions Seeder
        $this->updatePermissionsSeeder($name);

        // Generate Model & Migration
        $this->call('make:model', ['name' => "{$name}", '--migration' => true]);
        File::put($modelPath, $this->getTemplate('model', ['name' => $name]));

        // Modify Migration for SoftDeletes & Status
        $migrationFile = glob(database_path("migrations/*_create_{$tableName}_table.php"))[0] ?? null;
        if ($migrationFile) {
            $migrationContent = File::get($migrationFile);
            $replacement = implode(PHP_EOL, [
                "\$table->enum('status', ['active', 'inactive'])->default('active');",
                "\$table->timestamps();",
                "\$table->softDeletes();",
                "\$table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');",
                "\$table->foreignId('updated_by')->references('id')->on('users')->onDelete('cascade');",
            ]);
            $migrationContent = str_replace("\$table->timestamps();", $replacement, $migrationContent);
            File::put($migrationFile, $migrationContent);
        }

        // Create Request
        // Create Store Request
        $this->call('make:request', ['name' => "{$name}Request"]);
        File::put($requestPath, $this->getTemplate('Request', ['name' => $name]));
        // Create Filter Request
        $this->call('make:request', ['name' => "{$name}FilterRequest"]);
        File::put($requestfilterPath, $this->getTemplate('FilterRequest', ['name' => $name]));

        // Create Controller with Policies
        if (!File::exists(dirname($controllerPath))) {
            File::makeDirectory(dirname($controllerPath), 0755, true);
        }
        File::put($controllerPath, $this->getTemplate('controller', [
            'name' => $name,
            'varName' => $varName,
            'routeName' => $routeName, // Ensure routes are plural
        ]));

        // Create Interface
        if (!File::exists(dirname($interfacePath))) {
            File::makeDirectory(dirname($interfacePath), 0755, true);
        }
        File::put($interfacePath, $this->getTemplate('interface', ['name' => $name]));

        // Create Repository
        if (!File::exists(dirname($repositoryPath))) {
            File::makeDirectory(dirname($repositoryPath), 0755, true);
        }
        File::put($repositoryPath, $this->getTemplate('repository', ['name' => $name]));

        // Create Policy File
        File::put($policyPath, $this->getTemplate('policy', [
            'name' => $name,
            'varName' => $varName,
            'kebabName' => Str::kebab($name),
        ]));
        // Show Manual Instructions
        $this->showBindingInstructions($name);

        $this->info("✅ Add to your routes/api.php:\nRoute::apiResource('{$routeName}', {$name}Controller::class);");
        // Success Message
        $this->info("CRUD for {$name} generated successfully with Roles, Permissions & Policies!");
    }

    /**
     * Fetches and replaces placeholders in view templates.
     */
    protected function getTemplate($templateName, $replacements)
    {
        $templatePath = resource_path("views/commands/crud/{$templateName}.blade.php");

        if (!File::exists($templatePath)) {
            $this->error("Template file {$templateName}.blade.php not found!");
            return "";
        }

        $template = File::get($templatePath);
        foreach ($replacements as $key => $value) {
            $template = str_replace("{{{$key}}}", $value, $template);
        }

        return $template;
    }

    protected function updatePermissionsSeeder($name)
    {
        $pluralName = Str::plural($name);
        $permissionName = Str::kebab($pluralName);

        $permissionCode = <<<PHP
        // 📌 Add these permissions in `database/seeders/PermissionsSeeder.php`
        use Spatie\Permission\Models\Permission;
    
        \$permissions = [
            'create-{$permissionName}',
            'view-{$permissionName}',
            'edit-{$permissionName}',
            'delete-{$permissionName}',
        ];
    
        foreach (\$permissions as \$permission) {
            Permission::firstOrCreate(['name' => \$permission, 'guard_name' => 'api']);
        }
        PHP;

        $this->info("\n" . $permissionCode . "\n");
    }

    protected function updateAuthServiceProvider($name)
    {
        $authServiceProvider = app_path('Providers/AuthServiceProvider.php');

        if (File::exists($authServiceProvider)) {
            $content = File::get($authServiceProvider);

            $policyEntry = "        \\App\\Models\\{$name}::class => \\App\\Policies\\{$name}Policy::class,";
            if (!str_contains($content, $policyEntry)) {
                $content = str_replace(
                    "protected \$policies = [",
                    "protected \$policies = [\n{$policyEntry}",
                    $content
                );
                File::put($authServiceProvider, $content);
                $this->info("Policy for {$name} registered in AuthServiceProvider.");
            }
        }
    }

    protected function showBindingInstructions($name)
    {
        $bindingCode = <<<PHP
            // 📌 Add this in `App\Providers\AppServiceProvider.php` inside `register()` method
            use App\Repositories\Interfaces\\{$name}RepositoryInterface;
            use App\Repositories\\{$name}Repository;
            
            public function register()
            {
                \$this->app->bind({$name}RepositoryInterface::class, {$name}Repository::class);
            }
            PHP;

        $this->info("\n" . $bindingCode . "\n");
    }
}
