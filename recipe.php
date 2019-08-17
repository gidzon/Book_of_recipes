<?php
    $id = $_GET['id'];
    include 'vendor/autoload.php';
    include __DIR__.'/config/bd.php';

    use App\Recipe;

    $showRecipe = new Recipe();
    $Show = $showRecipe->showRecipe($pdo, $id);
?>