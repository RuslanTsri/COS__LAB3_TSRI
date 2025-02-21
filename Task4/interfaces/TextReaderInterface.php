<?php

namespace Interfaces;

interface TextReaderInterface
{
    public function readFile(string $fileName): array;
}
