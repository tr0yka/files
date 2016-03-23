<?php
class Controller_Main extends Controller
{
    function action_index()
    {
        $this->view->generate('header.php',['title'=>'File uploads']);
        $this->view->generate('panel.php');
        $this->view->generate('table.php',['data'=>['qwer','eqweqwe','qweqweqwe','qweqweqwe','qweqwe']]);
        $this->view->generate('footer.php');

    }
}