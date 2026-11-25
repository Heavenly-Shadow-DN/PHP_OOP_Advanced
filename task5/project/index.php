<?php
declare(strict_types=1);

// PSR-4-автозагрузчик: App\ -> src/
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

use App\Book;
use App\Electronics;
use App\Product;

$catalog = [
    new Book("Книга «Мёртвые души»", 800),
    new Book("Книга «Война и мир»", 1200),
    new Electronics("Ноутбук", 50000, 10),
    new Electronics("Смартфон", 30000, 15),
    new Electronics("Телевизор", 45000, 5),
];

$total = 0;
foreach ($catalog as $item) {
    echo $item->getInfo() . PHP_EOL;
    $total += $item->getFinalPrice();
}

echo "Сумма конечных цен по каталогу: " . round($total, 2) . " руб." . PHP_EOL;
echo "Всего товаров создано: " . Product::getCount() . PHP_EOL;

// Вывод в терминале:
// Книга «Мёртвые души»: базовая цена = 800, конечная цена = 960
// Книга «Война и мир»: базовая цена = 1200, конечная цена = 1440
// Ноутбук: базовая цена = 50000, конечная цена = 66000
// Смартфон: базовая цена = 30000, конечная цена = 41400
// Телевизор: базовая цена = 45000, конечная цена = 56700
// Сумма конечных цен по каталогу: 166500 руб.
// Всего товаров создано: 5