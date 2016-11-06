<?php


    class Update
    {

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

        public static function updateType($category, $type)
        {

            $host = 'mysql.hostinger.cz';
            $name = 'u533740761_serge';
            $user = 'u533740761_serge';
            $password = '&ber2mU5F5wCaf=?R6';

            $db = new PDO("mysql:host=$host; dbname=$name", $user, $password);

            echo '<br>this is updateType';

            return true;

        }

        public static function updateAll()
        {

            $host = 'mysql.hostinger.cz';
            $name = 'u533740761_serge';
            $user = 'u533740761_serge';
            $password = '&ber2mU5F5wCaf=?R6';

            $db = new PDO("mysql:host=$host; dbname=$name", $user, $password);

            echo '<br>this is updateAll';

            return true;

        }

    }

?>
