<?php

namespace App\Models;


use T4\Core\Std;

class Article
    extends Std, Model
{
    protected $title;
    protected $text;
    protected $img;

    public function actionDefault()
    {

    }
}