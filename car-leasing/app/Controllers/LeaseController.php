<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Car;
use App\Models\Lease;
use Core\Auth;
use Core\Controller;

final class LeaseController extends Controller
{
    public function create(): void
    {
        if (!Auth::check()) {
            $this->redirect('/login');
        }

        $carModel = new Car();
        $cars = $carModel->all();

        $this->view('leases/create', ['cars' => $cars]);
    }

    public function store(): void
    {
        if (!Auth::check()) {
            $this->redirect('/login');
        }

        if (!Auth::verifyCsrf($_POST['csrf_token'] ?? '')) {
            http_response_code(419);
            echo 'Invalid CSRF token';
            return;
        }

        $carId = (int) ($_POST['car_id'] ?? 0);
        $term = (int) ($_POST['term_months'] ?? 0);
        $downPayment = (float) ($_POST['down_payment'] ?? 0);

        if ($carId <= 0 || $term <= 0) {
            $this->view('leases/create', ['error' => 'اطلاعات درخواست ناقص است.']);
            return;
        }

        $leaseModel = new Lease();
        $leaseModel->create($carId, (int) $_SESSION['user_id'], $term, $downPayment);

        $this->redirect('/');
    }
}
