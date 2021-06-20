<?php
if (isset($_POST['tambah'])) {
    $nim = $mahasiswa->conn->escape_string($_POST['nim']);
    $nama_lengkap = $mahasiswa->conn->escape_string($_POST['nama_lengkap']);
    $tgl_lahir = $mahasiswa->conn->escape_string($_POST['tgl_lahir']);
    $tempat_lahir = $mahasiswa->conn->escape_string($_POST['tempat_lahir']);

    $input_data = $mahasiswa->store($nim, $nama_lengkap, $tgl_lahir, $tempat_lahir);
    if ($input_data) { ?>
        <div class="alert alert-success" role="alert">
            Tambah data mahasiswa berhasil!
        </div>
    <?php    } else { ?>
        <div class="alert alert-danger" role="alert">
            Tambah data mahasiswa gagal :(
        </div>
<?php    }
}
?>
<form action="" method="POST">
    <div class="card-body">
        <h4 class="card-title">Add <?php echo $data; ?></h4>
        <div class="form-group">
            <label for="nama_lengkap">NIM</label>
            <input type="text" class="form-control" name="nim" required autofocus>
        </div>
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap" required autofocus>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" required autofocus>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" required autofocus>
        </div>
        <div class="form-group m-0">
            <input class="btn btn-primary btn-block" type="submit" value="Tambah" name="tambah">
        </div>
    </div>
</form>