<?php namespace App\Repositories\Admin;

use App\Entities\Admin\Servicio;
use Illuminate\Http\Request;

class ServicioRepo extends BaseRepo{

    public function getModel()
    {
        return new Servicio();
    }

    public function listaRegistros()
    {
        return $this->getModel()->where('publicar', 1)->orderBy('titulo','asc')->get();
    }

    public function listaRegistrosAdmin(Request $request)
    {
        return $this->getModel()->where('publicar', 1)->paginate();
    }
}