<?php
/**
 * Created by PhpStorm.
 * User: nancy
 * Date: 10-3-2018
 * Time: 12:34
 */
// If it's going to need the database, then it's
// probably smart to requiere it before we start.

class DatabaseObject {

    protected static $table_name="gebruikers";
    protected static $db_fields = ["Gebruikers_ID", "Gebruikers_Voornaam", "Gebruikers_Tussenvoegsel", "Gebruikers_Achternaam", "Gebruikers_Email", "Gebruikers_Telefoonnummer", "Gebruikers_Gebruikersnaam", "Gebruikers_Wachtwoord", "Gebruikers_Rol"];

    public static function find_all(){
        return static::find_by_sql("SELECT * FROM ".static::$table_name);
    }

    public static function find_by_id($id=0) {
        global $database;
        $result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE Gebruikers_ID ={$database->escape_value($id)} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static  function find_by_sql($sql=""){
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while ($row = $database->fetch_array($result_set)){
            $object_array[] = static::instantiate($row);
        }

        return $object_array;
    }

    //WEET NIET OF WE DIE MOETEN GEBRUIKEN.
    public static function count_all(){
        global $database;
        $sql = "SELECT COUNT(*) FROM ".static::$table_name;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }

    private static function instantiate($record){
        $object = new static();
        foreach ($record as $attribute=>$value){
            if ($object->has_attribute($attribute)){
                $object->$attribute = $value;
            }

        }
        return $object;
    }

    // returnt een array van alle atributen van de tabel in de database
    protected function has_attribute($attribute){
        return array_key_exists($attribute , $this->attributes());
    }

    // returns an array of attribute keys and their values
    protected function attributes(){
        $attributes = array();
        foreach (static::$db_fields as $field){
            if(property_exists($this, $field)){
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    // returnt een array van alle atributen van de tabel in de database met keys
    protected function sanitized_attributes(){
        global $database;
        $clean_attributes = array();
        // sanitize the values before submitting
        // Note: Does not alter te actual value of each attribute
        foreach ($this->attributes() as $key => $value){
            $clean_attributes[$key] = $database->escape_value($value);
        }
        return $clean_attributes;
    }

    // UPDATE CREATE DELETE

    public function create(){

        global $database;
        //Don't forget your SQL syntax and good habits:
        //- INSERT INTO table (key, key) VALUES ('value', 'value')
        //- single-quotes around all values
        //- escape all values to prevent SQL injection
        $attributes = $this->sanatized_attributes();

        $sql = "INSERT INTO ".self::$table_name." (";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";

        if($database->query($sql))
        {
            $this->id = $database->insert_id();
            return true;
        }
        else
        {
            return false;
        }
    }

    public function update(){

        global $database;
        //Dont forget your SQL syntax and good habits:
        // - UPDATE table SET key='value', key='value' WHERE condition
        // - single-quotes around all values
        // - escape all values to prevent SQL injection
        $attributes = $this->sanatized_attributes();
        $attribute_pairs = array();
        foreach ($attributes as $key => $value)
        {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE ".self::$table_name." SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE Gebruikers_ID =". $database->escape_value($this->id);

        $database->query($sql);
        return ($database->affected_rows() ==1) ? true : false;

    }

    public function delete(){
        global $database;

        $sql = "DELETE FROM ".static::$table_name." WHERE Gebruikers_ID = ". $database->escape_value($this->Gebruikers_ID) . " LIMIT 1";
        $database->query($sql);

        return ($database->affected_rows() == 1) ? true : false;
    }
}
