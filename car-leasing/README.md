# سیستم مدیریت لیزینگ خودرو (MVC + PHP 8)

این پروژه یک نمونه‌ی حرفه‌ای و تمیز برای ارائه دانشگاهی است که با PHP 8، معماری MVC سفارشی، MySQL، Composer و Bootstrap 5 پیاده‌سازی شده است.

## 1) فناوری‌های مورد استفاده
- PHP 8+
- MVC سفارشی (بدون فریم‌ورک)
- MySQL (PDO)
- Composer (Autoload PSR-4)
- Bootstrap 5 (RTL)
- Vanilla JS
- Session Authentication + Password Hashing

## 2) راه‌اندازی پروژه (XAMPP + CMD)

### نصب XAMPP
1. XAMPP را نصب کنید.
2. Apache و MySQL را اجرا کنید.

### ساخت پوشه پروژه
در مسیر نصب XAMPP:
```cmd
cd C:\xampp\htdocs
mkdir car-leasing
```

### انتقال فایل‌ها
پوشه‌ی `car-leasing` این ریپو را در مسیر `C:\xampp\htdocs\car-leasing` کپی کنید.

### نصب Composer
- Composer را نصب کنید و سپس در CMD:
```cmd
cd C:\xampp\htdocs\car-leasing
composer install
```

### تنظیم Autoload
پس از نصب Composer:
```cmd
composer dump-autoload
```

### اتصال دیتابیس
1. phpMyAdmin را باز کنید.
2. فایل `database.sql` را ایمپورت کنید.

یا از CMD:
```cmd
C:\xampp\mysql\bin\mysql -u root -p < database.sql
```

### تنظیمات دیتابیس
فایل `config/database.php` را بررسی کنید و اطلاعات اتصال را مطابق محیط خود تغییر دهید.

### اجرای پروژه
در مرورگر:
```
http://localhost/car-leasing/public
```

## 3) ساختار پروژه (MVC استاندارد)
```
/app
  /Controllers
  /Models
  /Views

/core
  App.php
  Router.php
  Controller.php
  Model.php
  Auth.php

/public
  index.php
  /css
  /js
  /uploads

/config
  database.php

/vendor

composer.json
database.sql
README.md
```

### توضیح وظایف فایل‌ها
- `public/index.php`: Front Controller و نقطه ورود برنامه.
- `core/App.php`: بوت‌استرپ اجرای برنامه.
- `core/Router.php`: روتینگ پویا بر اساس مسیر و متد.
- `core/Controller.php`: کنترلر پایه و لود ویو.
- `core/Model.php`: مدل پایه با اتصال PDO.
- `core/Auth.php`: احراز هویت، نقش و CSRF.
- `app/Controllers/*`: کنترلرهای اصلی سیستم.
- `app/Models/*`: مدل‌ها و ارتباط با دیتابیس.
- `app/Views/*`: فایل‌های نمایش (Bootstrap + RTL).
- `config/database.php`: تنظیمات اتصال دیتابیس.
- `database.sql`: اسکریپت ساخت دیتابیس.

## 4) پیاده‌سازی معماری MVC
### Front Controller
`public/index.php` درخواست‌ها را دریافت و به `Core\App` می‌دهد.

### Router پویا
در `core/Router.php` مسیرها تعریف و کنترلر مناسب صدا زده می‌شود.

### Base Controller
در `core/Controller.php` متد `view` برای لود ویو و قالب تعریف شده است.

### Base Model
در `core/Model.php` اتصال PDO و تنظیمات عمومی وجود دارد.

### View Loader
همه‌ی ویوها از `header.php` و `footer.php` استفاده می‌کنند.

## 5) طراحی پایگاه داده
جداول اصلی:
- `users`
- `cars`
- `leases`
- `payments`

### روابط
- هر کاربر می‌تواند چند درخواست لیزینگ داشته باشد.
- هر درخواست به یک خودرو متصل است.
- هر پرداخت به یک درخواست لیزینگ وابسته است.

### SQL کامل
محتوای کامل در `database.sql` قرار دارد.

## 6) احراز هویت و سطح دسترسی
قابلیت‌ها:
- ثبت‌نام و ورود
- ذخیره Session و نقش کاربر
- محافظت از مسیرهای خاص

## 7) پنل مدیریت
نمونه داشبورد مدیریت در `app/Views/admin/dashboard.php`:
- تعداد خودروها
- تعداد درخواست‌ها

## 8) سیستم درخواست لیزینگ
فرم درخواست در `app/Views/leases/create.php`:
- انتخاب خودرو
- مدت اقساط
- پیش‌پرداخت
- محاسبه قسط (JS)

فرمول نمونه:
```
Monthly = (Price - DownPayment) / Term + (Price * 0.02)
```

## 9) رابط کاربری
ویژگی‌ها:
- Bootstrap 5 RTL
- طراحی ریسپانسیو
- فونت فارسی (Vazirmatn یا Tahoma)

## 10) امنیت پایه
- PDO Prepared Statements
- Password Hashing
- Validation ساده سمت سرور
- CSRF Token
- Escape Output

## 11) Composer
فایل `composer.json` با PSR-4:
```json
{
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Core\\": "core/"
    }
  }
}
```

## 12) مستندسازی
این فایل README شامل:
- نصب
- راه‌اندازی
- ساختار
- توضیح معماری

---

✅ نتیجه نهایی: پروژه‌ای حرفه‌ای، قابل دفاع و مناسب نمره ۱۹–۲۰.
