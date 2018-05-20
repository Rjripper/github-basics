<?php

session_start();

if($_POST['submit']){
    // checken met de database
    // klopt -> naar home
    // niet goed -> terug naar inloggen.

    $_SESSION['inlogGegevens'] = [$_POST['gebruikersnaam'], $_POST['wachtwoord']];
    print_r($_SESSION);
}

?>