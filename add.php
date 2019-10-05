<?php
   include 'vendor/autoload.php';
   include __DIR__.'/config/config.php';
   include 'blocs/header.php';
   
   use App\Recipe;

   $ing = new Recipe();
   $idIng = $ing->idIngredientRecipe($pdo);
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <title>Добавить рецепт</title>
</head>
<body>
    <header><a href="ingForm.php">Добавить ингредиент</a></header>
    <form action="addRecipe.php" method="post" name="recipe">
        <p><input type='text' name='title' id='title' placeholder='Заголовок рецепта'></p>
        <p><textarea name='text' id='text'  cols='30' rows='10' placeholder='Введите описание рецепта'></textarea></p>
    <select name="ingredient[]" size="5" multiple="multiple">
            <?php foreach ($idIng as $result): ?>
                <p><option value="<?php echo $result->id;?>"><?php echo $result->name; ?></option></p>
            <?php endforeach; ?>
            </select>

            <input type="submit" value="отправить">
    </form>
    <input type="button" id="button" value="добавить поле">
   </body>
</html>