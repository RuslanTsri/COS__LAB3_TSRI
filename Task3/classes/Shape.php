<?php
namespace classes;

use interfaces\RendererInterface;

abstract class Shape {
    protected RendererInterface $renderer;

    public function __construct(RendererInterface $renderer) {
        $this->renderer = $renderer;
    }

    abstract public function draw(): void;
}
