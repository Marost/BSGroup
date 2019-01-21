<?php namespace App\Repositories\Admin;

use App\Entities\Admin\BlogNoticia;
use App\Entities\Admin\Pagina;
use Illuminate\Http\Request;

class PaginaRepo extends BaseRepo{

    public function getModel()
    {
        return new Pagina();
    }

    //BUSQUEDA DE REGISTROS
    public function findAndPaginate()
    {
        return $this->getModel()->orderBy('titulo','asc')->paginate();
    }

    //BUSCAR PAGINA
    public function findPagina($url)
    {
        return $this->getModel()->where('slug_url', $url)->where('publicar', 1)->first();
    }

    //BUSQUEDA DE REGISTROS
    public function listaRegistrosJSON()
    {
        return $this->getModel()->all();
    }
}