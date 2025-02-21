<?php
namespace Classes;

class LightElementNode extends LightNode {
    private string $tagName;
    private string $displayType;
    private bool $selfClosing;
    private array $cssClasses;
    private array $children;

    public function __construct(
        string $tagName,
        string $displayType = 'block',
        bool $selfClosing = false
    ) {
        $this->tagName = $tagName;
        $this->displayType = $displayType;
        $this->selfClosing = $selfClosing;
        $this->cssClasses = [];
        $this->children = [];
    }

    public function addClass(string $class): void {
        $this->cssClasses[] = $class;
    }

    public function appendChild(LightNode $child): void {
        $this->children[] = $child;
    }

    public function innerHTML(): string {
        return implode('', array_map(fn($child) => $child->render(), $this->children));
    }

    public function outerHTML(): string {
        $classAttr = empty($this->cssClasses) ? '' : ' class="' . implode(' ', $this->cssClasses) . '"';

        if ($this->selfClosing) {
            return "<{$this->tagName}{$classAttr} />";
        }

        return "<{$this->tagName}{$classAttr}>{$this->innerHTML()}</{$this->tagName}>";
    }

    public function render(): string {
        return $this->outerHTML();
    }
}
