<?php


namespace interfaces;

interface Item
{
    public function baffAttack(): int;

    public function baffDefense(): int;

    public function baffHP(): int;

    public function debaffAttack(): int;

    public function debaffDefense(): int;

    public function debaffHP(): int;


}

