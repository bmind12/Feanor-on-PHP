<?php


    class Items
    {

        public static function displayItems($type, $category)
        {

            $db = Db::getConnection();

            $items = array();

            $stmt = $db->prepare("SELECT c.name, c.path "
                  . "FROM items c "
                  . "WHERE c.type = :type AND c.category = :category "
                  . "ORDER BY c.name ASC;");
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':category', $category);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

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
