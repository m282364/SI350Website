<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once('lib_read_csv.php');
    echo json_encode(read_csv('menuofferings.csv', true, false, ','));
?>