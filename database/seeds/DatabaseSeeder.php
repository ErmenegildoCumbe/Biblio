<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        // $this->call(UserPermissionsTableSeeder::class);
        // $this->call(administradorsTableSeeder::class);
        // $this->call(operadorsTableSeeder::class);
        // $this->call(ClientesTableSeeder::class);
    }
}
