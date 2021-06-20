<?php
$data2 = $_GET['e2'];
$update = $nilai->view($data, $data2);
$matkul = $matakuliah->index();
if (isset($_POST['ubah'])) {
    $id_matkul_before = $nilai->conn->escape_string($data2);
    $nim_before = $nilai->conn->escape_string($data);

    $id_matkul = $nilai->conn->escape_string($_POST['id_matkul']);
    $nim = $nilai->conn->escape_string($_POST['nim']);
    $tugas = $nilai->conn->escape_string($_POST['tugas']);
    $kehadiran = $nilai->conn->escape_string($_POST['kehadiran']);
    $uts = $nilai->conn->escape_string($_POST['uts']);
    $uas = $nilai->conn->escape_string($_POST['uas']);
    $input_data = $nilai->update($nim, $id_matkul, $kehadiran, $tugas, $uts, $uas, $nim_before, $id_matkul_before);
    if ($input_data) { ?>
        <div class="alert alert-success" role="alert">
            Edit data nilai berhasil!
        </div>
    <?php    } else { ?>
        <div class="alert alert-danger" role="alert">
            Edit data nilai gagal :(
        </div>
<?php    }
}
?>
<form action="" method="POST">
    <div class="card-body">
        <h4 class="card-title">Edit <?php echo $data; ?> Dan <?php echo $data2; ?></h4>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama_lengkap">ID Matakuliah</label><br>
                <select name="id_matkul" class="custom-select">
                    <option>Pilih Matakuliah</option>
                    <?php foreach ($matkul as $data) { ?>
                        <option value="<?php echo $data['Id_matkul'] ?>"><?php echo $data['nama_matkul'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" value="<?php echo $update['nim'] ?>" class="form-control" name="nim" required autofocus>
            </div>
            <div class="form-group">
                <label for="tugas">Kehadiran</label>
                <input type="number" value="<?php echo $update['kehadiran'] ?>" class="form-control" name="kehadiran" required autofocus>
            </div>
            <div class="form-group">
                <label for="tugas">Tugas</label>
                <input type="number" value="<?php echo $update['tugas'] ?>" class="form-control" name="tugas" required autofocus>
            </div>
            <div class="form-group">
                <label for="uts">UTS</label>
                <input type="number" value="<?php echo $update['uts'] ?>" class="form-control" name="uts" required>
            </div>
            <div class="form-group">
                <label for="uas">UAS</label>
                <input type="number" value="<?php echo $update['uas'] ?>" class="form-control" name="uas" required>
            </div>
            <div class="form-group m-0">
                <input class="btn btn-primary btn-block" type="submit" value="Ubah" name="ubah">
            </div>
        </form>
    </div>
</form>