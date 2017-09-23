<?php

namespace App\Models;



use T4\Orm\Model;

/**
 * Class Articles
 * @package App\Models
 *
 * @property string $title
 * @property string $text
 * @property date $date
 */
class Article
    extends Model
{

    static protected $schema = [
        'columns' => [
                'title' => ['type' => 'string'],
                'text' => ['type' => 'text'],
                'date' => ['type' => 'date'],
                'image' => ['type' => 'string'],
        ]
    ];

    public function actionDefault()
    {

    }


    public function findLast($newsQty = 1): array
    {
        $news = Article::findAll();
        $article[] = new Article();
        var_dump($news);
        //$article = Article::slice($news->__data, -$newsQty, $newsQty);
        rsort($article);
        return $article;
    }

    public function add()
    {
        var_dump($_POST);
        $data = $_POST;
        $news = Article::append($data);

        return $news;
    }
}