# RPG Character Builder

This project is part of an RPG game, allowing users to create characters by selecting their class, armor, weapons, and artifacts. Each of these elements provides certain bonuses to the character, which are applied using decorators.

## Project Description

The project implements a system where the user can choose a character class (Warrior, Mage, Paladin), as well as armor, weapons, and artifacts that affect the character's attributes: HP, attack, and defense.

### Key Design Principles:

- **SOLID**:
    - **Single Responsibility Principle (SRP)**: Each class has one responsibility, for example, the `WeaponDecorator` class is responsible for adding attack bonuses to the character.
    - **Open/Closed Principle (OCP)**: The system is easily extendable, allowing new character types, equipment, and artifacts to be added without changing existing classes.
    - **Liskov Substitution Principle (LSP)**: Decorators can replace base classes without breaking functionality.
    - **Interface Segregation Principle (ISP)**: Each interface is focused on a single task, such as `Item` and `CharacterInterface`, which define the behavior for item and character objects.
    - **Dependency Inversion Principle (DIP)**: Higher-level modules do not depend on lower-level modules; interfaces define interactions between classes.

- **Decorator Pattern**: Used to add new characteristics to the character (such as bonuses from armor, weapons, and artifacts) without changing the core character class.
- **Factory Pattern**: A mechanism for selecting and creating the appropriate items (weapons, armor, artifact) based on user input.

## How to Run

1. Start visual version `index.php` or console version `test.php`