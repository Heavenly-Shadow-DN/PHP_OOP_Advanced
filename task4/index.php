<?php
declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$employees = [
    new Manager("Иванов", 100000),
    new Manager("Смирнов", 90000),
    new Developer("Петров", 80000, 5),
    new Developer("Сидоров", 60000, 1),
    new Developer("Кузнецов", 3000, 0), // премия 450 < MIN_BONUS, вернётся 500
];

$total = 0;
foreach ($employees as $e) {
    echo $e->getInfo() . PHP_EOL;
    $total += $e->getSalary() + $e->calculateBonus();
}

echo "Сотрудников: " . Employee::getEmployeeCount() . PHP_EOL;
echo "Общая сумма выплат: " . $total . PHP_EOL;


// Вывод в терминале:
// Иванов: оклад = 100000, премия = 20000
// Петров: оклад = 80000, премия = 17000
// Кузнецов: оклад = 3000, премия = 500
// Сотрудников: 5
// Общая сумма выплат: 398500