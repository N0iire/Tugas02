<div class="row mt-4">
    <h1>Tabel Nilai</h1>
    <table class="table table-bordered table-light">
        <thead>
            <tr>
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
            <?php } ?>
        </tbody>
    </table>
</div>