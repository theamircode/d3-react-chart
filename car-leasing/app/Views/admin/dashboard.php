<h2 class="mb-4">داشبورد مدیریت</h2>
<div class="row g-3">
    <div class="col-md-6">
        <div class="card text-bg-light">
            <div class="card-body">
                <h5 class="card-title">تعداد خودروها</h5>
                <p class="display-6 mb-0"><?= (int) $stats['cars'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-bg-light">
            <div class="card-body">
                <h5 class="card-title">تعداد درخواست‌ها</h5>
                <p class="display-6 mb-0"><?= (int) $stats['leases'] ?></p>
            </div>
        </div>
    </div>
</div>
