<?php
declare(strict_types=1);

namespace App;

class Book extends Product {
    public function getFinalPrice(): float {
        // цена с налогом
        return $this->price * (1 + self::TAX);
    }
}
