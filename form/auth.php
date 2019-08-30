<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
        <?php 
            if (empty($_SESSION['auth'])):
        ?>
    <form action="../auth.php" method="POST">
        <input name="login" placeholder="введите логин">
        <input name="password" type="password" placeholder="введите пароль">
        <!-- <input name="confirm" type="password" placeholder="повторите пароль"> -->
        <input type="submit" value="Отправить">
    </form> 

        <?php 
            else:
        ?>
        <a href="exit.php">Выход</a>
        <a href="/">Главная</a>
        <?php 
            endif;
        ?>
</body>
</html>