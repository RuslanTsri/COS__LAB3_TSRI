<?php

namespace Classes;

use Interfaces\TextReaderInterface;

class SmartTextChecker implements TextReaderInterface
{
    private $realReader;

    public function __construct(TextReaderInterface $realReader)
    {
        $this->realReader = $realReader;
    }

    public function readFile(string $fileName): array
    {
        echo "Логування: відкриття файлу...\n";
        $startTime = microtime(true);
        $data = $this->realReader->readFile($fileName);
        $endTime = microtime(true);

        // Логування інформації
        $lines = count($data);
        $chars = array_sum(array_map('count', $data));
        echo "Файл $fileName прочитано. Рядків: $lines, символів: $chars.\n";
        echo "Час читання файлу: " . ($endTime - $startTime) . " секунд.\n";

        return $data;
    }
}
