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
            

            $sql = "SELECT * FROM user WHERE login= ?";
            $query = $pdo->prepare($sql);
            $query->execute([$login]);
            $user = $query->fetch(PDO::FETCH_OBJ);
            
            
            

            if (empty($user)){
                $sql = "INSERT INTO user (login, password, name)
                VALUES (?,?,?)";
                $query = $pdo->prepare($sql);
                $query->execute([$login, $hash, $name]);
                

                $_SESSION['auth'] = true;

                $sql = "SELECT id, name FROM user WHERE login=?";
                $query = $pdo->prepare($sql);
                $query->execute([$login]);
                $result = $query->fetch(PDO::FETCH_OBJ);
                $id = $result->id;
                $name = $result->name;

                $_SESSION['user_name'] = $name;
                } else {
                echo 'Такой пользователь уже есть';
            }
          
        }

        // Выход из учетной записи
        public function exitUser()
        {
            // session_destroy();
            unset($_SESSION['auth']);
        }

        public function authorization($pdo)
        {
            $login = $_POST['login'];
            $pass = $_POST['password'];

            $sql = "SELECT * FROM user WHERE login=?";
            $query = $pdo->prepare($sql);
            $query->execute([$login]);
            $user = $query->fetch(PDO::FETCH_OBJ);
            
            

            if ($user){
                $hash = $user->password;
                

                if (password_verify($pass, $hash)){
                    $_SESSION['save_user'] = true;
                    var_dump($_SESSION['save_user']);
                    
                } else {
                    exit;
                }
            }
        }
    }