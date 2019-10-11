<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MilagrosRondan | Page</title>
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

</head>

<body>

    <a class="scrollToTop" href="#">
        <i class="fa fa-angle-up"></i>
    </a>

    <header id="mu-header">
        <nav class="navbar navbar-default mu-main-navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.php">Milagros<span>Rondan</span></a>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
                        <li><a href="index.php">INICIO</a></li>
                        <li><a href="#mu-about-us">SOBRE NOSOTROS</a></li>
                        <li><a href="#mu-restaurant-menu">TIPOS DE EVENTOS</a></li>
                        <li><a href="#mu-gallery">GALERIA</a></li>
                        <li><a href="#mu-chef">NUESTROS TRABAJADORES</a></li>
                        <li><a href="#mu-contact">CONTACTO</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php
  require_once('connection/database.php');
  $sql_portada = "SELECT id_portada, foto1, texto1, texto2, texto3 FROM bydnc1dut5xcycds4qvn.portada WHERE estado = '1'";
  $conexion_portada = database::getConexion();
  $query_portada = mysqli_query($conexion_portada, $sql_portada);
  ?>
    <section id="mu-slider">
        <div class="mu-slider-area">
            <div class="mu-top-slider">
                <?php while ( $row_portada = $query_portada->fetch_assoc() ) { ?>
                <div class="mu-top-slider-single">
                    <img src="../ADMIN/img/portada/<?php echo $row_portada['foto1'] ?>" alt="img">
                    <div class="mu-top-slider-content">
                        <span class="mu-slider-small-title"
                            style="color:#FEFEFE"><?php echo $row_portada['texto1'] ?></span>
                        <h2 class="mu-slider-title"><?php echo $row_portada['texto2'] ?></h2>
                        <p><?php echo $row_portada['texto3'] ?></p>
                        <a href="#mu-contact" class="mu-readmore-btn mu-reservation-btn">CONTACTANOS</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- End slider  -->

    <?php
  $sql_nosotros = "SELECT id_nosotros, foto,descripcion FROM bydnc1dut5xcycds4qvn.nosotros WHERE estado = '1'";
  $conexion_nosotros = database::getConexion();
  $query_nosotros = mysqli_query($conexion_nosotros, $sql_nosotros);
  $data_listar_nosotros = $query_nosotros;
  ?>

    <!-- Start About us -->
    <section id="mu-about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-about-us-area">

                        <div class="mu-title">
                            <span class="mu-subtitle">Descubre</span>
                            <h2>SOBRE NOSOTROS</h2>
                        </div>

                        <?php while ( $row_nosotros = $data_listar_nosotros->fetch_assoc() ) {  ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mu-about-us-left">
                                    <img src="../ADMIN/img/nosotros/<?php echo $row_nosotros['foto'] ?>" alt="img">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mu-about-us-right">
                                    <p><?php echo $row_nosotros['descripcion'] ?></p>

                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About us -->

    <!-- Start Counter Section -->

    <!-- Start Restaurant Menu -->
    <section id="mu-restaurant-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-restaurant-menu-area">

                        <div class="mu-title">
                            <span class="mu-subtitle">Descubre</span>
                            <h2>NUESTROS TIPOS DE EVENTOS</h2>
                        </div>

                        <div class="mu-restaurant-menu-content">
                            <ul class="nav nav-tabs mu-restaurant-menu">
                                <li class="active"><a href="#breakfast" data-toggle="tab">Promociones</a></li>
                                <li><a href="#meals" data-toggle="tab">Matrimonios</a></li>
                                <li><a href="#snacks" data-toggle="tab">Quinciañeros</a></li>
                                <li><a href="#desserts" data-toggle="tab">Cumpleaños</a></li>
                                <li><a href="#drinks" data-toggle="tab">Primera Comunion</a></li>
                                <li><a href="#bautizo" data-toggle="tab">Bautizos</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="breakfast">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-left">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a>
                                                                        <img class="media-object"
                                                                            src="public/img/galeria/1.png" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">English Breakfast</h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-2.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-1.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-right">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-1.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-2.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-1.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="meals">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-left">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-3.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-4.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-3.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-right">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-4.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-3.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-4.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="snacks">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-left">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a>
                                                                        <img class="media-object"
                                                                            src="public/img/galeria/11.png" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">English Breakfast</h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-6.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-5.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-right">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-5.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-6.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-5.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="desserts">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-left">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-7.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-8.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-7.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-right">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-8.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-7.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-8.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="drinks">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-left">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-9.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-10.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-9.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-right">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-9.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-10.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-9.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="bautizo">
                                    <div class="mu-tab-content-area">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-left">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a>
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-1.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">bautizo</h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-2.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-1.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mu-tab-content-right">
                                                    <ul class="mu-menu-item-nav">
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-1.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">English
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-2.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Chines
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$11.95</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object"
                                                                            src="assets/img/menu/item-1.jpg" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><a href="#">Indian
                                                                            Breakfast</a></h4>
                                                                    <span class="mu-menu-price">$15.85</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                                        adipisicing elit. Facere nulla aliquid
                                                                        praesentium dolorem commodi illo.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Restaurant Menu -->
    <?php
  $sql_galeria = "SELECT id_galeria, foto FROM bydnc1dut5xcycds4qvn.galeria WHERE estado = '1'";
  $conexion_galeria = database::getConexion();
  $query_galeria = mysqli_query($conexion_galeria, $sql_galeria);
  $data_listar_galeria = $query_galeria;
  ?>
    <!-- Start Gallery -->
    <!-- Start Gallery -->
    <section id="mu-gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-gallery-area">

                        <div class="mu-title">
                            <span class="mu-subtitle">Descubre</span>
                            <h2>Nuestra Galeria</h2>
                        </div>

                        <div class="mu-gallery-content">

                            <!-- Start gallery image -->
                            <div class="mu-gallery-body">
                                <?php while ( $row_galeria = $data_listar_galeria->fetch_assoc() ) {  ?>
                                <div class="mu-single-gallery col-md-4">
                                    <div class="mu-single-gallery-item">
                                        <figure class="mu-single-gallery-img">
                                            <a class="mu-imglink"
                                                href="../ADMIN/img/galeria/<?php echo $row_galeria['foto'] ?>">
                                                <img alt="img"
                                                    src="../ADMIN/img/galeria/<?php echo $row_galeria['foto'] ?>">
                                                <div class="mu-single-gallery-info">
                                                    <img class="mu-view-btn" src="assets/img/plus.png"
                                                        alt="plus icon img">
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Gallery -->
    <?php
  $sql_testimonios = "SELECT id_testimonios, titulo, comentario,nombre FROM bydnc1dut5xcycds4qvn.testimonios WHERE estado = '1'";
  $conexion_testimonios = database::getConexion();
  $query_testimonios = mysqli_query($conexion_testimonios, $sql_testimonios);
  $data_listar_testimonios = $query_testimonios;
  ?>
    <!-- Start Client Testimonial section -->
    <section id="mu-client-testimonial">
        <div class="mu-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-client-testimonial-area">
                            <div class="mu-title"><span class="mu-subtitle">Testimonials</span>
                                <h2>Lo que los clientes piensan</h2>
                            </div>
                            
                            <div class="mu-testimonial-content">
                            
                                <ul class="mu-testimonial-slider">
                                <?php while ( $row_testimonios = $data_listar_testimonios->fetch_assoc() ) {  ?>
                                    <li>
                                        <div class="mu-testimonial-single">
                                            <div class="mu-testimonial-info">
                                                <p><?php echo $row_testimonios['comentario'] ?></p>
                                            </div>
                                            <div class="mu-testimonial-bio">
                                                <p><?php echo $row_testimonios['nombre'] ?></p>
                                            </div>
                                        </div>
                                    </li>  
                                    <?php } ?>
                                </ul>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Client Testimonial section -->
    <?php
  $sql_trabajadores = "SELECT id_trabajador,foto, nombre, cargo, facebook FROM bydnc1dut5xcycds4qvn.trabajadores WHERE estado = '1'";
  $conexion_trabajadores = database::getConexion();
  $query_trabajadores = mysqli_query($conexion_trabajadores, $sql_trabajadores);
  $data_listar_trabajadores = $query_trabajadores;
  ?>
    <!-- Start Chef Section -->
    <section id="mu-chef">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-chef-area">

                        <div class="mu-title">
                            <span class="mu-subtitle">Nuestros Profesionales</span>
                            <h2>TRABAJADORES DEDICADOS</h2>
                        </div>

                        <div class="mu-chef-content">


                            <ul class="mu-chef-nav">
                                <?php while ( $row_trabajadores = $data_listar_trabajadores->fetch_assoc() ) {  ?>
                                <li>

                                    <div class="mu-single-chef">
                                        <figure class="mu-single-chef-img">
                                            <img src="../ADMIN/img/trabajadores/<?php echo $row_trabajadores['foto'] ?>"
                                                alt="chef img">
                                        </figure>
                                        <div class="mu-single-chef-info">
                                            <h4><?php echo $row_trabajadores['nombre'] ?></h4>
                                            <span><?php echo $row_trabajadores['cargo'] ?></span>
                                        </div>
                                        <div class="mu-single-chef-social">
                                            <a href="<?php echo $row_trabajadores['facebook'] ?> " target="_blank"><i
                                                    class="fa fa-facebook"></i></a>
                                            <span class="mu-subtitle">facebook</span>
                                        </div>
                                    </div>

                                </li>
                                <?php } ?>

                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Chef Section -->



    <!-- Start Contact section -->
    <section id="mu-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-contact-area">

                        <div class="mu-title">
                            <span class="mu-subtitle">Ponerse en contacto</span>
                            <h2>Contáctenos</h2>
                        </div>

                        <div class="mu-contact-content">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mu-contact-left">
                                        <!-- Email message div -->
                                        <div id="form-messages"></div>
                                        <!-- Start contact form -->
                                        <form id="ajax-contact" method="post" action="mailer.php"
                                            class="mu-contact-form">
                                            <div class="form-group">
                                                <label for="name">Tu nombre</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Nombre Completo" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Dirección de correo electrónico</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Correo" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Tipo de Evento</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Promociones</option>
                                                    <option value="">Matrimonio</option>
                                                    <option value="">Quinceaños</option>
                                                    <option value="">Cumpleaños</option>
                                                    <option value="">Comunion</option>
                                                    <option value="">Bautizos</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Mensaje</label>
                                                <textarea class="form-control" id="message" name="message" cols="30"
                                                    rows="10" placeholder="Mensaje" required></textarea>
                                            </div>
                                            <button type="submit" class="mu-send-btn">Enviar mensaje</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mu-contact-right">
                                        <div class="mu-contact-widget">
                                            <h3>Dirección de la oficina</h3>
                                            <p></p>
                                            <address>
                                                <p><i class="fa fa-phone"></i>(+51)996998308</p>
                                                <p><i class="fa fa-envelope-o"></i>contact@markups.io</p>
                                                <p><i class="fa fa-map-marker"></i>Avenida El Sol 678 AV. EL SOL, Av Las
                                                    Gaviotas, Chorrillos 15056</p>
                                            </address>
                                        </div>
                                        <div class="mu-contact-widget">
                                            <h3>Horarios de Atención</h3>
                                            <address>
                                                <p><span>Lunes - Viernes</span> 9.00 am a 12 pm</p>
                                                <p><span>Sabado</span> 9.00 am a 10 pm</p>
                                                <p><span>Domingo</span> 10.00 am a 12 pm</p>
                                            </address>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact section -->

    <!-- Start Map section -->
    <section id="mu-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.0499429750216!2d-76.99961821581269!3d-12.177003100754767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105b9cd7f000f65%3A0xa1cdc33252dc5dc!2sEl%20Sol%20De%20Milagros%20Rondan!5e0!3m2!1ses!2spe!4v1568423177405!5m2!1ses!2spe"
            width="100px" height="100px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </section>
    <!-- End Map section -->

    <!-- Start Footer -->
    <footer id="mu-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-footer-area">
                        <div class="mu-footer-social">
                            <a href="https://www.facebook.com/eventosmilagros.rondan" target="_blank"><span
                                    class="fa fa-facebook"></span></a>
                            <a href="#"><span class="fa fa-twitter"></span></a>
                            <a href="#"><span class="fa fa-google-plus"></span></a>
                            <a href="#"><span class="fa fa-linkedin"></span></a>
                            <a href="#"><span class="fa fa-youtube"></span></a>
                        </div>
                        <div class="mu-footer-copyright">
                            <p>&copy; Copyright <a rel="nofollow" href="http://markups.io">markups.io</a>. All right
                                reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jQuery library -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- Slick slider -->
    <script type="text/javascript" src="assets/js/slick.js"></script>
    <!-- Counter -->
    <script type="text/javascript" src="assets/js/simple-animated-counter.js"></script>
    <!-- Gallery Lightbox -->
    <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Date Picker -->
    <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
    <!-- Ajax contact form  -->
    <script type="text/javascript" src="assets/js/app.js"></script>

    <!-- Custom js -->
    <script src="assets/js/custom.js"></script>

</body>

</html>