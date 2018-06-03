<?php
/**
 * Created by PhpStorm.
 * User: tim7v
 * Date: 6-2-2018
 * Time: 11:08
 */

//FUNCTIES
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

function gebruikersSortArray(){
    return ['Gebruikers_Achternaam', 'Gebruikers_Email' , 'Gebruikers_Rol'];
}

function contactSortArray(){
    return ['Contactpersoon_Achternaam', 'Contactpersoon_Bedrijfsnaam' , 'Contactpersoon_Standplaats'];
}

?>