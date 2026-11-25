<?php
declare(strict_types=1);

class Manager extends Employee {
    public function calculateBonus(): float {
        return $this->salary * 0.2; // 20% от оклада
    }
}
