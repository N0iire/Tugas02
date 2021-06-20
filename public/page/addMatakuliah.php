<?php
if (isset($_POST['tambah'])) {
    $id_matkul = $matakuliah->conn->escape_string($_POST['id_matkul']);
    $nama_matkul = $matakuliah->conn->escape_string($_POST['nama_matkul']);

    $input_data = $matakuliah->store($id_matkul, $nama_matkul);
    if ($input_data) { ?>
        <div class="alert alert-success" role="alert">
            Tambah data matakuliah berhasil!
        </div>
    <?php    } else { ?>
        <div class="alert alert-danger" role="alert">
            Tambah data matakuliah gagal :(
        </div>
<?php    }
}
?>
<form action="" method="POST">
    <div class="card-body">
        <h4 class="card-title">Add <?php echo $data; ?></h4>
        <div class="form-group">
            <label for="nama_lengkap">ID Matakuliah</label>
            <input type="text" class="form-control" name="id_matkul" required autofocus>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Nama Matakuliah</label>
            <input type="text" class="form-control" name="nama_matkul" required autofocus>
        </div>
        <div class="form-group m-0">
            <input class="btn btn-primary btn-block" type="submit" value="Tambah" name="tambah">
        </div>
    </div>
</form>