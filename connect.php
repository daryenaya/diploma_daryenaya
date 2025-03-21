<?php
    
    header('Content-type: text/html; charset=utf-8');

    $mysqli=new mysqli('localhost', 'daryenaya', '@Hasbik1609D', 'daryenaya');
     
    if($mysqli->connect_errno){
    	$msg='Не удалось подключиться к БД.';
    }else{
    	$mysqli->set_charset('utf8');
    }
    
?>