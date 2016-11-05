<?php


    class Categories
    {
        
        public static function displayCategories()
        {
        
            $host = 'mysql.hostinger.cz';
            $name = 'u533740761_serge';
            $username = 'u533740761_serge';
            $password = '&ber2mU5F5wCaf=?R6';
            
            $db = new PDO("mysql:host = $host; dbname = $name; $username; $password");
            
            $newList = array();
            
            $result = $db->query('SELECT description FROM categories ORDER BY order' );
            
            $i = 0;
            
            while ($row = $result->fetch())
            {
                $categories[$i++] = $row['description'];
            }
            
            return $categories;
            
        }
        
    }

?>