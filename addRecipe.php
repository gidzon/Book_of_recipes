<?php
    include 'vendor/autoload.php';
    include __DIR__.'/config/config.php';
    

    use App\Recipe;

    $recipe = new Recipe();
    $recipe->addRecipe($pdo);
    $idRecipe = new Recipe();
    $idRecipe->copyIdRecipeId($pdo);
    // var_dump($_POST);