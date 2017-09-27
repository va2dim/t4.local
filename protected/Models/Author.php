<?php

namespace App\Models;


use T4\Orm\Model;

/**
 * Class Author
 * @package App\Models
 *
 * @property string $firstName
 * @property string $lastName
 * @property date $birthday
 * @property \T4\Core\Collection|\App\Models\Book[] $books
 */
class Author
    extends Model
{
    static protected $schema = [
        'columns' => [
            'firstName' => ['type' => 'string'],
            'lastName' => ['type' => 'string'],
            'birthday' => ['type' => 'date'],
        ],
        'relations' => [
            'books' => ['type' => self::MANY_TO_MANY, 'model' => Book::class],
        ]
    ];


}