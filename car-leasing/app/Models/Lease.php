<?php

declare(strict_types=1);

namespace App\Models;

use Core\Model;

final class Lease extends Model
{
    public function create(int $carId, int $userId, int $termMonths, float $downPayment): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO leases (car_id, user_id, term_months, down_payment, status) VALUES (:car_id, :user_id, :term_months, :down_payment, :status)'
        );

        $stmt->execute([
            'car_id' => $carId,
            'user_id' => $userId,
            'term_months' => $termMonths,
            'down_payment' => $downPayment,
            'status' => 'pending',
        ]);
    }

    public function count(): int
    {
        $stmt = $this->db->query('SELECT COUNT(*) AS total FROM leases');
        return (int) $stmt->fetch()['total'];
    }
}
