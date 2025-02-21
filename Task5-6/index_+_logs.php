<?php

require_once 'autoload.php';

use Classes\LightElementNode;
use Classes\LightTextNode;

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

// Логування старту програми
logMessage("Запуск програми для обробки тексту книги", 'INFO');

// Завантажуємо текст з файлу книги
$text = file_get_contents('kNIGGA.txt');

// Логування результату завантаження файлу
if ($text === false) {
    logMessage("Не вдалося завантажити файл kNIGGA.txt", 'ERROR');
    exit;
} else {
    logMessage("Текст з файлу успішно завантажено", 'INFO');
}

// Розбиваємо текст на рядки
$lines = explode("\n", $text);

// Створюємо контейнер для всієї HTML структури
$div = new LightElementNode('div');
$div->addClass('container');

// Логування створення контейнера
logMessage("Створено контейнер <div class='container'>", 'DEBUG');

// Обробка кожного рядка
foreach ($lines as $line) {
    $line = trim($line);  // Видаляємо зайві пробіли на початку та в кінці

    // Якщо рядок порожній, пропускаємо його
    if (empty($line)) continue;

    // Визначаємо тип елемента на основі правил
    if (strlen($line) < 20) {
        $element = new LightElementNode('h2');
        $element->addClass('text-primary');
        logMessage("Додано заголовок <h2> для рядка: '$line'", 'DEBUG');
    } elseif (substr($line, 0, 1) === ' ') {
        $element = new LightElementNode('blockquote');
        $element->addClass('blockquote');
        logMessage("Додано блок цитати <blockquote> для рядка: '$line'", 'DEBUG');
    } else {
        $element = new LightElementNode('p');
        $element->addClass('lead');
        logMessage("Додано параграф <p> для рядка: '$line'", 'DEBUG');
    }

    // Додаємо текстовий вузол
    $textNode = new LightTextNode($line);
    $element->appendChild($textNode);

    // Додаємо елемент до контейнера
    $div->appendChild($element);
}

// Генеруємо HTML
$htmlContent = $div->render();

// Логування генерації HTML
logMessage("HTML успішно згенеровано", 'INFO');

// Виводимо повний HTML із підключеними стилями
echo "<!DOCTYPE html>
<html lang='uk'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Книга</title>
    <!-- Підключаємо Bootstrap через CDN -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body>
    <div class='container mt-5'>
        $htmlContent
    </div>

    <!-- Підключаємо JS для Bootstrap -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>";

// Логування завершення роботи програми
logMessage("Програма завершила роботу успішно.", 'INFO');
?>
