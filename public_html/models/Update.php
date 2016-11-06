<?php


    class Update
    {

        public static function updateAll()
        {

            $host = 'mysql.hostinger.cz';
            $name = 'u533740761_serge';
            $user = 'u533740761_serge';
            $password = '&ber2mU5F5wCaf=?R6';

            $db = new PDO("mysql:host=$host; dbname=$name", $user, $password);

            $stmt = $db->prepare(INSERT);
            $stmt->execute();

            echo '<br>this is updateAll';

            return true;

        }

        public static function updateCategory($category)
        {

            $host = 'mysql.hostinger.cz';
            $name = 'u533740761_serge';
            $user = 'u533740761_serge';
            $password = '&ber2mU5F5wCaf=?R6';

            $db = new PDO("mysql:host=$host; dbname=$name", $user, $password);

            echo '<br>this is updateCategory';

            return true;

        }

        public static function updateType($type, $category)
        {

            $host = 'mysql.hostinger.cz';
            $name = 'u533740761_serge';
            $user = 'u533740761_serge';
            $password = '&ber2mU5F5wCaf=?R6';

            // echo $category;
            // echo $type;

            $db = new PDO("mysql:host=$host; dbname=$name", $user, $password);

            $dirName = ROOT . '/public/img/' . $type . '/' . $category;

            echo '<br><br>' . $dirName;
            echo '<br><br>';

            $dir = new DirectoryIterator(dirname());

            foreach ($dir as $fileinfo)
            {
                if (!$fileinfo->isDot()) {
                    var_dump($fileinfo->getFilename());
                }
            }

            // $stmt = $db->prepare(INSERT);
            // $stmt->execute();

            return true;

        }

    }

?>
