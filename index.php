<?php 
include 'vendor/autoload.php';
include __DIR__.'/config/config.php';

use App\Recipe;

   $recipe = new Recipe();
   $test = $recipe->actionRecipe($pdo);

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'blocs/header.php'; ?>
<body>
   <header>
   <?php 
      if (!$_SESSION['auth'] == true or !$_SESSION['avtorization'] == true):
   ?>
         <a href="/form/reg.php">Регистрация</a>
         <a href="/form/auth.php">Авторизация</a>
         <?php 
            else:
         ?>
            <a href="recipe.php">Добавить рецепт</a>
            <a href="exit.php">Выход</a>
         <?php 
            endif;
         ?>
   </header>
   <?php foreach ($test as $result): ?>
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <h1><?php echo $result->title; ?></h1>
               <?php echo $result->description; ?>
            
  <?php  echo "<a href='recipe.php?id=$result->id' >подробнее</a>"; ?>
            </div>
         </div>
      </div>
    
<?php endforeach; ?>



</body>
</html>