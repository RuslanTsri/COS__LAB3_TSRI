<?php
namespace classes;

use interfaces\RendererInterface;

class VectorRenderer implements RendererInterface {
    public function render(string $shapeName): void {
        echo "Rendering $shapeName as vector graphics.\n";
    }
}
