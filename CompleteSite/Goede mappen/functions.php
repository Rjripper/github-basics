<?php


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


function hashPassword($password){
    return password_hash($password , PASSWORD_DEFAULT);
}

?>