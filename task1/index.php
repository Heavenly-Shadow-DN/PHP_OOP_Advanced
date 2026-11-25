<?php
declare(strict_types=1);

// автозагрузчик: подключает classes/ИмяКласса.php при первом обращении
spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$user = new User("Иван", "ivan@example.com");
$order = new Order($user, [
    new Product("Книга", 500.0),
    new Product("Ручка", 50.0),
]);

echo $user->getInfo() . PHP_EOL;
echo "Итого по заказу: " . $order->getTotal() . " руб." . PHP_EOL;

// Вывод в терминале:
// Иван (ivan@example.com)
// Итого по заказу: 550 руб.