<?php

class Model_main{

    private $host = '127.0.0.1';
    private $user = 'root';
    private $password = '';
    private $connection = null;

    public function __construct(){
        $this->connection = mysql_connect($this->host,$this->user,$this->password);
        mysql_select_db('file_uploads',$this->connection);
    }

    public function getAllFilesList(){
        $query = "SELECT * FROM files_info ORDER BY added DESC";
        $list = [];
        $res = mysql_query($query);
        while($item = mysql_fetch_array($res)){
            $list[] = $item;
        }
        return $list;
    }

    public function getOneFileInfo($id){
        $query = "SELECT * FROM files_info WHERE id={$id} LIMIT 1";
        $res = mysql_query($query);
        $f = mysql_fetch_array($res);
        if(count($f)>0){
            return $f;
        }else{
            return false;
        }

    }

    public function getFilter($filter)
    {
        if (!empty($filter)) {
            $query = "SELECT * FROM files_info WHERE originalName LIKE '%{$filter}%'";
        } else {
            $query = "SELECT * FROM files_info ORDER BY added DESC";
        }

        $list = [];
        $res = mysql_query($query);
        while ($f = mysql_fetch_array($res)) {
            $list[] = $f;
        }
        return $list;
    }

    public function insertFileData($data){
        $query = "INSERT INTO `files_info` (`id`, `fileName`, `originalName`, `fileType`, `fileSize`, `comment`, `description`, `added`) VALUES (NULL, '{$data['fileName']}', '{$data['originalName']}', '{$data['fileType']}', '{$data['fileSize']}', '{$data['comment']}', '{$data['description']}', '{$data['added']}')";
        if(mysql_query($query)){
            return mysql_insert_id($this->connection);
            //return $data;
        }else{
            return false;
        }
    }

    public function deleteFileInfo($id){
        $query = "SELECT fileName FROM files_info WHERE id={$id}";
        $res = mysql_query($query);
        $data = mysql_fetch_array($res);
        if(count($data)>0){
            $query = "DELETE FROM files_info WHERE id={$id}";
            if(mysql_query($query)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

}