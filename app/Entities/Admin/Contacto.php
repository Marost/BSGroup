<?php namespace App\Entities\Admin;

class Contacto extends BaseEntity {

    protected $fillable = ['nombres','email','celular','asunto','mensaje'];
    protected $table = 'contacto';

}