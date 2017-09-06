<?php

namespace App\Controllers;

use T4\Core\Config;
use T4\Mvc\Controller;

class Photo
    extends Controller
{

    public function actionDefault()
    {
        $this->data->title = 'Галлерея драьвя';
        $this->app->assets->publish('/Layouts/assets/images/dravya/');
        //$this->app->assets->publishCssFile('/Layouts/assets/gallery.css');

        $this->app->flash->msg = 'Для более детальной инфо. нажмите на картинку!';
        var_dump($this->app->flash->msg);

        $data->dravyas = new Config(ROOT_PATH_PROTECTED . '/dravya.php');

        var_dump($this->data->dravyas);
    }

    public function actionLast()
    {
        $dravyas = new Config(ROOT_PATH_PROTECTED . '/dravya.php');
        //var_dump($dravyas);
        $this->data->dravya = $dravyas->atasI;
        $this->data->dravya->name->SA = 'atasI';
        $dravyas->save();
        //var_dump($this->data->dravya);
    }

    public function actionDravya($id)
    {
        $dravyas = new Config(ROOT_PATH_PROTECTED . '/dravya.php');
        var_dump($id);
        $this->data->dravya = $dravyas->$id;

        //var_dump($this->data->dravya);
    }
}