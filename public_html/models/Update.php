<?php

    class Update
    {

        public static function updateAll()
        {

            $db = Db::getConnection();

            $stmt = $db->prepare(INSERT);
            $stmt->execute();

            echo '<br>this is updateAll';

            return true;

        }

        public static function updateCategory($category)
        {

            $db = Db::getConnection();

            $stmt = $db->prepare(INSERT);
            $stmt->execute();

            echo '<br>this is updateAll';

            return true;

        }

        public static function updateType($type, $category)
        {

            $db = Db::getConnection();

            // Update only if dir exists
            $dirName = ROOT . '/public/img/' . $type . '/' . $category;

            if (is_dir($dirName))
            {

                $dirName = $dirName . '/*';

                $dir = new DirectoryIterator(dirname($dirName));

                // Delete current items for specified category and type
                Update::deleteRecords($type, $category, $db);

                // Add new items
                foreach ($dir as $fileinfo)
                {
                    if (!$fileinfo->isDot()) {

                        // Converting file name (adding leading zeroes)
                        $fName = $fileinfo->getFilename();
                        $order = intval($fName);
                        $display = intval(!strpos($fName, 't'));
                        $crop = Update::cropType($fName);

                        $path = sprintf('/public/img/%s/%s/'
                              . $fName, $type, $category);

                        // Preparing and executing query filled with variables
                        $stmtAdd = $db->prepare("INSERT INTO items "
                                 . "(name, path, category, type, "
                                 . "crop, display_order, display) "
                                 . "VALUES (:name, :path, :category, "
                                 . ":type, :crop, :order, :display);");

                        $stmtAdd->execute(array(
                            ':name' => $fName,
                            ':path' => $path,
                            ':category' => $category,
                            ':type' => $type,
                            ':crop' => $crop,
                            ':order' => $order,
                            ':display' => $display,
                        ));

                    }
                }

                return true;
            }
            else
            {
                echo 'This directory does not exists.';
                return false;
            }
        }

        private static function deleteRecords($type, $category, $db)
        {
            // Delete current items
            $stmtDel = $db->prepare("DELETE FROM items "
                     . "WHERE category = :category AND type = :type;");
            $stmtDel->execute(array(
                ':category' => $category,
                ':type' => $type
            ));

            return true;
        }

        private static function cropType($fName)
        {
            if (strpos($fName, '_p_'))
                return 'portrait';
            elseif (strpos($fName, '_pt_'))
                return 'portrait-top';
            else
                return 'landscape';
        }
    }
?>
