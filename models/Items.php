<?php


    class Items
    {
        
        public static function displayItems()
        {
        
        $host = "localhost";
        $name = "feanor";
        $username = "bmind";
        $password = "3vXt73bGW7mEcGnI";
        
        $db = new PDO("mysql:host = $host; dbname = $name; $username; $password");
        
        $newList = array();
        
        return true;
        
        }
        
    }


?>