<?php

//AUTH
Route::auth();

//IMAGEN
Route::get('/upload/{folder}/{width}x{height}/{image}', ['as' => 'image.adaptiveResize', 'uses' => 'ImageController@adaptiveResize']);
Route::get('/upload/{folder}/{width}/{image}', ['as' => 'image.withResize', 'uses' => 'ImageController@withResize']);

//WIDGETS
Route::get('widget/{widget}', 'WidgetController@widgets');

//CONTACTO - POST
Route::post('contacto', ['as' => 'contacto', 'uses' => 'FrontendController@contactoPost']);

//BLOG
Route::group(['as' => 'blog.', 'prefix' => 'blog'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@blog']);
    Route::get('nota/{id}-{url}', ['as' => 'noticia', 'uses' => 'FrontendController@blogNota']);
    Route::get('categoria/{url}', ['as' => 'categoria', 'uses' => 'FrontendController@blogCategoria']);
    Route::get('tag/{url}', ['as' => 'tag', 'uses' => 'FrontendController@blogTag']);
});

//SERVICIOS
Route::get('servicio/{servicio}', ['as' => 'servicio', 'uses' => 'FrontendController@servicio']);

//PAGINA
Route::any('{pagina?}', ['as' => 'pagina', 'uses' => 'FrontendController@pagina'])->where('pagina', '(.*)');