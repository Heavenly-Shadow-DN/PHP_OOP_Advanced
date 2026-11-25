<?php
declare(strict_types=1);

class Order {
    public function __construct(
        private User $user,
        private array $products,
    ) {}

    public function getTotal(): float {
        $total = 0;
        foreach ($this->products as $p) {
            $total += $p->getPrice();
        }
        return $total;
    }
}
