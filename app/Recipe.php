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
                $sql = "INSERT INTO recipe (title, text)
                VALUES (?,?)";
                $query = $pdo->prepare($sql);
                $query->execute([$title, $text]);
                } else
            {
                exit('Такой рецепт уже есть');
                
            }
        }

        public function copyIdRecipeId($pdo)
        {
            $title = $_POST['title'];
            $idNameIng = $_POST['ingredient'];
            

            if (!empty($idNameIng))
            {
                $sql = "SELECT id INTO recipe__ingredient FROM recipe WHERE title = ?
                UNION SELECT id INTO recipe__ingredient FROM ingredient WHERE id = ?";
                $query = $pdo->prepare($sql);
                $query->execute([$title, $idNameIng]);
            }else{
                return $error = 1;
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

            
            
            $sql = "SELECT id FROM ingredient WHERE title = ?";
            $addTitleIng = $pdo->prepare($sql);
            $addTitleIng->execute([$titleIng]);
            $result = $addTitleIng->fetchAll();

            if (empty($result))
            {
                $sql = "INSERT INTO ingredient (name) VALUES (?)";
                $query = $pdo->prepare($sql);
                $query->execute([$titleIng]);

                $sql = "SELECT id FROM ingredient WHERE title = ?";
                $result = $pdo->prepare($sql);
                $result->execute([$titleIng]);
                $getIdIng = $result->fetchAll();

                $sql = "INSERT INTO ing__description (id_ingredient, description) VALUES (?, ?)";
                $query = $pdo->prepare($sql);
                $addTitleIng = $query->execute([$getIdIng, $descriptionIng]);
            }else{
                return $error = 1;
            }
            
        }
 
    }