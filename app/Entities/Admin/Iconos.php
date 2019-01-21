<?php namespace App\Entities\Admin;

class Iconos extends BaseEntity {

    protected $fillable = ['titulo','datos'];
    protected $table = 'iconos';


    public function getColorAttribute()
    {
        $decode = json_decode($this->datos, true);
        $carpeta = $decode['color'];
        return $carpeta;
    }

    public function getIconoAttribute()
    {
        $decode = json_decode($this->datos, true);
        $carpeta = $decode['icono'];
        return $carpeta;
    }

    public function getNombreAttribute()
    {
        $decode = json_decode($this->datos, true);
        $carpeta = $decode['nombre'];
        return $carpeta;
    }

}