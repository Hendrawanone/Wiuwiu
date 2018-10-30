<?php

session_start();

if( isset($_SESSION["login"]) ) {
    header("Location: admin/");
    exit;
}

require 'functions.php';

if( isset($_POST["kirim"]) ) {

  if( insert($_POST) > 0 ) {
    $success = true;
  } else {
    $failed = false;
  }

}

?>
<!doctype html>
<html lang="en" id="home">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon.ico"/>
    <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" type="text/css" href="css/css.css">

    <title>Wiu Wiu Gratis</title>
    
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
      <div class="container">
      <a class="navbar-brand page-scroll text-danger" href=""><img src="img/logo.png" width="80">Wiu Wiu gratis</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link page-scroll" href="#home">Beranda</a>
          <a class="nav-item nav-link page-scroll" href="#about">Tentang Kami</a>
          <a class="nav-item nav-link page-scroll" href="#layanan">Layanan</a>
          <a class="nav-item nav-link page-scroll" href="#kontak">Kontak Kami</a>
        </div>
      </div>
    </div>
    </nav>

    <section class="header">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Ambulance <b>gratis</b> <br> untuk masyarakat <b>Malang</b></h1>
        </div>
      </div>
    </section>

    <section class="about" id="about">
     <div class="container">
       <h3 class="text-center judul" style="opacity:0;">Tentang Kami</h3>
       <div class="row mt-5">
         <div class="col-lg-5 col-md-12">
          <div class="image"></div>
         </div>
         <div class="col-lg-7 col-md-12">
           <h3>Tujuan kami mengadakan <b>Program</b> <br> <b>Wiu Wiu</b> gratis</h3>
           <p class="mt-4">
             Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
           </p>
           <a href="#kontak" class="btn btn-danger mt-4 page-scroll">Pesan Wiu-wiu</a>
          </div>
         </div>
       </div>
     </div>
    </section>

    <section class="layanan" id="layanan">
      <div class="container">
        <h3 class="text-center judul">Layanan</h3>
        <div class="row text-center mt-5">
          <div class="col-lg-4">
            <div class="box">
              <img src="img/2.png">
              <p class="mt-4 text-center">Antar Jemput<br>Pasien Sakit</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="box">
              <img src="img/1.png">
              <p class="mt-4 text-center">Antar Jenazah<br>ke Pemakaman</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="box">
              <img src="img/4.png">
              <p class="mt-4 text-center">Tanggap Darurat<br>Korban Bencana</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="batas">
      <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
          <h1 class="display-4">Keadaan darurat? Butuh Pertolongan sekarang?</h1>
          <p class="lead">Ambulance Medical Service, Gratis untuk semua umat. Layanan 24 jam tanpa henti</p>
        </div>
      </div>
    </section>

    <section class="kontak bg-light" id="kontak">
      <div class="container">
        <h3 class="text-center judul">Kontak Kami</h3>
        <div class="box mt-5">
          <div class="row mt-5">
            <div class="col-lg-6">
                <?php if(isset($success)) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Pesanan anda berhasil tekirim</strong> Tunggu informasi selanjutnya dari kami!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php elseif(isset($failed)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Pesanan anda tidak tekirim</strong> Silahkan coba lagi!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif; ?>
              <h4 class="ml-3"  >Pemesanan Wiu-wiu gratis</h4>
                <form method="POST" action="" class="mt-3">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nama" name="nama">
                  </div>
                  <div class="form-group">
                    <input type="tel" class="form-control" placeholder="No. HP" name="hp">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Keperluan" name="keperluan">
                  </div>
                  <div class="form-group">
                    <input type="datetime-local" class="form-control" placeholder="Tanggal / Jam" name="date">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" rows="6" placeholder="Alamat" name="alamat"></textarea>
                  </div>
                  <button type="submit" class="btn btn-danger" name="kirim">Kirim</button>
                </form>
              </div>
            
              <div class="col-lg-5 text">
                <h4>Kantor Pusat</h4>
                <ul>
                  <li>Jalan Akordion Utara Tunggulwulung  RT 12 Rw 1 Kel. Tunggulwulung Kec. Lowokwaru, Kota Malang</li>
                  <li>Email: info@asakita.or.id</li>
                  <li>Call Center :0811-3525-442</li>
                  <li>Ambulance Gratis:087-700-607-700</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="footer">
      <div class="card bg-dark">
        <p class="card-header text-white text-center">Copyright ©2018 All Rights Reserved by PrimaItech</p>
      </div>
    </section>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>