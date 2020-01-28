<?php

class MainController{

    const SHOW_BY_DEFAULT = 20;

    public function actionIndex($page = 1)
    {   
        $title = false;
        $description = false;
        $text = false;

        if(isset($_POST['submit'])) {
            
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $text = htmlspecialchars($_POST['text']);

            $errors = false;

            if(!Entry::checkSizeField($title)) {
                $errors = true;
            }
            if(!Entry::checkSizeField($description)) {
                $errors = true;
            }
            if(!Entry::checkSizeField($text)) {
                $errors = true;
            }

            if($errors == false){
                $result = Entry::addEntry($title, $description, $text);
               
            }
           
        }

        if(isset($_POST['generate'])) {
            include (ROOT . '/vendor/autoload.php');
            $value = $_POST['quantity_value'];           
            $i = 0;
            while ($i<$value){
                $faker = Faker\Factory::create();
                $title =  $faker->text($_POST['quantity_title']);
                $description = $faker->text($_POST['quantity_description']);
                $text = $faker->text($_POST['quantity_text']);
                $result = Entry::addEntry($title, $description, $text);
                $i++;
            }
        }

        if(!isset($_SESSION['value'])){          
            $value = self::SHOW_BY_DEFAULT;
        } else {
            $value = $_SESSION['value'];
        }

        if(isset($_POST['btn_select'])) {
            $_SESSION['value'] = $_POST['value_select'];
            if($_SESSION['value'] == 0){
                $_SESSION['value'] = Entry::getNumPagination();
            }

            header("Location: / ");
        }

        $entrys = Entry::getPagination($page, $value);
        
        

        $pagination = Pagination::run(Entry::getNumPagination(), $page, $value);

        require_once(ROOT . "/views/main/index.php");
    }

    public function actionPageNotFound()
    {
        require_once(ROOT . "/views/main/404.php");
    }
}
?>