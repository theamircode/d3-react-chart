<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;

final class HomeController extends Controller
{
    public function index(): void
    {
        $features = [
            'سیستم مدیریت کاربران و نقش‌ها',
            'ثبت درخواست لیزینگ و محاسبه اقساط',
            'پنل مدیریت با گزارش ساده',
        ];

        $this->view('home', ['features' => $features]);
    }
}
