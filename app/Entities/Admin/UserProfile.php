<?php namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends BaseEntity
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['nombres','apellidos','imagen','imagen_carpeta','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}