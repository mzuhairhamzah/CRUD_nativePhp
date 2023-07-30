<?php
$title = 'Edit Mahasiswa';

include_once 'layout/header.php';

// check if button edit-items is clicked
if (isset($_POST['edit-mahasiswa'])) {
    if (update_mahasiswa($_POST) > 0) {
        echo "<script>
        alert('Data successfully edited');
        document.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script>
        alert('Data failed to edit');
        document.location.href = 'mahasiswa.php';
        </script>";
    }
}

// get id_mahasiswa from url

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

# check if data mahasiswa is clicked
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0]; //array 0 because it's only one data

?>
<div class="container mt-5">
    <h1>Edit Mahasiswa</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
        <input type="hidden" name="fotoLama" value="<?= $mahasiswa['foto']; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Name</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama mahasiswa..."
                value="<?= $mahasiswa['nama_mhs']; ?>" required>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label>
                <select name="prodi" id="prodi" class="form-control" required>
                    <?php $prodi = $mahasiswa['prodi']; ?>
                    <option value="Teknik Informatika" <?= $prodi == 'Teknik Informatika' ? 'selected' : null ?>>Teknik
                        Informatika
                    </option>
                    <option value="Sistem Informasi" <?= $prodi == 'Sistem Informasi' ? 'selected' : null ?>>Sistem
                        Informasi</option>
                    <option value="Teknologi Informasi" <?= $prodi == 'Teknologi Informasi' ? 'selected' : null ?>>
                        Teknologi Informasi
                    </option>
                    <option value="Ilmu Komputer" <?= $prodi == 'Ilmu Komputer' ? 'selected' : null ?>>Ilmu Komputer
                    </option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control" required>
                    <?php $jk = $mahasiswa['jk']; ?>
                    <option value="Laki-laki" <?= $jk == 'Laki-laki' ? 'selected' : null ?>>Laki-laki</option>
                    <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon..."
                    value="<?= $mahasiswa['telepon']; ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email..."
                    value="<?= $mahasiswa['email']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" onchange="previewImg()">
                <img src="assets/images/<?= $mahasiswa['foto']; ?>" alt="" class="img-thumbnail img-preview mt-2"
                    width="100px">
            </div>
        </div>
        <button type="submit" name="edit-mahasiswa" class="btn btn-primary" style="float: right">Edit Mahasiswa</button>
    </form>
</div>
<!-- Preview Images -->
<script>
function previewImg() {
    const foto = document.querySelector('#foto');
    const imgPreview = document.querySelector('.img-preview');

    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);

    fileFoto.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}
<?php include_once 'layout/footer.php' ?>