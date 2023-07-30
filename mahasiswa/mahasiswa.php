<?php
$title = 'List Mahasiswa';

include_once 'layout/header.php';


// display data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>

<?php include_once 'layout/footer.php' ?>
<div class="container mt-5">
    <h1>Data Mahasiswa</h1>
    <hr>

    <a href="add-mahasiswa.php" class="btn btn-primary mt-3">Add Students</a>

    <table class="table table-bordered table-striped mt-4" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Prodi</th>
                <th>Gender</th>
                <th>Telepon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $mahasiswa['nama_mhs']; ?></td>
                <td><?= $mahasiswa['prodi']; ?></td>
                <td><?= $mahasiswa['jk']; ?></td>
                <td><?= $mahasiswa['telepon']; ?></td>
                <td class="text-center" width="20%">
                    <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'] ?>"
                        class="btn btn-secondary btn-sm">Detail</a>
                    <a href="edit-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>"
                        class="btn btn-success btn-sm"
                        onclick="return confirm('Apakah Anda Yakin Data Mahasiswa ingin diedit?')">Edit</a>
                    <a href="delete-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah Anda Yakin Data Mahasiswa ingin dihapus?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>