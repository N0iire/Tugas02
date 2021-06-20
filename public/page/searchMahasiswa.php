<div class="row mt-4">
    <h1>Tabel Mahasiswa</h1>
    <table class="table table-bordered table-light">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $data['nim'] ?></td>
                <td><?php echo $data['nama_lengkap'] ?></td>
                <td><?php echo $data['tanggal_lahir'] ?></td>
                <td><?php echo $data['tempat_lahir'] ?></td>
                <td><a href="Public/Page/edit.php?p=Mahasiswa&e=<?php echo $data['nim'] ?>">
                        <button class="btn btn-success">Edit</button></a>
                    <a href="Public/Page/destroy.php?p=mahasiswa&d=<?php echo $data['nim'] ?>">
                        <button onclick="deleteConfirm()" class="btn btn-danger">Hapus</button></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>