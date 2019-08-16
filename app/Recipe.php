<?php
namespace App;

use PDO;
    class Recipe
    {
        private $title;
        private $description;
        private $text;
        public $id;
        private $query;
        public function addRecipe()
        {
           $this->title = $_POST['title'];
           $this->description = $_POST['description'];
           $this->text = $_POST['text'];

                $sql = "INSERT INTO recipe (title, description, text) 
                VALUES(?,?,?)";

                $query = $pdo-prepare($sql);
                $query->execute($this->title, $this->description, $this->text);



        }

        public function actionRecipe($pdo)
        {
            
            // global $row;
            $pdo = $pdo;
            $sql = 'SELECT * FROM recipe';
             $this->query = $pdo->query($sql);
            return $this->query->fetch(PDO::FETCH_OBJ);
            // while ($row = $query->fetch(PDO::FETCH_OBJ)){
            // //  return $row;
               
            // }
            // return $test = 32;
            // return $row;
            
        }
        
    }