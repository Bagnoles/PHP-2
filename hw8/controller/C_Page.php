<?php


class C_Page extends C_Base
{
    public function action_index()
    {
        $this->title .= '::Главная страница';
        $text = "Главная страница интернет-магазина.";
        $this->content = $this->Template('view/v_index.php', array('text' => $text));
    }

    /*public function action_edit()
    {
        $this->title .= '::Редактирование';
        if($this->isPost())
        {
            text_set($_POST['text']);
            header('location: index.php');
            exit();
        }

        $text = text_get();
        $this->content = $this->Template('view/v_edit.php', array('text' => $text));
    } */
}