<?php

namespace App\Models;



use T4\Orm\Model;

/**
 * Class Book
 * @package App\Models
 * @property string $ISBN
 * @property string $title
 * @property string $published
 * @property string $cover
 * @property \T4\Core\Collection|\App\Models\Author[] $authors
 */
class Book
    extends Model
{

    static protected $schema = [
        'columns' => [
            'ISBN' => ['type' => 'link'],
            'title' => ['type' => 'string'],
            'published' => ['type' => 'date'], // год издания
            'cover' => ['type' => 'string'],
            'description' => ['type' => 'text'],
        ],
        'relations' => [
            'authors' => ['type' => self::MANY_TO_MANY, 'model' => Author::class],
            'categories' => ['type' => self::MANY_TO_MANY, 'model' => Category::class],
        ]

    ];

}