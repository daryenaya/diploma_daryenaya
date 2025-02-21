<?php
    require_once 'connect.php';
    
    session_start();
    $logSESS = $_SESSION['$logSESS'];
    if(!isset($logSESS))
    {
        header("location: login.php");
        exit;  
    }
    
    if (isset($_POST['delete']) && isset($_POST['id']))
    {
        $id = $_POST['id'];
        $query = "DELETE FROM Сотрудники WHERE Код_сотрудника='$id'";
        $result = $mysqli->query($query);
    }
    
    $query_allclietnts = "SELECT COUNT(Код_клиента) AS allclietnts FROM Клиенты"; 
    $allclietnts = $mysqli->query($query_allclietnts);
    $row_allclietnts = mysqli_fetch_assoc ($allclietnts); 
	$allclietnts_num = $row_allclietnts['allclietnts']; 
	mysqli_free_result ($allclietnts);
	
	$query_messages= "SELECT COUNT(Сообщение) AS allmessages FROM Сообщения"; 
    $allmessages = $mysqli->query($query_messages);
    $row_allmessages   = mysqli_fetch_assoc ($allmessages); 
	$allmessages_num = $row_allmessages ['allmessages']; 
	mysqli_free_result ($allmessages);
	
	$query_allorders= "SELECT COUNT(Код_заявки) AS allorders FROM Заявки"; 
    $allorders = $mysqli->query($query_allorders);
    $row_allorders  = mysqli_fetch_assoc ($allorders); 
	$allorders_num = $row_allorders['allorders']; 
	mysqli_free_result ($allorders);
	
	$query_allsum= "SELECT SUM(Стоимость) AS allsum FROM Услуги, Заявки WHERE Услуги.Код_услуги=Заявки.Код_услуги"; 
    $allsum = $mysqli->query($query_allsum);
    $row_allsum  = mysqli_fetch_assoc ($allsum); 
	$allallsum_num = $row_allsum['allsum']; 
	mysqli_free_result ($allsum);
	
	if (isset($_POST['num']))
    {
        $number = $_POST['num'];
        $query="SELECT * FROM Сообщения WHERE Код_сообщения='$number'";
        
        $returnOut=$mysqli->query($query)->fetch_assoc();
        
    } else{
    
    if (isset($_POST['delete']) && isset($_POST['id']))
    {
        $id = $_POST['id'];
        $query = "DELETE FROM Сообщения WHERE Код_сообщения='$id'";
        $result = $mysqli->query($query);
    }
    
    else $query = "SELECT * FROM Сообщения";
    
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
	        <!-- Sidebar Menu Items -->
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
	            <div class="container">
	                   <div class="section-title">
	                       <div class="main-title">
	                           <h2>Статистика</h2>
	                       </div>
	                   </div>
	                <div class="row">
	                       <div class="col-md-3 col-xl-3">
                                <div class="card bg-c-blue order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Заявок</h6>
                                        <h2 class="text-right"><i class="fa fa-shopping-cart f-left"></i><span>'; echo $allorders_num; echo'</span></h2>
                                    </div>
                                </div>
                            </div>
                                 
                            <div class="col-md-3 col-xl-3">
                                 <div class="card bg-c-green order-card">
                                     <div class="card-block">
                                         <h6 class="m-b-20">Клиентов</h6>
                                         <h2 class="text-right"><i class="fa fa-users f-left"></i><span>'; echo $allclietnts_num; echo'</span></h2>
                                     </div>
                                 </div>
                            </div>
                                 
                            <div class="col-md-3 col-xl-3">
                                 <div class="card bg-c-yellow order-card">
                                     <div class="card-block">
                                         <h6 class="m-b-20">Сообщений</h6>
                                         <h2 class="text-right"><i class="fa fa-comments f-left"></i><span>'; echo $allmessages_num; echo'</span></h2>
                                     </div>
                                 </div>
                            </div>
                                 
                            <div class="col-md-3 col-xl-3">
                                 <div class="card bg-c-pink order-card">
                                     <div class="card-block">
                                         <h6 class="m-b-20">Заработано, руб.</h6>
                                         <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>'; echo $allallsum_num; echo'</span></h2>
                                     </div>
                                 </div>
                            </div>
	               </div>
	                                           <div class="section-title">
	                            <div class="main-title">
	                                <h2>Последние сообщения</h2>
	                            </div>
	                       </div>
	                       <table class="table">
                    		    <tr>
                            		<th>Код сообщения</th>
                            		<th>Имя</th>
                            		<th>Email</th>
                            		<th>Тема</th>
                                    <th>Сообщение</th>
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
        	</section>
	    </div>
	    <!-- /#page-wrapper -->
	</div><!-- /#wrapper -->

		<!-- =========================================
        Script Section
        ========================================== -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write("<script src="js/vendor/jquery-1.11.3.min.js"><\/script>")</script>
		<script type="text/javascript" src="js/jquery.animateNumber.min.js"></script>
		<script type="text/javascript" src="js/jquery.appear.js"></script>
		<script type="text/javascript" src="js/wow.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
		<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/gmap.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>';
}
?>