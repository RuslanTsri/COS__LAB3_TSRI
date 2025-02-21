<?php
namespace classes;

class Triangle extends Shape {
    public function draw(): void {
        $this->renderer->render("Triangle");
    }
}
