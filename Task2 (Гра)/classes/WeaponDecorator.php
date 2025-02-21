<?php
namespace classes;

use interfaces\Item;

class WeaponDecorator extends ItemBase
{
    protected $weapon;

    public function __construct(Item $weapon)
    {
        $this->weapon = $weapon;
    }

    public function baffAttack(): int
    {
        return $this->weapon->baffAttack();
    }

    public function baffDefense(): int
    {
        return $this->weapon->baffDefense();
    }

    public function baffHP(): int
    {
        return $this->weapon->baffHP();
    }

    public function debaffAttack(): int
    {
        return $this->weapon->debaffAttack();
    }

    public function debaffDefense(): int
    {
        return $this->weapon->debaffDefense();
    }

    public function debaffHP(): int
    {
        return $this->weapon->debaffHP();
    }
}
