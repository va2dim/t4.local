<?php

namespace App\Controllers;


use App\Models\Category;
use App\Models\User;
use T4\Core\Collection;
use T4\Core\Exception;
use T4\Core\MultiException;
use T4\Mvc\Controller;

class Admin
    extends Controller
{

    public function actionAll() {
        $this->data->persons = \App\Models\Person::findAll();
    }

    public function actionShowUsers()
    {
        $this->data->users = User::findAll();

        if (!empty($_GET['__id'])) {
            $this->data->selectedUser = User::findByPK($_GET['__id']);
        }

        $this->app->assets->publish('/Layouts/assets/');
        $this->app->assets->publishJsFile('/Layouts/assets/clear_form.js');
    }

    public function actionChangeUser()
    {

        var_dump($_POST);
        if (!empty($_POST)){
            if (!empty($_POST['__id'])){
                $user = User::findByPK($_POST['__id']);
            } else {
                $user = new User();
            }

            try{
                /*
                $user->fill([
                    'firstName' => $_POST['firstName'],
                    'lastName' => $_POST['lastName'],
                    'email' => $_POST['email'],
                    'birthday' => $_POST['birthday'],
                    'password' => $_POST['password'],
                ]);
                */
                $user->fill($this->app->request->post);
                $user->save();
                $this->redirect('/admin/showUsers?__id='.$user->__id);
            } catch (MultiException $e) {

                foreach ($e as $error) {
                    echo 'Ошибка: ' . $error->getMessage().'<br>';
                }
                die;
                $this->data->errors = $e;
                //$this->view->assign('errors', $e);
                //$this->view->errors = $e;
            }




/*
            if (!empty($_POST['firstName'])) {
                try {
                    $user->firstName = $_POST['firstName']; // only Letters
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                }
                die;
            }
            $user->lastName = $_POST['lastName']; // only Letters
            if (!empty($_POST['email'])) {
                try {
                    $user->email = $_POST['email'];
                    //var_dump($user->email);
                } catch (Exception $e) {
                    echo 'Error: '.$e->getMessage();
                }
            } // @
            $user->avatarImage = $_POST['avatarImage'];
            if (!empty($_POST['birthday'])) {
                //try {
                    $user->birthday = $_POST['birthday']; // correct date
                    var_dump($user->birthday);

                } catch (Exception $e) {
                    echo 'Error: '.$e->getMessage();
                }

            }
            $user->password = $_POST['password']; // letters + numbers + _/-
*/
                        //die;


        }



    }

    public function actionDeleteUser()
    {
        if (!empty($_GET['__id'])) {
            User::findByPK($_GET['__id'])->delete();
        }

        $this->redirect('/admin/showUsers');
    }


    /**
     * Показ книг только из текущей категории
     */
    public function actionShowCategoryBooks($title = 'Книги') {
        $category = Category::findByTitle($title);

        $booksCollection = new Collection();

        foreach ($category->books as $book) {
            //var_dump($book);
            $booksCollection->add($book);
        }
        //var_dump($booksCollection); //? Collection вокруг каждого Obj, а не вокруг всех

        $this->data->books = $booksCollection;
    }

    /**
     * Показ книг из всех дочерних категорий (без текущей)
     */
    public function actionShowChildCategoriesBooks($title = 'Книги') {
        $categories = Category::findByTitle($title)->findSubTree();
        $categories = $categories->slice(1,$categories->count()-1); //Отрезаем от дерева корень, которые выводим отдельно

        $booksCollection = new Collection();
        foreach ($categories as $category) {
            foreach ($category->books as $book) {
                if (!$booksCollection->existsElement(['title' => $book->title])) {// Проверка на наличие (из других категорий) этой книги в коллекции
                    $booksCollection->add($book);
                }
            }
        }
        //var_dump($booksCollection);
        //die;

        $this->data->books = $booksCollection;

    }



    public function actionShowCategories()
    {
        $this->data->categories = Category::findAllTree();

        if (!empty($_GET['__id'])) {
            $this->data->selectedCategory = Category::findByPK($_GET['__id']);
        }
    }

    /**
     * Повышает уровень категории, но только внутри своей ветки (не выше родителя)
     */
    public function actionMoveCategoryUp()
    {
        if (!empty($_GET['__id'])) {
            $item = Category::findByPK($_GET['__id']);

            if (empty($item)) {

            }

            $sibling = $item->getPrevSibling();
            if (!empty($sibling)) {
                $item->insertBefore($sibling);
            }

        }
        $this->redirect('/admin/showCategories');
    }

    /**
     * Понижает уровень категории, но только внутри своей ветки (не выше родителя)
     */
    public function actionMoveCategoryDown()
    {
        if (!empty($_GET['__id'])) {
            $item = Category::findByPK($_GET['__id']);

            if (empty($item)) {

            }

            $sibling = $item->getNextSibling();
            if (!empty($sibling)) {
                $item->insertAfter($sibling);
            }
        }
        $this->redirect('/admin/showCategories');
    }


    public function actionChangeCategory()
    {

        var_dump($_POST);
        if (!empty($_POST)){ // Добавление узла/ветви к дереву
            if (!empty($_POST['newParentTitle'])){
                $category = Category::findByTitle($_POST['parent']);
                $category->title = $_POST['newParentTitle'];
                $category->save();
            } else {
                $category = new Category();
                $category->title = $_POST['title'];
                $category->parent = Category::findByTitle($_POST['parent']);
                var_dump($category);
                $category->save();
            }
        }

            //$cats = \App\Models\Category::findAllTree();
//        /var_dump($cats);
        $this->redirect('/admin/showCategories');

    }


    public function actionDeleteCategory()
    {
        $category = Category::findByPK($_GET['__id']);
        if (!empty($category)) {
            $category->delete();
        }
        $this->redirect('/admin/showCategories');
    }

    public function actionChange($__id=0)
    {
        //var_dump($_SERVER['REQUEST_METHOD']);


        if (!empty($_GET['__id'])) { //update
            var_dump($_GET['__id']);
            $person = \App\Models\Person::findByPK($__id);
        } //if (!empty($_POST)) { //add|save
        else if (!empty($_POST)){
            $data = $_POST;
            if (!empty($_POST['__id'])) {
                $person = (\App\Models\Person::findByPK($__id))
                    ->fill($data);
            }
            else {
                $person = (new \App\Models\Person())
                    ->fill($data);
                var_dump($data);
            }
        }
        //var_dump($person);
/*
            if ($person->isNew()) { //if ($_POST['__id'])

            } else {

            }
*/

        if (!empty($person)) {

            $person->save();
            $this->data->person = $person;
        }


    }

    public function actionDelete($__id)
    {
        $person = \App\Models\Person::findByPK($__id);
        if (!empty($person)) {
            $person->delete();
        }
        $this->redirect('/admin/change');
    }

}