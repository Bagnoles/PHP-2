<?php


class M_User
{
    function auth($login, $pass)
    {
        $query = "SELECT * FROM users WHERE login='" . $login . "'";
        $result = DB::Instance() -> Select($query);
        if ($result) {
            if ($result['password'] == $this -> setPass($login, $pass)) {
                $_SESSION['user_id'] = $result['id'];
                return 'Добро пожаловать, ' . $result['name'] . '!';
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }
    }
    function reg($name, $login, $pass, $mail, $phone)
    {
        $query = "SELECT * FROM users WHERE login = '" . $login . "'";
        $result = DB::Instance() -> Select($query);
        if (!$result) {
            $password = $this -> setPass($login, $pass);
            $object = [
                'login' => $login,
                'password' => $password,
                'name' => $name,
                'mail' => $mail,
                'phone' => $phone,
                'role' => 0
            ];
            $res = DB::Instance() -> Insert('users', $object);
            if (is_numeric($res)) {
                return "Регистрация прошла успешно.";
            } else {
                return "Произошла ошибка при регистрации";
            }
        } else {
            return "Пользователь с таким логином уже существует.";
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
        $query = "SELECT * FROM users WHERE id=" . $id;
        $result = DB::Instance() -> Select($query);
        return $result;
    }
    function setPass($name, $password) {
        return strrev(md5($name)) . md5($password);
    }
}