<?php

$title = 'Daftar Items';

require_once 'layout/header.php';

$details_item = select("SELECT * FROM items ORDER BY id_items DESC");
?>
<div class="container mt-5">
    <h1>List of Items</h1>
    <hr>

    <a href="add-items.php" class="btn btn-primary mt-3">Add Item</a>

    <table class="table table-bordered table-striped mt-4" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($details_item as $item) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <?= $item['name']; ?>
                    </td>
                    <td>
                        <?= $item['quantity']; ?>
                    </td>
                    <td>
                        Rp. <?= number_format($item['price'], 0, ',', '.'); ?>
                    </td>
                    <td>
                        <?= date('d-m-Y | H:i:s', strtotime($item['date'])); ?>
                    </td>
                    <td width="20%" class="text-center">
                        <a href="edit-items.php?id_items=<?= $item['id_items']; ?>" class="btn btn-success">Edit</a>
                        <a href="delete-items.php?id_items=<?= $item['id_items']; ?>" class="btn btn-danger" onclick="return confirm('Sudah yakin mau hapus datanya?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once 'layout/footer.php' ?>