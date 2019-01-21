<?php namespace App\Entities\Admin;

class Imagen extends BaseEntity{

    protected $fillable = ['titulo','imagen','imagen_carpeta','orden'];
    protected $table = 'imagenes';

    /*
     * RELACIONES
     */
    public function imagenable()
    {
        return $this->morphTo();
    }

    /*
     * GETTES
     */

    public function getImagenGaleriaAttribute()
    {
        return "/upload/".$this->imagen_carpeta."300x300/".$this->imagen;
    }

    public function getImagenFinalAttribute()
    {
        return "/upload/".$this->imagen_carpeta."".$this->imagen;
    }

    public function getImagenProductoAttribute()
    {
        return "/upload/".$this->imagen_carpeta."460/".$this->imagen;
    }

    public function getImagenOriginalAttribute()
    {
        return "/upload/".$this->imagen_carpeta.$this->imagen;
    }

    public function getImagenThumbAttribute()
    {
        return "/upload/".$this->imagen_carpeta."300x200/".$this->imagen;
    }

}