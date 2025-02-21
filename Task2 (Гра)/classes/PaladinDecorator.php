<?php
namespace classes;

class PaladinDecorator extends Character
{
    protected $paladin;

    public function __construct(Character $paladin)
    {
        $this->paladin = $paladin;
    }

    public function getHP()
    {
        return $this->paladin->getHP();
    }

    public function getAttack()
    {
        return $this->paladin->getAttack() + 7; // Бонус до атаки
    }

    public function getDefense()
    {
        return $this->paladin->getDefense() + 20; // Бонус до захисту
    }

    public function getName()
    {
        return $this->paladin->getName();
    }
}
