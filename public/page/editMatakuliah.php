<?php
$update = $matakuliah->view($data);
if (isset($_POST['update'])) {
    $id_matkul = $matakuliah->conn->escape_string($data);
    $nama_matkul = $matakuliah->conn->escape_string($_POST['nama_matkul']);
    $input_data = $matakuliah->update($id_matkul, $nama_matkul);
    if ($input_data) { ?>
        <div class="alert alert-success" role="alert">
            Edit data matakuliah berhasil!
        </div>
    <?php    } else { ?>
        <div class="alert alert-danger" role="alert">
            Edit data matakuliah gagal :(
        </div>
<?php    }
}
?>
<form action="" method="POST">
    <div class="card-body">
        <h4 class="card-title">Edit <?php echo $page; ?></h4>
        <div class="form-group">
            <label for="nama_lengkap">ID Matakuliah</label>
            <input type="text" value="<?php echo $update['Id_matkul'] ?>" class="form-control" name="id_matkul" disabled>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Nama Matakuliah</label>
            <input type="text" value="<?php echo $update['nama_matkul']; ?>" class="form-control" name="nama_matkul" required autofocus>
        </div>
        <div class="form-group m-0">
            <input class="btn btn-primary btn-block" type="submit" value="Update" name="update">
        </div>
    </div>
</form>