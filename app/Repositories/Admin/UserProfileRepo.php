<?php namespace App\Repositories\Admin;

use App\Entities\Admin\UserProfile;

class UserProfileRepo extends BaseRepo{

    public function getModel()
    {
        return new UserProfile;
    }

}