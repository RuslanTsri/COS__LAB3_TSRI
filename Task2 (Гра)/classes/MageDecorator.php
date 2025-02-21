<?php
namespace classes;

class MageDecorator extends Character
{
    protected $mage;

    public function __construct(Character $mage)
    {
        $this->mage = $mage;
    }

    public function getHP()
    {
        return $this->mage->getHP();
    }

    public function getAttack()
    {
        return $this->mage->getAttack() + 20; // Бонус до атаки
    }

    public function getDefense()
    {
        return $this->mage->getDefense() + 5; // Бонус до захисту
    }

    public function getName()
    {
        return $this->mage->getName();
    }
}
