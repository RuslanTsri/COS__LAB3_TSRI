<?php

namespace interfaces;

interface CharacterInterface
{
    public function getHP();
    public function getName();
    public function setName($className);
    public function getAttack();
    public function getDefense();
    public function setHP($hp);
    public function setAttack($attack);
    public function setDefense($defense);
    public function applyArmor($armor);
    public function applyWeapon($weapon);
    public function applyArtifact($artifact);
}
