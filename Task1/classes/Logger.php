<?php
namespace classes;

use interfaces\ILogger;

class Logger implements ILogger {
    public function log(string $message): void {
        echo "\033[32m[LOG]: $message\033[0m\n";
    }

    public function error(string $message): void {
        echo "\033[31m[ERROR]: $message\033[0m\n";
    }

    public function warn(string $message): void {
        echo "\033[33m[WARNING]: $message\033[0m\n";
    }
}
