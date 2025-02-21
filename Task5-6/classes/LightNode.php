<?php

namespace Classes;

use Interfaces\LightNodeInterface;

abstract class LightNode implements LightNodeInterface
{
    abstract public function render(): string;
}
