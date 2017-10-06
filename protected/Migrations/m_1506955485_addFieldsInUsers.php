<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1506955485_addFieldsInUsers
    extends Migration
{

    public function up()
    {
        $this->addColumn('users',  ['password' => ['type' => 'string']]);
    }

    public function down()
    {
        $this->dropColumn('users', ['password']);
    }
    
}