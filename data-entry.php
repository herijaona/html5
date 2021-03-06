<?php
include_once "config/core.php";
// get simpleRow details
 $st = $user->simpleRow($_SESSION['users_id']);
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
<div class="container">
	<table class="table table-striped">
	<thead>
		<tr>
		<th scope="col">Nom de l'entreprise</th>
		<th scope="col">email</th>
		<th scope="col">Last</th>
		<th scope="col">Handle</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach($st as $u) { ?>
			<tr>
				<th scope="row">
					<a href="/create/action.php?id=<?php  echo $u['id']; ?>&id_prime=<?php  echo $u['id_prime']; ?>">test</a>
				</th>
				<td><?php  echo $u['email']; ?></td>
				<td>Otto</td>
				<td>@mdo</td>
			</tr>
		<?php } ?>
	</tbody>
	</table>
</div>
	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>
