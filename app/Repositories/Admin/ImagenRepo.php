<?php namespace App\Repositories\Admin;

use App\Entities\Admin\Imagen;

class ImagenRepo extends BaseRepo{

    public function getModel()
    {
        return new Imagen();
    }

    //BUSQUEDA DE REGISTROS
    public function listaImagenes()
    {
        $rows = $this->getModel()->all();

        $data = [];
        foreach ($rows as $key => $value){
            $data[] = $value->imagen_final;
        }

        return $data;
    }

}