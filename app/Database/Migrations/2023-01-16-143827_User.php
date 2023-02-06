<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'=>['type'=> 'INT','constraint'=>11,'auto_increment'=>true],
            'user_name'=> ['type'=> 'text','constraint'=> '100','null'=>false],
            'user_email'=> ['type'=> 'varchar','constraint'=> '255','null'=>false],
            'user_updated_at datetime default current_timestamp on update current_timestamp',
            'user_create_at datetime default current_timestamp',
            'statut varchar(20) default "active"',
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->addUniqueKey('user_email');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}