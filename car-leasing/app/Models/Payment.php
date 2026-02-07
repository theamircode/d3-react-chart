<?php

declare(strict_types=1);

namespace App\Models;

use Core\Model;

final class Payment extends Model
{
    public function record(int $leaseId, float $amount): void
    {
        $stmt = $this->db->prepare('INSERT INTO payments (lease_id, amount) VALUES (:lease_id, :amount)');
        $stmt->execute([
            'lease_id' => $leaseId,
            'amount' => $amount,
        ]);
    }
}
