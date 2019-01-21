<?php namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;

class Pagina extends BaseEntity {

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['titulo','slug_url','descripcion','contenido','imagen','imagen_carpeta','publicar'];
    protected $table = 'paginas';

    /*
     * RELACIONES
     */
    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imagenable');
    }

    /*
     * GETTERS
     */
    public function getUrlAttribute()
    {
        return route('pagina', $this->slug_url);
    }

    /*
     * IMAGENES
     */
    public function getImagenAdminAttribute()
    {
        return "/upload/".$this->imagen_carpeta."200x150/".$this->imagen;
    }

    public function getImagenHomeAttribute()
    {
        return "/upload/".$this->imagen_carpeta."370x250/".$this->imagen;
    }

    public function getImagenOriginalAttribute()
    {
        return "/upload/".$this->imagen_carpeta.$this->imagen;
    }

    public function getImagenRelacionadaAttribute()
    {
        return "/upload/".$this->imagen_carpeta."370x300/".$this->imagen;
    }

    public function getImagenesOrdenAttribute()
    {
        return $this->imagenes()->orderBy('orden','asc')->get();
    }

    //GRAPES JS
    public function getHtmlAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['gjs-html'];
        return $valor;
    }

    public function getCssAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['gjs-css'];
        return $valor;
    }
}