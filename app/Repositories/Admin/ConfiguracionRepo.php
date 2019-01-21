<?php namespace App\Repositories\Admin;

use Illuminate\Http\Request;
use App\Entities\Admin\Configuracion;

class ConfiguracionRepo extends BaseRepo{

    public function getModel()
    {
        return new Configuracion();
    }

    public function listaHome()
    {
        return $this->getModel()
            ->where('tipo','like','home-%')
            ->get();
    }

    public function listaTipo($url)
    {
        return $this->getModel()->where('tipo',$url)->get();
    }

    public function listaContacto()
    {
        return $this->getModel()->where('tipo','contacto')->get();
    }

    public function listaItems($tipo)
    {
        return $this->getModel()->where('tipo', $tipo)->orderBy('orden', 'asc')->get();
    }

    public function buscarTipoNombre($tipo, $nombre)
    {
        return $this->getModel()->where('tipo',$tipo)->where('nombre',$nombre)->first();
    }
}