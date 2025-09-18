<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Utilisateur extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => '55',
                'null' => false
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false
            ],
            'matricule' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => false
            ],
            'password_hash' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true); // clé primaire
        $this->forge->createTable('utilisateur');
    }

    public function down()
    {
        //
        $this->forge->dropTable('utilisateur');
    }
}
