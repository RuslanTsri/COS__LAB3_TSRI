<?php
namespace classes;

use interfaces\RendererInterface;

class RasterRenderer implements RendererInterface {
    public function render(string $shapeName): void {
        echo "Rendering $shapeName as raster graphics.\n";
    }
}
