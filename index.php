<?php
    require_once 'connect.php';
    
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) && isset($_POST['date']) && isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $date = $_POST['date'];
            $query = "INSERT INTO Сообщения (Имя, Email, Тема, Сообщение, Дата) VALUES ('$name', '$email', '$subject', '$message', '$date')";
            $result = $mysqli->query($query);
            
            echo '<script>
                document.location.href = "http://d98194uh.beget.tech/photomaster/index.php"
            </script>';
        }
        
    echo '<!doctype html>
<html class="no-js" lang="ru">
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
		<!-- =========================================
		HEADER-AREA
		========================================== -->
		<header id="home" class="header-area">
			<div class="container header">
				<div class="row">				
					<div class="col-md-2 col-sm-2">
						<div id="info">
							<span><i class="fa fa-phone"></i></span>
							<span>+7 (800) 000 800</span>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- =========================================
		Menu Area
		========================================== -->
		<section id="mainmenu" class="mainmenu-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#home">
								<h2>ФотоМастер</h2>
							</a>
						</div>
					</div>						
					<div class="col-md-9">
						<div class="navbar-collaps">								
							<!-- nav -->
							<nav class="mainMenu">
								<ul>
									<li class="scroll"><a href="#home">Главная</a></li>
									<li class="scroll"><a href="#about-us">О нас</a></li>
									<li class="scroll"><a href="#services">Услуги</a></li>
									<li class="scroll"><a href="#portfolio">Портфолио</a></li>
									<li class="scroll"><a href="#price-list">Цены</a></li>
									<li class="scroll"><a href="#contacts">Контакты</a></li>
								</ul>
							</nav>
							<!-- /nav -->
						</div>	
					</div>
				</div>
			</div>
		</section>		
		<!-- =========================================
		Slider Area
		========================================== -->
		<section class="slider-area">
			<div class="slider-list">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<div class="imageover"></div>
							<div class="main-image"></div>
							<div class="carousel-captions">
								<h1 class="revive1"><span>Дизайн и</span>разработка</h1>
								<h2 class="revive2">Вашей мечты</h2>
								<h3 class="revive3">Веб-студия</h3>
							</div>
						</div>
						<div class="item">
							<div class="imageover"></div>
							<div class="main-image1"></div>
							<div class="carousel-captions">
								<h1 class="revive4"><span>Проффесиональные</span>специалисты</h1>
								<h2 class="revive5">И лучшие</h2>
								<h3 class="revive6">Условия</h3>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</section>
		<!-- =========================================
        About US Section
        ========================================== -->
        <section id="about-us" class="feature-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                        <div class="section-title">
                            <div class="main-title">
                                <h2>О нас</h2>
                            </div>
                            <div class="desc-title">
                                 <p>ФотоМастер — это команда digital-специалистов с аналитическим подходом к маркетингу, дизайну и разработке. Стремление сделать каждый проект лучшим в отрасли заставляет нас постоянно учиться, отслеживать последние тренды в digital-маркетинге и web-дизайне. После запуска постоянно развиваем проект на основе аналитики, тестируем новые гипотезы. Мы уверены, что только в таком процессе можно добиться эффективного решения задач бизнеса.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 align-center wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="200ms">
						<div class="circular"></div>
					</div>
					<div class="col-md-6 wow fadeInRight" data-wow-duration="1.5" data-wow-delay="200ms">
						<div class="features-list">
							<div class="more-about">
								<div class="about-icon">
									<i class="pe-7s-compass"></i>
								</div>
								<div class="about-content">
									<h4>БОЛЬШОЙ ОПЫТ РАБОТЫ</h4>
									<p>Мы сочетаем качество изготовления, превосходные знания и низкие цены, чтобы предоставить вам сервис, не имеющий себе равных среди наших конкурентов.</p>
								</div>
							</div>
							<div class="more-about">
								<div class="about-icon">
									<i class="pe-7s-magnet"></i>
								</div>
								<div class="about-content">
									<h4>ЛУЧШИЕ УСЛОВИЯ</h4>
									<p>У нас есть опыт, персонал и ресурсы, чтобы проект прошел максимально комфортно для Вас. Мы можем гарантировать, что работа будет выполнена вовремя.</p>
								</div>
							</div>
							<div class="more-about">
								<div class="about-icon">
									<i class="pe-7s-pen"></i>
								</div>
								<div class="about-content">
									<h4>СТАНДАРТЫ</h4>
									<p>Работа с нами включает в себя тщательно спланированный ряд шагов, сосредоточенных вокруг графика, которого мы придерживаемся, и ежедневного общения.</p>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </section>
		<!-- =========================================
        Graphic content Section
        ========================================== -->	
		<section class="graphic-content-area">			
			<div class="graphic-image">
				<div class="paralax-image"></div>
				<div class="graphover"></div>
			</div>
			<div class="container featur">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="graphic-content">
							<h2 class="wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms"><span>ФотоМастер</span> Веб-студия нового поколения</h2>
							<p class="wow pulse" data-wow-duration="700ms" data-wow-delay="200ms">Нашей целью является помощь начинающим и действующим предпринимателям в привлечении покупателей через Интернет. Показателем качества нашей работы мы считаем отзывы заказчиков и портфолио наших сайтов, соответствующих международным стандартам W3C и Google Developers.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- =========================================
        Our Service Section
        ========================================== -->
        <section id="services" class="servicer-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                        <div class="section-title">
                            <div class="main-title">
                                <h2>Наши услуги</h2>
                            </div>
                            <div class="desc-title">
                                 <p>Наша основная цель - идеально разработанные и полностью функциональные веб-сайты.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="700ms" data-wow-delay="200ms">
						<div class="service-content">
							<h4>Как мы работаем</h4>
							<div class="hr-border">
								<span></span>
							</div>
							<div class="service-para">
								<p>Профессиональная веб-студия <strong>ФотоМастер</strong> специализируется на разработке сайтов для малого и среднего бизнеса. Наши сайты используют удобную и простую панель управления контентом.<p>
								<p>Сам <strong>движок</strong> оптимизирован для поисковых систем. Что позволяет индексировать и продвигать только нужные вам страницы  в ТОП поисковых систем.<p>
								<p>В нашей веб-студии по созданию сайтов одновременно в работе присутствуют не более 3-4 проектов. Что позволяет качественно и в срок успешно завершать все работы. Мы не гонимся за количеством, как это делают крупные агентства по разработке сайтов. Для нас <strong>качество</strong> работ намного важней.<p>
							</div>
						</div>
					</div>
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="700ms" data-wow-delay="200ms">
						<div class="features-list service-list">
							<div class="more-about about-service">
								<div class="about-icon servicebase">
									<i class="fa fa-wordpress"></i>
								</div>
								<div class="about-content servic-content">
									<h4>Маркетинг</h4>
									<p>- Анализ задачи, товаров, способов продвижения и сбор семантики <br> - Проектирование структуры сайта <br> - Составление и утверждение ТЗ</p>
								</div>
							</div>
							<div class="more-about about-service">
								<div class="about-icon servicebase">
								<i class="fa fa-code"></i>
								</div>
								<div class="about-content servic-content">
									<h4>Разработка</h4>
									<p>- Разработка дизайна <br> - Программирование <br> - Верстка <br> - Оптимизация <br> - Тестировка и наполнение контентом</p>
								</div>
							</div>
							<div class="more-about about-service">
								<div class="about-icon servicebase">
									<i class="fa fa-crosshairs"></i>
								</div>
								<div class="about-content servic-content">
									<h4>Продвижение</h4>
									<p>- Интеграция с учетными системами <br> - Интеграция с CRM <br> - Подключение систем аналитики <br> - Настройка рекламных кампаний</p>
								</div>
							</div>
								<div class="icon_list_connector"></div>
						</div>
					</div>
                </div>
            </div>
        </section>
		<!-- =========================================
        Latest Project Section
        ========================================== -->
		<section id="portfolio" class="latest-project-area">
			<div class="container">
				<div class="row">
                    <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                        <div class="latest-title">
                            <div class="main-title">
                                <h2>Портфолио</h2>
                            </div>
                            <div class="desc-title">
                                <p>Сайты, разработанные в компании ФотоМастер</p>
                            </div>
                        </div>
                    </div>	
					<div class="col-md-12">
					<div class="container-less">
						<div class="project-list wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
							<div class="mix category-3 single-project" data-myorder="2">
								<a href=""><img src="img/1.jpg" alt=""></a>
							</div>
							<div class="mix category-3 category-4 category-2 single-project" data-myorder="2">
								<a href=""><img src="img/2.jpg" alt=""></a>
							</div>
							<div class="mix category-3 category-4 single-project" data-myorder="2">
								<a href=""><img src="img/3.jpg" alt=""></a>
							</div>
							<div class="mix category-3 category-4 category-2 single-project" data-myorder="2">
								<a href=""><img src="img/4.jpg" alt=""></a>
							</div>
							<div class="mix category-1 category-4 category-2 single-project" data-myorder="2">
								<a href=""><img src="img/5.jpg" alt=""></a>
							</div>
							<div class="mix category-1 single-project" data-myorder="2">
								<a href=""><img src="img/6.jpg" alt=""></a>
							</div>
							<div class="mix category-1 category-2 single-project" data-myorder="2">
								<a href=""><img src="img/7.jpg" alt=""></a>
							</div>
							<div class="mix category-1 single-project" data-myorder="2">
								<a href=""><img src="img/8.jpg" alt=""></a>
							</div>
						</div>
					</div>
					</div>
					<div class="col-md-12">
						<div class="client-area">
							<div class="client-title wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
								<h2>Отзывы</h2>
							</div>
							<div id="owl-demo" class="owl-carousel owl-theme wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
								<div class="item">
									<span class="item-img"><img src="img/client1.jpg" alt="The Last of us"></span>
									<p>С огромной благодарностью за проделанную работу оставляем <br>здесь свой отзыв. Нам очень понравилось работать с этой веб-студией</p>
								</div>
								<div class="item">
									<span class="item-img"><img src="img/client2.jpg" alt="GTA V"></span>
									<p>Мы уже несколько лет сотрудничаем <br> с данной веб-студией и несказанно этому рады!</p>
								</div>
								<div class="item">
									<span class="item-img"><img src="img/client3.jpg" alt="Mirror Edge"></span>
									<p>Очень довольны работой! Делали сайт для маленького медцентра. <br> Качественно, в срок, за адекватные деньги получили то, что хотели!</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- =========================================
        Pricing-table Section
        ========================================== -->
		<section id="price-list" class="pricing-table-area text-center">
			<div class="container">
				<div class="row">				
                    <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                        <div class="section-title">
                            <div class="main-title">
                                <h2>Цены</h2>
                            </div>
                            <div class="desc-title">
                                 <p>Ниже представлен список цен на услуги, которые мы предоставляем. Внимательно ознакомьтесь с каждой услугой и выберите необходимую вам, после заказа мы обязательно свяжемся с Вами в близжайшее время.</p>
                            </div>
                        </div>
                    </div>
					<div class="col-md-3 col-sm-6 col-xs-12 envelopes wow fadeInLeft" data-wow-duration="700ms" data-wow-delay="200ms">
						<div class="price-area">
							<div class="price-tb">
								<div class="price-top">
									<div class="price-gross">
										<span class="price-number">15 000 ₽</span><br>
									</div>
								</div>
								<div class="price-bottom uppercase">
									<div class="price-button-top">
										<a href="#" class="action-btn-top">Сайт- <br>визитка</a>
									</div>
									<div class="price-feature">				
										<ul>
											<li>Индивидуальный дизайн</li>
											<li>Адаптивная верстка</li>
											<li>Одноуровневое меню</li>
											<li>CMS WordPress</li>
											<li>Техподдержка</li>
										</ul>
									</div>
									<div class="price-button-bottom">
										<a href="order.php" class="action-btn-bottom">Заказать</a>
									</div>
								</div>
							</div>
						</div>
					</div>                    					
					<div class="col-md-3 col-sm-6 col-xs-12 envelopes wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
						<div class="price-area">
							<div class="price-tb">
								<div class="price-top">
									<div class="price-gross">
										<span class="price-number">18 000 ₽</span>
									</div>
								</div>
								<div class="price-bottom uppercase">
									<div class="price-button-top">
										<a href="#" class="action-btn-top">Одностраничный <br> сайт</a>
									</div>
									<div class="price-feature">				
										<ul>
											<li>Индивидуальный дизайн</li>
											<li>Адаптивная верстка</li>
											<li>Простой интерфейс</li>
											<li>Заполнение контентом</li>
											<li>Техподдержка</li>
										</ul>
									</div>
									<div class="price-button-bottom">
										<a href="order.php" class="action-btn-bottom">Заказать</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 envelopes wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
						<div class="price-area">
							<div class="price-tb">
								<div class="price-top">
									<div class="price-gross">
										<span class="price-number">25 000 ₽</span><br>
									</div>
								</div>
								<div class="price-bottom uppercase">
									<div class="price-button-top">
										<a href="order.html" class="action-btn-top">Корпоративный <br> сайт</a>
									</div>
									<div class="price-feature">				
										<ul>
											<li>Прототипирование</li>
											<li>Индивидуальный дизайн</li>
											<li>Каталог товаров/услуг</li>
											<li>Заполнение товаров</li>
											<li>Техподдержка</li>
										</ul>
									</div>
									<div class="price-button-bottom">
										<a href="order.php" class="action-btn-bottom">Заказать</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 envelopes wow fadeInRight" data-wow-duration="700ms" data-wow-delay="200ms">
						<div class="price-area">
							<div class="price-tb">
								<div class="price-top">
									<div class="price-gross">
										<span class="price-number">30 000 ₽</span><br>
									</div>
								</div>
								<div class="price-bottom uppercase">
									<div class="price-button-top">
										<a href="order.html" class="action-btn-top">Интернет- <br>магазин</a>
									</div>
									<div class="price-feature">				
										<ul>
											<li>Авторский дизайн</li>
											<li>CMS Битрикс</li>
											<li>Личный кабинет</li>
											<li>Доставка, on-line оплата</li>
											<li>Техподдержка</li>
										</ul>
									</div>
									<div class="price-button-bottom">
										<a href="order.php" class="action-btn-bottom">Заказать</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- =========================================
        Contact Information Section
        ========================================== -->
		<section class="contact-info">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                        <div class="latest-title">
                            <div class="main-title">
                                <h2>Где мы находимся</h2>
                            </div>
                            <div class="desc-title">
                                 <p>Мы всегда рады общению с вами. По телефону, по e-mail и, конечно же, в наших уютных офисах</p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</section>
		<!-- =========================================
        Map Section
        ========================================== -->
		<section id="contacts" class="map-area">
			<div class="map-icon">
				<i class="fa fa-map-marker"></i>
			</div>
			<iframe id="map" class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1999.0031150049756!2d30.359972416382657!3d59.932090481873786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469631bb4e3a8e0f%3A0xfe897a7ba5c0f8ad!2z0JHQuNC30L3QtdGBINCm0LXQvdGC0YAg0J7QutGC0Y_QsdGA0YzRgdC60LDRjw!5e0!3m2!1sru!2sru!4v1621529233544!5m2!1sru!2sru" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			<div class="contact-form wow zoomIn" data-wow-duration="700ms" data-wow-delay="200ms">
				<form id="contact" method="post" action="index.php">
					<div class="contact-address-info">
						<h5>Связь с нами</h5>
						<h6>+7 (800) 000 800</h6>
					</div>
					<fieldset>
						<input name="name" placeholder="Имя" type="text" tabindex="1" required>
					</fieldset>
					<fieldset>
						<input name="email" placeholder="E-mail" type="email" tabindex="2" required>
					</fieldset>
					<fieldset>
						<input name="subject" placeholder="Тема" type="tel" tabindex="3" required>
					</fieldset>
					<fieldset>
						<textarea name="message" placeholder="Напишите Ваше сообщение..." tabindex="5" required></textarea>
					</fieldset>
					<input type="hidden" name="date" value="'; echo date("Y-m-d"); echo'">
					<fieldset>
					    		
						<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Написать</button>
					</fieldset>
				</form>
			</div>
		</section>
		<!-- =========================================
        Footer Top Section
        ========================================== -->
		<section class="footer-top-area">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-4">
						<div class="left-side">
							<h3>ФотоМастер</h3>
							<p>ФотоМастер — это команда digital-специалистов с аналитическим подходом к маркетингу, дизайну и разработке. Стремление сделать каждый проект лучшим в отрасли заставляет нас постоянно учиться, отслеживать последние тренды в digital-маркетинге и web-дизайне.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-4">
						<div class="quick-link">
							<h4>Навигация</h4>
							<ul class="categories">
								<li><a href="#home">Главная</a></li>
								<li><a href="#about-us">О нас</a></li>
								<li><a href="#services">Услуги</a></li>
							</ul>
							<ul class="categories-right">
								<li><a href="#portfolio">Портфолио</a></li>
								<li><a href="#price-list">Цены</a></li>
								<li><a href="#contacts">Контакты</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- =========================================
        Footer Section
        ========================================== -->
		<footer class="footer-area">
			<div class="container footer">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="copyright-boot">
							<p>Copyright 2021 by <a href="http://bootexperts.com/">ФотоМастер</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- =========================================
        Script Section
        ========================================== -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write("<script src="js/vendor/jquery-1.11.3.min.js"><\/script>")</script>
		<script src="js/jquery.animateNumber.min.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.mixitup.min.js"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/gmap.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>';
?>