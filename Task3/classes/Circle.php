<?php
namespace classes;

class Circle extends Shape {
    public function draw(): void {
        $this->renderer->render("Circle");
    }
}
