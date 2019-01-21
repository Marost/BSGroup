<?php namespace App\Repositories\Admin;

use App\Entities\Admin\User;

class UserRepo extends BaseRepo{

    public function getModel()
    {
        return new User;
    }

    //BUSQUEDA DE REGISTROS
    public function findUsersAndPaginate()
    {
        return $this->getModel()
                    ->orderBy('id', 'asc')
                    ->paginate();
	}

}