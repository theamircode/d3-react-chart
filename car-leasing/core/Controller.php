<?php

declare(strict_types=1);

namespace Core;

abstract class Controller
{
    protected function view(string $view, array $data = []): void
    {
        extract($data);
        $base = dirname(__DIR__);
        require $base . '/app/Views/partials/header.php';
        require $base . '/app/Views/' . $view . '.php';
        require $base . '/app/Views/partials/footer.php';
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . $path);
        exit;
    }
}
