<?php

use Core\Auth;

Auth::start();
$csrfToken = Auth::csrfToken();
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>سامانه لیزینگ خودرو</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">لیزینگ خودرو</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="/leases/create">درخواست لیزینگ</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin">پنل مدیریت</a></li>
            </ul>
            <ul class="navbar-nav">
                <?php if (Auth::check()): ?>
                    <li class="nav-item">
                        <form method="post" action="/logout">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8') ?>">
                            <button class="btn btn-outline-light btn-sm">خروج</button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="/login">ورود</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">ثبت‌نام</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<main class="container py-4">
