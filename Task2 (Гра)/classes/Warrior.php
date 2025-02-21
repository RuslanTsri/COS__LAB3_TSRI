<?php
namespace classes;

class Warrior extends Character
{
    public function __construct() {
        parent::setHP(120); // Встановлюємо базові характеристики для Warrior
        parent::setAttack(10);
        parent::setDefense(12);
        parent::setName("Warrior");
    }
}