<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnUtilisateur extends Migration
{
    public function up()
    {
        //
        $fields = [
            'name_profile' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => true
            ],

            'age' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true
            ],

            'pdp' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],

            'city' => [
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => true
            ],

            'job' => [
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => true
            ],

            'about_me' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'centre_interet' => [
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => true
            ],

            'situation_amoureuse' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
                'null'       => true,
                'default'    => 'célibataire'
            ],
        ];

        $this->forge->addColumn('utilisateur', $fields);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('utilisateur', ['name_profile', 'age', 'pdp', 'city', 'job', 'about_me', 'centre_interet', 'situation_amoureuse']);
    }
}
