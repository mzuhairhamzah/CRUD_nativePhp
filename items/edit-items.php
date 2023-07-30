<?php
$title = 'Ubah Items';

include_once 'layout/header.php';

// get id_items from url
$id_items = (int)$_GET['id_items'];

// check if button add-items is clicked
$items = select("SELECT * FROM items WHERE id_items = $id_items")[0];
if (isset($_POST['edit-items'])) {
    if (update_items($_POST) > 0) {
        echo "<script>
        alert('Data successfully updated');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data failed to update');
        document.location.href = 'index.php';
        </script>";
    }
}
?>
<div class="container mt-5">
    <h1>Edit Items</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_items" value="<?= $items['id_items']; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $items['name']; ?>" placeholder="item-name..." required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $items['quantity']; ?>" placeholder="item-quantity..." required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?= $items['price']; ?>" placeholder="item-price..." required>
        </div>

        <button type="submit" name="edit-items" class="btn btn-primary" style="float: right">Edit</button>
    </form>
</div>
<?php include_once 'layout/footer.php' ?>