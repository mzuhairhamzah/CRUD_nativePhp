<?php
include 'config/app.php';

// get id_mahasiswa from url

$id_mahasiswa = (int)$_GET['id_mahasiswa'];
// check if button add-mahasiswa is clicked
if (delete_mahasiswa($id_mahasiswa) > 0) {
    echo "<script>
        alert('Data successfully deleted');
        document.location.href = 'mahasiswa.php';
        </script>";
} else {
    echo "<script>
        alert('Data failed to delete');
        document.location.href = 'mahasiswa.php';
        </script>";
}