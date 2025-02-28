<?php
    require_once 'connect.php';
    
    if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['order_type']) && isset($_POST['add']))
        {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $order_type = $_POST['order_type'];
            $info = $_POST['info'];
            $date = $_POST['date'];
            $query1 = "INSERT INTO Заявки (ФИО, Email, Телефон, Код_услуги, Доп_услуги, Дата) VALUES ('$name', '$email', '$phone', '$order_type', '$info', '$date')";
            $query2 = "INSERT INTO Клиенты (ФИО, Email, Телефон)
                        SELECT * FROM (SELECT '$name', '$email', '$phone') AS tmp
                        WHERE NOT EXISTS (
                        SELECT Телефон FROM Клиенты WHERE Телефон = $phone) 
                        LIMIT 1;";
            $result1 = $mysqli->query($query1);
            $result2 = $mysqli->query($query2);
            
            echo '<script>
                document.location.href = "http://d98194uh.beget.tech/photomaster/index.php"
            </script>';
        }
        
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
        <title>Оформление заявки</title>		
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
		<!-- =========================================
		Order Area
		========================================== -->
		<section class="order-area">
			<div class="order-list">
				<div class="order-item">
					<div class="order-imageover"></div>
					<div class="order-main-image"></div>
					<div class="order-captions">
						<h1 class="revive1">Оформите заявку,</h1>
						<h2 class="revive2">Заполнив <span>форму</span> ниже</h2>
					</div>
					<div class="form-order">
						<form class="orderForm" action="order.php" method="post">
		                    <div class="form_row">
		                        <input type="text" name="name" placeholder="ФИО" maxlength="50" pattern="^[А-Яа-яЁё\s]+$">
		                    </div>
		                    <div class="form_row">
		                    	<input type="text" name="phone" placeholder="Телефон" maxlength="11" pattern="^[0-9]{11}">
		                    </div>
		                    <div class="form_row">
		                    	<input type="text" name="email" placeholder="Email" maxlength="50">
		                    </div>
		                    <div class="form_row">
		                        <select name="order_type">
		                            <option disabled selected>Выберите необходимую услугу</option>
		                            <option value="1">Landing Page</option>
		                            <option value="2">Корпоративный сайт</option>
		                            <option value="3">Интернет-магазин</option>
		                        </select>
		                    </div>
		                    <div class="form_row">
		                        <textarea name="info" placeholder="Если у вас есть какие-либо дополнительные пожелания, напишите их здесь" maxlength="200"></textarea>
		                    </div>
		                    <input type="hidden" name="date" value="'; echo date("Y-m-d"); echo'">
		                    <div class="form_order">
		                    	<input class="orderButton" name="add" type="submit" value="Отправить">
		                    </div>
	                	</form>
					</div>
					<div class="order-exit">
						<a class="exit-text" href="index.php">Вернуться на главную</a>
					</div>
				</div>
			</div>	
		</section>

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
?>