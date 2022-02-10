<?php


abstract class C_Base extends C_Controller
{
    protected $title;
    protected $content;


    protected function before()
    {
        $this->title = 'Интернет-магазин';
        $this->content = '';

    }

    public function render()
    {
        $user = new M_User();
        if (isset($_SESSION['user_id'])){
            $userName = $user->get($_SESSION['user_id'])['login'];
        } else {
            $userName = false;
        }
        $vars = array('title' => $this->title, 'content' => $this->content, 'user' => $userName);
        $page = $this->Template('view/v_main.php', $vars);
        echo $page;
    }
}