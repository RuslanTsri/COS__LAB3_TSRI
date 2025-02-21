<?php


namespace classes;

use interfaces\Item;

class ItemBase implements Item
{
    protected $attackBuff = 0;
    protected $defenseBuff = 0;
    protected $hpBuff = 0;

    public function baffAttack(): int
    {
        return $this->attackBuff;
    }

    public function baffDefense(): int
    {
        return $this->defenseBuff;
    }

    public function baffHP(): int
    {
        return $this->hpBuff;
    }

    public function debaffAttack(): int
    {
        return -$this->attackBuff;
    }

    public function debaffDefense(): int
    {
        return -$this->defenseBuff;
    }

    public function debaffHP(): int
    {
        return -$this->hpBuff;
    }
}

