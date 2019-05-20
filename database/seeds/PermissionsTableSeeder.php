<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'Admin',            
        ]);
 
        DB::table('permissions')->insert([
            'name' => 'Operador',            
        ]);

        DB::table('permissions')->insert([
            'name' => 'Cliente',            
        ]);
    }
}
