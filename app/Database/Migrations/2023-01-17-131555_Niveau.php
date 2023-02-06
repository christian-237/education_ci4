<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Niveau extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_niveau' =>['type'=> 'INT','constraint'=>11,'auto_increment'=>true],
            'nom_niveau' => ['type'=> 'text','null'=>false],
            'niveau_updated_at datetime default current_timestamp on update current_timestamp',
            'niveau_create_at datetime default current_timestamp',
            'statut varchar(20) default "active"',
        ]);
        $this->forge->addKey('id_niveau', true);
        $this->forge->createTable('niveau');
    }

    public function down()
    {
        $this->forge->dropTable('niveau');

    }
}