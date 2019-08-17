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
   <?php foreach ($test as $result): ?>
   
    <p><?php echo $result->title; ?></p>
    <p><?php echo $result->description; ?></p>
  <?php  echo "<a href='recipe.php?id=$result->id' >подробнее</a>"; ?>
   
    
<?php endforeach; ?>



</body>
</html>