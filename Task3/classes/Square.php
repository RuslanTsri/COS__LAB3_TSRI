<?php
namespace classes;

class Square extends Shape {
    public function draw(): void {
        $this->renderer->render("Square");
    }
}
