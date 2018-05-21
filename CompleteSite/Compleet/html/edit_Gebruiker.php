<?php require_once ("../initialize.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <link rel="stylesheet" href="adresboekStyle.css">
    <script src="main.js"> </script>
    <title>Adresboek</title>
    <?php

    if(isset($_GET['id'])) {

        $gebruiker = Gebruikers::find_by_id($_GET['id']);
    }

    if(isset($_POST['submit'])){
        if($gebruiker->edit($_POST['vnaam'] ,$_POST['tnaam'] ,$_POST['anaam'] ,$_POST['email'] ,$_POST['telnummer'] ,$_POST['gnaam'] ,$_POST['wachtwoord'] ,$_POST['rol'])){
            redirect_to("adresboekAdmin.php");
        } else{
            echo "Iets is niet goed";
        }
    }

    if (isset($_POST['back']))
    {
        redirect_to("adresboekAdmin.php");
    }

    ?>
</head>
<body>
<div id="container" class="container-inline-blocks">
    <header>
        <div id="headerLogo" class="inline-blocks"><h1>LIDLPEOPLE</h1></div>
        <div id="headerButton" class="inline-blocks">
            <i class="fas fa-align-justify" onclick="toggleSidebar('mainSideBar');">
            </i>
        </div>
    </header>

    <main class="container-inline-blocks">


        <div id="mainListItems" class="inline-blocks">

            <!--FORM -->
            <form action="" method="post">

                Voornaam : <input type="text" name="vnaam" value="<?php echo $gebruiker->Gebruikers_Voornaam; ?>"><br>
                Tussenvoegsel : <input type="text" name="tnaam" value="<?php echo $gebruiker->Gebruikers_Tussenvoegsel; ?>"><br>
                Achternaam : <input type="text" name="anaam" value="<?php echo $gebruiker->Gebruikers_Achternaam; ?>"><br>
                Email : <input type="text" name="email" value="<?php echo $gebruiker->Gebruikers_Email; ?>"><br>
                Telefoonnummer : <input type="text" name="telnummer" value="<?php echo $gebruiker->Gebruikers_Telefoonnummer; ?>"><br>
                Gebruikersnaam : <input type="text" name="gnaam" value="<?php echo $gebruiker->Gebruikers_Gebruikersnaam; ?>"><br>
                Wachtwoord : <input type="text" name="wachtwoord" value="<?php echo $gebruiker->Gebruikers_Wachtwoord; ?>"><br>
                Rol : <input type="text" name="rol" value="<?php echo $gebruiker->Gebruikers_Rol; ?>"><br>

                <input type="submit" name="submit" value="Opslaan">
                <input type="submit" name="back" value="Terug">
            </form>



        </div>
        <div id="mainSideBar" class="inline-blocks">

        </div>

    </main>

    <footer class="inline-blocks">

    </footer>
</div>

</body>
</html>
