<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Departement extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_departement' =>['type'=> 'INT','constraint'=>11,'auto_increment'=>true],
            'nom_departement' => ['type'=> 'text','null'=>false],
            'description' => ['type'=> 'text','constraint'=> '255','null'=>false],
            'updated_at datetime default current_timestamp on update current_timestamp',
            'create_at datetime default current_timestamp',
            'statut varchar(20) default "active"',
        ]);
        $this->forge->addKey('id_departement', true);
        //$this->forge->addUniqueKey('nom_departement');
        $this->forge->createTable('departement');
    }

    public function down()
    {
        $this->forge->dropTable('departement');

    }
}
