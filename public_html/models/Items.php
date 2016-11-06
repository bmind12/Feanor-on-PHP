<?php


    class Items
    {

        public static function displayItems($type, $category)
        {

            $host = 'mysql.hostinger.cz';
            $name = 'u533740761_serge';
            $user = 'u533740761_serge';
            $password = '&ber2mU5F5wCaf=?R6';

            $db = new PDO("mysql:host=$host; dbname=$name", $user, $password);

            $items = array();

            $stmt = $db->prepare("SELECT c.name, c.path "
                  . "FROM items c "
                  . "WHERE c.type = :type AND c.category = :category "
                  . "ORDER BY c.name ASC;");
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->execute();

            $i = 0;

            while ($row = $stmt->fetch())
            {
                $items[$i]['name'] = $row['name'];
                $items[$i++]['path'] = $row['path'];
            }

            return $items;

        }

    }


?>
