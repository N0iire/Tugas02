<?php
session_start();
if ($_SESSION['login']) {
    include '../../Controller/db_config.php';
    include_once('../../Controller/MahasiswaController.php');
    include_once('../../Controller/MataKuliahController.php');
    include_once('../../Controller/NilaiController.php');

    $nilai = new Nilai();
    $table = $_GET['p'];

    if ($table == "mahasiswa") {
        $placeholder = "NIM";
        $key = "nim";
    }
    if ($table == "matakuliah") {
        $placeholder = "ID Matakuliah";
        $key = "Id_matkul";
    }
    if ($table == "nilai") {
        $placeholder = "NIM/ID Matakuliah";
        $key = "data";
    }
    if (isset($_POST['search'])) {
        if ($table == "mahasiswa") {
            $mahasiswa = new Mahasiswa();
            $nim = $_POST['nim'];
            $data = $mahasiswa->view($nim);
        }
        if ($table == "matakuliah") {
            $matakuliah = new Matakuliah();
            $id_matkul = $_POST['Id_matkul'];
            $data = $matakuliah->view($id_matkul);
        }
        if ($table == "nilai") {
            $nilai = new Nilai();
            $or = $_POST['data'];
            $dataNilai = $nilai->search($or);
        }
    }
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
    <title>Search <?php echo $table ?></title>
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
        <div class="row d-flex justify-content-center mt-5">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="search">Search <?php echo $table ?></label>
                    <input type="text" class="form-control" id="search" placeholder="Masukan <?php echo $placeholder; ?>" name="<?php echo $key; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Search" name="search">
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST['search'])) {
            if ($table == "mahasiswa") {
                include 'searchMahasiswa.php';
            }
            if ($table == "matakuliah") {
                include 'searchMatakuliah.php';
            }
            if ($table == "nilai") {
                include 'searchNilai.php';
            }
        }
        ?>
    </div>
</body>

</html>
<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>