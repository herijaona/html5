<?php 


$stmt = $db->query('SELECT id FROM users WHERE id=\'' . $_GET['id'] . '\';');
$user = $stmt->fetch();
$pl = $user['id'];


    if($pl   ==  $_GET['id']){

        //  $sql = "INSERT INTO users (name) VALUES ('Doe')";
        //  $conn->prepare($sql)->execute($data);

        if(isset($_POST['msend']) AND isset($_POST['pwd'])){
            $pwd = $_POST['pwd'];
            $password_hash = password_hash($pwd, PASSWORD_BCRYPT);
            $sql = 'UPDATE users SET password=\''.$password_hash.'\',status="1" WHERE id=\'' . $_GET['id'] . '\';';
            $stmt = $db->prepare($sql);
            $stmt->execute();
        }

        ?>
            <form class="login100-form validate-form" action="login.php?id=<?php echo $_GET['id'] ?>" method="post">
                <input type="text" value="herijaona3@gmail.com" class="input100 m-b-10">
                <input type="password" name="pwd" placeholder="votre mot de passe" class="m-b-10 input100">
                <input class="login100-form-btn" type="submit" value="Envoyer" name="msend">
            </form>
        <?php
   

    }



?>