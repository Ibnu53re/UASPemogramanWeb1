<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <!-- LINK DASHBOARD -->
        <a class="navbar-brand" href="/project_uas/dashboard/index">Dashboard</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- MENU KIRI -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/project_uas/product/index">Produk</a>
                </li>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/project_uas/product/add">Tambah Produk</a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- MENU KANAN -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/project_uas/auth/logout">Logout</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div class="container mt-4">
