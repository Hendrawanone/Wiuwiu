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
	$foto = upload();

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>alert('Username yang anda pilih sudah terdaftar'); document.location.href = ''</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	$query = "INSERT INTO user VALUES('', '$nama', '$username', '$password', '$foto', 'user')";

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

function upload() {
	$namaFoto = $_FILES['foto']['name'];
	$ukuranFoto = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpFoto = $_FILES['foto']['tmp_name'];

	if( $error === 4 ) {
		echo "<script>alert('Pilih foto terlebih dahulu');</script>";
		return false;
	}

	$eksetensiFotoValid = ['jpg', 'jpeg', 'png'];
	$eksetensiFoto = explode('.', $namaFoto);
	$eksetensiFoto = strtolower(end($eksetensiFoto));

	if( !in_array($eksetensiFoto, $eksetensiFotoValid) ) {
		echo "<script>
				alert('Yang anda upload bukan foto');
			  </script>";
		return false;
	}

	if( $ukuranFoto > 1000000 ){
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	$namaFotoBaru = uniqid();
	$namaFotoBaru .= '.';
	$namaFotoBaru .= $eksetensiFoto;

	move_uploaded_file($tmpFoto, 'upload/' . $namaFotoBaru);

	return htmlspecialchars($namaFotoBaru);

}