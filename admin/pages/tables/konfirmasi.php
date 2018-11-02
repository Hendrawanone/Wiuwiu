<?php

session_start();

if( !isset($_SESSION["admin"]) ) {
    header("Location: ../");
    exit;
}

require '../../../functions.php';

$id = $_GET["id"];

$query = "UPDATE pesanan SET status = 'Konfirasi' WHERE id = $id";

mysqli_query($conn, $query);

header("Location: data.php");
exit;