<?php require_once ("../initialize.php");
$session = new Session();
$gebruiker = new Gebruikers();

$message = "";
$sort = " ASC ";
$order = " Gebruikers_ID ";

if(!$session->is_logged_in())
{
    session_destroy();
    redirect_to("inlog.php");
} else{
    if($_SESSION['user_rol'] == "gebruiker" || $_SESSION['user_rol'] == "Gebruiker"){
        print_r($_SESSION);
        redirect_to("adresboekGebruikerContacten.php");
    }
}

?>

<!-- Sorteer functie + Pagination -->
<?php

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 20;
$total_count = Gebruikers::count_all();

$pagination = new Pagination($page,$per_page, $total_count);

$sql = "SELECT * FROM gebruikers ";

if(!empty($_POST['zoeken'])){
    $sql .= $gebruiker->zoek(gebruikersSortArray(), $_POST['zoeken']);
}

if(isset($_GET['order']) && !isset($_GET['change']))
{
    $sql .= $gebruiker->sort($_GET['order']);

    if($_GET['sort'] == 'DESC')
    {
        $sort = "ASC";
        $sql .= " DESC ";
    } else if ($_GET['sort'])
    {
        $sort = "DESC";
        $sql .= " ASC ";
    }
}

$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$gebruikers = Gebruikers::find_by_sql($sql);
$dezeGebruiker = Gebruikers::find_by_id($_SESSION['user_id']);

?>
<!-- ================================================================== -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/adresboekStyleAdminGebruikers.css">
    <script src="JS/main.js"> </script>
    <title>Adresboek</title>

