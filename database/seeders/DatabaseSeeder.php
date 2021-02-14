<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Ejecutar los seeders:
        $this->call(LibrosSeeder::class);
        // $this->call('CategoriaSeeder');
        
        /*
        // Vaciar varias tablas al mismo tiempo
        
        // Array tablas
        $this->truncateTables([
           'nombre_de_la_tabla_aqui',
           'nombre_de_otra_tabla',
        ]);
        */
        
        // \App\Models\User::factory(10)->create();
    }
    
    // Vaciar varias tablas al mismo tiempo
    public function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }

}