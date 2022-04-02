<?php
    require('./data/session.php');

    if(empty($username)) header('location: ./pages/home.php');
    else header('location: ./pages/home_personale.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>