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
        $query="SELECT * FROM Услуги WHERE Код_услуги='$number'";
        
        $returnOut=$mysqli->query($query)->fetch_assoc();
        
        echo json_encode($returnOut);
        
    } else{
    
    if (isset($_POST['delete']) && isset($_POST['id']))
    {
        $id = $_POST['id'];
        $query = "DELETE FROM Услуги WHERE Код_услуги='$id'";
        $result = $mysqli->query($query);
    }
    
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['add']))
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $query = "INSERT INTO Услуги (Наименование, Описание, Стоимость) VALUES ('$name', '$description', '$price')";
        $result = $mysqli->query($query);
    }
        
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['update']) && isset($_POST['id']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $query = "UPDATE Услуги SET Наименование='$name', Описание='$description', Стоимость='$price' WHERE Код_услуги='$id'";
        $result = $mysqli->query($query);
    }
    
    if (isset($_POST['selectCol']) && isset($_POST['selectSort']) && isset($_POST['search']) && isset($_POST['searchButton']))
    {
        $search = $_POST['search'];
        $selectCol = $_POST['selectCol'];
        $selectSort = $_POST['selectSort'];
        $query = "SELECT * FROM Услуги WHERE Наименование LIKE '%$search%' ORDER BY $selectCol $selectSort";
    }
    
    else $query = "SELECT * FROM Услуги";
    
    $result = $mysqli->query($query);

    echo '<!doctype html>
<html class="no-js" lang="">
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
	                                <h2>Услуги</h2>
	                            </div>
	                            <div class="desc-title">
                	        <form class="searchForm" action="goods.php" method="post">
		            Сортировать по
                    <select class="searchSet" name="selectCol">
                        <option value="Код_услуги">Код услуги</option>
                        <option>Наименование</option>
                        <option>Описание</option>
                        <option>Стоимость</option>
                    </select>
		             
                    Тип сортировки
                    <select class="searchSet" name="selectSort">
                        <option value="ASC">По возрастанию</option>
                        <option value="DESC">По убыванию</option>
                    </select>
            
                    Поиск по наименованию услуги
                    <input class="searchSet" type="text" name="search" maxlength="50">
                    <input class="searchButton" type="submit" name="searchButton" value="Поиск">
                </form>
    	        
        	    <table class="table">
        		    <tr>
                		<th>Код услуги</th>
                		<th>Наименование</th>
                		<th>Описание</th>
                		<th>Стоимость</th>
                        <th>Редактирование</th>
                    </tr>';
                			
                    while($line=$result->fetch_assoc()){
                        echo '<tr>';
                        	
                    foreach ($line as $key=>$val){
                        echo '<td>'.$val.'</td>';
                    }
                        	
                    echo '<td>
                    <form action="goods.php" method="post">
                        <input class="updateButton" type="button" name="' .$line['Код_услуги']. '" value="Изменить">
                        <input type="hidden" name="id" value="' .$line['Код_услуги']. '">
                        <input class="deleteButton" type="submit" name="delete" value="Удалить">
                    </form>
                    </td>
                    </tr>';
                    }
                echo '</table>
                <form class="addForm" action="goods.php" method="post">
                    <p class="form_title">Добавить</p>
                    <div class="form_row">
        	            Наименование <input type="text" name="name" maxlength="50">
                    </div>
                    <div class="form_row">
        	            Описание <input type="text" name="description" maxlength="150">
                    </div>
                    <div class="form_row">
        	            Стоимость <input type="text" name="price" maxlength="50">
                    </div>
                    <div class="form_button">
        	            <input class="submit" type="submit" name="add" value="Добавить">
        	            <input class="cancel" type="button" name="cancel" value="Отмена">
                    </div>
                </form>
                    
                <form class="updateForm" action="goods.php" method="post">
                    <p class="form_title">Редактировать</p>
                    <input type="hidden" name="id">
                    <div class="form_row">
        	            Наименование <input type="text" name="name" maxlength="50">
                    </div>
                    <div class="form_row">
        	            Описание <input type="text" name="description" maxlength="150">
                    </div>
                    <div class="form_row">
        	            Стоимость <input type="text" name="price" maxlength="50">
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
                                
                                $.post(\'goods.php\',
                                    {
                                        num: number
                                },function(data){
                                    let msg = JSON.parse(data);
                                    $(".updateForm input[name=\"id\"]").attr("value", msg["Код_услуги"]);
                                    $(".updateForm input[name=\"name\"]").attr("value", msg["Наименование"]);
                                    $(".updateForm input[name=\"description\"]").attr("value", msg["Описание"]);
                                    $(".updateForm input[name=\"price\"]").attr("value", msg["Стоимость"]);
                                
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