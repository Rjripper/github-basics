<?php require_once ("../initialize.php");
$session = new Session();

$message = "";
if(!$session->is_logged_in())
{
    session_destroy();
    redirect_to("inlog.php");
} else{
    if(!$_SESSION['user_rol'] == "admin" || !$_SESSION['user_rol'] == "Admin"){

    }

}

?>
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
//    $sql = "SELECT * FROM gebruikers";
//    $sql .= "LIMIT {$per_page} ";
//    $sql .= "OFFSET {$pagintion->offset()}"; KOMT NOG
    $gebruikers = Gebruikers::find_all();
    $dezeGebruiker = Gebruikers::find_by_id($_SESSION['user_id'])
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
            <div id="mainListItemsLinks" class="inline-blocks">
                <!--VOEG TOE BUTTON -->
                <table >
                    <tr>
                        <th>
                            <img src="images/mainIcon.png" alt="profielfoto">
                            Welkom terug, <?php  echo $dezeGebruiker->Gebruikers_Voornaam; ?>!

                        </th>
                    </tr>
                    <tr>
                        <td>
                            Sorteer op:
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" ><a href="add_Gebruiker.php">Naam</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button"><a href="add_Gebruiker.php">Standplaats</a></button>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <button type="button"><a href="inlog.php">Bedrijfsnaam</a></button>
                        </th>
                    </tr>
                </table>

                <br>

                <table class="tableOpmaakLosseButtons">
                    <tr>
                        <th>

                            <button type="button" ><a href="add_Gebruiker.php"><i class="fas fa-plus"></i>Voeg toe</a></button>
                        </th>
                    </tr>
                </table>

                <br>

                <table class="tableOpmaakLosseButtons">
                    <tr>
                        <td>

                            <button type="submit" name="loguit"><a href="loguit.php" ><i class="fas fa-power-off"></i>Uitloggen</a></button>
                        </td>
                    </tr>
                </table>
                            <button type="button"><a href="add_Gebruiker.php">Bedrijfsnaam</a></button>
                        </th>
                    </tr>
                </table>

                <br>

                <table class="tableOpmaakLosseButtons">
                    <tr>
                        <th>

                            <button type="button" ><a href="add_Gebruiker.php"><i class="fas fa-plus"></i>Voeg toe</a></button>
                        </th>
                    </tr>
                </table>

                <br>

                <table class="tableOpmaakLosseButtons">
                    <tr>
                        <td>

                            <button type="button"><a href="add_Gebruiker.php" ><i class="fas fa-power-off"></i>Uitloggen</a></button>
                        </td>
                    </tr>
                </table>



            </div>




        <div id="mainListItemsRechts" class="inline-blocks">
            <table border="1px" class="tableLaptop">

                <tr>
                    <th>Voornaam</th>
                    <th>tussenvoegsels</th>
                    <th>achternaam</th>
                    <th>email</th>
                    <th>telefoonnummer</th>
                    <th>gebruikersnaam</th>
                    <th>Wachtwoord</th>
                    <th>rol</th>
                    <td></td>
                    <td></td>
                <tr>
                    <th>Voornaam</th>
                    <th>tussenvoegsels</th>
                    <th>achternaam</th>
                    <th>email</th>
                    <th>telefoonnummer</th>
                    <th>gebruikersnaam</th>
                    <th>Wachtwoord</th>
                    <th>rol</th>
                    <td></td>
                    <td></td>
                </tr>
                <?php foreach($gebruikers as $gebruiker): ?>
                    <tr>
                        <td><?php echo $gebruiker->Gebruikers_Voornaam; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Tussenvoegsel; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Achternaam; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Email; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Telefoonnummer; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Gebruikersnaam; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Wachtwoord; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Rol; ?></td>
                        <td><a href="edit_Gebruiker.php?id=<?php echo "$gebruiker->Gebruikers_ID"; ?>"><i class="fas fa-edit"></i></a></td>
                        <td><a href="delete_Gebruiker.php?id=<?php echo "$gebruiker->Gebruikers_ID"; ?>"><i class="fas fa-times"></i></a></td>
                    </tr>
                <?php endforeach;
                ?>
            </table>

            <table border="1px" class="tableTabletEnMobiel">
                <tr>
                    <th>Voornaam</th>
                    <th>achternaam</th>
                    <th>email</th>
                    <th>rol</th>
                </tr>
                <?php foreach($gebruikers as $gebruiker): ?>
                    <tr>
                        <td><?php echo $gebruiker->Gebruikers_Voornaam; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Tussenvoegsel; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Achternaam; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Email; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Telefoonnummer; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Gebruikersnaam; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Wachtwoord; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Rol; ?></td>
                        <td><a href="edit_Gebruiker.php?id=<?php echo "$gebruiker->Gebruikers_ID"; ?>"><i class="fas fa-edit"></i></a></td>
                        <td><a href="delete_Gebruiker.php?id=<?php echo "$gebruiker->Gebruikers_ID"; ?>"><i class="fas fa-times"></i></a></td>
                    </tr>
                <?php endforeach;
                ?>
            </table>

            <table border="1px" class="tableTabletEnMobiel">
                <tr>
                    <th>Voornaam</th>
                    <th>achternaam</th>
                    <th>email</th>
                    <th>rol</th>
                </tr>
                <?php foreach($gebruikers as $gebruiker): ?>
                    <tr>
                        <td><?php echo $gebruiker->Gebruikers_Voornaam; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Achternaam; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Email; ?></td>
                        <td><?php echo $gebruiker->Gebruikers_Rol; ?></td>
                    </tr>
                <?php endforeach;
                ?>
            </table>
        </div>

        </div>
        <div id="mainSideBar" class="inline-blocks">
            <h1>Sorteer op:</h1>
            <br>
            <br>
            <ul>
                <li>Naam</li>
                <li>Standplaats</li>
                <li>Bedrijfsnaam</li>
                <a href="add_Gebruiker.php"><li>Voeg gebruiker toe</li></a>
                <a href="inlog.php"><li>Uitloggen</li></a>
            </ul>
        </div>

    </main>

    <footer class="inline-blocks">

    </footer>
</div>

</body>
</html>