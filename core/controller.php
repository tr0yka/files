<?php
class Controller {

    public $model;
    public $view;
    public $config = [];

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model_main();
        $this->config['max_width'] = 320;
        $this->config['max_height'] = 320;
        $this->config['max_size'] = 20000000;
        $this->config['accept_types'] = array('jpg','png','bmp','exe','doc','docx','xml','xmlx','pdf','zip','rar','7zip','txt');
        $this->config['folder'] = '../uploads/';
    }
}