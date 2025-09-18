<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MembreConversation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_conversation' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id', true); // clé primaire
        $this->forge->addForeignKey('id_conversation', 'conversation', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'utilisateur', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('membre_conversation');
    }

    public function down()
    {
        //
        $this->forge->dropTable('membre_conversation');
    }
}
