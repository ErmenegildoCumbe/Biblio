<?php

use Illuminate\Database\Seeder;

class operadorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operadors')->insert([
            'estado' => '1',
            'administradors_id' => '1',
            'users_id' => '2',            
        ]);
    }
}
