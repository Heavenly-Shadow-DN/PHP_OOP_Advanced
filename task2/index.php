<?php
declare(strict_types=1);

// PSR-4: пространство App\ -> папка src/
spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/src/';

    if (str_starts_with($class, $prefix)) {
        $relative = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

use App\Models\Product;
use App\Services\PriceFormatter;

$product = new Product("Ноутбук", 1250.50);

echo $product->getTitle() . " — " . PriceFormatter::format($product->getPrice()) . PHP_EOL;

// Вывод в терминале:
// Ноутбук — 1 250.50 руб.