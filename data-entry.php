<?php
session_start();
echo $_SESSION["users_id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>HTML Template</title>

	<?php include_once "link.php" ?>


</head>

<body>
	<!-- Header -->
	<header>
		<!-- Nav -->
		<nav id="nav" class="navbar">
			<div class="container">
				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="index.html">
							<img class="logo" src="img/logo.png" alt="logo">
							<img class="logo-alt" src="img/logo-alt.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<?php if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
				echo'<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="http://localhost/create/login.html">Connexion</a></li>
					</ul>';
				} else{
				echo'<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="http://localhost/create/logout.php">Deconnexion</a></li>
					</ul>';
				}
				
				?>
				
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->
	</header>
	<!-- /Header -->

    <!-- form data entry -->
    <div class="section company md-padding-company bg-grey data-entry">
        <div class="container">
            <form class="login100-form validate-form" method="post" action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>'>
                <span class="login100-form-title p-t-20 p-b-45">
                    Saisie de donnee
                </span>
                <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                    <input class="input100 mb-20" type="text" name="email" placeholder="email">
                </div>
                <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                    <input class="input100 mb-20" type="password" name="password" placeholder="Password">
                </div>

                <div class="container-login100-form-btn p-t-10">
                    <button type="submit" class="btn btn-primary vld-data" name="content">Valider</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end form data entry -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>
