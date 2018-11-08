<?php

session_start();

if( !isset($_SESSION["user"]) ) {
    header("Location: ../");
    exit;
}

require '../functions.php';

$id = $_GET["id"];

$query2 = "UPDATE tugas SET status = 'Terlaksana' WHERE id = $id";

mysqli_query($conn, $query2);

header("Location: table.php");
exit;