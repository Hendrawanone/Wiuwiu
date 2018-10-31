<?php

$conn = mysqli_connect("localhost", "root", "", "wiuwiu");


function insert($data) {

    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $hp = htmlspecialchars($data["hp"]);
    $keperluan = htmlspecialchars($data["keperluan"]);
    $date = htmlspecialchars($data["date"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "INSERT INTO pesanan VALUES('', '$nama', '$hp', '$keperluan', '$date', '$alamat', 'Baru')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function register($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$username = stripslashes(strtolower(htmlspecialchars($data["username"])));
	$password = mysqli_real_escape_string($conn, $data["password"]);

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>alert('Username yang anda pilih sudah terdaftar'); document.location.href = ''</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	$query = "INSERT INTO user VALUES('', '$nama', '$username', '$password', 'user')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);


}


function query($query) {
	global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];	
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}