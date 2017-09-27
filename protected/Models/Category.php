<?php

namespace App\Models;



use T4\Orm\Model;

/**
 * Class Category
 * @package App\Models
 *
 * @property string $title
 * @property string $text
 * @property date $date
 */
class Category
    extends Model
{

    static protected $schema = [
        'table' => 'categories',
        'columns' => [
                'title' => ['type' => 'string'],
        ],
        'relations' => [
            'books' => ['type' => self::MANY_TO_MANY, 'model' => Book::class],
        ]
    ];

    static protected $extensions = ['tree'];

}