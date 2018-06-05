<?php

require_once ('initialize.php');



class Contacten extends DatabaseObject
{
    protected static $table_name="contactpersoon";
    protected static $db_fields = ["Contactpersoon_ID", "Contactpersoon_Voornaam", "Contactpersoon_Tussenvoegsel", "Contactpersoon_Achternaam", "Contactpersoon_Email", "Contactpersoon_Telefoonnummer_prive", "Contactpersoon_Telefoonnummer_Zakelijk", "Contactpersoon_Bedrijfsnaam", "Contactpersoon_Standplaats"];

    public $Contactpersoon_ID;
    public $Contactpersoon_Voornaam;
    public $Contactpersoon_Tussenvoegsel;
    public $Contactpersoon_Achternaam;
    public $Contactpersoon_Email;
    public $Contactpersoon_Telefoonnummer_prive;
    public $Contactpersoon_Telefoonnummer_Zakelijk;
    public $Contactpersoon_Bedrijfsnaam;
    public $Contactpersoon_Standplaats;

    public function full_name()
    {
        if(isset($this->Contactpersoon_Voornaam) &&
            isset($this->Contactpersoon_Tussenvoegsel) &&
            isset($this->Contactpersoon_Achternaam))
        {
            return $this->Contactpersoon_Voornaam . " " .$this->Contactpersoon_Tussenvoegsel . " " . $this->Contactpersoon_Achternaam;
        }
        else if(isset($this->Contactpersoon_Voornaam) &&
            isset($this->Contactpersoon_Achternaam))
        {
            return $this->Contactpersoon_Voornaam . " " . $this->Contactpersoon_Achternaam;
        }
        else{
            return "";
        }
    }




    public function make($array){

        global $database;

        if(!empty($array['tnaam'])){
            $sql = "INSERT INTO ";
            $sql .=  'contactpersoon (Contactpersoon_Voornaam, Contactpersoon_Tussenvoegsel, Contactpersoon_Achternaam, ';
            $sql .= 'Contactpersoon_Email, Contactpersoon_Telefoonnummer_prive, Contactpersoon_Telefoonnummer_Zakelijk, Contactpersoon_Bedrijfsnaam, Contactpersoon_Standplaats) ';
            $sql .= 'VALUES ('. " '". $database->escape_value($array['vnaam']) . "' , ". " '". $database->escape_value($array['tnaam']) . "',".  " '". $database->escape_value($array['anaam']) . "' , ". " '". $database->escape_value($array['email']) . "' , ". " '". $database->escape_value($array['telnummerprive']) . "' ,";
            $sql .=  " '". $database->escape_value($array['telnummerzakelijk']) . "' , ". " '". $database->escape_value($array['bedrijf']) . "' , "." '". $database->escape_value($array['standplaats']) ."' )";

        } else{
            $sql = "INSERT INTO ";
            $sql .=  'contactpersoon (Contactpersoon_Voornaam, Contactpersoon_Achternaam, ';
            $sql .= 'Contactpersoon_Email, Contactpersoon_Telefoonnummer_prive, Contactpersoon_Telefoonnummer_Zakelijk, Contactpersoon_Bedrijfsnaam, Contactpersoon_Standplaats) ';
            $sql .= 'VALUES ('. " '". $database->escape_value($array['vnaam']) . "' , ". " '". $database->escape_value($array['anaam']) . "' , ". " '". $database->escape_value($array['email'])  . "' , ". " '". $database->escape_value($array['telnummerprive']) . "' ,";
            $sql .=  " '". $database->escape_value($array['telnummerzakelijk']) . "' , ". " '". $database->escape_value($array['bedrijf']) . "' , "." '". $database->escape_value($array['standplaats']) ."' )";
        }
        $database->query($sql);
        return ($database->affected_rows() ==1) ? true : false;
    }

    public function edit($array){

        global $database;

        $sql = "UPDATE ";
        $sql .=  'contactpersoon SET Contactpersoon_Voornaam = '. " '". $database->escape_value($array['vnaam']) . "' , ";
        empty($database->escape_value($array['tnaam'])) ?
            $sql .=  'Contactpersoon_Tussenvoegsel = '." '". " ". "' , " : $sql .=  'Contactpersoon_Tussenvoegsel = '." '". $database->escape_value($array['tnaam']) . "' , ";
        $sql .=  'Contactpersoon_Achternaam = '." '". $database->escape_value($array['anaam']) . "' , ";
        $sql .=  'Contactpersoon_Email = '." '". $database->escape_value($array['email']) . "' , ";
        $sql .=  'Contactpersoon_Telefoonnummer_prive = '." '". $database->escape_value($array['telnummerprive']) . "' , ";
        $sql .=  'Contactpersoon_Telefoonnummer_Zakelijk = '." '". $database->escape_value($array['telnummerzakelijk']) . "' , ";
        $sql .=  'Contactpersoon_Bedrijfsnaam = '." '". $database->escape_value($array['bedrijfsnaam']) . "' , ";
        $sql .=  'Contactpersoon_Standplaats = '." '". $database->escape_value($array['standplaats']) . "' ";
        $sql .=  'WHERE Contactpersoon_ID = '." '". $this->Contactpersoon_ID. "'";

        $database->query($sql);
        return ($database->affected_rows() ==1) ? true : false;
    }


}


?>