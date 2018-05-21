<?php
require_once ("../initialize.php");


if (session_status() == PHP_SESSION_NONE) {
    redirect_to("inlog.php");
}else{
    session_unset();
    redirect_to("inlog.php");
}



?>