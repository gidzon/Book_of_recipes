<?php
namespace App;

use PDO;
    class Recipe
    {
        
        // метод выводит заголовок и текст рецепта
        public function showRecipe($pdo)
        {
           
                $id = $_GET['id'];
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
            
            $sql = "INSERT INTO recipe (title, text)
            VALUES (?,?,?)";
            $query = $pdo->prepare($sql);
            $query->execute([$title, $text]);

        }
        // Добавление ингредиентов в базу данных
        public function addIngredient($pdo, $name, $amount, $dimension_value)
        {
            $sql = "INSERT INTO ingredient (name, amount, dimension_value)
            VALUES (?,?,?)";
            $query = $pdo->prepare($sql);
            $query->execute([$name, $amount, $dimension_value]);
        }

        
        
        
    }