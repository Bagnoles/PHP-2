<?php
include_once('model/M_User.php');

class C_User extends C_Base
{
    public function action_auth()
    {
        $this->title .= '::Авторизация';
        $user = new M_User();
        $login = @$_POST['login'];
        $password = @$_POST['pass'];
        if (empty($login) || empty($password)){
            $info = 'Нужно ввести логин и пароль';
            $this->content = $this->Template('view/v_auth.php', array('text' => $info));
        } else {
            $info = $user->auth($login, $password);
            $this->content = $this->Template('view/v_index.php', array('text' => $info));
        }
          /*  $login = $_POST['login'];
            $info = $user->auth("login","pass");
            $this->content = $this->Template('view/v_auth.php', array('text' => $info));
        }
        else {
           $this->content = $this->Template('view/v_auth.php', array('text' => $info));
        } */
    }


}