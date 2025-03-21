<?php
    require_once 'connect.php';
    
    session_start();
    $logSESS = $_SESSION['$logSESS'];
    if(!isset($logSESS))
    {
        header("location: login.php");
        exit;  
    }
    
    if (isset($_POST['selectCol']) && isset($_POST['selectSort']) && isset($_POST['searchButton']))
    {
        $search = $_POST['search'];
        $selectCol = $_POST['selectCol'];
        $selectSort = $_POST['selectSort'];
        $query = "SELECT ФИО, Email, Телефон, Наименование, Описание, Стоимость, Доп_услуги, Дата FROM Заявки, Услуги 
        WHERE Заявки.Код_услуги=Услуги.Код_услуги ORDER BY $selectCol $selectSort";
    }
    
    else $query = "SELECT ФИО, Email, Телефон, Наименование, Описание, Стоимость, Доп_услуги, Дата FROM Заявки, Услуги WHERE Заявки.Код_услуги=Услуги.Код_услуги";
    
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
        <title>ФотоСтудия</title>		
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
	                <p>ФотоСтудия<span> admin panel</span></p>
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
	                                <h2>Заявки</h2>
	                            </div>
	                            <div class="desc-title">
                	        <form class="searchForm" action="requests.php" method="post">
		            Сортировать по
                    <select class="searchSet" name="selectCol">
                        <option>Дата</option>
                        <option>ФИО</option>
                        <option>Email</option>
                        <option>Телефон</option>
                        <option>Наименование</option>
                        <option>Описание</option>
                        <option>Стоимость</option>
                        <option value="Доп_услуги">Доп услуги</option>
                    </select>
		             
                    Тип сортировки
                    <select class="searchSet" name="selectSort">
                        <option value="ASC">По возрастанию</option>
                        <option value="DESC">По убыванию</option>
                    </select>
            
                    <input class="searchButton" type="submit" name="searchButton" value="Поиск">
                </form>
    	        
        	    <table class="table">
        		    <tr>
                		<th>ФИО</th>
                		<th>Email</th>
                		<th>Телефон</th>
                		<th>Наименование</th>
                        <th>Описание</th>
                        <th>Стоимость</th>
                        <th>Доп услуги</th>
                        <th>Дата</th>
                    </tr>';
                			
                    while($line=$result->fetch_assoc()){
                        echo '<tr>';
                        	
                    foreach ($line as $key=>$val){
                        echo '<td>'.$val.'</td>';
                    }
                        	
                    echo '</td>
                    </tr>';
                    }
                echo '</table>
                
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
?>