<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman login</title>
    <?php include('../../asset/header.php'); ?>

    <?php 
        include('../../koneksi/koneksi.php');
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $pilihan = $_POST['pilihan'];
            if($pilihan == 'masyarakat'){
                $q = mysqli_query($con, "SELECT * FROM masyarakat WHERE username = '$username' AND verif = '1'");
                $r = mysqli_num_rows($q);
                if($r == 1){
                    $o = mysqli_fetch_object($q);
                    @session_start();
                    $_SESSION['username'] = $o -> username;
                    $_SESSION['password'] = $o -> password;
                    $_SESSION['nik'] = $o -> nik;
                    $_SESSION['nama'] = $o -> nama;
                    $_SESSION['telp'] = $o -> telp;
                    $_SESSION['level'] = $o -> level;
                    @header('location:../modul-masyarakat');
                }else{
                    ?> 
                        <div class="alert alert-danger" role="alert">
                        Data Salah atau Belum diverifikasi bro!
                        </div>
                    <?php
                }
            }elseif($pilihan == 'petugas'){
                $q = mysqli_query($con, "SELECT * FROM petugas WHERE username = '$username'");
                $r = mysqli_num_rows($q);
                if($r == 1){
                    $o = mysqli_fetch_object($q);
                    @session_start();
                    $_SESSION['id_petugas'] = $o -> id_petugas;
                    $_SESSION['nama_petugas'] = $o -> nama_petugas;
                    $_SESSION['username'] = $o -> username;
                    $_SESSION['password'] = $o -> password;
                    $_SESSION['telp'] = $o -> telp;
                    $_SESSION['level'] = $o -> level;
                    @header('location:../modul-petugas/');
                }else{
                    ?> 
                        <div class="alert alert-danger" role="alert">
                        Data Salah bro!
                        </div>
                    <?php
                }
            }
        }
    ?>
</head>
<body>
   <div class="container-fluid">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-3">
        <div class="card border-primary">
            <div class="card-header bg-primary">
                halaman login
            </div>
            <form action="" method="post">
                <div class="card-body">
                <label for="username" class="form-label">username</label>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" id="username" name="username" readdird placiholder="masukan username" aria-describedby="basic-addon3" required>
                    </div>
                </div>
                <div class="card-body">
                <label for="passwrd" class="form-label">password</label>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" readdird placiholder="masukan password" aria-describedby="basic-addon3" required>
                    </div>
                </div>
                <div class="card-body">
                <div class="mb-3">
                    <select name="pilihan" class="form-select" required aria-label="select example">
                    <option value="masyarakat">Masyarakat</option>
                    <option value="petugas">Petugas</option>
                    </select>
                    <div class="invalid-feedback">Example invalid select feedback</div>
                    </div>
                </div>
                <div class="card-body">
                <div class="d-grid gap-2">
                <button name="login" type="submit" class="btn btn-primary">Sign in</button>
               </div>
               </div>
               <div class="card-body">
                <div class="mb-3">
                <a href="regristrasi.php">silahkan regristrasi</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
 
