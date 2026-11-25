<?php
declare(strict_types=1);

namespace App;

class Electronics extends Product {
    public function __construct(
        string $title,
        float $price,
        private float $warrantyPercent,
    ) {
        parent::__construct($title, $price);
    }

    public function getFinalPrice(): float {
        // цена с налогом плюс наценка за гарантию в процентах
        return $this->price * (1 + self::TAX) * (1 + $this->warrantyPercent / 100);
    }
}
