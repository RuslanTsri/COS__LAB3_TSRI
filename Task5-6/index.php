<?php

require_once 'autoload.php';

use Classes\LightElementNode;
use Classes\LightTextNode;

// Завантажуємо текст з файлу книги
$text = file_get_contents('kNIGGA.txt');

// Розбиваємо текст на рядки
$lines = explode("\n", $text);

// Створюємо контейнер для всієї HTML структури
$div = new LightElementNode('div');
$div->addClass('container');

// Обробка кожного рядка
foreach ($lines as $line) {
    $line = trim($line);  // Видаляємо зайві пробіли на початку та в кінці

    // Якщо рядок порожній, пропускаємо його
    if (empty($line)) continue;

    // Визначаємо тип елемента на основі правил
    if (strlen($line) < 20) {
        $element = new LightElementNode('h2');
        $element->addClass('text-primary');
    } elseif (substr($line, 0, 1) === ' ') {
        $element = new LightElementNode('blockquote');
        $element->addClass('blockquote');
    } else {
        $element = new LightElementNode('p');
        $element->addClass('lead');
    }

    // Додаємо текстовий вузол
    $textNode = new LightTextNode($line);
    $element->appendChild($textNode);

    // Додаємо елемент до контейнера
    $div->appendChild($element);
}

// Генеруємо HTML
$htmlContent = $div->render();

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

    <!-- Підключаємо JS для Bootstrap (для деяких елементів, як модальні вікна або поповери) -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>";
