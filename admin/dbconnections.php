<?php
$servername = "localhost";
$username = "id15290160_taizianynn";
$password = "Essa@@3q444frfnnnndii$$%&";
$database = "id15290160_sirfixtc";

try {
    $con = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }
?>


