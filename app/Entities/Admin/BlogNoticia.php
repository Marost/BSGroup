<?php namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;

class BlogNoticia extends BaseEntity {

    use SoftDeletes;
    protected $appends = ['url','fecha','imagen_home'];
    protected $dates = ['published_at','deleted_at'];
	protected $fillable = ['titulo','slug_url','descripcion','contenido','publicar','visibilidad','published_at','user_id','imagen','imagen_carpeta'];
    protected $table = 'blog_noticias';

    /*
     * RELACIONES
     */
    public function categoria()
    {
        return $this->belongsTo(BlogCategoria::class, 'blog_categoria_id');
    }

    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imagenable');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /*
     * GETTERS
     */
    public function getUrlAttribute()
    {
        return route('blog.noticia', [$this->id, $this->slug_url]);
    }

    public function getFechaAttribute()
    {
        return fechaBlogLista($this->published_at);
    }

    public function getFechaPublicacionAttribute()
    {
        return fechaPubAdmin($this->published_at);
    }

    public function getImagenesOrdenAttribute()
    {
        return $this->imagenes()->orderBy('orden','asc')->get();
    }

    /*
     * IMAGENES
     */
    public function getImagenComunidadAttribute()
    {
        return "/upload/".$this->imagen_carpeta."80x80/".$this->imagen;
    }

    public function getImagenHomeAttribute()
    {
        return "/upload/".$this->imagen_carpeta."450x300/".$this->imagen;
    }

    public function getImagenBlogAttribute()
    {
        return "/upload/".$this->imagen_carpeta."370x250/".$this->imagen;
    }

    public function getImagenNoticiaAttribute()
    {
        return "/upload/".$this->imagen_carpeta."900x450/".$this->imagen;
    }

    public function getImagenSidebarAttribute()
    {
        return "/upload/".$this->imagen_carpeta."75x65/".$this->imagen;
    }

    public function getImagenOriginalAttribute()
    {
        return "/upload/".$this->imagen_carpeta.$this->imagen;
    }

    public function getImagenRelacionadaAttribute()
    {
        return "/upload/".$this->imagen_carpeta."370x300/".$this->imagen;
    }

    /*
     * SETTERS
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = fechaPublicacionBD($value.':00');
    }

    /*
     * SCOPES
     */
    public function scopeSCategoria($query, $value)
    {
        if($value != "")
        {
            $query->where('categoria_id', $value);
        }
    }
}