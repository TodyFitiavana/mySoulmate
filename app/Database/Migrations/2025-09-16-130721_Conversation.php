<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Conversation extends Migration
{
    public function up()
    {
        // CREATE TABLE Conversation (
//     id_conversation INT AUTO_INCREMENT PRIMARY KEY,
//     date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
// );
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
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
        $this->forge->createTable('conversation');

    }

    public function down()
    {
        //
        $this->forge->dropTable('conversation');
    }
}
