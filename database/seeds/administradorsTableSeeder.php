<?php

use Illuminate\Database\Seeder;

class administradorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administradors')->insert([
            'estado' => '1',
            'users_id' => '1',            
        ]);
    }
}
