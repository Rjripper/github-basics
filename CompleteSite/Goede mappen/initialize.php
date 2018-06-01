<?php
/**
 * Created by PhpStorm.
 * User: nancy
 * Date: 15-5-2018
 * Time: 11:28
 */

/* Define the core paths
Define them as absolute paths to make sure that requiere_once
works as expected

DIRECTORY_SEPARATOR is a PHP pre-defined constant
c\ for windows, /For unix
 */

/* ik constateer DS in defined is hij null? , maar anders ga ik
de define veranderen naar Directory_Separator.
Dat is een speciale php pre-defined constant
*/

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

/*FF NAAR JE EIGEN AANPASSEN*/
defined('SITE_ROOT') ? null : define('SITE_ROOT',
    'C:'.DS.'Xampp'.DS.'htdocs'.DS.'php');

/*FF NAAR HET LAATSTE MAPJE ZETTEN*/
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'Scrumm');

//CORE OBJECT
require_once (LIB_PATH.DS.'database.php');
require_once (LIB_PATH.DS.'database_object.php');
require_once (LIB_PATH.DS.'functions.php');

//LOAD DATABAS-RELATED CLASSES
require_once (LIB_PATH.DS.'gebruikers.php');
require_once (LIB_PATH.DS.'contactpersoon.php');
require_once (LIB_PATH.DS.'pagination.php');
require_once (LIB_PATH.DS.'session.php');
