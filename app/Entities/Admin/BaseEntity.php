<?php namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;

class BaseEntity extends Model
{
    public function getImagenAdminAttribute()
    {
        return "/upload/".$this->imagen_carpeta."450x275/".$this->imagen;
    }

    public function scopeTitulo($query, $titulo)
    {
        if(trim($titulo) != "")
        {
            $query->where('titulo', 'LIKE', "%$titulo%");
        }
    }

    public function scopePublicar($query, $publicar)
    {
        if($publicar != "")
        {
            $query->where('publicar', $publicar);
        }
    }

    public function scopeVisibilidad($query, $value)
    {
        if($value != "")
        {
            $query->where('visibilidad', $value);
        }
    }

    public function scopeDatefrom($query, $from)
    {
        if($from != "")
        {
            $query->where('created_at', '>', $from);
        }
    }

    public function scopeDateto($query, $to)
    {
        if($to != "")
        {
            $query->where('created_at', '<', $to);
        }
    }

    public function scopeFechaStart($query, $field, $from)
    {
        if($from != "")
        {
            $dato = fechaPublicacionBuscar($from);
            $query->where($field, '>=', $dato);
        }
    }

    public function scopeFechaEnd($query, $field, $to)
    {
        if($to != "")
        {
            $dato = fechaPublicacionBuscar($to);
            $query->where($field, '<=', $dato);
        }
    }

    public function scopeLeido($query, $leido)
    {
        if($leido != "")
        {
            $query->where('leido', $leido);
        }
    }
}