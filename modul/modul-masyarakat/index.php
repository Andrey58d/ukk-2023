<?php 
include('../../asset/header.php');
include('../../koneksi/koneksi.php');
@session_start();
if($_SESSION['username'] == ''){
    @header('location:../../index.php');
}
?>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../modul-masyarakat/">Masyarakat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../modul-pengaduan/">Pengaduan</a>
        </li>
        <?php 
            if($_SESSION['level'] == 'masyarakat'){
                ?> 
                    <li class="nav-item">
                        <a class="nav-link disabled">Petugas</a>
                    </li>
                <?php
            }else{
                ?> 
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../modul-petugas">Petugas</a>
                    </li>
                <?php
            }
        ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../modul-tanggapan">Tanggapan</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../modul-auth/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">NIK</th>
      <th scope="col">Nama</th>
      <th scope="col">Username</th>
      <th scope="col">Nomor Telpon</th>
    </tr>
  </thead>
  <tbody>
        <?php
            include('../../koneksi/koneksi.php');
            $q = mysqli_query($con, "SELECT * FROM masyarakat WHERE verif='1'");
            while($m = mysqli_fetch_object($q)){
                ?> 
                    <tr>
                        <td><?= $m -> nik ?></td>
                        <td><?= $m -> nama ?></td>
                        <td><?= $m -> username ?></td>
                        <td><?= $m -> telp ?></td>
                    </tr>
                <?php
            }
        ?>
  </tbody>
</table>
</body>