<?php
namespace interfaces;

interface RendererInterface {
    public function render(string $shapeName): void;
}
