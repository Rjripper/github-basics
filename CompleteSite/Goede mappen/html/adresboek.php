<?php require_once ("../initialize.php");
$session = new Session();
$gebruiker = new Gebruikers();

$message = "";
$sort = " ASC ";
$order = " Gebruikers_ID ";



if(!$session->is_logged_in())
{
    session_destroy();
    redirect_to("index.php");
}

?>

<!-- Alles wat hieronder zit is aangemaakt============================ -->
<?php

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 1;
$total_count = Gebruikers::count_all();

$pagination = new Pagination($page,$per_page, $total_count);

$sql = "SELECT * FROM gebruikers ";

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
    <link rel="stylesheet" href="CSS/adresboekStyleGebruiker.css">
    <link rel="stylesheet" href="CSS/pagination.css">
    <script src="JS/main.js"> </script>
    <title>Adresboek</title>


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
                            <button type="button" ><a href="adresboek.php?page=<?php echo $page ?>&order=<?php echo gebruikersSortArray()[0]?>&sort=<?php echo $sort?>">Naam</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button"><a href="adresboek.php?page=<?php echo $page ?>&order=<?php echo gebruikersSortArray()[1]?>&sort=<?php echo $sort ?>">Standplaats</a></button>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <button type="button"><a href="adresboek.php?page=<?php echo $page ?>&order=<?php echo gebruikersSortArray()[0]?>&sort=<?php echo $sort ?>">Bedrijfsnaam</button>
                        </th>
                    </tr>
                </table>

                <br>


                <br>

                <table class="tableOpmaakLosseButtons">
                    <tr>
                        <td>

                            <button type="submit" name="loguit">
                                <a href="FunctiePaginas/loguit.php" >
                                    <i class="fas fa-power-off"></i>
                                    Uitloggen
                                </a>
                            </button>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="mainListItemsRechts" class="inline-blocks">

                <table border="1px" >
                    <tr>
                        <th>Naam</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Telefoonnummer</th>
                    </tr>
                    <?php foreach($gebruikers as $gebruiker): ?>
                        <tr>
                            <td><?php echo $gebruiker->full_name(); ?></td>
                            <td><?php echo $gebruiker->Gebruikers_Gebruikersnaam; ?></td>
                            <td><?php echo $gebruiker->Gebruikers_Email; ?></td>
                            <td><?php echo $gebruiker->Gebruikers_Telefoonnummer; ?></td>
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
                <a href="index.php"><li>Uitloggen</li></a>
            </ul>
        </div>

    </main>


    <div id="pagination" style="clear: both">
    <div id="paginationInhoud" class="displayblocks">
        <!-- pijlen divs's-->
        <div id="paginationInhoudPositie" class="displayinlineblocks">
            <div  id="afmetingenPijlLinks" class="displayinlineblocks">
                <!-- pijl terug -->
                <?php
                if($pagination->has_previous_page()){
                    if(isset($_GET['order']) && isset($_GET['sort'])){
                        echo "<a href=adresboek.php?page={$pagination->previous_page()}&order={$_GET['order']}&sort={$_GET['sort']}>" ;
                        echo '<i class="fas fa-arrow-left"></i>';
                        echo '</a>';
                    }else{
                        echo "<a href=adresboek.php?page={$pagination->previous_page()}>" ;
                        echo '<i class="fas fa-arrow-left"></i>';
                        echo '</a>';
                    }
                }else{
                    echo "<i class='fas fa-arrow-left'></i>";
                }
                ?>
                <!-- einde pijl terug -->
            </div>

            <div id="afmetingenHuidigePagina" class="displayinlineblocks">
                <?php
                if($page == $pagination->total_pages()){
                    if(isset($_GET['sort']) && isset($_GET['order']))
                    {
                        echo "<a href=add_Gebruiker.php?page=$page&sort=$sort&order={$_GET['order']}>1</a>";
                    }else{
                        echo "<a href='adresboek.php?page=1'>1</a>";
                    }
                }
                else{
                    echo "<span id='spanVoor1'>{$page}</span>";
                }
                ?>
            </div>

            <div  id="Afmetingpuntjes" class="displayinlineblocks">
                <p>...</p>
            </div>

            <div id="afmetingenTotalePagina" class="displayinlineblocks ">

                <?php
                //pijl terug
                echo "<a href=\"adresboek.php?page={$pagination->total_pages()}\">{$pagination->total_pages()}</a> ";
                ?>

            </div>

            <div id="afmetingenPijlRechts" class="displayinlineblocks ">
                <!-- pijl vooruit -->
                <?php
                if($pagination->has_next_page()){
                    if(isset($_GET['order']) && isset($_GET['sort'])){
                        echo "<a href=adresboek.php?page={$pagination->next_page()}&order={$_GET['order']}&sort={$_GET['sort']}>" ;
                        echo '<i class="fas fa-arrow-right"></i>';
                        echo '</a>';
                    }else{
                        echo "<a href=adresboek.php?page={$pagination->next_page()}>" ;
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
        <!-- einde pijlen -->

    </div>

    </div>

    <footer class="inline-blocks">

    </footer>
</div>

</body>
</html>