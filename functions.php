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


function tambah_driver($data) {

    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $nik = htmlspecialchars($data["nik"]);
    $sim = htmlspecialchars($data["sim"]);
    $foto = driver();
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "INSERT INTO driver VALUES('', '$nama', '$telepon', '$nik', '$sim', '$foto', '$alamat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function tambah_armada($data) {

    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nopol = htmlspecialchars($data["nopol"]);
    $mobil = htmlspecialchars($data["mobil"]);

    $query = "INSERT INTO armada VALUES('', '$nama', '$nopol', '$mobil')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function tugas($data) {

    global $conn;

    $id = $data["id"];
    $driver = $data["driver"];
    $armada = $data["armada"];

    $data_pesanan = query("SELECT * FROM pesanan WHERE id = $id")[0];
    $data_driver = query("SELECT * FROM driver WHERE nama = '$driver'")[0];
    $data_armada = query("SELECT * FROM armada WHERE nama = '$armada'")[0];

    $ubah = "UPDATE pesanan SET status = 'Konfirasi' WHERE id = $id";

	mysqli_query($conn, $ubah);

    $nama_pemesan = $data_pesanan["nama"];
    $telepon_pemesan = $data_pesanan["telepon"];
    $keperluan_pemesan = $data_pesanan["keperluan"];
    $tanggal_pemesan = $data_pesanan["waktu"];
    $alamat_pemesan = $data_pesanan["alamat"];
    $nama_driver = $data_driver["nama"];
    $telepon_driver = $data_driver["telepon"];
    $alamat_driver = $data_driver["alamat"];
    $nama_armada = $data_armada["nama"];
    $mobil_armada = $data_armada["mobil"];
    $nopol_armada = $data_armada["nopol"];
    $status = 'Tugas';

    $query = "INSERT INTO tugas VALUES('', '$nama_pemesan', '$telepon_pemesan', '$keperluan_pemesan', '$tanggal_pemesan', '$alamat_pemesan', '$nama_driver', '$telepon_driver', '$alamat_driver', '$nama_armada', '$mobil_armada', '$nopol_armada', '$status')";

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

function driver() {
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

	move_uploaded_file($tmpFoto, 'foto/' . $namaFotoBaru);

	return htmlspecialchars($namaFotoBaru);

}