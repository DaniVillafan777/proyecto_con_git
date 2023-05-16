<?php

namespace App\Controllers;

use App\Libraries\Codigo;
use App\Libraries\Hija;
use App\Models\PersonaModel;

class Home extends BaseController
{
    private $model;
    public function __construct()
    {
        $this->model = new PersonaModel();
    }
    public function index()
    {
        dd($this->model->find(1));
        // $inst = new Codigo();
        // $session = service('session');
        // if ($session->getFlashdata('num')) {
        //     echo $session->getFlashdata('num');
        // } else {
        //     $instHija = new Hija();
        //     echo $instHija->sayHello();
        // }
        // return $inst->sayHello();
        return view ('index');
    }
    public function sayHello()
    {
        // return var_dump('svdbbd');
        echo "Hola mundo";
        return view('welcome_message');
    }
    //funcion que imprime escalones de un edificio de 5 pisos
    public function escalones()
    {
        $pisos = 5;
        for ($i = 1; $i <= $pisos; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo "[ ]";
            }
            echo "<br>";
        }
    }
    //
    
    //matriz mariposa
    public function mariposa()
    {
        #$session = service('session');
        #$data = [
        #    'message' => ($session->getFlashdata('num')) ? $session->getFlashdata('num') : ''
        #];
        $personaModel = new PersonaModel();
        $data['usuarios'] = $personaModel->selectUsuarios();
        // dd($data);
        return view('vista1', $data); 
    }
    function procesa (){
        $num = $this->request->getPost('numero');
        // $this->load->view('vist2',$num);
        return redirect(($num == 4) ? '/' : 'mariposa')
        ->with('num', "el numero correcto es: 4");
        // return view('vist2');
    }

    public function frmPersona()
    {
        return view('frmPersona');
    }

    public function createPersona()
    {
        $datos = $this->request->getPost();
        $personaModel = new PersonaModel();
        if ($personaModel->insert($datos)){
            $id = $personaModel->insertId();
            return $this->response->setJSON([
                'status' => 'success', # success, fail, error
                'data' => [
                    'id' => $id
                ],
                'message' => 'Registro exitoso'
            ]);
        }
    }
}
