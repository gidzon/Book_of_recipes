<?php
namespace App;

use PDO;
    class Recipe
    {
        private $id;
        // метод выводит заголовок и текст рецепта
        public function showRecipe($pdo)
        {
           
                $this->id  = $_GET['id'];
                $sql = "SELECT title, text
                FROM recipe 
                WHERE id = ?";
                
                $query = $pdo->prepare($sql);
                $query->execute([$id]);
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result;
        }

        // метод выводит игредиенты которые относятся к рецепту
        public function showIngredient($pdo)
        {
            $id = $_GET['id'];
            $sql = "SELECT name, amount, dimension_value
            FROM ingredient
            INNER JOIN recipe__ingredient
            ON id_ingredient = ingredient.id
            WHERE id_recipe= ?";

            $query = $pdo->prepare($sql);
            $query->execute([$id]);
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        // Выводит все рецепты
        public function actionRecipe($pdo)
        {
            $sql = "SELECT * FROM recipe";
             $query = $pdo->query($sql);
             
            return $query->fetchAll(PDO::FETCH_OBJ);
            
        }
        // Добавление рецепта в базу данных
        public function addRecipe($pdo)
        {
            $title = $_POST['title'];
            $text = $_POST['text'];

            $sql = "INSERT INTO recipe (title, text)
            VALUES (?,?)";
            $query = $pdo->prepare($sql);
            $query->execute([$title, $text]);

        }
        // Добавление ингредиентов в базу данных
        public function addIngredient($pdo)
        {
            $name = $_POST['name'];
            $amount = $_POST['amount'];
            $dimensionValue = $_POST['dimension_value'];

            $name[] = $name;
            
            foreach ($name as $result){
                
            }
            
            $sql = "SELECT id FROM ingredient WHERE name = ?";            
            $query = $pdo->prepare($sql);
            $query->exeсute([$name]);
            while ($row = $query->fetchAll(PDO::FETCH_OBJ)){
               $name = $row;
            }

            if (!empty($name)){
                foreach ($name as $row){
                    $sql = "INSERT INTO recipe__ingredient (id_ingredient, id_recipe)
                    VAlUES (?,?)";
                    $query = $pdo->prepare($sql);
                    $query->execute([$row, $this->id = $_GET['id']]);
                }
            } else {
                $sql = "INSERT INTO ingredient (name, amount, dimension_value)
                VALUES (?,?,?)";
                $query = $pdo->prepare($sql);
                $query->execute([$name, $amount, $dimensionValue]);

            }

            // if (empty($name)){
            //     $sql = "INSERT INTO ingredient (name, amount, dimension_value)
            //     VALUES (?,?,?)";
            //     $query = $pdo->prepare($sql);
            //     $query->execute([$name, $amount, $dimensionValue]);
            // }

            
        }

        
        
        
    }