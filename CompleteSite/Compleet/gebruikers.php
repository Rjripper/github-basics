<?php
/**
 * Created by PhpStorm.
 * User: tim7v
 * Date: 26-4-2018
 * Time: 09:29
 */
require_once ('initialize.php');

class Gebruikers extends DatabaseObject {

    protected static $table_name="gebruikers";
    protected static $db_fields = ["Gebruikers_ID", "Gebruikers_Voornaam", "Gebruikers_Tussenvoegsel", "Gebruikers_Achternaam", "Gebruikers_Email", "Gebruikers_Telefoonnummer", "Gebruikers_Gebruikersnaam", "Gebruikers_Wachtwoord", "Gebruikers_Rol"];


    public $Gebruikers_ID;
    public $Gebruikers_Voornaam;
    public $Gebruikers_Tussenvoegsel;
    public $Gebruikers_Achternaam;
    public $Gebruikers_Email;
    public $Gebruikers_Telefoonnummer;
    public $Gebruikers_Gebruikersnaam;
    public $Gebruikers_Wachtwoord;
    public $Gebruikers_Rol;

    public function full_name()
    {
        if(isset($this->Gebruikers_Voornaam) && isset($this->Gebruikers_Tussenvoegsel) && isset($this->Gebruikers_Achternaam))
        {
            return $this->Gebruikers_Voornaam . " " .$this->Gebruikers_Tussenvoegsel . " " . $this->Gebruikers_Achternaam;
        }
        else{
            return "";
        }
    }

