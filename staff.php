<?php
    require_once 'connect.php';
    
    session_start();
    $logSESS = $_SESSION['$logSESS'];
    if(!isset($logSESS))
    {
        header("location: login.php");
        exit;  
    }
    
    if (isset($_POST['num']))
    {
        $number = $_POST['num'];
        $query="SELECT * FROM Сотрудники WHERE Код_сотрудника='$number'";
        
        $returnOut=$mysqli->query($query)->fetch_assoc();
        
        echo json_encode($returnOut);
        
    } else{
    
    if (isset($_POST['delete']) && isset($_POST['id']))
    {
        $id = $_POST['id'];
        $query = "DELETE FROM Сотрудники WHERE Код_сотрудника='$id'";
        $result = $mysqli->query($query);
    }
    
    if (isset($_POST['fio']) && isset($_POST['codedolzn']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['add']))
    {
        $fio = $_POST['fio'];
        $codedolzn = $_POST['codedolzn'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $query = "INSERT INTO Сотрудники (ФИО, Код_должности, Адрес, Телефон) VALUES ('$fio', '$codedolzn', '$address', '$phone')";
        $result = $mysqli->query($query);
    }
        
    if (isset($_POST['fio']) && isset($_POST['codedolzn']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['update']) && isset($_POST['id']))
    {
        $id = $_POST['id'];
        $fio = $_POST['fio'];
        $codedolzn = $_POST['codedolzn'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $query = "UPDATE Сотрудники SET ФИО='$fio', Код_должности='$codedolzn', Адрес='$address', Телефон='$phone' WHERE Код_сотрудника='$id'";
        $result = $mysqli->query($query);
    }
    
    if (isset($_POST['selectCol']) && isset($_POST['selectSort']) && isset($_POST['search']) && isset($_POST['searchButton']))
    {
        $search = $_POST['search'];
        $selectCol = $_POST['selectCol'];
        $selectSort = $_POST['selectSort'];
        $query = "SELECT * FROM Сотрудники WHERE ФИО LIKE '%$search%' ORDER BY $selectCol $selectSort";
    }
    
    else $query = "SELECT * FROM Сотрудники";
    
    $result = $mysqli->query($query);

    echo '<!doctype html>
<html>
	<!-- =========================================
    head
    ========================================== -->
    <head>	
		<!-- =========================================
        Basic
        ========================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ФотоМастер</title>		
		<!-- =========================================
        Mobile Configurations
        ========================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="GOOGLEBOT" content="index follow"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />		
        <link rel="apple-touch-icon" href="apple-touch-icon.png">		
		<!-- ========================================
		Google font
		========================================= -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600" rel="stylesheet" type="text/css">
        <!-- =========================================
        CSS
        ========================================== -->
        <link rel="stylesheet" media="screen" href="css/owl.transitions.css" />
        <link rel="stylesheet" media="screen" href="css/owl.theme.css" />
        <link rel="stylesheet" media="screen" href="css/owl.carousel.css" />
        <link rel="stylesheet" media="screen" href="css/pe-icon-7-stroke.css" />
        <link rel="stylesheet" media="screen" href="css/font-awesome.min.css" />
        <link rel="stylesheet" media="screen" href="css/animate.css" />
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css" />
        <link rel="stylesheet" media="screen" href="style.css"/>
        <link rel="stylesheet" media="screen" href="css/responsive.css"/>
		<link rel="shortcut icon" href="img/fav.jpg">
		<!-- =========================================
        Script
        ========================================== -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/jquery-3.3.1.js"></script>
    </head>
    <body>

	<div id="throbber" style="display:none; min-height:120px;"></div>
	<div id="noty-holder"></div>
	<div id="wrapper">
	    <!-- Navigation -->
	    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="admin.php">
	                <p>ФотоМастер<span> admin panel</span></p>
	            </a>
	        </div>
	        <!-- Top Menu Items -->
	        <ul class="nav navbar-right top-nav">
	            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
	                </a>
	            </li>            
	            <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="fa fa-angle-down"></b></a>
	                <ul class="dropdown-menu">
	                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Выйти</a></li>
	                </ul>
	            </li>
	        </ul>
	        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
	        <div class="collapse navbar-collapse navbar-ex1-collapse">
	            <ul class="nav navbar-nav side-nav">
	                <li>
	                    <a href="admin.php"><i class="fa fa-fw fa-search"></i> Статистика</a>
		                </li>
		                <li>
	                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-table"></i> Таблицы<i class="fa fa-fw fa-angle-down pull-right"></i></a>
	                    <ul id="submenu-2" class="collapse">
	                       <li><a href="staff.php">Сотрудники</a></li>
	                        <li><a href="positions.php">Должности</a></li>
	                        <li><a href="goods.php">Услуги</a></li>
	                        <li><a href="clients.php">Клиенты</a></li> 
	                        <li><a href="users.php">Пользователи</a></li>
	                    </ul>
	                </li>
	                <li>
	                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-file"></i>  Отчеты<i class="fa fa-fw fa-angle-down pull-right"></i></a>
	                    <ul id="submenu-3" class="collapse">
	                        <li><a href="requests.php">Заявки</a></li>
	                    </ul>
	                </li>
	            </ul>
	        </div>
	        <!-- /.navbar-collapse -->
	    </nav>

	    <div id="page-wrapper">
	        <section id="services" class="servicer-section section-padding">
	                        <div class="section-title">
	                            <div class="main-title">
	                                <h2>Сотрудники</h2>
	                            </div>
	                            <div class="desc-title">
                	        <form class="searchForm" action="staff.php" method="post">
            		            Сортировать по
                                <select class="searchSet" name="selectCol">
                                    <option value="Код_сотрудника">Код сотрудника</option>
                                    <option>ФИО</option>
                                    <option>Код должности</option>
                                    <option>Адрес</option>
                                    <option>Телефон</option>
                                </select>
            		             
                                Тип сортировки
                                <select class="searchSet" name="selectSort">
                                    <option value="ASC">По возрастанию</option>
                                    <option value="DESC">По убыванию</option>
                                </select>
                        
                                Поиск по ФИО читателя
                                <input class="searchSet" type="text" name="search" maxlength="50" pattern="^[А-Яа-яЁё\s]+$">
                                <input class="searchButton" type="submit" name="searchButton" value="Поиск">
                            </form>
                	        
                    	    <table class="table">
                    		    <tr>
                            		<th>Код сотрудника</th>
                            		<th>ФИО</th>
                            		<th>Код должности</th>
                            		<th>Адрес</th>
                                    <th>Телефон</th>
                                    <th>Редактирование</th>
                                </tr>';
                            			
                                while($line=$result->fetch_assoc()){
                                    echo '<tr>';
                                    	
                                foreach ($line as $key=>$val){
                                    echo '<td>'.$val.'</td>';
                                }
                                    	
                                echo '<td>
                                <form action="staff.php" method="post">
                                    <input class="updateButton" type="button" name="' .$line['Код_сотрудника']. '" value="Изменить">
                                    <input type="hidden" name="id" value="' .$line['Код_сотрудника']. '">
                                    <input class="deleteButton" type="submit" name="delete" value="Удалить">
                                </form>
                                </td>
                                </tr>';
                                }
                            echo '</table>
                            <form class="addForm" action="staff.php" method="post">
                                <p class="form_title">Добавить</p>
                                <div class="form_row">
                    	            ФИО <input type="text" name="fio" maxlength="50" pattern="^[А-Яа-яЁё\s]+$">
                                </div>
                                <div class="form_row">
                    	            Код должности <input type="text" name="codedolzn" maxlength="50">
                                </div>
                                <div class="form_row">
                    	            Адрес <input type="text" name="address" maxlength="100" pattern="^[А-Яа-яЁё\s]+$">
                                </div>
                                <div class="form_row">
                                    Телефон <input type="text" name="phone" maxlength="11" pattern="^[0-9]{11}">
                                </div>
                                <div class="form_button">
                    	            <input class="submit" type="submit" name="add" value="Добавить">
                    	            <input class="cancel" type="button" name="cancel" value="Отмена">
                                </div>
                            </form>
                                
                            <form class="updateForm" action="staff.php" method="post">
                                <p class="form_title">Редактировать</p>
                                <input type="hidden" name="id">
                                <div class="form_row">
                    	            ФИО <input type="text" name="fio" maxlength="50" pattern="^[А-Яа-яЁё\s]+$">
                                </div>
                                <div class="form_row">
                    	            Код должности <input type="text" name="codedolzn" maxlength="50">
                                </div>
                                <div class="form_row">
                    	            Адрес <input type="text" name="address" maxlength="100">
                                </div>
                                <div class="form_row">
                                    Телефон <input type="text" name="phone" maxlength="11" pattern="^[0-9]{11}">
                                </div>
                                <div class="form_button">
                    	            <input class="submit" type="submit" name="update" value="Изменить">
                    	            <input class="cancel" type="button" name="cancel" value="Отмена">
                                </div>
                                </form>
                                
                            <div class="button">
                        	    <input class="addButton" type="button" value="Добавить">
                        	</div>
                	
                	<script src="js/script.js"></script>
        	        <script>
                        $(document).ready(function(){
                            $(".updateButton").click(function(){
                                let number = $(this).attr("name");
                                
                                $.post(\'staff.php\',
                                    {
                                        num: number
                                },function(data){
                                    let msg = JSON.parse(data);
                                    $(".updateForm input[name=\"id\"]").attr("value", msg["Код_сотрудника"]);
                                    $(".updateForm input[name=\"fio\"]").attr("value", msg["ФИО"]);
                                    $(".updateForm input[name=\"codedolzn\"]").attr("value", msg["Код_должности"]);
                                    $(".updateForm input[name=\"address\"]").attr("value", msg["Адрес"]);
                                    $(".updateForm input[name=\"phone\"]").attr("value", msg["Телефон"]);
                                
                                    console.log(data);
                                });
                            })
                        });
                    </script>
            </div>        
    	</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write("<script src="js/vendor/jquery-1.11.3.min.js"><\/script>")</script>
		<script type="text/javascript" src="js/jquery.animateNumber.min.js"></script>
		<script type="text/javascript" src="js/jquery.appear.js"></script>
		<script type="text/javascript" src="js/wow.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
		<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/gmap.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
</body>
</html>';
    }
?>