<?php namespace App\Entities\Admin;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Entities\Admin\BaseEntity;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseEntity implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['email','password','estado'];
    protected $hidden = ['password', 'remember_token'];

    /*
     * RELACIONES
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    /*
     * GETTERS
     */
    public function getNombreCompletoAttribute()
    {
        return $this->profile->nombres." ".$this->profile->apellidos;
    }

    public function getFotoAttribute()
    {
        return "/upload/".$this->profile->imagen_carpeta."300x300/".$this->profile->imagen;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    /*
     * SETTERS
     */
    public function setPasswordAttribute($value)
    {
        if (!empty ($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
