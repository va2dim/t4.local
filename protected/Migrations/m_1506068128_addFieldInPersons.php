<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1506068128_addFieldInPersons
    extends Migration
{

    public function up()
    {
        $this->addColumn('persons',  ['avatarImage' => ['type' => 'string']]);
    }

    public function down()
    {
        $this->dropColumn('persons', ['avatarImage']);
    }
    
}