<?php
    include 'vendor/autoload.php';
    include __DIR__.'/config/config.php';

    use App\Recipe;

    $recipe = new Recipe();
    $recipe->addRecipe($pdo);
    $ingredient = new Recipe();
    $ingredient->addIngredient($pdo);
