<?php require_once("../../initialize.php"); ?>

<?php
// must have an ID
if(isset($_GET['id'])) {

    $gebruiker = Gebruikers::find_by_id($_GET['id']);

    if($gebruiker->Delete()){
        redirect_to("../adresboekAdminGebruikers.php");
    } else{
        echo "Verwijderen mislukt";
    }
}
?>

<?php if(isset($database)) { $database->close_connection(); } ?>
