<?php namespace App\Entities\Admin;

class BlogTag extends BaseEntity {

	protected $fillable = ['titulo','slug_url','descripcion','publicar','imagen','imagen_carpeta'];
    protected $table = 'blog_tags';

    /*
     * RELACIONES
     */
    public function noticias()
    {
        return $this->belongsToMany(BlogNoticia::class);
    }

    /*
     * GETTERS
     */
    public function getUrlAttribute()
    {
        return route('blog.tag', [$this->slug_url]);
    }

    /*
     * FUNCIONES
     */
    public function NoticiasRelacionadas($noticia)
    {
        return $this->noticias()->where('publicar', 1)->where('noticias.id','<>',$noticia)->limit(3)->get();
    }

    public function NoticiasTags()
    {
        return $this->noticias()->where('published_at','<=',fechaActual())->where('publicar','1')->orderBy('published_at','desc')->paginate(9);
    }

}