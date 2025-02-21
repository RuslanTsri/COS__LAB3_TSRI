document.getElementById('player1-ready').addEventListener('click', function () {
    // Отримуємо вибір персонажа і предметів
    const selectedClass = document.querySelector('#player1-carousel .carousel-item.active').getAttribute('data-class');
    const selectedArmor = document.querySelector('.player1-armor').value;
    const selectedWeapon = document.querySelector('.player1-weapon').value;
    const selectedArtifact = document.querySelector('.player1-artifact').value;

    // Створюємо персонажа
    let character;
    switch (selectedClass) {
        case 'warrior':
            character = new Warrior();
            break;
        case 'mage':
            character = new Mage();
            break;
        case 'paladin':
            character = new Paladin();
            break;
    }

    // Застосовуємо бафи від предметів
    character.applyArmor(new window[selectedArmor]());
    character.applyWeapon(new window[selectedWeapon]());
    character.applyArtifact(new window[selectedArtifact]());

    // Оновлюємо HP, Attack, Defense в інтерфейсі
    document.querySelector('.hp-value').innerText = character.getHP();
    // Зробіть також оновлення для Attack та Defense
});
