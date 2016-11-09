<?php


    class Display
    {
        public static function getCategories($type, $category = 'portraits')
        {

            $db = Db::getConnection();

            $categories = array();

            $stmt = $db->prepare("SELECT c.category, c.description, c.type "
                  . "FROM categories c "
                  . "WHERE c.type = :type "
                  . "ORDER BY c.order ASC;");

            $stmt->execute(array(':type' => $type));

            $i = 0;

            while ($row = $stmt->fetch())
            {
                $categories[$i]['name'] = $row['category'];
                $categories[$i]['description'] = $row['description'];
                $categories[$i]['type'] = $row['type'];

                if ($row['category'] == $category)
                    $categories[$i]['selected'] = 'selected-album';
                else
                    $categories[$i]['selected'] = false;

                $i++;
            }

            return $categories;

        }

        public static function getItems($type, $category)
        {

            $db = Db::getConnection();

            $items = array();

            $stmt = $db->prepare("SELECT c.name, c.path, c.crop "
                  . "FROM items c "
                  . "WHERE c.type = :type AND c.category = :category "
                  . "ORDER BY c.display_order ASC;");

            $stmt->execute(array(
                ':type' => $type,
                ':category' => $category,
            ));

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $i = 0;

            while ($row = $stmt->fetch())
            {
                $items[$i]['name'] = $row['name'];
                $items[$i]['path'] = $row['path'];
                $items[$i++]['crop'] = $row['crop'];
            }

            return $items;

        }

        public static function getMenus()
        {

            $db = Db::getConnection();

            $menus = array();

            $stmt = $db->prepare("SELECT m.name "
                  . "FROM menus m "
                  . "WHERE m.display = 1 "
                  . "ORDER BY m.display_order ASC;");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $i = 0;

            while ($row = $stmt->fetch())
            {
                $menus[$i++]['name'] = $row['name'];

                // if ($row['name'] == $menu)
                //     $menus[$i]['selected'] = 'selected';
                // else
                //     $menus[$i]['selected'] = false;
                //
                // $i++;
            }

            return $menus;

        }

    }


?>
