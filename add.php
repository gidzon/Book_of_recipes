<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'blocs/header.php';?>
    <title>Добавить рецепт</title>
</head>
<body>
            <div >
                Рецепт
                <form action="addRecipe.php" method="POST">
                    <input type="text" name="title" placeholder="Заголовок рецепта">
                    <textarea name="text" placeholder="Текст рецепта"></textarea>
                </form>
                Ингредиенты
                <form action="addRecipe.php" method="POST">
                    <input type="text" name="name" placeholder="Название ингредиента">
                    <input type="text" name="amount" placeholder="Количество ингредиента">
                    <input type="text" name="dimension_value" placeholder="Мера, например кг, шт">
                    <input type="submit" value="отправить">
                </form>
        </div>
</body>
</html>