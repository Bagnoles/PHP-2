<?php


class C_User extends C_Base
{
    public function action_auth()
    {
        $this->title .= '::Авторизация';
        $info = 'Нужно ввести логин и пароль';
        if ($this->isPost()) {
            $user = new M_User();
            $info = $user->auth($_POST['login'], $_POST['pass']);
            $this->content = $this->Template('view/v_lk.php', array('text' => $info));
        }
        $this->content = $this->Template('view/v_auth.php', array('text' => $info));
    }

    public function action_reg()
    {
        $this->title .= '::Регистрация';
        $text = "Введите данные для регистрации";
        if ($this->isPost()) {
            $user = new M_User();
            $text = $user->reg($_POST['name'], $_POST['login'], $_POST['pass'], $_POST['mail'], $_POST['phone']);
        }
        $this->content = $this->Template('view/v_reg.php', array('text' => $text));
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