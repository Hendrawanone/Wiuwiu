<?php

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}

require '../functions.php';

$id = $_GET["id"];

$query = "UPDATE tugas SET status = 'Dibatalkan' WHERE id = $id";

mysqli_query($conn, $query);

header("Location: table.php");
exit;