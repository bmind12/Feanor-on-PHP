<?php

    echo 'this is insertion.php';

    $dbhost = "localhost";
    $dbname = "pdo";
    $dbusername = "root";
    $dbpassword = "845625";

    $link = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);

    // $statement = $link->prepare("INSERT INTO testtable(name, lastname, age)
    //     VALUES(:fname, :sname, :age)");
    // $statement->execute(array(
    //     "fname" => "Bob",
    //     "sname" => "Desaunois",
    //     "age" => "18"
    // ));

?>
