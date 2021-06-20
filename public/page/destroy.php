<?php
session_start();
if ($_SESSION['login']) {
    include_once('../../Controller/db_config.php');
    $table = $_GET['p'];
    $key = $_GET['d'];

    if ($table == "mahasiswa") {
        include '../../Controller/MahasiswaController.php';
        $mahasiswa = new Mahasiswa;
        $delete = $mahasiswa->destroy($key);
        if ($delete) {
            header('location:../../index.php?msg=dSuccess');
        } else {
            header('location:../../index.php?msg=dFail');
        }
    } else if ($table == "matakuliah") {
        include '../../Controller/MataKuliahController.php';
        $matkul = new Matakuliah;
        $delete = $matkul->destroy($key);
        if ($delete) {
            header('location:../../index.php?msg=dSuccess');
        } else {
            header('location:../../index.php?msg=dFail');
        }
    } else {
        include '../../Controller/Nilai.php';
        $nilai = new Nilai;
        $key2 = $_GET['d2'];
        $delete = $nilai->destroy($key, $key2);
        if ($delete) {
            header('location:../../index.php?msg=dSuccess');
        } else {
            header('location:../../index.php?msg=dFail');
        }
    }
} else {
    header('location:../../');
}
