<?php

namespace App\Controllers;


use T4\Mvc\Controller;

class Person
    extends Controller
{


    public function actionDefault()
    {

    }

    public function actionAll()
    {
        $this->data->news = \App\Models\Person::findAll();
    }

    public function actionOne($__id = 1)
    {
        $this->data->article = \App\Models\Person::findByPK($__id);
    }


}