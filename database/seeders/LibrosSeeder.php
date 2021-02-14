<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar datos
        
        DB::table('libros')->insert([
            [
            'titulo' => 'Las aventuras del Capitán Calzoncillos',
            'editorial' => 'Ediciones SM',
            'genero' => 'Ficción, Humor, Literatura infantil y juvenil',
            'n_copias' => '5',
            'img_portada' => 'imgs/portadas_libros/1-las_aventuras_del_capitan_calzoncillos.jpg',
            ],
            
            [
            'titulo' => 'El Capitán Calzoncillos y el perverso plan del profesor Pipicaca',
            'editorial' => 'Ediciones SM',
            'genero' => 'Ficción, Humor, Literatura infantil y juvenil',
            'n_copias' => '5',
            'img_portada' => 'imgs/portadas_libros/2-el_capitan_calzoncillos_y_el_perverso_plan_del_profesor_pipicaca.jpg',
            ],
            
            [
            'titulo' => 'El Señor de los Anillos',
            'editorial' => 'Minotauro',
            'genero' => 'Novela, Alta fantasía, literatura fantástica, Libro de caballerías, Aventuras, Fantasía heroica',
            'n_copias' => '5',
            'img_portada' => '/imgs/portadas_libros/3-el_señor_de_los_anillos.jpg',
            ],
            
            [
            'titulo' => 'El código Da Vinci',
            'editorial' => 'Planeta',
            'genero' => 'Novela, Misterio, Suspenso, Ficción detectivesca, ficción conspirativa, Novela policíaca',
            'n_copias' => '5',
            'img_portada' => 'imgs/portadas_libros/4-el_codigo_da_vinci.jpg',
            ],
            
            [
            'titulo' => 'Lo que el viento se llevó',
            'editorial' => 'B DE BOLSILLO',
            'genero' => 'Novela histórica y épico, Ficción',
            'n_copias' => '5',
            'img_portada' => 'imgs/portadas_libros/5-lo_que_el_viento_se_llevo.jpg',
            ],
            
            [
            'titulo' => 'El alquimista',
            'editorial' => 'Booket',
            'genero' => 'Novela, Drama, Misión, literatura fantástica, Aventuras',
            'n_copias' => '5',
            'img_portada' => 'imgs/portadas_libros/6-el_alquimista.jpg',
            ]
        ]);
        
        /*
        // Insertar contraseñas cifradas
        
        DB::table('users')->insert([
            'password' => bcrypt('password')
        ]);
        */
        
        /*
        // Truncate vaciar tabla
        DB::table('categorias')->truncate();
        /*
        
        /* 
        // Solo ejecutar un seeder
        php artisan db:seed --class=CategoriaSeeder
        */
        
        /*
        // Desactivar revisión de claves foráneas
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('categorias')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
        */
    }
}
