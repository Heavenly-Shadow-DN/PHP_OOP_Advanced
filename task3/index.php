<?php
declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$shapes = [
    new Circle(5),
    new Rectangle(4, 6),
    new Triangle(3, 4, 5),
];

foreach ($shapes as $shape) {
    echo $shape->describe() . PHP_EOL;
}

// new Shape(); — ошибка: Shape объявлен abstract, у него не реализованы
// area() и perimeter(), поэтому объект такого "пустого" класса создавать нельзя.
// PHP прямо запрещает new для абстрактных классов.


// Вывод в терминале:
// Круг: площадь = 78.54, периметр = 31.42
// Прямоугольник: площадь = 24.00, периметр = 20.00
// Треугольник: площадь = 6.00, периметр = 12.00