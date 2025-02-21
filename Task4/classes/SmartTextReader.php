<?php
namespace Classes;

use Interfaces\TextReaderInterface;

class SmartTextReader implements TextReaderInterface {
    public function readFile(string $fileName): array {
        // Перевірка, чи існує файл
        if (!file_exists($fileName)) {
            echo "Файл $fileName не знайдений. Створюємо файл з випадковими даними...\n";

            // Створення нового файлу з випадковими даними
            $randomData = $this->generateRandomData(10, 5); // 10 рядків, 5 символів у кожному
            file_put_contents($fileName, $randomData);
            echo "Файл $fileName створено та заповнено випадковими даними.\n";
        }

        // Читання файлу
        echo "Відкрито файл: $fileName\n";
        $lines = file($fileName, FILE_IGNORE_NEW_LINES);
        $data = [];

        foreach ($lines as $line) {
            $data[] = str_split($line);
        }

        echo "Файл $fileName успішно прочитано.\n";
        echo "Рядків: " . count($lines) . ", символів: " . array_sum(array_map('strlen', $lines)) . ".\n";

        return $data;
    }

    // Функція для генерації випадкових даних
    private function generateRandomData(int $numLines, int $numChars): string {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789 ';
        $randomData = '';

        for ($i = 0; $i < $numLines; $i++) {
            $line = '';
            for ($j = 0; $j < $numChars; $j++) {
                $line .= $characters[random_int(0, strlen($characters) - 1)];
            }
            $randomData .= $line . PHP_EOL;
        }

        return $randomData;
    }
}
