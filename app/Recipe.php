<?php
namespace App;

use PDO;
    class Recipe
    {
        
        // Метод делает выборку рецепта и ингредиентов,
        // используется связывание таблиц, отношение многие ко многим
        public function showRecipe($pdo)
        {
           
                $id = $_GET['id'];
                var_dump($id);
                $sql = "SELECT title, text FROM recipe
                 INNER JOIN recipe__ingredient ON recipe.id = id_recipe
                 WHERE id = ?
                 INNER JOIN ingredient ON id_ingredient = ingredient.id";

                $query = $pdo->prepare($sql);
                $query->execute([$id]);
                var_dump($query);
                return $query->fetch(PDO::FETCH_OBJ);
                      
        }
        // Выводит все рецепты
        public function actionRecipe($pdo)
        {
            $sql = "SELECT * FROM recipe";
             $query = $pdo->query($sql);
             
            return $query->fetchAll(PDO::FETCH_OBJ);
            
        }
        // Добавление рецепта в базу данных
        public function addRecipe($pdo, $title, $text)
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