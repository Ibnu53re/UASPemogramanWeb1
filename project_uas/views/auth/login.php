<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Login</h2>

<form method="POST" action="/project_uas/auth/auth">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>

<?php include __DIR__ . '/../layout/footer.php'; ?>
