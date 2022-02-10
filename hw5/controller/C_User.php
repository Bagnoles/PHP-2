<?php
include_once('model/M_User.php');

class C_User extends C_Base
{
    public function action_auth()
    {
        $user = new M_User();
        $login = @$_POST['login'];
        $password = @$_POST['pass'];
        if (empty($login) || empty($password)){
            $this->title .= '::Авторизация';
            $info = 'Нужно ввести логин и пароль';
            $this->content = $this->Template('view/v_auth.php', array('text' => $info));
        } else {
            $this->title .= "::$login";
            $info = $user->auth($login, $password);
            $this->content = $this->Template('view/v_lk.php', array('text' => $info));
        }
    }
    public function action_reg()
    {
        $this->title .= '::Регистрация';
        $text = "Введите логин и пароль для регистрации";
        $user = new M_User();
        $login = @$_POST['login'];
        $password = @$_POST['pass'];
        if ($login && $password) {
            $text = $user->reg($login, $password);
        }
        $this->content = $this->Template('view/v_auth.php', array('text' => $text));
    }
    public function action_quit()
    {
        $user = new M_User();
        $user->quit();

    }
    public function action_lk()
    {
        $user = new M_User();
        $user_info = $user->get($_SESSION['user_id']);
        $this->title .= '::Личный кабинет '. $user_info['login'];
        $this->content = $this->Template('view/v_lk.php', array('text' => $user_info['login']));
    }
}