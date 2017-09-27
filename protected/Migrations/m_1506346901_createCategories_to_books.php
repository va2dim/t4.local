<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1506346901_createCategories_to_books
    extends Migration
{

    public function up()
    {
        $this->createTable('categories_to_books', [
            '__category_id' => ['type' => 'link'],
            '__book_id' => ['type' => 'link'],
        ]);
    }

    public function down()
    {
        $this->dropTable('categories_to_books');
    }
    
}