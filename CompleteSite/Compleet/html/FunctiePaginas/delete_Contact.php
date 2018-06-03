<?php require_once("../../initialize.php"); ?>

<?php
// must have an ID
if(isset($_GET['id'])) {

    $contactpersoon = Contacten::find_by_id_Contacts($_GET['id']);

    if($contactpersoon->deleteContactpersoon()){
        redirect_to("../adresboekAdminContacten.php");
    } else{
        echo "Verwijderen mislukt";
    }
}
?>

<?php if(isset($database)) { $database->close_connection(); } ?>
