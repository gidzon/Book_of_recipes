<?php
namespace App;

use \PDO;
    class Recipe
    {
        
        public function showRecipe($pdo, $id)
        {
           

                // $sql = "SELECT * FROM recipe WHERE id=?";

                $query = $pdo->prepare("SELECT * FROM recipe WHERE id=?");
                $query->execute([$id]);
        
        }

        public function actionRecipe($pdo)
        {
            
            
            
            $sql = 'SELECT * FROM recipe';
             $query = $pdo->query($sql);
             
            return $query->fetchAll(PDO::FETCH_OBJ);
            
            
        }
        
        
    }