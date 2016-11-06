<?php


    class Categories
    {

        public static function displayCategories()
        {

            $host = 'mysql.hostinger.cz';
            $name = 'u533740761_serge';
            $user = 'u533740761_serge';
            $password = '&ber2mU5F5wCaf=?R6';

            $db = new PDO("mysql:host=$host; dbname=$name", $user, $password);

            $categories = array();

            $result = $db->query("SELECT * FROM categories c ORDER BY c.order ASC");

            $i = 0;

            while ($row = $result->fetch())
            {
                $categories[$i++] = $row['description'];
            }

            return $categories;

        }

    }

?>
