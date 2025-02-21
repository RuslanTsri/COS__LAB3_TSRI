<?php
require_once 'autoload.php';

use classes\Logger;
use classes\FileWriter;
use classes\FileLoggerAdapter;
use interfaces\ILogger;

// Функція для логування з кольоровим виводом
function logMessage(string $message, string $type = 'INFO'): void {
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
logMessage("Запуск програми логування.", 'INFO');

// Створення об'єкта Logger (реалізація інтерфейсу ILogger)
logMessage("Ініціалізація об'єкта Logger, який реалізує інтерфейс ILogger...", 'DEBUG');
$consoleLogger = new Logger();
logMessage("Об'єкт Logger успішно створений.", 'DEBUG');

// Виклик методу log з параметром "Це звичайне повідомлення."
logMessage("Виклик методу log() у класі Logger з параметром: 'Це звичайне повідомлення.'", 'DEBUG');
$consoleLogger->log("Це звичайне повідомлення.");

// Виклик методу error з параметром "Це повідомлення про помилку."
logMessage("Виклик методу error() у класі Logger з параметром: 'Це повідомлення про помилку.'", 'DEBUG');
$consoleLogger->error("Це повідомлення про помилку.");

// Виклик методу warn з параметром "Це попередження."
logMessage("Виклик методу warn() у класі Logger з параметром: 'Це попередження.'", 'DEBUG');
$consoleLogger->warn("Це попередження.");

// Створення об'єкта FileWriter для запису логів у файл
$filePath = 'log.txt';
logMessage("Створення об'єкта FileWriter з параметром filePath = '$filePath'.", 'DEBUG');
$fileWriter = new FileWriter($filePath);
logMessage("Об'єкт FileWriter успішно створений.", 'DEBUG');

// Створення адаптера FileLoggerAdapter для адаптації FileWriter до інтерфейсу ILogger
logMessage("Створення об'єкта FileLoggerAdapter для адаптації FileWriter до ILogger.", 'DEBUG');
$fileLogger = new FileLoggerAdapter($fileWriter);
logMessage("Об'єкт FileLoggerAdapter успішно створений.", 'DEBUG');

// Виклик методу log через FileLoggerAdapter
logMessage("Виклик методу log() у FileLoggerAdapter з параметром: 'Це повідомлення буде записане у файл.'", 'DEBUG');
$fileLogger->log("Це повідомлення буде записане у файл.");

// Виклик методу error через FileLoggerAdapter
logMessage("Виклик методу error() у FileLoggerAdapter з параметром: 'Це повідомлення про помилку записане у файл.'", 'DEBUG');
$fileLogger->error("Це повідомлення про помилку записане у файл.");

// Виклик методу warn через FileLoggerAdapter
logMessage("Виклик методу warn() у FileLoggerAdapter з параметром: 'Це попередження записане у файл.'", 'DEBUG');
$fileLogger->warn("Це попередження записане у файл.");

// Логування завершення роботи
logMessage("Програма завершила роботу успішно.", 'INFO');
