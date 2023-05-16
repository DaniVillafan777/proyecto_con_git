<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PersonaModel;

class PersonaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nombre' => 'Daniel',
            'apellido' => 'asdff',
            'fecha_registro' => date('Y-m-d H:i:s')
        ];
        $modelPersona = new PersonaModel();
        $modelPersona->insert($data);
        // echo $this->db->lastQuery();
    }
}
