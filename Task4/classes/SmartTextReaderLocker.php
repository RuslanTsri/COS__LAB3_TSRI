<?php

namespace Classes;

use Interfaces\TextReaderInterface;

class SmartTextReaderLocker implements TextReaderInterface
{
    private $realReader;
    private $regex;

    public function __construct(TextReaderInterface $realReader, string $regex)
    {
        $this->realReader = $realReader;
        $this->regex = $regex;
    }

    public function readFile(string $fileName): array
    {
        if (preg_match($this->regex, $fileName)) {
            echo "Доступ до файлу $fileName заборонено!\n";
            $this->createRandomFile($fileName);
            return [];
        }

        return $this->realReader->readFile($fileName);
    }

    private function createRandomFile(string $filename): void
    {
        if (!file_exists($filename)) {
            echo "Файл $filename не знайдено. Створюємо новий...\n";
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 ';
            $content = '';

            for ($i = 0; $i < rand(5, 15); $i++) { // Випадкова кількість рядків
                for ($j = 0; $j < rand(20, 50); $j++) { // Випадкові символи
                    $content .= $characters[rand(0, strlen($characters) - 1)];
                }
                $content .= PHP_EOL;
            }

            file_put_contents($filename, $content);
            echo "Файл $filename створено та заповнено випадковими даними.\n";
        } else {
            echo "Файл $filename вже існує. Пропускаємо створення.\n";
        }
    }
}
