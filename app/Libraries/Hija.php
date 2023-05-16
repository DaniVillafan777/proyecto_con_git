<?php namespace App\Libraries;
use App\Libraries\Codigo;
class Hija extends Codigo
{
    public function index(){
        return $this->sayHello();
    }
}