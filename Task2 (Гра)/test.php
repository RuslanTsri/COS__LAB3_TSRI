<?php

use classes\ArmorDecorator;
use classes\ArmoryList;
use classes\Warrior;
use classes\WeaponDecorator;
use classes\WeaponList;
use classes\ArtifactList;
use classes\ArtifactDecorator;
use classes\WarriorDecorator;
use classes\Mage;
use classes\MageDecorator;
use classes\Paladin;
use classes\PaladinDecorator;

require_once 'autoload.php';

// Спочатку виводимо базові характеристики
echo "Базові характеристики:\n";
echo "HP: 100\n"; // Початковий HP
echo "Attack: 5\n"; // Початковий Attack
echo "Defense: 5\n"; // Початковий Defense

// Створюємо персонажа
$player = new Mage();
// 2. Виведення після вибору класу (назва класу)
echo "\nПісля вибору класу: ";
if ($player instanceof Warrior) {
    echo "Warrior\n";
    // 1. Виводимо характеристики після створення персонажа
    echo "\nПісля створення персонажа:\n";
    echo "HP: " . $player->getHP() . "\n";
    echo "Attack: " . $player->getAttack() . "\n";
    echo "Defense: " . $player->getDefense() . "\n";

} elseif ($player instanceof Mage) {
    echo "Mage\n";
    // 1. Виводимо характеристики після створення персонажа
    echo "\nПісля створення персонажа:\n";
    echo "HP: " . $player->getHP() . "\n";
    echo "Attack: " . $player->getAttack() . "\n";
    echo "Defense: " . $player->getDefense() . "\n";

} elseif ($player instanceof Paladin) {
    echo "Paladin\n";
    // 1. Виводимо характеристики після створення персонажа
    echo "\nПісля створення персонажа:\n";
    echo "HP: " . $player->getHP() . "\n";
    echo "Attack: " . $player->getAttack() . "\n";
    echo "Defense: " . $player->getDefense() . "\n";

}



// Декоруємо персонажа з додатковими властивостями
$playerWithArmor = new ArmorDecorator(new ArmoryList('plate'));
$playerWithWeapon = new WeaponDecorator(new WeaponList('axe'));
$playerWithArtifact = new ArtifactDecorator(new ArtifactList('ring'));

// 4. Виведення всіх характеристик (з класом і шмотом)
$playerWithArmor->baffDefense();
$playerWithWeapon->baffAttack();
$playerWithArtifact->baffHP();

echo "\nПісля декорування (клас + шмотки):\n";
echo "HP: " . ($player->getHP() + $playerWithArtifact->baffHP()) . "\n";
echo "Attack: " . ($player->getAttack() + $playerWithWeapon->baffAttack()) . "\n";
echo "Defense: " . ($player->getDefense() + $playerWithArmor->baffDefense()) . "\n";

