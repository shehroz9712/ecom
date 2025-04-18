<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Define permissions
        $permissions = ['create', 'edit', 'delete', 'view'];
        $models = [
            'users',
            'roles',
            'permissions',
            'educations',
            'awards',
            'certifications',
            'languages',
            'resumes',
            'certificates',
            'experiences',
            'references',
            'media',
            'digitalSignatures',
            'services',
            'userSkills',
            'services',
            'UserServices',
            'orders',
            'customSections',
            'resumeDetails',
            'carts',
            'coverLetters',
            'summaries',
            'resumeHeaders',
            'pages',
            'pageSections',
            'packages',
            'packageSubscribes',
            'update-packageUsage',
            'blogs',
            'settings',
            'blogs',
            'successStories',
            'testimonials',
            'projects',
            'portfolios',
        ];

        // Fix existing role & permission guards
        DB::table('roles')->update(['guard_name' => 'api']);
        DB::table('permissions')->update(['guard_name' => 'api']);

        // Create roles if they don’t exist
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'api']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'api']);
        $userRole = Role::firstOrCreate(['name' => 'User', 'guard_name' => 'api']);
        $guestRole = Role::firstOrCreate(['name' => 'Guest', 'guard_name' => 'api']);

        // Create hierarchical permissions
        $parentPermissions = [];
        foreach ($models as $model) {
            $parentPermission = Permission::firstOrCreate([
                'name' => $model,
                'guard_name' => 'api',
                'parent_id' => null,
            ]);

            $parentPermissions[$model] = $parentPermission->id;

            foreach ($permissions as $action) {
                Permission::firstOrCreate([
                    'name' => "{$action}-{$model}",
                    'guard_name' => 'api',
                    'parent_id' => $parentPermission->id,
                ]);
            }
        }

        // Assign all permissions to Super Admin
        $superAdminRole->syncPermissions(Permission::all());

        // Assign specific permissions to Admin
        $adminPermissions = [
            'view-users',
            'create-users',
            'edit-users',
            'delete-users',
            'view-roles',
            'create-educations',
            'view-educations',
            'edit-educations',
            'delete-educations',
            'create-awards',
            'view-awards',
            'edit-awards',
            'delete-awards',
            'create-certifications',
            'view-certifications',
            'edit-certifications',
            'delete-certifications',
            'create-languages',
            'view-languages',
            'edit-languages',
            'delete-languages',
            'create-resumes',
            'view-resumes',
            'edit-resumes',
            'delete-resumes',
            'create-experiences',
            'view-experiences',
            'edit-experiences',
            'delete-experiences',
            'create-references',
            'view-references',
            'edit-references',
            'delete-references',
            'create-media',
            'view-media',
            'edit-media',
            'delete-media',
            'create-digitalSignatures',
            'view-digitalSignatures',
            'edit-digitalSignatures',
            'delete-digitalSignatures',
            'create-services',
            'view-services',
            'edit-services',
            'delete-services',
            'create-UserServices',
            'view-UserServices',
            'edit-UserServices',
            'delete-UserServices',
            'create-pages',
            'view-pages',
            'edit-pages',
            'delete-pages',
            'create-pageSections',
            'view-pageSections',
            'edit-pageSections',
            'delete-pageSections',
            'create-settings',
            'view-settings',
            'edit-settings',
            'delete-settings',
            'view-packages',
            'create-packages',
            'edit-packages',
            'delete-packages',
            'packageSubscribes',
            'update-packageUsage',
            'create-blogs',
            'view-blogs',
            'edit-blogs',
            'delete-blogs',
            'create-successStories',
            'view-successStories',
            'edit-successStories',
            'delete-successStories',
            'create-testimonials',
            'view-testimonials',
            'edit-testimonials',
            'delete-testimonials',
           
        ];
        $adminRole->syncPermissions($adminPermissions);

        // Assign specific permissions to User
        $userRole->syncPermissions([
            'view-users',
            'create-users',
            'edit-users',
            'view-roles',
            'create-educations',
            'view-educations',
            'edit-educations',
            'delete-educations',
            'create-awards',
            'view-awards',
            'edit-awards',
            'delete-awards',
            'create-certifications',
            'view-certifications',
            'edit-certifications',
            'delete-certifications',
            'create-languages',
            'view-languages',
            'edit-languages',
            'delete-languages',
            'create-resumes',
            'view-resumes',
            'edit-resumes',
            'delete-resumes',
            'create-experiences',
            'view-experiences',
            'edit-experiences',
            'delete-experiences',
            'create-references',
            'view-references',
            'edit-references',
            'delete-references',
            'create-media',
            'view-media',
            'edit-media',
            'delete-media',
            'create-digitalSignatures',
            'view-digitalSignatures',
            'edit-digitalSignatures',
            'delete-digitalSignatures',
            'create-orders',
            'view-orders',
            'edit-orders',
            'delete-orders',
            'create-customSections',
            'view-customSections',
            'edit-customSections',
            'delete-customSections',
            'create-resumeDetails',
            'view-resumeDetails',
            'edit-resumeDetails',
            'delete-resumeDetails',
            'create-carts',
            'view-carts',
            'edit-carts',
            'delete-carts',
            'create-coverLetters',
            'view-coverLetters',
            'edit-coverLetters',
            'delete-coverLetters',
            'create-summaries',
            'view-summaries',
            'edit-summaries',
            'delete-summaries',
            'create-resumeHeaders',
            'view-resumeHeaders',
            'edit-resumeHeaders',
            'delete-resumeHeaders',
            'view-pages',
            'view-pageSections',
            'packageSubscribes',
            'update-packageUsage',
            'update-packageUsage',
            'view-blogs',
            'create-successStories',
            'view-successStories',
            'edit-successStories',
            'delete-successStories',
            'create-testimonials',
            'view-testimonials',
            'edit-testimonials',
            'delete-testimonials',
            'create-blogs',
            'view-blogs',
            'edit-blogs',
            'delete-blogs',
            'create-projects',
            'view-projects',
            'edit-projects',
            'delete-projects',
            'create-portfolios',
            'view-portfolios',
            'edit-portfolios',
            'delete-portfolios',
        ]);

        // Assign specific permissions to Guest User
        $guestRole->syncPermissions([
            'create-resumes',
        ]);
    }
}
