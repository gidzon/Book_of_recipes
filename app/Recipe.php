<?php
namespace App;

use PDO;
    class Recipe
    {
        
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
            
            
            $pdo = $pdo;
            $sql = 'SELECT * FROM recipe';
             $query = $pdo->query($sql);
             
            return $row = $query->fetch(PDO::FETCH_OBJ);
            
            
        }
        
        
    }