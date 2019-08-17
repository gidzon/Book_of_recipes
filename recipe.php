<?php
    $id = $_GET['id'];
    include 'vendor/autoload.php';
    include __DIR__.'/config/bd.php';

    use App\Recipe;

    $showRecipe = new Recipe();
    $Show = $showRecipe->showRecipe($pdo, $id);
    var_dump($Show);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница с рецептом</title>
</head>
<body>
    <p><?php echo $Show->title; ?></p>
</body>
</html>