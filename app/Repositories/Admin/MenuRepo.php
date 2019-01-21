<?php namespace App\Repositories\Admin;

use App\Entities\Admin\Menu;
use Illuminate\Http\Request;

class MenuRepo extends BaseRepo {

    public function getModel()
    {
        return new Menu();
    }

    public function listaOrden()
    {
        return $this->getModel()->orderBy('orden','asc')->get();
    }
    
}