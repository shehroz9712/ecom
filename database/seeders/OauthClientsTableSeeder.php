<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OauthClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('oauth_clients')->delete();
        
        \DB::table('oauth_clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => NULL,
                'name' => 'Laravel Personal Access Client',
                'secret' => 'qLy5Gk2Hu3qMnyNreBu8pusAw4Pp73ktAiej6vJl',
                'provider' => NULL,
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2025-02-14 06:19:29',
                'updated_at' => '2025-02-14 06:19:29',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => NULL,
                'name' => 'Laravel Password Grant Client',
                'secret' => '5QwHFNMvRwuHq3l36BbbdM8668zu7y2vVFL6zvNL',
                'provider' => 'users',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2025-02-14 06:19:29',
                'updated_at' => '2025-02-14 06:19:29',
            ),
        ));
        
        
    }
}