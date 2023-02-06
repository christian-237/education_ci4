<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Etudiant extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_etudiant' =>['type'=> 'INT','constraint'=>11,'auto_increment'=>true],
            'nom' => ['type'=> 'text','null'=>false],
            'prenom' => ['type'=> 'text','null'=>false],
            'date_naissance' => ['type'=> 'date','null'=>false],
            'image' => ['type'=> 'varchar','constraint'=> '255','null'=>false],
            'etudiant_updated_at datetime default current_timestamp on update current_timestamp',
            'etudiant_create_at datetime default current_timestamp',
            'statut varchar(20) default "active"',
        ]);
        $this->forge->addKey('id_etudiant', true);
        $this->forge->createTable('etudiant');
    }

    public function down()
    {
        $this->forge->dropTable('etudiant');

    }
}
