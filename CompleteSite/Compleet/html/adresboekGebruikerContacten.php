<?php require_once ("../initialize.php");
$session = new Session();

$message = "";

if(!$session->is_logged_in())
{
    session_destroy();
    redirect_to("inlog.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <link rel="stylesheet" href="adresboekStyleGebruiker.css">
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
    <header class="container-inline-blocks">
        <div id="headerLogo" class="inline-blocks">
            <h1>LIDLPEOPLE</h1>
        </div>
        <div id="headerButtons" class="inline-blocks">
            <div id="headerButton" class="inline-blocks">
                <div id="headerButtonImage" class="inline-blocks">
                    <i class="fas fa-align-justify" onclick="toggleSidebar('mainSideBar');">
                    </i>
                </div>
            </div>
        </div>
    </header>

    <main class="container-inline-blocks">


        <div id="mainListItems" class="inline-blocks">
            <div class="container-inline-blocks">
             <div id="mainListItemsLinks" class="inline-blocks">

                <!-- Linker Menu -->
                <div id="mainListItemsLinksTable" class="inline-blocks">
                    <div id="mainListItemsLinksBlock1" class="container-inline-blocks">

                        <!-- Profiel foto -->
                        <div id="mainListItemsLinksImg" class="inline-blocks">
                            <img src="images/mainIcon.png" alt="profielfoto">
                        </div>

                        <!-- Naam gebruiker inlog-->
                        <div id="mainListItemsLinksGebruikernaam" class="inline-blocks">
                            <h1>Welkom terug, <?php  echo $dezeGebruiker->Gebruikers_Voornaam; ?>!</h1>
                        </div>
                    </div>

                    <!-- sorteer text-->
                    <div id="mainListItemsLinksBlock2" class="container-inline-blocks">
                        <div id="mainListItemsLinksBlock2img" class="inline-blocks" >
                            <i class="fas fa-search"></i>
                        </div>
                        <div id="mainListItemsLinksBlock2Zoeken" class="inline-blocks">
                            <input type="text" name="naam" value="Zoeken">
                        </div>
                    </div>

                    <!-- voeg toe functie-->


                    <!-- log uit functie-->
                    <div id="mainListItemsLinksBlock4">
                        <button type="button">
                            <a href="loguit.php" >
                                <i class="fas fa-power-off"></i>
                                Uitloggen
                            </a>
                        </button>
                    </div>
                </div>

            </div>


            <!-- Tabel users etc... -->

            <div id="mainListItemsRechts" class="inline-blocks">
                <div id="mainListItemsRechtsTable" class="inline-blocks">
                    <div id="mainListItemsRechtsTableForm" class="inline-blocks">
                        <div id="mainListItemsRechtsSorteerBlock" class="container-inline-blocks">

                            <!--Sorteer functie -->
                            <form action="" method="POST" class="container-inline-blocks">
                                <div id="mainListItemsRechtsSorteerBlock1" class="inline-blocks">

                                    <div class="container-inline-blocks" >
                                        <!--Naam -->
                                        <div id="mainListItemsRechtsSorteerBlock1Naam" class="inline-blocks" >
                                            <input type="submit" name="naam" value="Naam">
                                        </div>

                                        <div id="mainListItemsRechtsSorteerBlock1NaamArrowUp" class="inline-blocks">
                                            <i class="fas fa-long-arrow-alt-up sorteer1"></i>
                                        </div>

                                    </div>
                                </div>

                                <div id="mainListItemsRechtsSorteerBlock2" class="inline-blocks">
                                    <!--Standplaats -->
                                    <div class="container-inline-blocks" >
                                        <div id="mainListItemsRechtsSorteerBlock2Naam" class="inline-blocks">
                                            <input type="submit" name="standplaats" value="Standplaats">
                                        </div>
                                        <div id="mainListItemsRechtsSorteerBlock2NaamArrowUp" class="inline-blocks">
                                            <i class="fas fa-long-arrow-alt-up sorteer2"></i>
                                        </div>

                                    </div>

                                </div>

                                <div id="mainListItemsRechtsSorteerBlock3" class="inline-blocks">
                                    <!--Standplaats -->
                                    <div class="container-inline-blocks">
                                        <div id="mainListItemsRechtsSorteerBlock3Naam" class="inline-blocks">
                                            <input type="submit" name="bedrijfsnaam" value="Bedrijfsnaam">
                                        </div>
                                        <div id="mainListItemsRechtsSorteerBlock3NaamArrowUp" class="inline-blocks">
                                            <i class="fas fa-long-arrow-alt-up sorteer3"></i>
                                        </div>
                                    </div>

                                </div>
                                <div id="mainListItemsRechtsSorteerBlock4" class="inline-blocks">

                                </div>
                            </form>

                        </div>


                        <!--Begin Foreach -->
                        <?php foreach($gebruikers as $gebruiker): ?>
                            <div id="mainListItemsRechtsLijst" class="container-inline-blocks">

                                <!-- Profiel foto + naam-->
                                <div id="mainListItemsRechtsLijstBlock1" class="inline-blocks">
                                    <div class="container-inline-blocks">
                                        <div id="mainListItemsRechtsLijstFoto" class="inline-blocks">
                                            <img src="images/mainIcon.png" alt="profielfoto">
                                        </div>
                                        <div id="mainListItemsRechtsLijstNaam" class="inline-blocks">
                                            <?php echo $gebruiker->full_name();?>
                                        </div>
                                    </div>

                                </div>

                                <!-- Email-->
                                <div id="mainListItemsRechtsLijstBlock2" class="inline-blocks">
                                    <div id="mainListItemsRechtsLijstEmail" class="inline-blocks">
                                        <?php echo $gebruiker->Gebruikers_Email; ?>
                                    </div>
                                </div>

                                <!-- Rol-->
                                <div id="mainListItemsRechtsLijstBlock3" class="inline-blocks">
                                    <div id="mainListItemsRechtsLijstRol" class="inline-blocks">
                                        <?php echo $gebruiker->Gebruikers_Rol; ?>
                                    </div>
                                </div>

                                <!-- buttons edit en verwijder-->
                                <div id="mainListItemsRechtsLijstBlock4" class="inline-blocks">
                                    <div class="container-inline-blocks">
                                        <div id="mainListItemsRechtsLijstButtons1" class="inline-blocks">
                                            <a href="edit_Gebruiker.php?id=<?php echo "$gebruiker->Gebruikers_ID"; ?>"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div id="mainListItemsRechtsLijstButtons2" class="inline-blocks">
                                            <a href="delete_Gebruiker.php?id=<?php echo "$gebruiker->Gebruikers_ID"; ?>"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        <?php endforeach;
                        ?>
                        <!--Einde Foreach -->

                    </div>


                </div>

            </div>
        </div>
        </div>
        <div id="mainSideBar" class="inline-blocks">
            <div  id="mainSideBarBlock" class="container-inline-blocks">
                <div id="mainSideBarBlockPositie" class="inline-blocks">
                    <!-- Sorteer functie -->
                    <div id="mainSideBarBlockSorteer" class="inline-blocks">
                        <div class="inline-blocks">
                            <h1>Sorteren op:</h1>
                        </div>
                        <div class="inline-blocks">
                            <input type="submit" name="naam" value="Naam">
                        </div>
                        <div class="inline-blocks">
                            <input type="submit" name="standplaats" value="Standplaats">
                        </div>
                        <div class="inline-blocks">
                            <input type="submit" name="bedrijfsnaam" value="Bedrijfsnaam">
                        </div>
                    </div>

                    <!-- Zoek functie -->
                    <div id="mainSideBarBlockZoeken" class="inline-blocks">
                        <div class="inline-blocks">
                            <h1>Zoeken op contacten:</h1>
                            <input type="text" name="naam" value="Zoeken">
                        </div>
                    </div>

                    <!-- log uit functie -->
                    <div id="mainSideBarBlockUitloggen" class="inline-blocks">

                        <!-- log uit functie -->
                        <div class="container-inline-blocks">
                            <a href="loguit.php"><i class="fas fa-sign-out-alt"></i></a>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    </main>

    <footer class="inline-blocks">

    </footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
    $('#mainListItemsRechtsSorteerBlock1Naam').click(function()
    {
        $('.sorteer1').toggleClass('arrowRotate');
    });
</script>
</body>
</html>