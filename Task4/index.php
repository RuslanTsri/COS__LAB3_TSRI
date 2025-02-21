<?php
require_once 'autoload.php';

use Classes\SmartTextReader;
use Classes\SmartTextChecker;
use Classes\SmartTextReaderLocker;
use Interfaces\TextReaderInterface;

// Функція для логування з кольоровим виводом
function logMessage(string $message, string $type = 'INFO'): void {
    $colorCodes = [
        'INFO' => "\033[32m",  // зелений
        'ERROR' => "\033[31m", // червоний
        'WARN' => "\033[33m",  // жовтий
        'DEBUG' => "\033[34m", // синій
    ];

    $color = $colorCodes[$type] ?? $colorCodes['INFO'];
    echo $color . "[{$type}] " . $message . "\033[0m\n";
}

// Логування запуску програми
logMessage("Запуск програми для роботи з файлами.", 'INFO');

// Ініціалізація реального читача
logMessage("Ініціалізація SmartTextReader (основний клас для читання файлів)...", 'DEBUG');
$realReader = new SmartTextReader();
logMessage("SmartTextReader створено. Об'єкт: " . get_class($realReader), 'INFO');

// Логуючий проксі
logMessage("Ініціалізація SmartTextChecker (логуючий проксі для SmartTextReader)...", 'DEBUG');
$loggedReader = new SmartTextChecker($realReader);
logMessage("SmartTextChecker створено. Об'єкт: " . get_class($loggedReader), 'INFO');

// Проксі з обмеженням доступу до певних файлів
$regex = '/\.txt$/';
logMessage("Ініціалізація SmartTextReaderLocker (обмежує доступ до файлів за шаблоном $regex)...", 'DEBUG');
$restrictedReader = new SmartTextReaderLocker($loggedReader, $regex);
logMessage("SmartTextReaderLocker створено. Об'єкт: " . get_class($restrictedReader), 'INFO');

// Функція для тестування читання файлу
function testReadFile(TextReaderInterface $reader, string $filename): void {
    logMessage("Передача запиту на читання файлу: $filename", 'DEBUG');

    $result = $reader->readFile($filename);

    if (!empty($result)) {
        logMessage("Файл $filename успішно прочитаний. Загальна кількість рядків: " . count($result), 'INFO');
    } else {
        logMessage("Файл $filename не містить даних або доступ заборонений.", 'WARN');
    }
}

// Спроба прочитати файл з доступом
$filename1 = 'allowed_file.csv';
logMessage("Спроба прочитати файл: $filename1", 'INFO');
testReadFile($restrictedReader, $filename1);
logMessage("Читання файлу $filename1 завершено.", 'INFO');

// Спроба прочитати обмежений файл
$filename2 = 'restricted_file.txt';
logMessage("Спроба прочитати обмежений файл: $filename2", 'WARN');
testReadFile($restrictedReader, $filename2);
logMessage("Читання файлу $filename2 завершено.", 'INFO');

// Завершення роботи
logMessage("Програма завершила роботу успішно.", 'INFO');
?>
