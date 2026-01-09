<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Tambah Produk</h2>

<form method="POST" action="/project_uas/product/add">
    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Tambah</button>
</form>

<?php include __DIR__ . '/../layout/footer.php'; ?>
