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
    public $hashed_Wachtwoord;
    public $Gebruikers_Rol;

    public function full_name()
    {
        if(isset($this->Gebruikers_Voornaam) &&
           isset($this->Gebruikers_Tussenvoegsel) &&
           isset($this->Gebruikers_Achternaam))
        {
            return $this->Gebruikers_Voornaam . " " .$this->Gebruikers_Tussenvoegsel . " " . $this->Gebruikers_Achternaam;
        }
        else if(isset($this->Gebruikers_Voornaam) &&
                isset($this->Gebruikers_Achternaam))
        {
            return $this->Gebruikers_Voornaam . " " . $this->Gebruikers_Achternaam;
        }
        else{
            return "";
        }
    }

    private function hashPassword($wachtwoord){
        $this->hashed_Wachtwoord = hash('md2' , $wachtwoord);
    }

    //weet of de gebruiker in de database zit.
    public static function authenticate($username="" , $password="")
    {
        global $database;
        $username = $database->escape_value($username);

        $sql  = "SELECT * FROM gebruikers WHERE Gebruikers_Gebruikersnaam = '{$username}'";
        $result_array = self::find_by_sql($sql);

        if($result_array[0]->Gebruikers_Wachtwoord == hash('md2' , $password)){
            return !empty($result_array) ? array_shift($result_array) : false;
        }else{
            return false;
        }
    }

    public function make($array){

        global $database;
        $this->hashPassword($array['wachtwoord']);
        if($this->doesUsernameExist($array['gnaam'])){
            if(!empty($array['tnaam'])){
                $sql = "INSERT INTO ";
                $sql .=  'gebruikers (Gebruikers_Voornaam, Gebruikers_Tussenvoegsel, Gebruikers_Achternaam, ';
                $sql .= 'Gebruikers_Email, Gebruikers_Telefoonnummer, Gebruikers_Gebruikersnaam, Gebruikers_Wachtwoord, Gebruikers_Rol) ';
                $sql .= 'VALUES ('. " '". $database->escape_value($array['vnaam']) . "' , ". " '". $database->escape_value($array['tnaam']) . "',".  " '". $database->escape_value($array['anaam']) . "' , ". " '". $database->escape_value($array['email']) . "' , ". " '". $database->escape_value($array['telnummer']) . "' ,";
                $sql .=  " '". $database->escape_value($array['gnaam']) . "' , ". " '". $this->hashed_Wachtwoord . "' , "." '". $database->escape_value($array['rol']) ."' )";
            } else{
                $sql = "INSERT INTO ";
                $sql .=  'gebruikers (Gebruikers_Voornaam, Gebruikers_Achternaam, ';
                $sql .= 'Gebruikers_Email, Gebruikers_Telefoonnummer, Gebruikers_Gebruikersnaam, Gebruikers_Wachtwoord, Gebruikers_Rol) ';
                $sql .= 'VALUES ('. " '". $database->escape_value($array['vnaam']) . "' , ". " '". $database->escape_value($array['anaam']) . "' , ". " '". $database->escape_value($array['email'])  . "' , ". " '". $database->escape_value($array['telnummer']) . "' ,";
                $sql .=  " '". $database->escape_value($array['gnaam']) . "' , ". " '". $this->hashed_Wachtwoord . "' , "." '". $database->escape_value($array['rol']) ."' )";
            }
            $database->query($sql);
            return ($database->affected_rows() ==1) ? true : false;
        }else{
            echo 'Uw gebruikersnaam is al in gebruik';
            return false;
        }
    }

    public function edit($array){

        global $database;

        $sql = "UPDATE ";
        $sql .=  'gebruikers SET Gebruikers_Voornaam = '. " '". $database->escape_value($array['vnaam']) . "' , ";
        empty($database->escape_value($array['tnaam'])) ?
            $sql .=  'Gebruikers_Tussenvoegsel = '." '". " ". "' , " : $sql .=  'Gebruikers_Tussenvoegsel = '." '". $database->escape_value($array['tnaam']) . "' , ";
        $sql .=  'Gebruikers_Achternaam = '." '". $database->escape_value($array['anaam']) . "' , ";
        $sql .=  'Gebruikers_Email = '." '". $database->escape_value($array['email']) . "' , ";
        $sql .=  'Gebruikers_Telefoonnummer = '." '". $database->escape_value($array['telnummer']) . "' , ";
        $sql .=  'Gebruikers_Gebruikersnaam = '." '". $database->escape_value($array['gnaam']) . "' , ";
        $sql .=  'Gebruikers_Wachtwoord = '." '". $database->escape_value($array['wachtwoord']) . "' , ";
        $sql .=  'Gebruikers_Rol = '." '". $database->escape_value($array['rol']) . "' ";
        $sql .=  'WHERE gebruikers_ID = '." '". $this->Gebruikers_ID. "'";

        $database->query($sql);
        return ($database->affected_rows() >=0) ? true : false;
    }

    private function doesUsernameExist($gebruikersnaam){
        $sql = "SELECT * FROM gebruikers WHERE Gebruikers_Gebruikersnaam = '{$gebruikersnaam}'";

        $result_array = self::find_by_sql($sql);
        return empty($result_array) ? true : false;
    }
}
?>