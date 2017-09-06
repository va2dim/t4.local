<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1504703391_createNews
    extends Migration
{

    public function up()
    {
        $this->createTable('news', [
            'title' => ['type' => 'string'],
            'text' => ['type' => 'text'],
            'date' => ['type' => 'date'],
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
    }
    
}