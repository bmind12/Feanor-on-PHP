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
                        $fInt = intval($fName);
                        $fIntFrmt = sprintf('%04d', intval($fName));
                        $fName = str_replace($fInt, $fIntFrmt, $fName);

                        $path = sprintf('/public/img/%s/%s/', $type, $category);

                        // Preparing and executing query filled with variables
                        $stmtAdd = $db->prepare("INSERT INTO items "
                              . "(name, path, category, type) "
                              . "VALUES (:name, :path, :category, :type);");
                        $stmtAdd->execute(array(
                            ':category' => $category,
                            ':type' => $type,
                            ':name' => $fName,
                            ':path' => $path
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
    }
?>
