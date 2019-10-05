<?php
include 'vendor/autoload.php';
include __DIR__.'/config/config.php';


use App\Recipe;

$ingredient = new Recipe();
$ingredient->addIngredient($pdo);


// if($ingredient === 1)
// {
//     echo "ингредиент добавлен</br>
//     <p><a href='/'>Главная</a></p>
//     <p><a href='add.php'>Добавить рецепт</a></p>";
// }else{
//     echo "Такой ингредиент уже есть, выберите из имеющихся</br>
//     <p><a href='ingForm.php'>Добавить ингредиенты</a></p>";
// }