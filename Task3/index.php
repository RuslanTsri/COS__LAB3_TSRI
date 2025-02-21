<?php
require_once 'autoload.php';

use classes\Circle;
use classes\Square;
use classes\Triangle;
use classes\VectorRenderer;
use classes\RasterRenderer;

// Функція для логування з кольоровим виводом
function logMessage(string $message, string $type = 'INFO'): void {
    // Використовуємо ANSI escape-коди для різних типів логів
    $colorCodes = [
        'INFO' => "\033[32m", // зелений
        'ERROR' => "\033[31m", // червоний
        'WARN' => "\033[33m", // жовтий
        'DEBUG' => "\033[34m", // синій
    ];

    $color = $colorCodes[$type] ?? $colorCodes['INFO'];
    echo $color . "[{$type}] " . $message . "\033[0m\n";
}

// Логування запуску програми
logMessage("Запуск графічного редактора для рендерингу фігур.", 'INFO');

// Ініціалізація рендерерів
logMessage("Ініціалізація векторного рендерера (VectorRenderer).", 'DEBUG');
$vectorRenderer = new VectorRenderer();

logMessage("Ініціалізація растрового рендерера (RasterRenderer).", 'DEBUG');
$rasterRenderer = new RasterRenderer();

// Створення та рендеринг фігур для векторної графіки
logMessage("Рендеринг фігур у векторній графіці:", 'INFO');

logMessage("Створення кола для векторного рендеру. Передано рендерер: " . get_class($vectorRenderer), 'DEBUG');
$circleVector = new Circle($vectorRenderer);
logMessage("Початок рендерингу кола (вектор). Викликаємо метод draw().", 'DEBUG');
$circleVector->draw();

logMessage("Створення квадрата для векторного рендеру. Передано рендерер: " . get_class($vectorRenderer), 'DEBUG');
$squareVector = new Square($vectorRenderer);
logMessage("Початок рендерингу квадрата (вектор). Викликаємо метод draw().", 'DEBUG');
$squareVector->draw();

logMessage("Створення трикутника для векторного рендеру. Передано рендерер: " . get_class($vectorRenderer), 'DEBUG');
$triangleVector = new Triangle($vectorRenderer);
logMessage("Початок рендерингу трикутника (вектор). Викликаємо метод draw().", 'DEBUG');
$triangleVector->draw();

// Створення та рендеринг фігур для растрової графіки
logMessage("Рендеринг фігур у растровій графіці:", 'INFO');

logMessage("Створення кола для растрового рендеру. Передано рендерер: " . get_class($rasterRenderer), 'DEBUG');
$circleRaster = new Circle($rasterRenderer);
logMessage("Початок рендерингу кола (растр). Викликаємо метод draw().", 'DEBUG');
$circleRaster->draw();

logMessage("Створення квадрата для растрового рендеру. Передано рендерер: " . get_class($rasterRenderer), 'DEBUG');
$squareRaster = new Square($rasterRenderer);
logMessage("Початок рендерингу квадрата (растр). Викликаємо метод draw().", 'DEBUG');
$squareRaster->draw();

logMessage("Створення трикутника для растрового рендеру. Передано рендерер: " . get_class($rasterRenderer), 'DEBUG');
$triangleRaster = new Triangle($rasterRenderer);
logMessage("Початок рендерингу трикутника (растр). Викликаємо метод draw().", 'DEBUG');
$triangleRaster->draw();

// Логування завершення роботи
logMessage("Програма завершила рендеринг фігур.", 'INFO');
?>
