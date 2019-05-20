<?php

use Illuminate\Database\Seeder;

class UserPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_permissions')->insert([
            'permission_id' => '1',
            'user_id' => '1',            
        ]);
 
        DB::table('user_permissions')->insert([
            'permission_id' => '2', 
            'user_id' => '2',           
        ]);

        DB::table('user_permissions')->insert([
            'permission_id' => '3', 
            'user_id' => '3',           
        ]);
    }
}
