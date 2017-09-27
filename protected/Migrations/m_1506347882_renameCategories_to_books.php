<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1506347882_renameCategories_to_books
    extends Migration
{

    public function up()
    {
        $this->renameTable('categories_to_books', 'books_to_categories');
    }

    public function down()
    {
        $this->renameTable('books_to_categories', 'categories_to_books');
    }
    
}