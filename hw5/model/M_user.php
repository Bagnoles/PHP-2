<?php

class M_User
{
    function auth($login, $pass)
    {
        $db = new PDO('mysql:host=localhost;dbname=users','root','');
        $passDb = $db->query("SELECT password FROM users WHERE login = '$login'");
        while ($row = $passDb->fetch(PDO::FETCH_ASSOC)) {
            if ($row['password'] == $pass) {
                return "Добро пожаловать, $login !";
            } else {
                return "Введен неверный логин/пароль.";
            }
        }
    }
}