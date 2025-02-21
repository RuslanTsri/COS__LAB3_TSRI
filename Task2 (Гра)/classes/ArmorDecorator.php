<?php
namespace classes;

use interfaces\Item;

class ArmorDecorator extends ItemBase
{
    protected $armor;

    public function __construct(Item $armor)
    {
        $this->armor = $armor;
    }

    public function baffAttack(): int
    {
        return $this->armor->baffAttack();
    }

    public function baffDefense(): int
    {
        return $this->armor->baffDefense();
    }

    public function baffHP(): int
    {
        return $this->armor->baffHP();
    }

    public function debaffAttack(): int
    {
        return $this->armor->debaffAttack();
    }

    public function debaffDefense(): int
    {
        return $this->armor->debaffDefense();
    }

    public function debaffHP(): int
    {
        return $this->armor->debaffHP();
    }
}
