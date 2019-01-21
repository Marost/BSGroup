<?php namespace App\Repositories\Admin;

use App\Entities\Admin\BlogTag;
use Illuminate\Http\Request;
use App\Entities\Admin\Tag;

class BlogTagRepo extends BaseRepo{

    public function getModel()
    {
        return new BlogTag();
    }

    public function findAndPaginate(Request $request)
    {
        return $this->getModel()->orderBy('titulo','asc')->paginate();
    }

    //BUSCAR TAG
    public function findTag($url)
    {
        return $this->getModel()->where('slug_url', $url)->where('publicar', 1)->first();
    }

    //LISTAR CATEGORIAS PUBLICADAS (TITULO - ID)
    public function listPub()
    {
        return $this->getModel()->where('publicar', 1)->orderBy('titulo','asc')->pluck('titulo', 'id')->toArray();
    }

    //LISTAR TAGS EN FRONTEND
    public function listTags()
    {
        return $this->getModel()->where('publicar', 1)->orderBy('titulo','asc')->paginate(20);
    }

    //GUARDAR TAGS DE NOTICIAS
    public function guardarTagsNoticia($tags, Request $request)
    {
        $data = [];

        if($tags <> ''){
            foreach ($tags as $key => $value){
                $tag = $this->getModel()->where('id',$value)->first();
                if($tag){
                    array_push($data, $value);
                }else{
                    $tag_slug_url = SlugUrl($value);
                    $newTag = new BlogTag($request->all());
                    $newTag->titulo = $value;
                    $newTag->slug_url = $tag_slug_url;
                    $newTag->save();
                    array_push($data, $newTag->id);
                }
            }
        }

        return $data;
    }
}