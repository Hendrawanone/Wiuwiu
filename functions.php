<?php

$conn = mysqli_connect("localhost", "root", "", "wiuwiu");


function insert($data) {

    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $hp = htmlspecialchars($data["hp"]);
    $keperluan = htmlspecialchars($data["keperluan"]);
    $date = htmlspecialchars($data["date"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "INSERT INTO pesanan VALUES('', '$nama', '$hp', '$keperluan', '$date', '$alamat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}