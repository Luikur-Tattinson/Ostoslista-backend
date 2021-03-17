<?php
require_once 'inc/functions.php';
require_once 'inc/headers.php';

try {
    $db = openDb();
    $sql = "select * from item";
    $query = $db->query($sql);
    $results = $query->FetchAll(PDO::FETCH_ASSOC);
    header('HTTP/1.1 200 OK');
    echo json_encode($results);
}
catch (PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex-getMessage());
    echo json_encode($error);
    exit;
}