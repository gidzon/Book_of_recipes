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
            if (!$_SESSION['save_user'] == true):
        ?>
    <form action="../auth.php" method="POST">
        <input name="login" placeholder="введите логин">
        <input name="password" type="password" placeholder="введите пароль">
        <!-- <input name="confirm" type="password" placeholder="повторите пароль"> -->
        <input type="submit" value="Отправить">
    </form> 
        <?php 
            endif;
        ?>
</body>
</html>