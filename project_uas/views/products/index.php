<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Daftar Produk</h2>

<form method="GET" class="mb-3">
    <input type="text" name="search" value="<?= htmlspecialchars($search) ?>"
           class="form-control" placeholder="Cari nama produk">
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['name'] ?></td>
                <td><?= $p['price'] ?></td>
                <td><?= $p['description'] ?></td>

                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <td>
                        <a href="/project_uas/product/edit/<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/project_uas/product/delete/<?= $p['id'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- PAGINATION -->
<nav>
    <ul class="pagination">
        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link"
                   href="?page=<?= $i ?>&search=<?= urlencode($search) ?>">
                   <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<?php include __DIR__ . '/../layout/footer.php'; ?>
