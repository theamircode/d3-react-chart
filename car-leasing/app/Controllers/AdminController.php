<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Car;
use App\Models\Lease;
use Core\Auth;
use Core\Controller;

final class AdminController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) {
            http_response_code(403);
            echo 'Forbidden';
            return;
        }

        $carModel = new Car();
        $leaseModel = new Lease();

        $stats = [
            'cars' => $carModel->count(),
            'leases' => $leaseModel->count(),
        ];

        $this->view('admin/dashboard', ['stats' => $stats]);
    }
}
