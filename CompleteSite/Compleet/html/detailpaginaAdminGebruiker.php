<?php
require_once ("../initialize.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/detailpaginaStyle.css">
    <title>detailpagina</title>
    <?php
    if(isset($_GET['id']))
    {
        $gebruiker = Gebruikers::find_by_id($_GET['id']);
    }

    ?>
</head>
<body>
<div id="container" class="container-inline-blocks">
    <header>
        <div id="headerLogo" class="inline-blocks"><h1>LIDLPEOPLE</h1></div>
    </header>
    <main class="inline-blocks">
        <div id="mainDetail" class="container-inline-blocks">
            <div id="LogoEnArrow" class="container-inline-blocks">
                <div id="Arrow" class="inline-blocks">
                    <a href="adresboekAdminGebruikers.php" >
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div id="Image" class="inline-blocks">
                    <img src="images/mainIcon.png" alt="profielfoto">
                </div>
            </div>
            <div id="mainDetailInfoText" class="inline-blocks">


                <li>Voornaam:
                    <?php
                    echo $gebruiker->Gebruikers_Voornaam;
                    ?>
                </li>

                <li>Tussenvoegsel:
                    <?php
                    echo $gebruiker->Gebruikers_Tussenvoegsel;
                    ?>
                </li>

                <li>Achternaam:
                    <?php
                    echo $gebruiker->Gebruikers_Achternaam;
                    ?>
                </li>



                <li>E-mail:
                    <?php
                    echo $gebruiker->Gebruikers_Email;
                    ?>
                </li>

                <li>Tel. nummer:
                    <?php
                    echo $gebruiker->Gebruikers_Telefoonnummer;
                    ?>
                </li>

                <li>Gebruikersnaam:
                    <?php
                    echo $gebruiker->Gebruikers_Gebruikersnaam;
                    ?>
                </li>

                <li>Rol:
                    <?php
                    echo $gebruiker->Gebruikers_Rol;
                    ?>
                </li>

                <li>
                    <a href="FunctiePaginas/edit_Gebruiker.php?id=<?php echo  $gebruiker->Gebruikers_ID; ?>"><i class="fas fa-edit"></i></a>
                    <a href="FunctiePaginas/delete_Gebruiker.php?id=<?php echo $gebruiker->Gebruikers_ID; ?>"><i class="fas fa-times"></i></a>
                </li>



            </div>
        </div>
    </main>

    <footer class="container-inline-blocks">
        <p>  &#9400;  LidlPeople <?php echo date("Y", time()); ?></p>
    </footer>
</div>
</body>
</html>
