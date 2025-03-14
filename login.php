<?php
    require_once 'connect.php'; 
    
    $error = $user = $pass = "";
    
    if (isset($_POST['login']))
    {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        
        if ($login == "" || $pass == "")
            $error = "Не все поля заполнены";
        else
        {
            $query = "SELECT Логин, Пароль FROM Пользователи WHERE Логин='$login' AND Пароль='$pass'";
            $result = $mysqli->query($query);
            
            if ($result->num_rows == 0)
            {
                $error = "Неверный логин или пароль";
            }
            else
            {
                $line = $result -> fetch_assoc();
                
                $_SESSION['login'] = $user;
                $_SESSION['pass'] = $pass;
                
                session_start();
      			
      			$_SESSION['$logSESS'] = $user[login];
      			header("location: admin.php");
      			exit;			
            }
            
        }
    }
    
    $login = $_GET['login'];

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
        <title>Авторизация</title>		
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
    <section class="order-area">
			<div class="order-list">
				<div class="order-item">
					<div class="order-imageover"></div>
					<div class="login-main-image"></div>
					<div class="order-captions">
						<h1 class="revive1">Для того,</h1>
						<h2 class="revive2">Чтобы войти в <span>админ</span>-панель,</h2>
						<h2 class="revive3">Введите логин и пароль</h2>
					</div>
					<div class="form-order">
                    	<form class="orderForm" action="login.php" method="post">
                            <div class="form_row">
                            	Логин <input type="text" name="login" maxlength="16" pattern="^[a-zA-Z0-9]+$">
                            </div>
                            <div class="form_row">
                            	Пароль <input type="password" name="pass" maxlength="16" pattern="^[a-zA-Z0-9]+$">
                            </div>
                            <div class="form_order">
                            	<input class="orderButton" type="submit" value="Войти">
                            </div>
                            <p class="error">'; echo $error; echo'</p>
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