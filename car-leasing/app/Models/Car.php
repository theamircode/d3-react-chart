<?php

declare(strict_types=1);

namespace App\Models;

use Core\Model;

final class Car extends Model
{
    public function all(): array
    {
        $stmt = $this->db->query('SELECT * FROM cars ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }

    public function count(): int
    {
        $stmt = $this->db->query('SELECT COUNT(*) AS total FROM cars');
        return (int) $stmt->fetch()['total'];
    }
}
