<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1504703391_createArticles
    extends Migration
{

    public function up()
    {
        $this->createTable('articles', [
            'title' => ['type' => 'string'],
            'text' => ['type' => 'text'],
            'date' => ['type' => 'date'], // Дата изменения/создания новости
            'image' => ['type' => 'string'],
        ]);
    }

    public function down()
    {
        $this->dropTable('articles');
    }
    
}