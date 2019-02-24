<?php namespace App\Entities\Admin;

class Contacto extends BaseEntity {

    protected $fillable = ['nombres','email','celular','mensaje'];
    protected $table = 'contacto';

}