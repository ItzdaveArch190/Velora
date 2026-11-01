<?php
    require_once 'app/config/database.php';

    $db =  new Database();
    $connection =  $db->opencon();

    echo "Databasse connected successfully!";
?>