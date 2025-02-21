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

// Initialize the character
$player = new Warrior();
$playerWithArmor = new ArmorDecorator(new ArmoryList('plate'));
$playerWithWeapon = new WeaponDecorator(new WeaponList('axe'));
$playerWithArtifact = new ArtifactDecorator(new ArtifactList('ring'));

// Handle form submission (class and equipment selection)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the selected class and equipment from the form submission
    $selectedClass = $_POST['class'];
    $selectedArmor = $_POST['armor'];
    $selectedWeapon = $_POST['weapon'];
    $selectedArtifact = $_POST['artifact'];

    // Create the character based on selected class
    if ($selectedClass == 'Warrior') {
        $player = new Warrior();
    } elseif ($selectedClass == 'Mage') {
        $player = new Mage();
    } elseif ($selectedClass == 'Paladin') {
        $player = new Paladin();
    }

    // Decorate the character with selected equipment
    $playerWithArmor = new ArmorDecorator(new ArmoryList($selectedArmor));
    $playerWithWeapon = new WeaponDecorator(new WeaponList($selectedWeapon));
    $playerWithArtifact = new ArtifactDecorator(new ArtifactList($selectedArtifact));

    // Apply the buffs
    $playerWithArmor->baffDefense();
    $playerWithWeapon->baffAttack();
    $playerWithArtifact->baffHP();
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Builder</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fantasy Style -->
    <style>
        .character-image {
            width: 250px;
            height: 250px;
            border: 3px solid #f39c12;
            border-radius: 10px;
            object-fit: contain; /* Вписує зображення без обрізки */
            background-color: #34495e; /* Фон навколо картинок */
        }

        body {
            font-family: 'Georgia', serif;
            background-color: #2c3e50;
            color: #ecf0f1;
            margin: 0;
            padding: 20px;
        }

        h2 {
            font-size: 2.5rem;
            text-align: center;
            color: #f39c12;
        }

        .panel {
            background-color: #34495e;
            border: 1px solid #7f8c8d;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        select, button {
            font-size: 1.2rem;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        button {
            background-color: #e67e22;
            border: none;
            color: white;
            font-weight: bold;
        }

        button:hover {
            background-color: #d35400;
        }

        .panel h4 {
            font-size: 1.5rem;
            color: #f39c12;
        }

        .panel p {
            font-size: 1.2rem;
        }

        .select-container {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 1rem;
            color: #ecf0f1;
        }

        /* Layout styles */
        .container {
            display: flex;
            justify-content: space-between;
        }

        .left-panel {
            width: 30%;
        }

        .center-panel {
            width: 30%;
            text-align: center;
        }

        .right-panel {
            width: 35%;
        }

        .character-image {
            width: 80%;
            border: 3px solid #f39c12;
            border-radius: 10px;
        }

        .panel img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<h2>Будівник персонажа RPG</h2>

<div class="container">
    <!-- Left Panel: Class and Equipment Selection -->
    <div class="left-panel">
        <form method="POST">
            <div class="panel">
                <h3>1. Вибір класу</h3>
                <select id="classSelector" name="class" required>
                    <option value="Warrior">Warrior</option>
                    <option value="Mage">Mage</option>
                    <option value="Paladin">Paladin</option>
                </select>

            </div>

            <div class="panel">
                <h3>2. Вибір шмоток</h3>
                <div class="select-container">
                    <label for="armor">Броня:</label>
                    <select name="armor" required>
                        <option value="plate">Plate</option>
                        <option value="chainmail">Chainmail</option>
                        <option value="leather">Leather</option>
                    </select>
                </div>
                <div class="select-container">
                    <label for="weapon">Зброя:</label>
                    <select name="weapon" required>
                        <option value="axe">Axe</option>
                        <option value="sword">Sword</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <div class="select-container">
                    <label for="artifact">Артефакт:</label>
                    <select name="artifact" required>
                        <option value="ring">Ring</option>
                        <option value="amulet">Amulet</option>
                        <option value="book">Book</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Перевірити</button>
        </form>
    </div>

    <!-- Center Panel: Character Image -->
    <div class="center-panel">
        <img id="classImage" src="assets/files/class_person/warrior.png" alt="Character" class="character-image">
    </div>


    <!-- Right Panel: Character Stats -->
    <div class="right-panel">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <div class="panel">
                <h3>Базові характеристики:</h3>
                <p>HP: 100</p>
                <p>Attack: 5</p>
                <p>Defense: 5</p>
            </div>

            <div class="panel">
                <h3>Після вибору класу:</h3>
                <p>Клас: <?php echo $selectedClass; ?></p>
                <h4>Після створення персонажа:</h4>
                <p>HP: <?php echo $player->getHP(); ?></p>
                <p>Attack: <?php echo $player->getAttack(); ?></p>
                <p>Defense: <?php echo $player->getDefense(); ?></p>
            </div>

            <div class="panel">
                <h3>Після декорування (клас + шмотки):</h3>
                <p>HP: <?php echo $player->getHP() + $playerWithArtifact->baffHP(); ?></p>
                <p>Attack: <?php echo $player->getAttack() + $playerWithWeapon->baffAttack(); ?></p>
                <p>Defense: <?php echo $player->getDefense() + $playerWithArmor->baffDefense(); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="footer">
    <p>Character Builder | Fantasy RPG</p>
</div>

<!-- Bootstrap JS (optional for functionality, e.g., modal, dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('classSelector').addEventListener('change', function () {
        let classImage = document.getElementById('classImage');
        let selectedClass = this.value;

        // Оновлення шляху до зображення
        classImage.src = "assets/files/class_person/" + selectedClass.toLowerCase() + ".png";
        classImage.alt = selectedClass;
    });
</script>

</body>
</html>
