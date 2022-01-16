<?php

class M_User
{
    function auth($login, $pass)
    {
        $db = new PDO('mysql:host=localhost;dbname=users','root','');
        $passDb = $db->query("SELECT password FROM users WHERE login = '$login'");
        if ($passDb->fetch(PDO::FETCH_ASSOC)['password'] == $pass) {
            $_SESSION['user_id'] = $db->query("SELECT id FROM users WHERE login = '$login'")->fetch(PDO::FETCH_ASSOC)['id'];
            return $login;
        } else {
            return "Введен неверный логин/пароль.";
        }
    }
    function reg($login, $pass)
    {
        $db = new PDO('mysql:host=localhost;dbname=users','root','');
        $loginDB = $db->query("SELECT login FROM users WHERE login = '$login'");
        if ($loginDB->fetch(PDO::FETCH_ASSOC)['login'] == $login) {
            return "Пользователь с таким логином уже зарегистрирован";
        } else {
            $db->exec("INSERT INTO users VALUE (null, '$login', '$pass')");
            return "Регистрация прошла успешно.";
        }
    }
    function quit()
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
            session_destroy();
            return true;
        }
        return false;
    }
    function get($id)
    {
        $db = new PDO('mysql:host=localhost;dbname=users','root','');
        return $db->query("SELECT * FROM users WHERE id = '" . $id . "'")->fetch();
    }
}