    //weet of de gebruiker in de database zit.
    public static function authenticate($username="" , $password="")
    {
        global $database;
        $username = $database->escape_value($username);
        $password = $database->escape_value($password);

        $sql  = "SELECT * FROM gebruikers WHERE Gebruikers_Gebruikersnaam = '{$username}'
                  AND Gebruikers_Wachtwoord = '{$password}' LIMIT 1";
        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public function make($Gebruikers_Voornaam,
                                $Gebruikers_Tussenvoegsel,
                                $Gebruikers_Achternaam,
                                $Gebruikers_Email,
                                $Gebruikers_Telefoonnummer,
                                $Gebruikers_Gebruikersnaam,
                                $Gebruikers_Wachtwoord,
                                $Gebruikers_Rol){

        global $database;
        if(!empty($Gebruikers_Voornaam) &&
            !empty($Gebruikers_Achternaam) &&
            !empty($Gebruikers_Email) &&
            !empty($Gebruikers_Telefoonnummer) &&
            !empty($Gebruikers_Gebruikersnaam) &&
            !empty($Gebruikers_Wachtwoord) &&
            !empty($Gebruikers_Rol)) {


            if(!empty($Gebruikers_Tussenvoegsel)){

                $sql = "INSERT INTO ";
                $sql .=  'gebruikers (Gebruikers_Voornaam, Gebruikers_Tussenvoegsel, Gebruikers_Achternaam, ';
                $sql .= 'Gebruikers_Email, Gebruikers_Telefoonnummer, Gebruikers_Gebruikersnaam, Gebruikers_Wachtwoord, Gebruikers_Rol) ';
                $sql .= 'VALUES ('. " '". $Gebruikers_Voornaam. "' , ". " '". $Gebruikers_Tussenvoegsel. "',".  " '". $Gebruikers_Achternaam. "' , ". " '". $Gebruikers_Email . "' , ". " '". $Gebruikers_Telefoonnummer. "' ,";
                $sql .=  " '". $Gebruikers_Gebruikersnaam . "' , ". " '". $Gebruikers_Wachtwoord. "' , "." '". $Gebruikers_Rol ."' )";

            }else{
                $sql = "INSERT INTO ";
                $sql .=  'gebruikers (Gebruikers_Voornaam, Gebruikers_Achternaam, ';
                $sql .= 'Gebruikers_Email, Gebruikers_Telefoonnummer, Gebruikers_Gebruikersnaam, Gebruikers_Wachtwoord, Gebruikers_Rol) ';
                $sql .= 'VALUES ('. " '". $Gebruikers_Voornaam. "' , ". " '". $Gebruikers_Achternaam. "' , ". " '". $Gebruikers_Email . "' , ". " '". $Gebruikers_Telefoonnummer. "' ,";
                $sql .=  " '". $Gebruikers_Gebruikersnaam . "' , ". " '". $Gebruikers_Wachtwoord. "' , "." '". $Gebruikers_Rol ."' )";

            }
            $database->query($sql);
            return ($database->affected_rows() ==1) ? true : false;
        } else {
            return false;
        }
    }

    public function edit ($Gebruikers_Voornaam,
                         $Gebruikers_Tussenvoegsel,
                         $Gebruikers_Achternaam,
                         $Gebruikers_Email,
                         $Gebruikers_Telefoonnummer,
                         $Gebruikers_Gebruikersnaam,
                         $Gebruikers_Wachtwoord,
                         $Gebruikers_Rol){

        global $database;
        if(!empty($Gebruikers_Voornaam) &&
            !empty($Gebruikers_Achternaam) &&
            !empty($Gebruikers_Email) &&
            !empty($Gebruikers_Telefoonnummer) &&
            !empty($Gebruikers_Gebruikersnaam) &&
            !empty($Gebruikers_Wachtwoord) &&
            !empty($Gebruikers_Rol)) {

            if(!empty($Gebruikers_Tussenvoegsel)){
                $sql = "UPDATE ";
                $sql .=  'gebruikers SET Gebruikers_Voornaam = '. " '". $Gebruikers_Voornaam. "' , ";
                $sql .=  'Gebruikers_Tussenvoegsel = '." '". $Gebruikers_Tussenvoegsel. "' , ";
                $sql .=  'Gebruikers_Achternaam = '." '". $Gebruikers_Achternaam. "' , ";
                $sql .=  'Gebruikers_Email = '." '". $Gebruikers_Email. "' , ";
                $sql .=  'Gebruikers_Telefoonnummer = '." '". $Gebruikers_Telefoonnummer. "' , ";
                $sql .=  'Gebruikers_Gebruikersnaam = '." '". $Gebruikers_Gebruikersnaam. "' , ";
                $sql .=  'Gebruikers_Wachtwoord = '." '". $Gebruikers_Wachtwoord. "' , ";
                $sql .=  'Gebruikers_Rol = '." '". $Gebruikers_Rol. "' ";
                $sql .=  'WHERE gebruikers_ID = '." '". $this->Gebruikers_ID. "'";

            } else{
                $sql = "UPDATE ";
                $sql .=  'gebruikers SET Gebruikers_Voornaam = '. " '". $Gebruikers_Voornaam. "' , ";
                $sql .=  'Gebruikers_Tussenvoegsel = '." '". " ". "' , ";
                $sql .=  'Gebruikers_Achternaam = '." '". $Gebruikers_Achternaam. "' , ";
                $sql .=  'Gebruikers_Email = '." '". $Gebruikers_Email. "' , ";
                $sql .=  'Gebruikers_Telefoonnummer = '." '". $Gebruikers_Telefoonnummer. "' , ";
                $sql .=  'Gebruikers_Gebruikersnaam = '." '". $Gebruikers_Gebruikersnaam. "' , ";
                $sql .=  'Gebruikers_Wachtwoord = '." '". $Gebruikers_Wachtwoord. "' , ";
                $sql .=  'Gebruikers_Rol = '." '". $Gebruikers_Rol. "' ";
                $sql .=  'WHERE gebruikers_ID = '." '". $this->Gebruikers_ID. "'";

            }

            $database->query($sql);
            return ($database->affected_rows() ==1) ? true : false;
        } else {
            return false;
        }
    }

}
?>