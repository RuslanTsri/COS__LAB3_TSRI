<?php
namespace classes;

class FileWriter {
    private string $filePath;

    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    public function write(string $content): void {
        file_put_contents($this->filePath, $content, FILE_APPEND);
    }

    public function writeLine(string $content): void {
        $this->write($content . PHP_EOL);
    }
}
