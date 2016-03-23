<?php
class Controller_Main extends Controller{

    public $errors = [];

    public function action_index()
    {
        $this->view->generate('header.php',['title'=>'File uploads']);
        $this->view->generate('panel.php');
        $this->view->generate('table.php',['data'=>$this->model->getAllFilesList()]);
        $this->view->generate('footer.php');

    }

    public function action_upload(){
        $data = [];
        $upload_dir = $this->config['folder'];
        $fileType = explode('.',$_FILES['userfile']['name']);
        $fileType = $fileType[count($fileType)-1];
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $fileIndexName = $this->generateName();
        $upload_file = $upload_dir.$fileIndexName;
        if($this->checkFile($_FILES['userfile']['tmp_name'],$fileType,$this->config)){
            if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_file)){
                $data['fileSize'] = filesize($upload_file);
                $data['fileName'] = $fileIndexName;
                $data['fileType'] = $fileType;
                $data['originalName'] = $_FILES['userfile']['name'];
                $data['added'] = $date;
                if($this->model->insertFileData($data)){
                    header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
                }else{
                    unlink($upload_file);
                    $this->view->generate('header.php',['title'=>'File uploads']);
                    $this->view->generate('errors.php',['errors'=>['Произошла ошибка при загрузке файла']]);
                    $this->view->generate('footer.php');
                }
            }else{
                $this->view->generate('header.php',['title'=>'File uploads']);
                $this->view->generate('errors.php',['errors'=>['Произошла ошибка при загрузке файла']]);
                $this->view->generate('footer.php');
            }
        }else{
            $this->view->generate('header.php',['title'=>'File uploads']);
            $this->view->generate('errors.php',['errors'=>$this->errors]);
            $this->view->generate('footer.php');
        }
    }

    public function action_download(){

    }

    public function action_filter(){
        if(isset($_GET['filter'])){
            $this->view->generate('filter.php',['data'=>$this->model->getFilter($_GET['filter'])]);
        }
    }

    private function checkFile($path,$type,$config){
        if(in_array($type,$config['accept_types'])){
            if($type == 'jpg' || $type == 'png' || $type == 'bmp'){
                if($config['max_size']>filesize($path)){
                    $imageInfo = getimagesize($path);
                    if($imageInfo!=false){
                        if($imageInfo[0]>$config['max_width'] || $imageInfo[1]>$config['max_height']){
                            $this->errors[] = 'Высота или ширина не соответствуют разрешенным';
                            return false;
                        }else{
                            return true;
                        }
                    }else{
                        $this->errors[] = 'Файл не является изображением или поврежден';
                        return false;
                    }
                }else{
                    $this->errors[] = "Файл более чем {$this->config['max_size']}Б";
                    return false;
                }
            }else{
                if($config['max_size']>filesize($path)){
                    return true;
                }else{
                    $this->errors[] = "Файл более чем {$this->config['max_size']}Б";
                    return false;
                }
            }
        }else{
            $this->errors[] = 'Данный тип файлов запрещен.';
            return false;
        }
    }

    private function generateName(){
        $name = '';
        for($i=0;$i<20;$i++){
            $name  .= rand(0,9);
        }
        return md5($name);
    }


}