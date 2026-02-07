<h1 class="fw-bold mb-4">سیستم مدیریت لیزینگ خودرو</h1>
<p class="lead">یک نمونه‌ی ساده و حرفه‌ای برای پروژه دانشگاهی با معماری MVC، PHP 8 و MySQL.</p>
<div class="row g-3">
    <?php foreach ($features as $feature): ?>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <p class="mb-0"><?= htmlspecialchars($feature, ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
