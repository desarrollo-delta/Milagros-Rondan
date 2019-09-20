<!DOCTYPE html>
<html lang="en">
<head>
	<title>Milagros Rodan</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor_2/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor_2/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor_2/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor_2/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor_2/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor_2/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://i.ytimg.com/vi/yBPrYomMzzw/maxresdefault.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Milagros Rondan
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post">
                    <input type="hidden" name="sesion" value="sesion">
					<div class="wrap-input100 validate-input" data-validate = "Usuario obligatorio">
						<input class="input100" type="text" name="usuario" placeholder="Usuario">
					</div>
					<div class="wrap-input100 validate-input" data-validate="Contraseña obligatorio">
						<input class="input100" type="password" name="contrasena" placeholder="Contraseña">
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn">
							Ingresar
						</button>
                    </div>
                    <?php
                    require_once('controllers/usuario.controllers.php');
                    $iniciar_sesion = new usuarioControllers();
                    $message = $iniciar_sesion -> signin();
                    if(isset($message)){
                        echo "<br><center>$message</center>";
                    }
                    ?>
				</form>
            </div>
        </div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="vendor_2/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor_2/animsition/js/animsition.min.js"></script>
	<script src="vendor_2/bootstrap/js/popper.js"></script>
	<script src="vendor_2/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor_2/select2/select2.min.js"></script>
	<script src="vendor_2/daterangepicker/moment.min.js"></script>
	<script src="vendor_2/daterangepicker/daterangepicker.js"></script>
	<script src="vendor_2/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>