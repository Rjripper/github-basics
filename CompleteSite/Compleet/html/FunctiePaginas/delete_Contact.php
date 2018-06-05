<?php

require_once("../../initialize.php");

$contactpersoon;

isset($_GET['id']) ? $contactpersoon = Contacten::find_by_id_Contacts($_GET['id']) : redirect_to("../adresboekAdminContacten.php");


// must have an ID
function returnGet()
{
    if(isset($_GET['id'])){
        return $_GET['id'];
    }
}

?>


<script>
    function Php() {

        var r = confirm('"Weet u zeker dat u <?php echo $contactpersoon->full_name() ?> wilt verwijderen"');

        if(r) {
            window.location.replace("?id=<?php echo returnGet()?>&Ja=true");
        }else{
            window.location.replace("../adresboekAdminContacten.php?page=1");
        }

    }

</script>

<body
    <?php if(!isset($_GET['Ja'])){
        echo  'onload="Php()"';
    }?>

>

</body>



<?php
if(isset($_GET['Ja'])){

    if(isset($_GET['id']) && $_GET['Ja'] == 'true') {
        $naam = $contactpersoon->full_name();

        if($contactpersoon->deleteContactpersoon()){
            redirect_to("../adresboekAdminContacten.php");
        }else{
            echo "Het verwijderen van $naam is mislukt";
        }
    }else{
        redirect_to("../adresboekAdminContacten.php");
    }

}
if(isset($database)) { $database->close_connection(); }

?>

