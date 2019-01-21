<?php namespace App\Repositories\Admin;

use App\Entities\Admin\BlogNoticia;
use Illuminate\Http\Request;

class BlogNoticiaRepo extends BaseRepo{

    public function getModel()
    {
        return new BlogNoticia();
    }

    //PAGINAS NOTICIAS EN HOME
    public function listaNoticias()
    {
        return $this->getModel()->where('published_at','<=',fechaActual())
                                ->where('publicar', 1)
                                ->where('visibilidad', 1)
                                ->orderBy('published_at', 'desc')
                                ->paginate();
    }

    //LISTA NOTICIAS RECIENTES
    public function listaNoticiasRecientes($id, $paginate)
    {
        return $this->getModel()->where('id','<>',$id)
                                ->where('published_at','<=',fechaActual())
                                ->where('publicar','1')
                                ->orderBy('published_at','desc')
                                ->paginate($paginate);
    }

    //LISTA NOTICIAS RELACIONADAS
    public function listaNoticiasRelacionadas($id, $categoria, $paginate)
    {
        return $this->getModel()->where('id', '<>', $id)
                                ->where('blog_categoria_id', $categoria)
                                ->where('published_at','<=',fechaActual())
                                ->where('publicar','1')
                                ->orderBy('published_at','desc')
                                ->paginate($paginate);
    }

    //PAGINAS NOTICIAS EN HOME
    public function listaNoticiasHome()
    {
        return $this->getModel()->where('published_at','<=',fechaActual())
                                ->where('publicar', 1)
                                ->where('visibilidad', 1)
                                ->orderBy('published_at', 'desc')
                                ->paginate(2);
    }

    //BUSCAR NOTICIA
    public function findNoticia($id, $url)
    {
        return $this->getModel()->where('id', $id)
                                ->where('slug_url', $url)
                                ->where('publicar', 1)
                                ->where('visibilidad', 1)
                                ->first();
    }

    //BUSQUEDA DE REGISTROS
    public function findAndPaginate(Request $request)
    {
        return $this->getModel()->titulo($request->get('titulo'))
                                ->fechaStart('published_at', $request->get('start'))
                                ->fechaEnd('published_at', $request->get('end'))
                                ->publicar($request->get('publicar'))
                                ->visibilidad($request->get('visibilidad'))
                                ->orderBy('published_at', 'desc')
                                ->paginate();
    }

    /**
     * @return mixed
     */
    public function listaNoticiasMenu()
    {
        return $this->getModel()->where('publicar',1)
                                ->orderBy('titulo','asc')
                                ->get();
    }

    //BUSQUEDA DE REGISTROS
    public function listaRegistrosJSON()
    {
        return $this->getModel()->all();
    }
}