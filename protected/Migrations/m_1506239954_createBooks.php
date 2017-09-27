<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1506239954_createBooks
    extends Migration
{

    public function up()
    {
        $this->createTable('books', [
            'ISBN' => ['type' => 'link'],
            'title' => ['type' => 'string'],
            'published' => ['type' => 'date'], // Дата издания
            'cover' => ['type' => 'string'],
            'description' => ['type' => 'text'],
        ]);
        $this->createTable('authors_to_books', [
            '__author_id' => ['type' => 'link'],
            '__book_id' => ['type' => 'link'],
        ]);
    }

    public function down()
    {
        $this->dropTable('books');
        $this->dropTable('authors_to_books');
    }
    
}