<?php
session_start();
include_once('./Controller/UserController.php');
include_once('./Controller/MahasiswaController.php');
include_once('./Controller/MataKuliahController.php');
include_once('./Controller/NilaiController.php');
if ($_SESSION['login']) {
    $email = $_SESSION['email'];
    $user = new User();
    $mahasiswa = new Mahasiswa();
    $matkul = new Matakuliah();
    $nilai = new Nilai();

    $dataMhs = $mahasiswa->index();
    $dataMatkul = $matkul->index();
    $dataNilai = $nilai->index();
    $admin = $user->get_user($email);

    if (!$user->get_session()) {
        header("location:./Public/Page/login.php");
    }

    if (isset($_GET['q'])) {
        $user->logout();
        header("location:./Public/Page/login.php");
    }
} else {
    header("location:./Public/Page/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Tugas 02 ATOL UNIKOM</title>
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
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mahasiswa
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Public/page/add.php?p=Mahasiswa">Tambah Mahasiswa</a>
                        <a class="dropdown-item" href="Public/page/search.php?p=mahasiswa">Search Mahasiswa</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Matakuliah
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Public/page/add.php?p=Matakuliah">Tambah Matakuliah</a>
                        <a class="dropdown-item" href="Public/page/search.php?p=matakuliah">Search Matakuliah</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nilai
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Public/page/add.php?p=Nilai">Tambah Nilai</a>
                        <a class="dropdown-item" href="Public/page/search.php?p=nilai">Search Nilai</a>
                    </div>
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
    <div class="container">
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            if ($msg == "dSuccess") { ?>
                <div class="alert alert-success" role="alert">
                    Delete data berhasil!
                </div>
            <?php    } else { ?>
                <div class="alert alert-danger" role="alert">
                    Delete data gagal :(
                </div>
        <?php    }
        } ?>
        <div class="row mt-4">
            <h1>Tabel Mahasiswa</h1>
            <table class="table table-bordered table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($dataMhs as $data) { ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $data['nim'] ?></td>
                            <td><?php echo $data['nama_lengkap'] ?></td>
                            <td><?php echo $data['tanggal_lahir'] ?></td>
                            <td><?php echo $data['tempat_lahir'] ?></td>
                            <td><a href="Public/Page/edit.php?p=Mahasiswa&e=<?php echo $data['nim'] ?>">
                                    <button class="btn btn-success">Edit</button></a>
                                <a href="Public/Page/destroy.php?p=mahasiswa&d=<?php echo $data['nim'] ?>">
                                    <button onclick="deleteConfirm()" class="btn btn-danger">Hapus</button></a>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <h1>Tabel Matakuliah</h1>
            <table class="table table-bordered table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Matakuliah</th>
                        <th scope="col">Nama Matakuliah</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($dataMatkul as $data) { ?>
                        <tr>
                            <th scope="col"><?php echo $i ?></th>
                            <td><?php echo $data['Id_matkul'] ?></td>
                            <td><?php echo $data['nama_matkul'] ?></td>
                            <td><a href="Public/Page/edit.php?p=Matakuliah&e=<?php echo $data['Id_matkul'] ?>">
                                    <button class="btn btn-success">Edit</button></a>
                                <a href="Public/Page/destroy.php?p=matakuliah&d=<?php echo $data['Id_matkul'] ?>">
                                    <button onclick="deleteConfirm()" class="btn btn-danger">Hapus</button></a>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <h1>Tabel Nilai</h1>
            <table class="table table-bordered table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Matakuliah</th>
                        <th scope="col">Nilai Kehadiran</th>
                        <th scope="col">Nilai Tugas</th>
                        <th scope="col">Nilai UTS</th>
                        <th scope="col">Nilai UAS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($dataNilai as $data) { ?>
                        <tr>
                            <th scope="col"><?php echo $i; ?></th>
                            <td><?php echo $data['nama_lengkap'] ?></td>
                            <td><?php echo $data['nama_matkul'] ?></td>
                            <td><?php echo $data['kehadiran'] ?></td>
                            <td><?php echo $data['tugas'] ?></td>
                            <td><?php echo $data['uts'] ?></td>
                            <td><?php echo $data['uas'] ?></td>
                            <td><a href="Public/Page/edit.php?p=Nilai&e=<?php echo $data['nim'] ?>&e2=<?php echo $data['Id_matkul'] ?>">
                                    <button class="btn btn-success">Edit</button></a>
                                <a href="Public/Page/destroy.php?p=nilai&d=<?php echo $data['nim'] ?>&d2=<?php echo $data['Id_matkul'] ?>">
                                    <button onclick="deleteConfirm()" class="btn btn-danger">Hapus</button></a>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<script>
    function deleteConfirm() {
        confirm("Confirm for deleting!")
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>