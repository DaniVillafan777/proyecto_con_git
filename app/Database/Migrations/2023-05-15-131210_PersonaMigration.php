<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PersonaMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_persona' => [
                'type' => 'INT',
                'auto_increment' => true,
                // 'primary_key' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR', # varchar(100)
                'constraint' => 100,
                'null' => false
            ],
            'apellido' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'fecha_registro' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                // 'default' => 'now()'
            ], 
            'updated_at' =>[
                'type' => 'TIMESTAMP',
            ],
            'estado' => [
                // 'type' => 'ENUM',
                // 'constraint' => ['activo', 'inactivo', 'suspendido'],
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'activo',
                'null' => false
            ],
        ]);
        $this->forge->addKey('id_persona');
        $this->forge->createTable('persona');   #dv_persona
    }

    public function down()
    {
        $this->forge->dropTable('persona');
    }
}
