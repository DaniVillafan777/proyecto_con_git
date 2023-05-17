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
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombre' => 'required|alpha',
            'apellido' => 'required|alpha',
            'estado' => 'required|alpha',
        ]);
            //si el nombre es vacio devolver error
        // return var_dump($validation->withRequest($this->request)->run());
        if (!$validation->withRequest($this->request)->run()) {
            // Si la validación falla, reponder con los mensajes de error
            return $this->response->setJSON([
                'status' => 'fail', # success, fail, error
                'message' => $validation->getErrors()
            ]);
        }
        $datos = $this->request->getPost();
        $personaModel = new PersonaModel();
        if (!$personaModel->insert($datos)){
            return $this->response->setJSON([
                'status' => 'error', # success, fail, error
                'message' => 'Error en la bd al insertar'
            ]);
        }
        $id = $personaModel->insertId();
        return $this->response->setJSON([
            'status' => 'success', # success, fail, error
            'data' => [
                'id' => $id
            ],
            'message' => 'Registro exitoso'
        ]);
    }   
    
    public function edit($id = null){
        $personaModel = new PersonaModel();
        $condicion = ['id_persona' => $id];
        $datos = $personaModel->selectUsuarios($condicion);
        $vista = view('frmPersona');
        return $this->response->setJSON([
            'sstatus' => 'success',
            'data' => [
                'id' => $id,
                'datos' => $datos,
                'vista' => $vista
            ],
            'message' => 'Registro exitoso'
        ]);
    }

    public function eliminar($id_persona = null){
        if (!is_numeric($id_persona)) {
            return $this->response->setJSON([
                'status' => 'error', # success, fail, error
                'message' => 'No se encontro el registro a eliminar'
            ]);	
        }
        // return var_dump($id_persona);
        // $personaModel->eliminarRegistro($id_persona);
        // return redirect()->to(base_url('/mariposa'));
        $personaModel = new PersonaModel();
       if ( !$personaModel->delete($id_persona) ) {
            return $this->response->setJSON([
                'status' => 'error', # success, fail, error
                'message' => 'Error en la bd al eliminar'
            ]);
       }
       return $this->response->setJSON([
            'status' => 'success', # success, fail, error
            'message' => 'Registro eliminado'
       ]);
    }
}
