<?php
$host="localhost";
//    $port=3306;
//    $socket="";
    $user="booksearch";
    $password="xRvvVfRuhERXDvW8";
    $dbname="booksearch_fblikes";
    
    $db = new mysqli($host, $user, $password, $dbname)
        or die ('Could not connect to the database server' . mysqli_connect_error());

?>
