<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman login</title>
    <?php include('../../asset/header.php') ?>

    <?php 
    include('../../koneksi/koneksi.php');
    if(isset($_POST['daftar'])){
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];

        $q = mysqli_query($con, "INSERT INTO masyarakat (nik, nama, username, password, telp, verif) VALUES($nik, '$nama' ,'$username', '$password', '$telp', '0')");
    }
    
    ?>
</head>
<body>
   <div class="container-fluid">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-3">
            <div class="card">
            <div class="card-header bg-primary">
             halaman regristrasi
            </div>
            <form action="" method="post">
            <div class="card-body">
                <label for="nik" class="form-label">nik</label>
            <div class="input-group mb-3">
                <input required type="int" class="form-control" id="nik" name="nik" flaciholder="masukan nik" aria-describedby="basic-addon3">
            </div>
                <label for="namalengkap" class="form-label">namalengkap</label>
            <div class="input-group mb-3">
                <input required type="text" class="form-control" id="nama" name="nama" flaciholder="masukan namalengkap" aria-describedby="basic-addon3">
            </div>
                <label for="username" class="form-label">username</label>
            <div class="input-group mb-3">
                <input required type="text" class="form-control" id="username" name="username" flaciholder="masukan username" aria-describedby="basic-addon3">
            </div>
                <label for="Password" class="col-sm-2 col-form-label">Password</label>
            <div clas="mb-3 row">
                <input required type="password" class="form-control" id="Password" name="password">
            </div>
                <label for="no telepon" class="form-label">no telepon</label>
            <div class="input-group mb-3">
                <input required type="text" class="form-control" id="telp" name="telp" flaciholder="masukan nomer telepon" aria-describedby="basic-addon3">
            </div>
            <div class="d-grid gap-2">
            <button name="daftar" type="submit" class="btn btn-primary">Sign up</button>
            <div class="card-body">
                <div class="mb-3">
                </div>
                <a href="index.php">silahkan login</a>
            </div>
                </div>
            </div>
            </form>
        </div>    
    </div>
</div>
        
</body>
</html>