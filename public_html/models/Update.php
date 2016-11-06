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

            echo '<br>this is updateCategory';

            return true;

        }

        public static function updateType($type, $category)
        {

            $db = Db::getConnection();

            // Do update only if dir exists
            $dirName = ROOT . '/public/img/' . $type . '/' . $category;

            if (is_dir($dirName))
            {

                $dirName = $dirName . '/*';

                $dir = new DirectoryIterator(dirname($dirName));

                // Delete current items
                $stmtDel = $db->prepare("DELETE FROM items "
                         . "WHERE category = :category AND type = :type;");
                $stmtDel->bindParam(':type', $type);
                $stmtDel->bindParam(':category', $category);
                $stmtDel->execute();

                // Add new items
                foreach ($dir as $fileinfo)
                {
                    if (!$fileinfo->isDot()) {
                        $fileName = $fileinfo->getFilename();
                        $path = sprintf('/public/img/%s/%s/', $type, $category);

                        $stmtAdd = $db->prepare("INSERT INTO items "
                              . "(name, path, category, type) "
                              . "VALUES (:name, :path, :category, :type);");
                        $stmtAdd->bindParam(':category', $category);
                        $stmtAdd->bindParam(':type', $type);
                        $stmtAdd->bindParam(':name', $fileName);
                        $stmtAdd->bindParam(':path', $path);
                        $stmtAdd->execute();
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
    }
?>
