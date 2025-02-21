<?php

namespace classes;
class Mage extends Character
{
    public function __construct() {
        parent::setHP(90); // Встановлюємо базові характеристики для Mage
        parent::setAttack(20);
        parent::setDefense(5);
        parent::setName('Mage');
    }
}