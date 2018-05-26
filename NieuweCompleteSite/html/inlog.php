<?php
require_once ("../initialize.php");

$message = "";

if($session->is_logged_in())
{
    if(!$_SESSION['user_rol'] == "admin" || !$_SESSION['user_rol'] == "Admin"){
        redirect_to("adresboekAdminGebruikers.php");
    } else{
        redirect_to("adresboekGebruikerContacten.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="inlogStyle.css">
    <title>Login</title>
</head>
<?php

if(isset($_POST['submit']))
{
    $username = trim($_POST["firstname"]);
    $password = trim($_POST["lastname"]);
    //Check database to see if username/password exist
    $found_user = Gebruikers::authenticate($username , $password);
    if($found_user)
    {
        if($found_user->Gebruikers_Rol == "admin" || $found_user->Gebruikers_Rol == "Admin"){
            $session->login($found_user);
            redirect_to("adresboekAdminGebruikers.php");
        }
        else{
            $session->login($found_user);
            redirect_to("adresboekGebruikerContacten.php");
        }

    } else{
        //Username / password combo was not found in the database
        //Nog een message maken met session

    }
} else{
    $username = "";
    $password = "";
}

?>

<body>
<div id="container" class="container-inline-blocks">
    <header>
        <h1>LIDLPEOPLE</h1>
    </header>
    <div id="main">
        <div id="mainForm">
            <form action="" method="post">
                <input type="text" name="firstname" placeholder="Username" class="classUseEnPass"><br>
                <input type="password" name="lastname" placeholder="Password" class="classUseEnPass"><br>
                <input type="submit" name="submit" value="Login" class="classSubmit"><br>
            </form>
        </div>

    </div>

</div>
</body>
</html>