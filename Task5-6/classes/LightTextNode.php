<?php
namespace Classes;

class LightTextNode extends LightNode {
    private string $text;

    public function __construct(string $text) {
        $this->text = $text;
    }

    public function render(): string {
        return htmlspecialchars($this->text);
    }
}
