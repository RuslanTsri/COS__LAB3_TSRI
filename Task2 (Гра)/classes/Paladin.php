<?php
namespace classes;
class Paladin extends Character
{
    public function __construct() {
        parent::setHP(150); // Встановлюємо базові характеристики для Paladin
        parent::setAttack(7);
        parent::setDefense(20);
        parent::setName("Paladin");
    }
}