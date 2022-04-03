<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
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
</div>
        
</form>
</body>
</html>