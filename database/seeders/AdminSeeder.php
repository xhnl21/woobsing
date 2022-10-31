<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'lastname' => 'Admin',
            'phone' =>  123456789,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789')
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'lastname' => 'User',
            'phone' =>  123456789,
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456789')
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'User',
        ]);            
        
        DB::table('permisos')->insert([
            'name' => 'Gallery'
        ]);
        DB::table('permisos')->insert([
            'name' => 'Blog'
        ]);
        DB::table('permisos')->insert([
            'name' => 'SEO'
        ]); 
               
        DB::table('rol_asign_users')->insert([
            'id_rol' => 1,
            'id_user' => 1
        ]); 

        DB::table('permiso_asign_rols')->insert([
            'id_rol' => 1,
            'id_permiso' => 1
        ]); 
        DB::table('permiso_asign_rols')->insert([
            'id_rol' => 1,
            'id_permiso' => 2
        ]); 
        DB::table('permiso_asign_rols')->insert([
            'id_rol' => 1,
            'id_permiso' => 3
        ]); 
        
        DB::table('rol_asign_users')->insert([
            'id_rol' => 2,
            'id_user' => 2
        ]); 

        DB::table('permiso_asign_rols')->insert([
            'id_rol' => 2,
            'id_permiso' => 1
        ]);         
    }
}
