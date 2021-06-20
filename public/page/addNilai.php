<?php
if (isset($_POST['tambah'])) {
    $id_matkul = $nilai->conn->escape_string($_POST['id_matkul']);
    $nim = $nilai->conn->escape_string($_POST['nim']);
    $tugas = $nilai->conn->escape_string($_POST['tugas']);
    $kehadiran = $nilai->conn->escape_string($_POST['kehadiran']);
    $uts = $nilai->conn->escape_string($_POST['uts']);
    $uas = $nilai->conn->escape_string($_POST['uas']);

    $input_data = $nilai->store($nim, $id_matkul, $kehadiran, $tugas, $uts, $uas);
    if ($input_data) { ?>
        <div class="alert alert-success" role="alert">
            Tambah data berhasil!
        </div>
    <?php    } else { ?>
        <div class="alert alert-danger" role="alert">
            Tambah data gagal :(
        </div>
<?php    }
}
$data_mk = $matakuliah->index();
?>
<form action="" method="POST">
    <div class="card-body">
        <h4 class="card-title">Add <?php echo $data; ?></h4>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama_lengkap">ID Matakuliah</label><br>
                <select name="id_matkul" class="custom-select">
                    <option>Pilih Matakuliah</option>
                    <?php foreach ($data_mk as $data) { ?>
                        <option value="<?php echo $data['Id_matkul'] ?>"><?php echo $data['nama_matkul'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" required autofocus>
            </div>
            <div class="form-group">
                <label for="tugas">Kehadiran</label>
                <input type="number" class="form-control" name="kehadiran" required autofocus>
            </div>
            <div class="form-group">
                <label for="tugas">Tugas</label>
                <input type="number" class="form-control" name="tugas" required autofocus>
            </div>
            <div class="form-group">
                <label for="uts">UTS</label>
                <input type="number" class="form-control" name="uts" required>
            </div>
            <div class="form-group">
                <label for="uas">UAS</label>
                <input type="number" class="form-control" name="uas" required>
            </div>
            <div class="form-group m-0">
                <input class="btn btn-primary btn-block" type="submit" value="tambah" name="tambah">
            </div>
        </form>
    </div>
</form>