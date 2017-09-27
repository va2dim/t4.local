<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1506238310_createAuthors
    extends Migration
{

    public function up()
    {
        $this->createTable('authors', [
            'firstName' => ['type' => 'string'],
            'lastName' => ['type' => 'string'],
            'date' => ['type' => 'date'],
        ]);
    }

    public function down()
    {
        $this->dropTable('authors');
    }
    
}