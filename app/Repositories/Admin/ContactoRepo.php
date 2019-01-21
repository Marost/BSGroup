<?php namespace App\Repositories\Admin;

use Illuminate\Http\Request;
use App\Entities\Admin\Contacto;

class ContactoRepo extends BaseRepo {

    public function getModel()
    {
        return new Contacto();
    }

    //BUSQUEDA DE REGISTROS
    public function findMessageAndPaginate(Request $request)
    {
        return $this->getModel()
                    ->fechaStart('created_at', $request->get('start'))
                    ->fechaEnd('created_at', $request->get('end'))
                    ->orderBy('created_at', 'desc')
                    ->paginate();
    }
    
    //MENSAJES EN HOME
    public function mensajesHome()
    {
        return $this->getModel()
                    ->orderBy('created_at', 'desc')
                    ->paginate(3);
    }
    
}