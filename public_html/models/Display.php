<?php


    class Display
    {
        public static function displayCategories($type)
        {

            $db = Db::getConnection();

            $categories = array();

            $stmt = $db->prepare("SELECT c.description "
                  . "FROM categories c "
                  . "WHERE c.type = :type "
                  . "ORDER BY c.order ASC;");

            $stmt->execute(array(':type' => $type));

            $i = 0;

            while ($row = $stmt->fetch())
                $categories[$i++] = $row['description'];

            return $categories;

        }

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
