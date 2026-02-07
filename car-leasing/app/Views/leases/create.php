<h2 class="mb-4">ثبت درخواست لیزینگ</h2>
<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>
<form method="post" action="/leases" class="card card-body" id="lease-form">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8') ?>">
    <div class="mb-3">
        <label class="form-label">انتخاب خودرو</label>
        <select name="car_id" class="form-select" id="car-select" required>
            <option value="">انتخاب کنید</option>
            <?php foreach ($cars as $car): ?>
                <option value="<?= (int) $car['id'] ?>" data-price="<?= (float) $car['price'] ?>">
                    <?= htmlspecialchars($car['model'], ENT_QUOTES, 'UTF-8') ?> - <?= number_format((float) $car['price']) ?> تومان
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">مدت اقساط (ماه)</label>
        <input type="number" name="term_months" class="form-control" id="term-months" min="6" max="60" required>
    </div>
    <div class="mb-3">
        <label class="form-label">پیش‌پرداخت (تومان)</label>
        <input type="number" name="down_payment" class="form-control" id="down-payment" min="0" required>
    </div>
    <div class="alert alert-info" id="monthly-result">قسط ماهانه: -</div>
    <button class="btn btn-primary">ثبت درخواست</button>
</form>
