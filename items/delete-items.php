<?php
include 'config/app.php';

// get id_items from url

$id_items = (int)$_GET['id_items'];
// check if button add-items is clicked
if (delete_items($id_items) > 0) {
    echo "<script>
        alert('Data successfully deleted');
        document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
        alert('Data failed to delete');
        document.location.href = 'index.php';
        </script>";
}