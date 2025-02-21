<?php
namespace classes;

use interfaces\ILogger;

class FileLoggerAdapter implements ILogger {
    private FileWriter $fileWriter;

    public function __construct(FileWriter $fileWriter) {
        $this->fileWriter = $fileWriter;
    }

    public function log(string $message): void {
        $this->fileWriter->writeLine("[LOG]: $message");
    }

    public function error(string $message): void {
        $this->fileWriter->writeLine("[ERROR]: $message");
    }

    public function warn(string $message): void {
        $this->fileWriter->writeLine("[WARNING]: $message");
    }
}
