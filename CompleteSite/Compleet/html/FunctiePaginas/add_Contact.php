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

    if(isset($_POST['submit'])){

        $contact = new Contacten();

        if($contact->make($_POST)){
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

                    <label for="telnummer"><b>Voornaam:</b></label>
                    <input type="text" name="vnaam"><br>

                    <label for="telnummer"><b>Tussenvoegsel:</b></label>
                    <input type="text" name="tnaam"><br>

                    <label for="telnummer"><b>Achternaam:</b></label>
                    <input type="text" name="anaam"><br>

                    <label for="telnummer"><b>Email:</b></label>
                    <input type="text" name="email"><br>

                    <label for="telnummer"><b>Telefoonnummer privé:</b></label>
                    <input type="text" name="telnummerprive"><br>

                    <label for="telnummer"><b>Telefoonnummer zakelijk:</b></label>
                    <input type="text" name="telnummerzakelijk"><br>

                    <label for="telnummer"><b>Bedrijfsnaam:</b></label>
                    <input type="text" name="bedrijf"><br>

                    <label for="telnummer"><b>Standplaats:</b></label>
                    <input type="text" name="standplaats"><br>

                    <input type="submit" name="submit" value="Voeg toe" class="buttonStyle">
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
