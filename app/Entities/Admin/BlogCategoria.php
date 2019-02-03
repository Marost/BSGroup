<?php namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategoria extends BaseEntity {

    use SoftDeletes;
    protected $appends = ['url'];
    protected $dates = ['deleted_at'];
	protected $fillable = ['titulo','slug_url','descripcion','publicar','imagen','imagen_carpeta'];
    protected $table = 'blog_categorias';

    /*
     * RELACIONES
     */
    public function noticias()
    {
        return $this->hasMany(BlogNoticia::class);
    }

    /*
     * GETTERS
     */
    public function getUrlAttribute()
    {
        return route('blog.categoria', [$this->slug_url]);
    }

    /*
     * FUNCION
     */
    public function NoticiasCategoria()
    {
        return $this->noticias()->where('published_at','<=',fechaActual())->where('publicar','1')->orderBy('published_at','desc')->paginate(6);
    }

}