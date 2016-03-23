<?php

class View
{
    public function generate($template_view, $data = null)
    {
        if(is_array($data)) {

            extract($data);
        }
        include 'views/'.$template_view;
    }
}