<?php namespace App\Repositories\Admin;

use App\Entities\Admin\Iconos;
use Illuminate\Http\Request;

class IconoRepo extends BaseRepo{

    public function getModel()
    {
        return new Iconos();
    }

    public function listaIconos()
    {
        return $this->getModel()->orderBy('titulo','asc')->pluck('titulo','id')->toArray();
    }

}