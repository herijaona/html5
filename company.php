<?php 
// core configuration
include_once "config/core.php";
include_once "mailer.php";

// if log = true
if(!$_SESSION["logged_in"]==true){
	header("location:login.php");  
}

// check if user is chefservice
if($_SESSION['access_level']=="chefdeservice"){
	header("location:data-entry.php");  
}

//get id for user
// add to row
$app = $user->UserDetails($_SESSION['users_id']); 
$iduser = $app->id;

if (isset($_POST['content'])) {
   $user->addTable($iduser,$db);
} 

// get company details
$top = $user->getOnecompany($_SESSION['users_id']);

// delete company
if( isset($_POST['delete'])){
    if( isset( $_POST['id'] ) && is_numeric( $_POST['id'] ) && $_POST['id'] > 0 && isset( $_POST['photo'] )  )
    {
        $user->deleteRow();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

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


	<!-- Blog -->
	<div id="blog" class="section company md-padding-company bg-grey">

		<!-- Container -->
		<div class="container">
            <!-- Section header -->
            <div class="text-center">
                    <h2 class="title">Liste de societes</h2>
                </div>
            <!-- /Section header -->
			<!-- Row -->
			<div class="row">
				<!-- blog -->
				<div class="col-md-4">
					<div class="blog blog-add">
                        <h3>Ajouter une nouvelle societe</h3>
						<div class="blog-plus" data-toggle="modal" data-target="#exampleModal">
							+
						</div>
					</div>
				</div>
				<!-- /blog -->

				<!-- blog -->
				<?php while ($donnees =  $top->fetch())  {  ?>

				<!-- Modal -->
				<div class="modal fade" id="TopModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-send" role="document">
					<div class="modal-content pl-4 pr-4">
						<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Attribution du tache</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<div class=" row">
							<form action="company.php" method="post" class="send-mi">
								<input type="hidden" name="idphoto"  class="sendto" value="<?php echo $donnees['id'] ?>" />
								<label for="name" class="mt-2 mb-0">Fonction :</label>
								<select name="level" id="">
									<option value="chefdeservice">chef de service</option>
									<option value="technicien">technicien</option>
								</select>
								<label for="name" class="mt-2 mb-0">Email :</label>
								<input class="input100" type="text" name="rec"/>
								<input type="submit" class="btn btn-primary" value="Send" name="send" />
							</form>
						</div>
					</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="blog">
						<div class="blog-img">
							<form action="company.php" method="post" class="form-delete">
								<input type="hidden" name="delete" value="yes" />
								<input type="hidden" name="photo" value="<?php echo $donnees['photo'] ?>" />
								<input type="hidden" name="id" value="<?php echo $donnees['id'] ?>" />
								<button type="submit" name="update"><i class="fa fa-pencil"></i></button>
								<button type="submit" name="delete"><i class="fa fa-trash"></i></button>
							</form>
							<img class="img-responsive" src='./upload/<?php echo $donnees['logo']; ?>' alt="" width="100%">
						</div>
						<div class="blog-content">
							<ul class="blog-meta">
								<li><i class="fa fa-user"></i>John doe</li>
								<li><i class="fa fa-clock-o"></i>18 Oct</li>
								<li><i class="fa fa-comments"></i>57</li>
							</ul>
							<h3><?php  echo $donnees['photo'];  ?></h3>
							<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
							<a href="blog-single.html">Read more</a>
							<a class="pull-right" href="blog-single.html" data-toggle="modal" data-target="#TopModal">Lier</a>
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /blog -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Blog -->


	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer copyright -->
					<div class="footer-copyright">
						<p>Copyright © 2018. All Rights Reserved.
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
    <!-- /Preloader -->
    


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-company" role="document">
          <div class="modal-content pl-4 pr-4">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajout d'une nouvelle entreprise</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" enctype="multipart/form-data">
				<div class="modal-body">
						<div class="mb-3" data-validate = "Username is required">
							<label for="name">Nom de votre entreprise</label>
							<input class="input100" type="text" name="tuto" placeholder="Name">
						</div>
						<div class="mb-3" data-validate = "Password is required">
							<label for="adresse">Adresse</label>
							<input class="input100" type="text" name="pass" placeholder="Adresse">
						</div>
						<div class="mb-3" data-validate = "Logo is required">
							<label for="adresse">Logo</label><br>
							<input class="input100" type="file" name="logo" placeholder="Logo">
						</div>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" name="content">Save changes</button>
				</div>
			</form>
          </div>
        </div>
    </div>




	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>



 