</head>
<body>
<div id="container" class="container-inline-blocks">
    <header class="container-inline-blocks">
        <div id="headerLogo" class="inline-blocks">
            <h1>LIDLPEOPLE</h1>
        </div>
        <div id="headerButtons" class="inline-blocks">
            <div id="headerButtonsPaginaButton" class="inline-blocks">
                <div class="container-inline-blocks">
                    <div id="headerButtonsPaginaButtonBlock1" class="inline-blocks">
                        <button type="button">
                            <a href="adresboekAdminContacten.php" >
                                Contacten pagina
                            </a>
                        </button>
                    </div>
                    <div id="headerButtonsPaginaButtonBlock2" class="inline-blocks">

                    </div>
                </div>
            </div>

            <div id="headerButton" class="inline-blocks">
                <div id="headerButtonImage" class="inline-blocks">
                    <span style="cursor:pointer;"  onclick="toggleSidebar('mainSideBar');">
                        &#9776;
                    </span>
                </div>
            </div>
        </div>
    </header>




    <main class="container-inline-blocks">
        <div id="mainSearchBlock" class="inline-blocks">
            <!-- Linker Menu -->

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
                    <form action="" method="post">
                        <input type="text" name="zoeken" value="Zoeken">
                    </form>
                </div>
            </div>

            <!-- voeg toe functie-->
            <div id="mainListItemsLinksBlock3">
                <button type="button" >
                    <a href="FunctiePaginas/add_Gebruiker.php">
                        <i class="fas fa-plus"></i>
                        Voeg toe
                    </a>
                </button>
            </div>

            <!-- log uit functie-->
            <div id="mainListItemsLinksBlock4">
                <button type="button">
                    <a href="FunctiePaginas/loguit.php" >
                        <i class="fas fa-power-off"></i>
                        Uitloggen
                    </a>
                </button>
            </div>

        </div>
        <div id="mainListItems" class="inline-blocks">

            <!-- Tabel users etc... -->

            <div id="mainListItemsRechtsSorteerBlock" class="container-inline-blocks">

                <!--Sorteer functie -->
                <form action="" method="POST" class="container-inline-blocks">
                    <div id="mainListItemsRechtsSorteerBlock1" class="inline-blocks">

                        <div class="container-inline-blocks" >
                            <!--Naam -->
                            <div id="mainListItemsRechtsSorteerBlock1Naam" class="inline-blocks" >
                                <button type="button" ><a href="adresboekAdminGebruikers.php?page=<?php echo $page ?>&order=<?php echo gebruikersSortArray()[0]?>&sort=<?php echo $sort?>">Naam</a></button>
                            </div>

                            <div id="mainListItemsRechtsSorteerBlock1NaamArrowUp" class="inline-blocks">
                                <?php
                                if($sort == 'ASC' && $_GET['order'] == gebruikersSortArray()[0])
                                {
                                    echo '<i class="fas fa-long-arrow-alt-down sorteer1"></i>';
                                }else{
                                    echo '<i class="fas fa-long-arrow-alt-up sorteer1"></i>';
                                }
                                ?>
                            </div>

                        </div>
                    </div>

                    <div id="mainListItemsRechtsSorteerBlock2" class="inline-blocks">
                        <!--E-mail -->
                        <div class="container-inline-blocks" >
                            <div id="mainListItemsRechtsSorteerBlock2Naam" class="inline-blocks">
                                <button type="button"><a href="adresboekAdminGebruikers.php?page=<?php echo $page ?>&order=<?php echo gebruikersSortArray()[1]?>&sort=<?php echo $sort ?>">E-mail</a></button>
                            </div>
                            <div id="mainListItemsRechtsSorteerBlock2NaamArrowUp" class="inline-blocks">
                                <?php
                                if($sort == 'ASC' && $_GET['order'] == gebruikersSortArray()[1])
                                {
                                    echo '<i class="fas fa-long-arrow-alt-down sorteer2"></i>';
                                }else{
                                    echo '<i class="fas fa-long-arrow-alt-up sorteer2"></i>';
                                }
                                ?>
                            </div>

                        </div>

                    </div>

                    <div id="mainListItemsRechtsSorteerBlock3" class="inline-blocks">
                        <!--Rol -->
                        <div class="container-inline-blocks">
                            <div id="mainListItemsRechtsSorteerBlock3Naam" class="inline-blocks">
                                <button type="button"><a href="adresboekAdminGebruikers.php?page=<?php echo $page ?>&order=<?php echo gebruikersSortArray()[2]?>&sort=<?php echo $sort ?>">Rol</a></button>
                            </div>
                            <div id="mainListItemsRechtsSorteerBlock3NaamArrowUp" class="inline-blocks">
                                <?php
                                if($sort == 'ASC' && $_GET['order'] == gebruikersSortArray()[2])
                                {
                                    echo '<i class="fas fa-long-arrow-alt-down sorteer3"></i>';
                                }else{
                                    echo '<i class="fas fa-long-arrow-alt-up sorteer3"></i>';
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                    <div id="mainListItemsRechtsSorteerBlock4" class="inline-blocks">

                    </div>
                </form>

            </div>

            <!--Begin Foreach -->
            <?php foreach($gebruikers as $gebruiker): ?>
                <div class="container-inline-blocks mainListItemsRechtsLijst">

                    <!-- Profiel foto + naam-->
                    <div id="mainListItemsRechtsLijstBlock1" class="inline-blocks">
                        <div class="container-inline-blocks">
                            <div id="mainListItemsRechtsLijstFoto" class="inline-blocks">
                                <img src="images/mainIcon.png" alt="profielfoto">
                            </div>
                            <div id="mainListItemsRechtsLijstNaam" class="inline-blocks">
                                <?php echo $gebruiker->full_name();?>
                                <a href="detailpaginaAdminGebruiker.php?id=<?php echo  $gebruiker->Gebruikers_ID?>"><span></span></a>
                            </div>
                        </div>

                    </div>

                    <!-- Email-->
                    <div id="mainListItemsRechtsLijstBlock2" class="inline-blocks">
                            <div id="mainListItemsRechtsLijstEmail" class="inline-blocks">
                                <a href="mailto:<?php echo $gebruiker->Gebruikers_Email; ?>
                                    &body=%0D%0AMet%20Vriendelijke%20Groet,%0D%0A
                                    <?php echo '%0D%0A' . $dezeGebruiker->Gebruikers_Gebruikersnaam; ?>%0D%0AWerknemer%20bij%20Lidlpeople"><?php echo $gebruiker->Gebruikers_Email; ?>

                                </a>
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
                                <a href="FunctiePaginas/edit_Gebruiker.php?id=<?php echo  $gebruiker->Gebruikers_ID; ?>"><i class="fas fa-edit"></i></a>
                            </div>
                            <div id="mainListItemsRechtsLijstButtons2" class="inline-blocks">
                                <a href="FunctiePaginas/delete_Gebruiker.php?id=<?php echo $gebruiker->Gebruikers_ID; ?>"><i class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
            ?>
            <!--Einde Foreach -->



            <!--    PAGINATION STYLES HTML/CSS & PHP!!!------------------------->
            <div id="pagination" class="container-inline-blocks">

                <div id="paginationInhoud" class="inline-blocks">
                    <div  id="afmetingenPijlLinks" class="inline-blocks">
                        <!-- pijl terug -->
                        <?php
                        if($pagination->has_previous_page()){
                            if(isset($_GET['order']) && isset($_GET['sort'])){
                                echo "<a href=adresboekAdminGebruikers.php?page={$pagination->previous_page()}&order={$_GET['order']}&sort={$_GET['sort']}>" ;
                                echo '<i class="fas fa-arrow-left"></i>';
                                echo '</a>';
                            }else{
                                echo "<a href=adresboekAdminGebruikers.php?page={$pagination->previous_page()}>" ;
                                echo '<i class="fas fa-arrow-left"></i>';
                                echo '</a>';
                            }
                        }else{
                            echo "<i class='fas fa-arrow-left'></i>";
                        }
                        ?>
                        <!-- einde pijl terug -->
                    </div>

                    <div id="afmetingenHuidigePagina" class="inline-blocks">
                        <?php
                        if($page == $pagination->total_pages()){
                            if(isset($_GET['sort']) && isset($_GET['order']))
                            {
                                echo "<a href=FunctiePaginas/add_Gebruiker.php?page=$page&sort=$sort&order={$_GET['order']}>1</a>";
                            }else{
                                echo "<a href='adresboekAdminGebruikers.php?page=1'>1</a>";
                            }
                        }
                        else{
                            echo "<span id='spanVoor1'>{$page}</span>";
                        }
                        ?>
                    </div>

                    <div  id="Afmetingpuntjes" class="inline-blocks">
                        ...
                    </div>

                    <div id="afmetingenTotalePagina" class="inline-blocks ">

                        <?php
                        //pijl terug
                        echo "<a href=\"adresboekAdminGebruikers.php?page={$pagination->total_pages()}\">{$pagination->total_pages()}</a> ";
                        ?>

                    </div>

                    <div id="afmetingenPijlRechts" class="inline-blocks ">
                        <!-- pijl vooruit -->
                        <?php
                        if($pagination->has_next_page()){
                            if(isset($_GET['order']) && isset($_GET['sort'])){
                                echo "<a href=adresboekAdminGebruikers.php?page={$pagination->next_page()}&order={$_GET['order']}&sort={$_GET['sort']}>" ;
                                echo '<i class="fas fa-arrow-right"></i>';
                                echo '</a>';
                            }else{
                                echo "<a href=adresboekAdminGebruikers.php?page={$pagination->next_page()}>" ;
                                echo '<i class="fas fa-arrow-right"></i>';
                                echo '</a>';
                            }
                        }else{
                            echo "<i class='fas fa-arrow-right'></i>";
                        }

                        ?>
                        <!-- einde pijl vooruit -->
                    </div>
                </div>

            </div>
            <!--    ------------------------------------------------------------->





        </div>
        <div id="mainSideBar" class="inline-blocks">
            <div  id="mainSideBarBlock" class="container-inline-blocks">
                <div id="mainSideBarBlockPositie" class="inline-blocks">

                    <!-- Sorteer functie -->
                    <div id="mainSideBarBlockSorteer" class="inline-blocks">
                        <div>
                            <h1>Sorteren op:</h1>
                            <button type="button">
                                <a href="adresboekAdminGebruikers.php?page=<?php echo $page ?>&order=<?php echo gebruikersSortArray()[0]?>&sort=<?php echo $sort?>">
                                    Naam
                                </a>
                            </button>
                            <button type="button">
                                <a href="adresboekAdminGebruikers.php?page=<?php echo $page ?>&order=<?php echo gebruikersSortArray()[1]?>&sort=<?php echo $sort ?>">
                                    E-mail
                                </a>
                            </button>
                            <button type="button">
                                <a href="adresboekAdminGebruikers.php?page=<?php echo $page ?>&order=<?php echo gebruikersSortArray()[2]?>&sort=<?php echo $sort ?>">
                                    Rol
                                </a>
                            </button>
                        </div>

                    </div>

                    <!-- Zoek functie -->
                    <div id="mainSideBarBlockZoeken" class="inline-blocks">
                        <div class="inline-blocks">
                            <h1>Zoeken op Gebruikers:</h1>
                            <form action="" method="post">
                                <input type="text" name="zoeken" value="Zoeken">
                            </form>
                        </div>
                    </div>

                    <!-- Voeg gebruiker toe functie en log uit functie -->
                    <div id="mainSideBarBlockToevoegenEnUitloggen" class="inline-blocks">

                        <!-- link naar contacten pagina -->
                        <div class="container-inline-blocks">
                            <button type="button">
                                <a href="adresboekAdminContacten.php" >
                                    Contact pagina
                                </a>
                            </button>
                        </div>

                        <!-- add gebruiker functie -->
                        <div class="container-inline-blocks" >
                            <a href="FunctiePaginas/add_Gebruiker.php"><i class="fas fa-plus-square"></i></a>
                        </div>
                        <!-- log uit functie -->
                        <div class="container-inline-blocks">
                            <a href="FunctiePaginas/loguit.php"><i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer class="container-inline-blocks">
        <p>  &#9400;  LidlPeople <?php echo date("Y", time()); ?></p>
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