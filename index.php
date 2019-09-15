<?php 
include 'vendor/autoload.php';
include __DIR__.'/config/config.php';

use App\Recipe;

   $recipe = new Recipe();
   $test = $recipe->actionRecipe($pdo);
   ?>
<!DOCTYPE html>
<html lang="en">
<body>
   <header>
   <?php include 'blocs/header.php'; ?>
   <title>Книга рецептов</title>
   <?php 
      if (empty($_SESSION['auth'])):
   ?>
         <a href="/form/reg.php">Регистрация</a>
         <a href="/form/auth.php">Авторизация</a>
         <?php 
            else:
         ?>
            <?php echo "<a href=recipe.php?id={$result->id}>Добавить рецепт</a>"?>
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