<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nome' => 'Administrador',
            'apelido' => 'Admin',
            'telefone' => '841111111',
            'email' => 'admin@mail.com',
            'estado' => '1',
            'password' => bcrypt('123456'),
            'is_bibliotecario' => '1',            
            'nr_bi' => '17485748554F',           
        ]);
 
          DB::table('users')->insert([
            'nome' => 'Operador',
            'apelido' => 'Opera',
            'telefone' => '841111111',
            'email' => 'estudante@mail.com',
            'estado' => '1',
            'password' => bcrypt('123456'),
            'is_estudante' => '1', 
            'nr_estudante' => '20152145',           

        ]);

        // DB::table('users')->insert([
        //     'nome' => 'Cliente',
        //     'apelido' => 'Example',
        //     'email' => 'cliente@mail.com',
        //     'estado' => '1',
        //     'password' => bcrypt('cliente123456'),
        //     'tipoUsuario' => '3',            
        // ]);
    }
}
