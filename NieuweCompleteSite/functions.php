<?php
/**
 * Created by PhpStorm.
 * User: tim7v
 * Date: 6-2-2018
 * Time: 11:08
 */

//Stuurt je door naar het ingevoerde document
function redirect_to( $location = NULL ) {
    if ($location != NULL) {
        header("Location: {$location}");
        exit;
    }
}

function output_message($message=""){
    if(!empty($message)){
        return "<p class=\"message\">{$message}</p>";
    } else{
        return "";
    }
}

?>