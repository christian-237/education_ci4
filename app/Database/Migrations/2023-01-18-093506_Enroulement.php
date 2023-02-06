<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Enroulement extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_enroulement' =>['type'=> 'INT','constraint'=>11,'auto_increment'=>true],
            'Annee_academique'  => ['type'=> 'date','null'=>false],
            'id_etudiant'       => ['type'=> 'INT'],
            'id_niveau'         => ['type'=> 'INT'],
            'id_specialite'     => ['type'=> 'INT'],
            'enroulement_updated_at datetime default current_timestamp on update current_timestamp',
            'enroulement_create_at datetime default current_timestamp',
            'statut varchar(20) default "active"',
        ]);
        $this->forge->addKey('id_enroulement', true);
        $this->forge->addForeignKey('id_etudiant','etudiant' ,'id_etudiant');
        $this->forge->addForeignKey('id_niveau','niveau' ,'id_niveau');
        $this->forge->addForeignKey('id_specialite','specialite' ,'id_specialite');
        $this->forge->createTable('enroulement');

    }

    public function down()
    {
        $this->forge->dropTable('enroulement');

    }
}