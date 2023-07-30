<?php
$title = 'Detail Mahasiswa';

include_once 'layout/header.php';


// get id_mahasiswa from url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

// display data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
?>

<?php include_once 'layout/footer.php' ?>
<div class="container mt-5">
    <h1>Data <?= $mahasiswa['nama_mhs']; ?></h1>
    <hr>

    <table class="table table-bordered table-striped mt-4">
        <tr>
            <td>Nama</td>
            <td>: <?= $mahasiswa['nama_mhs'] ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>: <?= $mahasiswa['prodi'] ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?= $mahasiswa['jk'] ?></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>: <?= $mahasiswa['telepon'] ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?= $mahasiswa['email'] ?></td>
        </tr>
        <tr>
            <td width="30%">Foto</td>
            <td>
                <a href="assets/images/<?= $mahasiswa['foto']; ?>">
                    <img src="assets/images/<?= $mahasiswa['foto']; ?>" alt="foto" width="30%">
                </a>
            </td>
        </tr>
    </table>
    <a href="mahasiswa.php" class="btn btn-secondary btn-md" style="float : right">Back</a>
</div>