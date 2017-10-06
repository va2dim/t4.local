<?php

namespace App\Models;


use T4\Core\Exception;
use T4\Orm\Model;

/**
 * TODO Divide user info in account: firstName, lastName, email (,avatarImage) & profile|detail part: birthday, ...
 * Class User
 * @package App\Models
 *
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $avatarImage
 * @property date $birthday
  */
class User
    extends Model
{
    static protected $schema = [
        'columns' => [
            'firstName' => ['type' => 'string'],
            'lastName' => ['type' => 'string'],
            'email' => ['type' => 'string'],
            'avatarImage' => ['type' => 'string'],
            'birthday' => ['type' => 'date'],
        ],
    ];


    protected function validateFirstName($value)
    {
        if (preg_match('/^[а-яёА-ЯЁa-zA-Z]*$/u', $value)) return true;
        else throw new Exception('Неверная фамилия (в ней содержатся символы отличные от букв)');
    }

    protected function validateLastName($value)
    {
        if (preg_match('/^[а-яёА-ЯЁa-zA-Z]*$/u', $value)) return true;
        else throw new Exception('Неверное имя (в нём содержатся символы отличные от букв)');
    }
/*
    protected function validatePhone($value)
    {
        if (preg_match('~\D{10}~', $value)) return true;
        else throw new Exception('Неверный номер телефона (в нём должно быть 10 цифр)');
    }

    protected function sanitizePhone($value)
    {
        return preg_replace('~\D+~', $value);
    }
*/
    protected function validateEmail($value)
    {
        //throw new Exception('Неверный email');


        if (preg_match('~@~', $value)) return true;
        else throw new Exception('Неверный email');

        /*
        if(false === strpos($value, '@')){
            throw new Exception('Неверный email');
        }
        return true;
         */
    }

    protected function validateBirthday($date)
    {
        //$date = '2020-77-12'; -> 2026-05-12 ?
        //$date = '9999-99-99'; -> 10007-06-07
        //$date = '2017-10-';
        $format = '!Y-m-d'; // без ! берет текущее (дата/)время в формат
        $d = \DateTime::createFromFormat($format, $date); // Метод сам производит санитацию: перекидывает/добавляет лишние дни/месяцы к месяцу/году, добавляет 0 перед 1..9
        //var_dump($d->format($format));
        //echo "Format: $format; " . $d->format($format) . "<br>";
        //if ($d && $d->format($format) == $date) return true;
        if ($d) return true;
        else throw new Exception('Неверный день рождения');
    }

    protected function validatePassword($value)
    {
        if (strlen($value)<=3) {
            yield new Exception('Неверный пароль (длина пароля меньше 3 символов)');
        }

        if (!preg_match('~[a-z0-9]~i', $value)) {
            yield new Exception('Неверный пароль (в нём содержатся неверные символы)');
        }

        return true;
    }
}