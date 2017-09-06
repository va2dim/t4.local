<?php

namespace App\Controllers;


use App\Models\Person;
use T4\Core\Config;
use T4\Dbal\Connection;
use T4\Mvc\Controller;

class Index
    extends Controller
{

    public function actionDefault()
    {
        $persons = Person::findAll();


        $persons->setAge(12);
        $persons->save();

        var_dump($persons);
        die;
/*
        $conn = $this->app->db->default;
        $data = $conn->query('SELECT AVG(age) FROM persons')->fetchScalar();
        var_dump($data);
        die;
*/
        $this->data->title = $this->app->config->site->name;

        $this->app->assets->publish('/Layouts/assets/');
        $this->app->assets->publishCssFile('/Layouts/assets/test.css');


        //var_dump($this->app->flash->msg);

    }

    public function actionAbout()
    {
        $this->app->assets->publish('/Layouts/assets/');
        $this->app->assets->publishCssFile('/Layouts/assets/test.css');
    }

    public function actionPhoto()
    {
        $this->data->title = 'Галлерея драьвя';
        $this->app->assets->publish('/Layouts/assets/images/dravya/');
        $this->app->assets->publishCssFile('/Layouts/assets/gallery.css');

        $this->app->flash->msg = 'Для более детальной инфо. нажмите на картинку';
        //var_dump($this->app->flash->msg);
    }

    protected function access($action)
    {

    }

}