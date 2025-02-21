<?php
namespace classes;

class WarriorDecorator extends Character
{
    protected $warrior;

    public function __construct(Character $warrior)
    {
        $this->warrior = $warrior;
    }

    public function getHP()
    {
        return $this->warrior->getHP();
    }

    public function getAttack()
    {
        return $this->warrior->getAttack() + 10; // Бонус до атаки
    }

    public function getDefense()
    {
        return $this->warrior->getDefense() + 12; // Бонус до захисту
    }

    public function getName()
    {
        return $this->warrior->getName();
    }
}
