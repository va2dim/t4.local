<?php

namespace App\Models;

use T4\Core\Config;

class News
    extends Config
{

    public function actionDefault()
    {

    }

    public function findAll()
    {
        $news = new News(ROOT_PATH_PROTECTED . '/news.php');
        //var_dump($news);
        //return $news->toArray();
        return $news;
    }

    public function findOne($id = 1): Article
    {
        $news = new News(ROOT_PATH_PROTECTED . '/news.php');
        $article = new Article();
        $article->fromArray($news[$id]->__data);

        return $article;
    }

    public function findLast($newsQty = 1): array
    {
        $news = new News(ROOT_PATH_PROTECTED . '/news.php');
        $article[] = new Article();
        $article = array_slice($news->__data, -$newsQty, $newsQty);
        rsort($article);
        return $article;
    }

    public function add(Article $data)
    {
        $news = new News(ROOT_PATH_PROTECTED . '/news.php');
        $news->append($data);

        return $news;
    }
}