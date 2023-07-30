<?php
$title = 'Tambah Items';

include_once 'layout/header.php';

// check if button add-items is clicked
if (isset($_POST['add-items'])) {
    if (create_items($_POST) > 0) {
        echo "<script>
        alert('Data successfully added');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data failed to add');
        document.location.href = 'index.php';
        </script>";
    }
}
?>
<div class="container mt-5">
    <h1>Add Items</h1>
    <hr>

    <form action="" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="item-name..." required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="item-quantity..."
                required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="item-price..." required>
        </div>

        <button type="submit" name="add-items" class="btn btn-primary" style="float: right">Add Items</button>
    </form>
</div>
<?php include_once 'layout/footer.php' ?>