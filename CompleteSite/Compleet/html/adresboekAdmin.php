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
//    $sql = "SELECT * FROM gebruikers";
//    $sql .= "LIMIT {$per_page} ";
//    $sql .= "OFFSET {$pagintion->offset()}"; KOMT NOG
    $gebruikers = Gebruikers::find_all();
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

            <!--VOEG TOE BUTTON -->
            <button type="button"><a href="add_Gebruiker.php">Voeg toe</a></button>


            <table border="1px">
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
        </div>
        <div id="mainSideBar" class="inline-blocks">
            <h1>Sorteer op:</h1>
            <br>
            <br>
            <ul>
                <li>Naam</li>
                <li>Standplaats</li>
                <li>Bedrijfsnaam</li>
                <li>Voeg gebruiker toe</li>
                <li>Uitloggen</li>
            </ul>
        </div>

    </main>

    <footer class="inline-blocks">

    </footer>
</div>

</body>
</html>