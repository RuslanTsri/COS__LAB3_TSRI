<?php
namespace classes;

use interfaces\CharacterInterface;

class Character implements CharacterInterface
{
    protected $hp = 100;
    protected $attack = 5;
    protected $defense = 5;
    protected $className;
    public function getHP() {
        return $this->hp;
    }
    public function getName(){
        return $this->className;
    }
    public function setName($className)
    {
        $this->className = $className;
    }
    public function getAttack() {
        return $this->attack;
    }

    public function getDefense() {
        return $this->defense;
    }

    public function setHP($hp) {
        $this->hp = $hp;
    }

    public function setAttack($attack) {
        $this->attack = $attack;
    }

    public function setDefense($defense) {
        $this->defense = $defense;
    }

    public function applyArmor($armor) {
        $this->defense += $armor->baffDefense(); // додаємо баф захисту
    }

    public function applyWeapon($weapon) {
        $this->attack += $weapon->baffAttack(); // додаємо баф атаки
    }

    public function applyArtifact($artifact) {
        $this->hp += $artifact->baffHP(); // додаємо баф HP
    }

}

