<?php
$title = 'Tambah Mahasiswa';

include_once 'layout/header.php';

// check if button add-items is clicked
if (isset($_POST['add-mahasiswa'])) {
    if (create_mahasiswa($_POST) > 0) {
        echo "<script>
        alert('Data successfully added');
        document.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script>
        alert('Data failed to add');
        document.location.href = 'mahasiswa.php';
        </script>";
    }
}
?>
<div class="container mt-5">
    <h1>Add Mahasiswa</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Name</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama mahasiswa..." required>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label>
                <select name="prodi" id="prodi" class="form-control" required>
                    <option value="">-- pilih prodi --</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                    <option value="Ilmu Komputer">Ilmu Komputer</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control" required>
                    <option value="">-- pilih jenis kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" onchange="previewImg()">

                <img src="" alt="" class="img-thumbnail img-preview mt-2" width="100px">
            </div>
        </div>
        <button type="submit" name="add-mahasiswa" class="btn btn-primary" style="float: right">Add Mahasiswa</button>
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
</script>
<?php include_once 'layout/footer.php' ?>