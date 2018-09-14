<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title = "Register";
 
// include classes
include_once 'config/database.php';
include_once 'inc/user.php';
// include_once "libs/php/utils.php";
 

 
// if form was posted
if($_POST){
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize objects
    $user = new User($db);
    // $utils = new Utils();
 
    // set user email to detect if it already exists
    $user->email=$_POST['email'];
 
    // check if email already exists
    if($user->emailExists()){
        echo "<div class='alert alert-danger'>";
            echo "The email you specified is already registered. Please try again or <a href='{$home_url}login'>login.</a>";
        echo "</div>";
    }
 
    else{
        $user->firstname=$_POST['firstname'];
        $user->lastname=$_POST['lastname'];
        $user->contact_number=$_POST['contact_number'];
        $user->address=$_POST['address'];
        $user->password=$_POST['password'];
        $user->access_level='Customer';
        $user->status=1;

// create the user
if($user->create()){
 
    echo "<div class='alert alert-info'>";
        echo "Successfully registered. <a href='{$home_url}login'>Please login</a>.";
    echo "</div>";
 
    // empty posted values
    $_POST=array();
 
}else{
    echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
}
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="register">
<?php include_once "navigate.php" ?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/img-01.jpg');">
			<div class="wrap-login100 p-t-40 p-b-30">
				<form class="login100-form validate-form" action='register.php' method='post'>
						<h4> Lorem ipsum dolor sit amet consectetur.</h4>
					<span class="login100-form-title p-t-20 p-b-45">
						Creer votre compte
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Firstname is required">
						<label for="lastname">Nom :</label>
						<input type='text' name='firstname' class='input100' required value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : "";  ?>" />						
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "lastname is required" >
						<label for="lastname">Prenom :</label>
						<input type='text' name='lastname' class='input100' required value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : "";  ?>" />						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-10" data-validate = "contact_number is required">
					<label for="lastname">Contact :</label>
					<input type='text' name='contact_number' class='input100' required value="<?php echo isset($_POST['contact_number']) ? htmlspecialchars($_POST['contact_number'], ENT_QUOTES) : "";  ?>" />						<span class="focus-input100"></span>

					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "address is required">
					<label for="lastname">Adresse :</label>
					<textarea name='address' class='input100' required><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES) : "";  ?></textarea>

					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "email is required" >
					<label for="lastname">Email :</label>
					<input type='email' name='email' class='input100' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" />
						
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "password is required" required />
					<label for="lastname">Mot de passe :</label>
					<input class="input100" type="password" name="password" placeholder="password">
						
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>