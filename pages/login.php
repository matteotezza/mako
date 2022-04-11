<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<html>
<body>
<div class="classe_iniziale">
    <h1>Pagina di registrazione</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <table class="tabella_login">
        <tr>
            <td>Username</td><td><input type="text" name="username" value="<?php echo $username; ?>" required></td>
        </tr>
        <tr>
            <td>Password</td><td><input type="password" name="password" value="<?php /*echo $password; */?>" required></td>
        </tr>
    </table>
    <p><input type="submit" value="Accedi"></p>
</form>   
<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if( empty($_POST["username"]) or empty($_POST["password"])) {
					echo "<p> Inserire username e password </p>";
				} else {
					$conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
					if($conn->connect_error){
						die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
					}
					echo "connessione al server riuscita";
					
                    $tabella = $_POST["tipologia"];
					
					$myquery = "SELECT username, password 
								FROM $tabella 
								WHERE username='$username'
									AND password='$password'";

					$ris = $conn->query($myquery) or die("<p>Query fallita! ".$conn->error."</p>");

					if($ris->num_rows == 0){
						echo "<p>Utente non trovato o password errata</p>";
						$conn->close();
					} 
					else {
						$_SESSION["username"]=$username;
                        $_SESSION["tipologia"]=$_POST["tipologia"];
												
						$conn->close();
						header("location: pagine/home.php");

					}
                    ?>
                    </div>
                    <?php 
		include('pagine/footer.php')
	?>
</body>
</html>