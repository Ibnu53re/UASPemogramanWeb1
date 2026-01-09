<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Edit Produk</h2>

<form method="POST">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" value="<?= $product['name'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" value="<?= $product['price'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control"><?= $product['description'] ?></textarea>
    </div>

    <button class="btn btn-primary">Update</button>
</form>

<?php include __DIR__ . '/../layout/footer.php'; ?>
