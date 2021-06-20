<?php
session_start();
include '../../Controller/db_config.php';
include_once('../../Controller/MahasiswaController.php');
include_once('../../Controller/MataKuliahController.php');
include_once('../../Controller/NilaiController.php');

if ($_SESSION['login']) {
    $page = $_GET['p'];
    $data = $_GET['e'];
    $mahasiswa = new Mahasiswa();
    $matakuliah = new Matakuliah();
    $nilai = new Nilai();
} else {
    header('location:../../');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Tugas 02 ATOL 10119120/Add<?php echo $page; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Sistem Penilian</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../../">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $email = $_SESSION['email']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?q=logout">Logout <i class="bi bi-power"></i></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container h-100">
        <div class="row mt-5 justify-content-center">
            <div class="card">
                <?php
                if ($page == "Mahasiswa") {
                    include 'editMahasiswa.php';
                }
                if ($page == "Matakuliah") {
                    include 'editMatakuliah.php';
                }
                if ($page == "Nilai") {
                    include 'editNilai.php';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>