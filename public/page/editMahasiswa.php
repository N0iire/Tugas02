<?php
$update = $mahasiswa->view($data);
if (isset($_POST['ubah'])) {
    $nim = $mahasiswa->conn->escape_string($data);
    $nama_lengkap = $mahasiswa->conn->escape_string($_POST['nama_lengkap']);
    $tgl_lahir = $mahasiswa->conn->escape_string($_POST['tgl_lahir']);
    $tempat_lahir = $mahasiswa->conn->escape_string($_POST['tempat_lahir']);

    $input_data = $mahasiswa->update($nim, $nama_lengkap, $tgl_lahir, $tempat_lahir);
    if ($input_data) { ?>
        <div class="alert alert-success" role="alert">
            Edit data mahasiswa berhasil!
        </div>
    <?php    } else { ?>
        <div class="alert alert-danger" role="alert">
            Edit data mahasiswa gagal :(
        </div>
<?php    }
}
?>
<form action="" method="POST">
    <div class="card-body">
        <h4 class="card-title">Edit <?php echo $page; ?></h4>
        <div class="form-group">
            <label for="nama_lengkap">NIM</label>
            <input type="text" value="<?php echo $update['nim'] ?>" class="form-control" name="nim" disabled>
        </div>
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" value="<?php echo $update['nama_lengkap'] ?>" class="form-control" name="nama_lengkap" required autofocus>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" value="<?php echo $update['tanggal_lahir'] ?>" class="form-control" name="tgl_lahir" required autofocus>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" value="<?php echo $update['tempat_lahir'] ?>" class="form-control" name="tempat_lahir" required autofocus>
        </div>
        <div class="form-group m-0">
            <input class="btn btn-primary btn-block" type="submit" value="Ubah" name="ubah">
        </div>
    </div>
</form>