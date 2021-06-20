<div class="row mt-4">
    <h1>Tabel Matakuliah</h1>
    <table class="table table-bordered table-light">
        <thead>
            <tr>
                <th scope="col">ID Matakuliah</th>
                <th scope="col">Nama Matakuliah</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $data['Id_matkul'] ?></td>
                <td><?php echo $data['nama_matkul'] ?></td>
                <td><a href="Public/Page/edit.php?p=Matakuliah&e=<?php echo $data['Id_matkul'] ?>">
                        <button class="btn btn-success">Edit</button></a>
                    <a href="Public/Page/destroy.php?p=matakuliah&d=<?php echo $data['Id_matkul'] ?>">
                        <button onclick="deleteConfirm()" class="btn btn-danger">Hapus</button></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>