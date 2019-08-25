<?php
namespace App;

use PDO;

    class User
    {   
        
        // Метод регистрирует и сразу авторизирует
        public function addUser($pdo)
        {
           
            $login = $_POST['login'];
            $pass = $_POST['password'];
            $name = $_POST['name'];
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            var_dump($login);

            $sql = "SELECT * FROM user WHERE login= ?";
            $query = $pdo->prepare($sql);
            $query->execute([$login]);
            var_dump($query);
            $user = $query->fetch(PDO::FETCH_OBJ);
            
            

            if (empty($user)){
                $sql = "INSERT INTO user (login, password, name)
                VALUES (?,?,?)";
                $query = $pdo->prepare($sql);
                $query->execute([$login, $hash, $name]);
                var_dump($query);

                $_SESSION['auth'] = true;

                $sql = "SELECT id FROM user WHERE login=?";
                $query = $pdo->prepare($sql);
                $query->execute([$login]);
                $result = $query->fetch(PDO::FETCH_OBJ);
                $id = $result->id;

                $_SESSION['id_user'] = $id;
            }
          
        }

        public function authorization($pdo)
        {
            $login = $_POST['login'];
            $pass = $_POST['password'];

            $sql = "SELECT * FROM login=?";
            $query = $pdo->prepare($sql);
            $query->execute([$login]);
            $user = $query->fetch(PDO::FETCH_OBJ);

            if (!empty($user)){
                $hash = $user->password;

                if (password_verify($pass, $hash)){
                    $_SESSION['avtorization'] = $login;
                }
            }
        }
    }