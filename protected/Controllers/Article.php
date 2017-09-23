<?php

namespace App\Controllers;


use T4\Mvc\Controller;

class Article
    extends Controller
{


    public function actionDefault()
    {
/*
        $this->data->title = $this->app->config->site->name;

        $this->app->assets->publish('/Layouts/assets/');
        $this->app->assets->publishCssFile('/Layouts/assets/test.css');
*/
        $this->actionAll();
    }

    public function actionAll()
    {
        $this->data->news = \App\Models\Article::findAll();
    }

    public function actionOne($__id = 1)
    {
        $this->data->article = \App\Models\Article::findByPK($__id);
    }

    public function actionLasts($Qty = 1)
    {
        //var_dump($__id);
        $news = \App\Models\Article::findAll(['order' => 'date','limit' => $Qty]);

        $this->data->news = $news;//->findLast($newsQty);
    }

/*
    public function actionAdd()
    {
        if (!empty($_POST)) {
            $data = $_POST;

            if (!empty($_FILES['image'])) {
                $data['image'] = $_FILES['image']['name'];
            }
            $data['date'] = date('Y-m-d'); // Нужена ли врзможность задания времени публикации новости пользователем? Если публикацию делать через cron, то возможно нужна

            $article = new \App\Models\Article($data);
            $article->save();

            $this->data->article = $article;
        }
    }

    public function actionSave()
    {
        if (!empty($_POST)) {

            $data = $_POST;

            $data['image'] = $_FILES['image']['name'];
            $data['date'] = date('Y-m-d'); // Нужена ли врзможность задания времени публикации новости пользователем? Если публикацию делать через cron, то возможно нужна
            $article = new \App\Models\Article($data);
            $article->save();

            //$this->data->news = \App\Models\Article::findAll();
            $this->data->article = $article;
        }
    }
*/
    public function actionChange(int $__id=0)
    {
        var_dump($_SERVER['REQUEST_METHOD']);

        if (!empty($_POST)) {
            $data = $_POST;


            //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_FILES['image'])) {
                if (is_uploaded_file($_FILES['image']['name'])) {
                    try {
                        $uploads_dir = ROOT_PATH_PROTECTED . '/Layouts/assets/images/news/';
                        if (move_uploaded_file($_FILES['image']['name'], $uploads_dir)) {
                            echo 'File ' . $_FILES['image']['name'] . 'Has Been Uploaded !';
                            $data['image'] = $_FILES['image']['name'];
                        }
                    } catch (RuntimeException $e) {
                        echo $e->getMessage();
                    }

                }

            }


            $data['date'] = date('Y-m-d');
            $article = new \App\Models\Article($data);

            if ($article->isNew()) { //if ($_POST['__id'])
                $article->save();
            } else {
                $article->update();
            }
            $this->data->article = $article;
        }

        if (!empty($__id)) {
            $this->data->article = \App\Models\Article::findByPK($__id);
        }
    }

    public function actionDelete(int $__id=0)
    {
        $article = \App\Models\Article::findByPK($__id);
        $article->delete();
        var_dump($this->view);
        $this->actionChange();
    }

}