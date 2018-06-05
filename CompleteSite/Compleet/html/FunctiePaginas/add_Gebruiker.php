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

        $gebruiker = new Gebruikers();

        if($gebruiker->make($_POST)){
            redirect_to("../adresboekAdminGebruikers.php");
        } else{
            echo 'Iets is niet goed';
        }

    }

    if (isset($_POST['back']))
    {
        redirect_to("../adresboekAdminGebruikers.php");
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
                    <input type="text" name="vnaam"><br>

                    <label for="tnaam"><b>Tussenvoegsel:</b></label>
                    <input type="text" name="tnaam"><br>

                    <label for="anaam"><b>Achternaam:</b></label>
                    <input type="text" name="anaam"><br>

                    <label for="email"><b>Email:</b></label>
                    <input type="text" name="email"><br>

                    <label for="telnummer"><b>Telefoonnummer:</b></label>
                    <input type="text" name="telnummer"><br>

                    <label for="gnaam"><b>Gebruikersnaam:</b></label>
                    <input type="text" name="gnaam"><br>

                    <label for="wachtwoord"><b>Wachtwoord:</b></label>
                    <input type="text" name="wachtwoord"><br>

                    <label for="rol"><b>Rol:</b></label>
                    <input type="text" name="rol"><br>

                    <input type="submit" name="submit" value="Opslaan" class="buttonStyle">
                    <input type="submit" name="back" value="Terug" class="buttonStyle">

                </form>
            </div>


        </div>
        <div id="mainSideBar" class="inline-blocks">

        </div>

    </main>

    <footer class="container-inline-blocks">
        <p>  &#9400;  LidlPeople <?php echo date("Y", time()); ?></p>
    </footer>
</div>

</body>
</html>
