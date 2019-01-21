<?php

//NOTICIAS
$factory->define(\App\Entities\Admin\BlogNoticia::class, function (Faker\Generator $faker){
    $titulo = $faker->sentence(6);
    return [
        'titulo' => $titulo,
        'slug_url' => SlugUrl($titulo),
        'descripcion' => $faker->text(200),
        'contenido' => '<p>'.$faker->text(800).'</p>',
        'publicar' => random_int(0, 1),
        'visibilidad' => random_int(0, 1),
        'user_id' => 1,
        'blog_categoria_id' => \App\Entities\Admin\BlogCategoria::all()->random()->id,
        'imagen' => 'imagen-'.random_int(1, 5).'.jpg',
        'imagen_carpeta' => 'carpeta/',
        'published_at' => random_int(10,25).'/'.random_int(1,6).'/2017 00:00'
    ];
});

//CATEGORIAS
$factory->define(\App\Entities\Admin\BlogCategoria::class, function (Faker\Generator $faker){
    $titulo = $faker->sentence(2);
    return [
        'titulo' => $titulo,
        'slug_url' => SlugUrl($titulo),
        'descripcion' => $faker->text(200),
        'publicar' => 1
    ];
});

//TAGS
$factory->define(\App\Entities\Admin\BlogTag::class, function (Faker\Generator $faker){
    $titulo = $faker->sentence(1);
    return [
        'titulo' => $titulo,
        'slug_url' => SlugUrl($titulo),
        'descripcion' => $faker->text(200),
        'publicar' => 1
    ];
});

$factory->define(App\Entities\Admin\Menu::class, function (Faker\Generator $faker) {
    $name = $faker->name;
    $menus = App\Entities\Admin\Menu::all();
    return [
        'titulo' => $name,
        'url' => str_slug($name),
        'parent' => (count($menus) > 0) ? $faker->randomElement($menus->pluck('id')->toArray()) : 0,
        'orden' => 0
    ];
});