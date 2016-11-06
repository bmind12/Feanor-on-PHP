<?php


    class Categories
    {

        public static function displayCategories($type)
        {

            $host = 'mysql.hostinger.cz';
            $name = 'u533740761_serge';
            $user = 'u533740761_serge';
            $password = '&ber2mU5F5wCaf=?R6';

            $db = new PDO("mysql:host=$host; dbname=$name", $user, $password);

            $categories = array();

            $stmt = $db->prepare("SELECT c.description "
                  . "FROM categories c "
                  . "WHERE c.type = ? "
                  . "ORDER BY c.order ASC;");

            $stmt->bindParam(1, $type, PDO::PARAM_STR);

            $stmt->execute();

            $i = 0;

            while ($row = $stmt->fetch())
            {
                $categories[$i++] = $row['description'];
            }

            return $categories;

        }

    }

?>
