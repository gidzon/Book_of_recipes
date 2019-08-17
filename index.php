<?php include 'vendor/autoload.php';
include __DIR__.'/config/bd.php';

use App\Recipe;

    $recipe = new Recipe();
   $test = $recipe->actionRecipe($pdo);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Книга рецептов</title>
</head>
<body>
   
   
    <p><?php echo $test->title; ?></p>
   
    




</body>
</html>