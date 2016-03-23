<?php
class Controller_Main extends Controller
{
    function action_index()
    {
        $this->view->generate('header.php',['title'=>'File uploads']);
        $this->view->generate('panel.php');
        $this->view->generate('table.php');
        $this->view->generate('main.php',['test'=>12234234]);
        $this->view->generate('footer.php');

    }
}