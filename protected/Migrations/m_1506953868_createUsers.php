<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1506953868_createUsers
    extends Migration
{

    public function up()
    {
        $this->createTable('users', [
            'firstName' => ['type' => 'string'],
            'lastName' => ['type' => 'string'],
            'email' => ['type' => 'string'],
            'avatarImage' => ['type' => 'string'],
            'birthday' => ['type' => 'date'],
        ]);
    }

    public function down()
    {
        $this->dropTable('users');
    }
    
}