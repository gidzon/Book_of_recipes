<?php
namespace App;

use PDO;
    class Recipe
    {
        
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
            
            $sql = "SELECT id FROM recipe WHERE title = ?";
            $query = $pdo->prepare($sql);
            $query->execute([$title]);
            $titleRecipe = $query->fetch();
            

            if (empty($titleRecipe))
            {   
                foreach ($title as $result)
                {
                    $sql = "INSERT INTO recipe (title)
                    VALUES (?)";
                    $query = $pdo->prepare($sql);
                    $query->execute([$result]);
                }

                foreach ($text as $value)
                {
                    $sql = "INSERT INTO recipe (text)
                    VALUES (?)";
                    $query = $pdo->prepare($sql);
                    $query->execute([$value]);
                }
                } else
            {
                exit('Такой рецепт уже есть');
                
            }
        }

        public function copyIdRecipeId($pdo)
        {
            $title = $_POST['title'];
            $idNameIng = $_POST['ingredient'];
            

            
            foreach ($title as $value)
            {
                $sql = "SELECT id FROM recipe WHERE title = ?";
                $query = $pdo->prepare($sql);
                $query->execute([$value]);
                $idRecipe = $query->fetchAll();

                foreach ($idRecipe as $id)
                {
                    $sql = "INSERT INTO recipe__ingredient (id_recipe) VALUES (?)";
                    $result = $pdo->prepare($sql);
                    $result->execute([$id]);
                }
                
            }

            foreach ($idNameIng as $id)
            {
                $sql = "SELECT id FROM ingredient WHERE id = ?";
                $idIng = $pdo->prepare($sql);
                $idIng->execute([$id]);
                $result = $idIng->fetchAll();

                foreach ($result as $value)
                {
                    $sql = "INSERT INTO recipe__ingredient (id_ingredient) VALUES (?)";
                    $addIdIng = $pdo->prepare($sql);
                    $addIdIng->execute([$value]);
                }
                
            }
        }

        public function idIngredientRecipe($pdo)
        {
            $sql ="SELECT id, name FROM ingredient";
            $query = $pdo->query($sql);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        // Добавление ингредиентов в базу данных
        public function addIngredient($pdo)
        {
            $titleIng = $_POST["ingredient"];
            $descriptionIng = $_POST["ing_description"];
            
            
            foreach($titleIng as $value)
            {  
                $sql = "INSERT INTO ingredient (name) VALUES (?)";
                $addTitleIng = $pdo->prepare($sql);
                $addTitleIng->execute([$value]);

                $sql = "SELECT id FROM ingredient WHERE title = ?";
                $query = $pdo->prepare($sql);
                $query->execute([$value]);
                $result = $query->fetchAll();

                foreach($result as $idIng)
                {
                    $sql = "INSERT INTO ing__description (id_ingredient) VALUES (?)";
                    $query = $pdo->prepare($sql);
                    $query->execute([$idIng]);
                }
                    
                    foreach($descriptionIng as $descrip)
                {   $sql = "INSERT INTO ing__description (description) VALUES (?)";
                    $addDescriptionIng = $pdo->prepare($sql);
                    $addDescriptionIng->execute([$descrip]);
                }

            }

            

        }
 
    }