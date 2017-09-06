<?php

namespace App\Models;


use T4\Orm\Model;

/**
 * Class Person
 * @package App\Models
 *
 * @property string $firstName
 * @property string $lastName
 * @property int $age
 */
class Person
    extends Model
{
    static protected $schema = [
        'columns' => [
            'firstName' => ['type' => 'string'],
            'lastName' => ['type' => 'string'],
            'age' => ['type' => 'int'],
        ]
    ];
}