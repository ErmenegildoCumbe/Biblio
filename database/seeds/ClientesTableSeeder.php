<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'estado' => '1',
            'users_id' => '3',
            'tipoCliente' => '1',            
        ]);
    }
}
