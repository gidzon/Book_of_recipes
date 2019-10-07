<?php
    include 'vendor/autoload.php';
    include __DIR__.'/config/config.php';
    

    use App\Recipe;

    $recipe = new Recipe();
    $recipe->addRecipe($pdo);
    $idRecipe = new Recipe();
    $idRecipe->copyIdRecipeId($pdo);
    
    if (!$idRecipe == 1)
    {
        echo "Не добавлены ингредиенты</br>
        <a href='ingForm.php'>Добавить ингредиент</a>";
    }else{
        echo "<a href='/'>На главную</a>";
    }