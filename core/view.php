<?php

class View
{
    function generate($template_view, $data = null)
    {
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        include 'views/'.$template_view;
    }
}