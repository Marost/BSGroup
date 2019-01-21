<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->boolean('estado')->default(true);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_profiles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('imagen_carpeta', 20)->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_noticias', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('titulo');
            $table->string('slug_url');
            $table->text('descripcion')->nullable();
            $table->text('contenido')->nullable();
            $table->string('imagen', 150)->nullable();
            $table->string('imagen_carpeta', 100)->nullable();
            $table->integer('blog_categoria_id')->unsigned()->nullable();
            $table->boolean('publicar')->default(true);
            $table->boolean('visibilidad')->default(true);
            $table->integer('user_id')->unsigned();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_categorias', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('titulo');
            $table->string('slug_url')->nullable();
            $table->text('descripcion')->nullable();
            $table->boolean('publicar')->default(true);
            $table->string('imagen', 150)->nullable();
            $table->string('imagen_carpeta', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_tags', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('titulo');
            $table->string('slug_url')->nullable();
            $table->text('descripcion')->nullable();
            $table->boolean('publicar')->default(true);
            $table->string('imagen', 150)->nullable();
            $table->string('imagen_carpeta', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('blog_noticia_blog_tag', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('blog_noticia_id');
            $table->integer('blog_tag_id');
        });

        Schema::create('imagenes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->morphs('imagenable');
            $table->string('titulo')->nullable();
            $table->string('imagen')->nullable();
            $table->string('imagen_carpeta')->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('configuracion', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('tipo', 50)->comment('Tipo de campo, ya sea datos de footer, redes sociales, etc.');
            $table->string('nombre');
            $table->string('etiqueta');
            $table->text('valor')->nullable();
            $table->text('contenido')->nullable();
            $table->integer('orden')->nullable();
            $table->timestamps();
        });

        Schema::create('contacto', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombres');
            $table->string('empresa')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('telefono', 40)->nullable();
            $table->text('mensaje')->nullable();
            $table->boolean('leido')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('iconos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('titulo', 100);
            $table->text('datos');
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug_url', 150)->nullable();
            $table->string('titulo', 150);
            $table->text('descripcion')->nullable();
            $table->string('url', 150)->nullable();
            $table->string('class', 200)->nullable();
            $table->string('icono', 200)->nullable();
            $table->unsignedInteger('parent')->default(0);
            $table->smallInteger('orden')->default(0);
            $table->enum('tipo', ['enlace','pagina','blog_noticia','blog_categoria','blog_tag']);
            $table->boolean('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('paginas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('titulo');
            $table->string('slug_url');
            $table->text('descripcion')->nullable();
            $table->text('keywords')->nullable();
            $table->longText('contenido')->nullable();
            $table->string('imagen', 150)->nullable();
            $table->string('imagen_carpeta', 100)->nullable();
            $table->boolean('publicar')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paginas');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('iconos');
        Schema::dropIfExists('contacto');
        Schema::dropIfExists('configuracion');
        Schema::dropIfExists('imagenes');
        Schema::dropIfExists('blog_noticia_blog_tag');
        Schema::dropIfExists('blog_tags');
        Schema::dropIfExists('blog_categorias');
        Schema::dropIfExists('blog_noticias');
        Schema::dropIfExists('user_profiles');
        Schema::dropIfExists('users');
    }
}
