<h2 class="mb-4">ثبت‌نام</h2>
<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>
<form method="post" action="/register" class="card card-body">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8') ?>">
    <div class="mb-3">
        <label class="form-label">نام</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">ایمیل</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">رمز عبور</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-success">ایجاد حساب</button>
</form>
