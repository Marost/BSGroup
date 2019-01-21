<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => '1', 'email' => 'webmaster@chilcanoweb.com', 'password' => bcrypt('admin'), 'estado' => '1']
        ]);

        DB::table('user_profiles')->insert([
            [
                'id' => '1',
                'user_id' => '1',
                'nombres' => 'Administrador',
                'apellidos' => 'ChilcanoWeb',
                'descripcion' => 'Administrador',
                'imagen' => 'users.png',
                'imagen_carpeta' => 'carpeta/'
            ]
        ]);

        //AJUSTES
        DB::table('configuracion')->insert([
            ['tipo' => 'web', 'nombre' => 'titulo', 'etiqueta' => 'Titulo', 'valor' => 'Mi página web', 'contenido' => '{"input": "text"}'],
            ['tipo' => 'web', 'nombre' => 'descripcion', 'etiqueta' => 'Descripción', 'valor' => '', 'contenido' => '{"input": "textarea"}'],
            ['tipo' => 'web', 'nombre' => 'keywords', 'etiqueta' => 'Palabras clave', 'valor' => '', 'contenido' => '{"input": "textarea"}'],
            ['tipo' => 'web', 'nombre' => 'dominio', 'etiqueta' => 'Dominio de la web', 'valor' => 'http://mipaginaweb.com/', 'contenido' => '{"input": "text"}'],
            ['tipo' => 'web', 'nombre' => 'telefono', 'etiqueta' => 'Télefono', 'valor' => '(+51) 999888777', 'contenido' => '{"input": "text", "icono": "icofont-telephone"}'],
            ['tipo' => 'web', 'nombre' => 'direccion', 'etiqueta' => 'Dirección', 'valor' => 'Dirección de la empresa', 'contenido' => '{"input": "text", "icono": "icofont-social-google-map"}'],
            ['tipo' => 'web', 'nombre' => 'email', 'etiqueta' => 'Email', 'valor' => 'info@mipaginaweb.com', 'contenido' => '{"input": "text", "icono": "icofont-ui-email"}'],
            ['tipo' => 'web', 'nombre' => 'logo', 'etiqueta' => 'Logo de la web', 'valor' => '', 'contenido' => '{"input": "imagen", "imagen": "logo.png", "imagen_carpeta": "carpeta/"}'],

            ['tipo' => 'script', 'nombre' => 'script', 'etiqueta' => 'Script adicional', 'valor' => '', 'contenido' => '{"input": "textarea", "descripcion": ""}'],

            ['tipo' => 'footer', 'nombre' => 'texto', 'etiqueta' => 'Texto', 'valor' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium fugiat, natus atque tempora modi asperiores nisi ipsa quaerat nemo, veniam omnis officia, rem', 'contenido' => ''],

            ['tipo' => 'contacto', 'nombre' => 'titulo', 'etiqueta' => 'Titulo', 'valor' => 'Formulario de Contacto', 'contenido' => '{"input": "text"}'],
            ['tipo' => 'contacto', 'nombre' => 'descripcion', 'etiqueta' => 'Descripcion', 'valor' => 'Descripción de formulario de contacto', 'contenido' => '{"input": "textarea"}'],
            ['tipo' => 'contacto', 'nombre' => 'mensaje', 'etiqueta' => 'Mensaje de Éxito', 'valor' => 'Tu mensaje fue enviado con éxito', 'contenido' => '{"input": "text"}'],
            ['tipo' => 'contacto', 'nombre' => 'email', 'etiqueta' => 'Email', 'valor' => 'info@empresa.dev', 'contenido' => '{"input": "text"}'],
            ['tipo' => 'contacto', 'nombre' => 'imagen', 'etiqueta' => 'Imagen', 'valor' => '', 'contenido' => '{"input": "imagen", "imagen": "", "imagen_carpeta": ""}'],
        ]);

        //PAGINAS
        DB::table('paginas')->insert([
            ['titulo' => 'Inicio', 'slug_url' => 'home']
        ]);

    }
}
