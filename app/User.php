<?php
namespace App;

    class User
    {   private $name;
        private $login;
        private $password;

        public function addUser($login, $password)
        {
           $this->login = $login;
           $this->password = $password;

           
        }
    }