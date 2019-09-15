<?php
    
    include 'vendor/autoload.php';
    include __DIR__.'/config/config.php';

    use App\Recipe;

    $showRecipe = new Recipe();
    $Show = $showRecipe->showRecipe($pdo);

    $ingredient = new Recipe();
    $showIngredient = $ingredient->showIngredient($pdo);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'blocs/header.php'; ?>
    <title>Страница с рецептом</title>
</head>
<body>
<h1><?php echo $Show->title?></h1>
<p><?php echo $Show->text; ?></p>
<?php foreach ($showIngredient as $data): ?>
<p><?php echo $data->name; ?></p>
<p><?php echo $data->amount; ?></p>
<p><?php echo $data->dimension_value; ?></p>
<?php endforeach; ?>
</body>
</html>