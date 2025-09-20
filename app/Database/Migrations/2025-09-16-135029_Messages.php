<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Messages extends Migration
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
            'contenu' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'id_conversation' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'id_expediteur' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'id_recepteur' => [
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
        $this->forge->addForeignKey('id_expediteur', 'utilisateur', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_recepteur', 'utilisateur', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('messages',true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('messages');
    }
}
