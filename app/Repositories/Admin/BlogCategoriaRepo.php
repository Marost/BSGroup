<?php namespace App\Repositories\Admin;

use App\Entities\Admin\BlogCategoria;
use Illuminate\Http\Request;

class BlogCategoriaRepo extends BaseRepo{

    public function getModel()
    {
        return new BlogCategoria();
    }

	public function findAndPaginate(Request $request)
	{
		return $this->getModel()->orderBy('titulo','asc')->paginate();
	}

    //BUSCAR CATEGORIA
    public function findCategoria($url)
    {
        return $this->getModel()->where('slug_url', $url)->where('publicar', 1)->first();
    }

    //LISTAR CATEGORIAS PUBLICADAS (TITULO - ID)
    public function listPub()
    {
        return $this->getModel()->where('publicar', 1)->orderBy('titulo','asc')->pluck('titulo', 'id')->toArray();
    }

    //LISTAR CATEGORIAS PUBLICADAS
    public function listBlog()
    {
        return $this->getModel()->where('publicar', 1)->get();
    }

}