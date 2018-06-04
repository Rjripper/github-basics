<?php require_once("../../initialize.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/edit_Gebruiker.css">
    <script src="../JS/main.js"> </script>
    <title>Adresboek</title>

    <?php

    if(isset($_GET['id']))
    {
        $contact = Contacten::find_by_id_Contacts($_GET['id']);
    }

    if(isset($_POST['submit'])){

        $contact = new Contacten();

        if($contact->edit($_POST)){
            redirect_to("../adresboekAdminContacten.php");
        } else{
            echo 'Iets is niet goed';
        }

    }

    if (isset($_POST['back']))
    {
        redirect_to("../adresboekAdminContacten.php");
    }

    ?>

</head>
<body>
<div id="container" class="container-inline-blocks">
    <header>
        <div id="headerLogo" class="inline-blocks"><h1>LIDLPEOPLE</h1></div>
    </header>

    <main class="container-inline-blocks">


        <div id="mainListItems" class="inline-blocks">

            <div id="mainForm" class="inline-blocks">
                <!--FORM -->
                <form action="" method="post">
                    <label for="vnaam"><b>Voornaam:</b></label>
                    <input type="text" name="vnaam" value="<?php echo $gebruiker->Gebruikers_Voornaam; ?>"><br>

                    <label for="tnaam"><b>Tussenvoegsel:</b></label>
                    <input type="text" name="tnaam" value="<?php echo $gebruiker->Gebruikers_Tussenvoegsel; ?>"><br>

                    <label for="anaam"><b>Achternaam:</b></label>
                    <input type="text" name="anaam" value="<?php echo $gebruiker->Gebruikers_Achternaam; ?>"><br>

                    <label for="email"><b>Email:</b></label>
                    <input type="text" name="email" value="<?php echo $gebruiker->Gebruikers_Email; ?>"><br>

                    <label for="telnummer"><b>Telefoonnummer privé:</b></label>
                    <input type="text" name="telnummerprive" value="<?php echo $contacten->Contactpersoon_Telefoonnummer_prive; ?>"><br>

                    <label for="gnaam"><b>Telefoonnummer zakelijk:</b></label>
                    <input type="text" name="telnummerzakelijk" value="<?php echo $contacten->Contactpersoon_Telefoonnummer_Zakelijk; ?>"><br>

                    <label for="wachtwoord"><b>Bedrijfsnaam:</b></label>
                    <input type="text" name="bedrijfsnaam" value="<?php echo $contacten->Contactpersoon_Bedrijfsnaam; ?>"><br>

                    <label for="rol"><b>Standplaats:</b></label>
                    <input type="text" name="standplaats" value="<?php echo $contacten->Contactpersoon_Standplaats; ?>"><br>

                    <input type="submit" name="submit" value="Opslaan" class="buttonStyle">
                    <input type="submit" name="back" value="Terug" class="buttonStyle">
                </form>
            </div>





        </div>
        <div id="mainSideBar" class="inline-blocks">

        </div>

    </main>

    <footer class="inline-blocks">

    </footer>
</div>

</body>
</html>