<?php
require_once("../../initialize.php");
$gebruiker;

isset($_GET['id']) ? $gebruiker = Gebruikers::find_by_id($_GET['id']) : redirect_to("../adresboekAdminGebruikers.php");

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

        var r = confirm("Weet u zeker dat u <?php echo $gebruiker->full_name() ?> wilt verwijderen");

        if(r) {
            window.location.replace("?id=<?php echo returnGet()?>&Ja=true");
        }else{
            window.location.replace("../adresboekAdminGebruikers.php?page=1");
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

        $gebruiker = Gebruikers::find_by_id($_GET['id']);

        $naam = $gebruiker->full_name();

        if($gebruiker->Delete()){
            redirect_to("../adresboekAdminGebruikers.php");
        } else{
            echo "Het verwijderen van $naam is mislukt";
        }
    }else{
        redirect_to("../adresboekAdminGebruikers.php");
    }

}

if(isset($database)) { $database->close_connection(); }
?>
