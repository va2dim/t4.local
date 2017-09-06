<?php

namespace App\Controllers;


use T4\Mvc\Controller;

class News
    extends Controller
{
    protected $title;
    protected $text;
    protected $img;

    public function actionDefault()
    {
        $this->data->title = $this->app->config->site->name;

        $this->app->assets->publish('/Layouts/assets/');
        $this->app->assets->publishCssFile('/Layouts/assets/test.css');

    }

    public function actionAll()
    {
        $news = new \App\Models\News();
        $this->data->news = $news->findAll();
    }

    public function actionOne($id = 1)
    {
        $news = new \App\Models\News();
        $this->data->article = $news->findOne($id);
    }

    public function actionLasts($newsQty = 1)
    {
        $news = new \App\Models\News();
        $this->data->news = $news->findLast($newsQty);
    }


    public function actionAdd($data)
    {
        var_dump($_POST);
        $news = new \App\Models\News();
        $this->data->news = $news->findAll();
        $this->data->article = $data;
    }
}