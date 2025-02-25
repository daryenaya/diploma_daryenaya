<?php
    
    header('Content-type: text/html; charset=utf-8');

    $mysqli=new mysqli('localhost', 'd98194uh_wer', '12345678', 'd98194uh_wer');
     
    if($mysqli->connect_errno){
    	$msg='Не удалось подключиться к БД.';
    }else{
    	$mysqli->set_charset('utf8');
    }
    
?>