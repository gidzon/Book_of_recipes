<?php
   include 'vendor/autoload.php';
   include __DIR__.'/config/config.php';
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <title>Добавить ингредиент</title>
</head>
<body>
    <form action="ingAdd.php" method="post" name="ing">
        <p><input type="text" name="ingredient[]" id="name" placeholder="Название ингредиента"></p>
        <p><textarea name="ing_description[]" id="description" cols="30" rows="10" placeholder="Описание ингредиента, кг, шт, количество "></textarea></p>
        <input type="submit" value="отправить">
    </form>
    <input type="button" id="add_input" value="добавить поле">
</body>
</html>