<?php

//DASHBOARD
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//PAGINAS
Route::resource('paginas', 'PaginasController');
Route::get('paginas-duplicar/{id}', ['as' => 'paginas.duplicar', 'uses' => 'PaginasController@duplicar']);
Route::get('paginas-editar/{id}', ['as' => 'paginas.editar', 'uses' => 'PaginasController@editar']);
Route::post('paginas-save/{id}', 'PaginasController@save');

//PAGINAS - ITEMS
Route::resource('paginas.items', 'PaginasItemsController');
Route::get('paginas-items-ordenar/{url}', ['as' => 'paginas.items.order.get', 'uses' => 'PaginasItemsController@order']);

//BLOG
Route::group(['as' => 'blog.', 'prefix' => 'blog'], function () {
    //NOTICIAS
    Route::resource('noticias', 'BlogNoticiasController');
    Route::group(['as' => 'noticias.', 'prefix' => 'noticias/imagenes'], function(){
        Route::get('{noticia}', ['as' => 'img.list', 'uses' => 'BlogNoticiasController@fotosList' ]);
        Route::post('{noticia}/order', ['as' => 'img.order', 'uses' => 'BlogNoticiasController@fotosOrder' ]);
        Route::get('{noticia}/upload', ['as' => 'img.create', 'uses' => 'BlogNoticiasController@fotosCreate' ]);
        Route::post('{noticia}/upload', ['as' => 'img.store', 'uses' => 'BlogNoticiasController@fotosStore' ]);
        Route::delete('{noticia}/delete/{id}', ['as' => 'img.delete', 'uses' => 'BlogNoticiasController@fotosDelete' ]);
    });

    //CATEGORIAS
    Route::resource('categorias', 'BlogCategoriasController');

    //TAGS
    Route::resource('tags', 'BlogTagsController');
});

//ARCHIVOS
Route::post('documentos/upload-imagen', ['as' => 'documentos.upload.imagen', 'uses' => 'HomeController@uploadImagen']);
Route::post('documentos/upload-imagen-grapes', ['as' => 'documentos.upload.imagen.grapes', 'uses' => 'HomeController@uploadImagenGrapes']);
Route::post('documentos/upload-imagen-single', ['as' => 'documentos.upload.imagen.single', 'uses' => 'HomeController@uploadImagenSingle']);
Route::post('documentos/copiar-archivo', ['as' => 'documentos.copiar.archivo', 'uses' => 'HomeController@copiarArchivo']);

Route::get('archivos-imagenes', ['uses' => 'HomeController@archivos']);

//CONFIGURACION
Route::group(['as' => 'configuracion.', 'prefix' => 'configuracion'], function () {
    //OPCION
    Route::get('opcion/{url}', ['as' => 'opcion.edit', 'uses' => 'ConfiguracionController@edit']);
    Route::put('opcion/{url}', ['as' => 'opcion.update', 'uses' => 'ConfiguracionController@update']);

    //ITEMS
    Route::resource('url.items', 'ConfItemsController');
    Route::get('items-ordenar/{url}', ['as' => 'url.items.order.get', 'uses' => 'ConfItemsController@order']);
    Route::post('items-ordenar/{url}', ['as' => 'url.items.order.update', 'uses' => 'ConfItemsController@orderUpdate']);

    //MENU
    Route::get('menu', ['as' =>  'menu.index', 'uses' => 'ConfMenuController@index']);
    Route::post('menu', ['as' => 'menu.save', 'uses' => 'ConfMenuController@store']);
    Route::get('menu/{id}/edit', ['as' =>  'menu.edit', 'uses' => 'ConfMenuController@edit']);
    Route::put('menu/{id}', ['as' =>  'menu.update', 'uses' => 'ConfMenuController@update']);
    Route::post('menu-change', ['as' => 'menu.change', 'uses' => 'ConfMenuController@change']);
    Route::post('menu-delete', ['as' => 'menu.delete', 'uses' => 'ConfMenuController@delete']);
});

//FORMULARIOS
Route::group(['as' => 'formularios.', 'prefix' => 'formularios'], function () {
    //OPCION
    Route::get('opcion/{url}', ['as' => 'opcion.edit', 'uses' => 'FormularioController@edit']);
    Route::put('opcion/{url}', ['as' => 'opcion.update', 'uses' => 'FormularioController@update']);

    //MENSAJES
    Route::get('mensajes/{url}', ['as' => 'mensajes.index', 'uses' => 'FormularioController@index']);
    Route::get('mensajes/{url}/{id}', ['as' => 'mensajes.show', 'uses' => 'FormularioController@show']);
    Route::delete('mensajes/{url}/{id}', ['as' => 'mensajes.delete', 'uses' => 'FormularioController@destroy']);
});

//USUARIOS
Route::get('usuario/perfil', ['as' => 'usuario.perfil', 'uses' => 'UsuarioPerfilController@perfil']);
Route::match(['get','put'], 'usuario/perfil/datos', ['as' => 'usuario.perfil.datos', 'uses' => 'UsuarioPerfilController@datos']);
Route::put('usuario/perfil/foto', ['as' => 'usuario.perfil.foto', 'uses' => 'UsuarioPerfilController@foto']);
Route::put('usuario/perfil/password', ['as' => 'usuario.perfil.password', 'uses' => 'UsuarioPerfilController@password']);

Route::resource('usuarios', 'UsuariosController');
Route::get('usuarios-generar-password', ['as' => 'usuarios.password.generar', 'uses' => 'UsuariosController@passwordGenerar']);
Route::match(['get','put'], 'usuarios-cambiar-password/{id}', ['as' => 'usuarios.password.cambiar', 'uses' => 'UsuariosController@passwordCambiar']);