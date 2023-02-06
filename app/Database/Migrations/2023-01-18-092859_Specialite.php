<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Specialite extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_specialite' =>['type'=> 'INT','constraint'=>11,'auto_increment'=>true],
            'id_departement' => ['type'=> 'INT'],
            'nom_specialite' => ['type'=> 'text','null'=>false],
            'description_spe' => ['type'=> 'text','null'=>false],
            'specialite_updated_at datetime default current_timestamp on update current_timestamp',
            'specialite_create_at datetime default current_timestamp',
            'statut varchar(20) default "active"',
        ]);
        $this->forge->addKey('id_specialite', true);
        $this->forge->addForeignKey('id_departement','departement' ,'id_departement');
        $this->forge->createTable('specialite');

    }

    public function down()
    {
        $this->forge->dropTable('specialite');

    }
}