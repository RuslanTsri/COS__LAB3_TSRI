
# Project: Proxy

This task involves creating a system for reading text files with the application of **SOLID** and **DRY** principles. The program includes several classes for checking and reading files, as well as logging the process. The task utilizes the **Decorator** pattern to add extra functionalities to the base file reader class. Additionally, the code applies the **Single Responsibility Principle** (SRP), where each class has its own clearly defined responsibility.

## Applied Design Principles:

- **SOLID**:
    - **Single Responsibility Principle (SRP)**: Each class performs a single, well-defined task:
        - `SmartTextReader` is responsible for reading files.
        - `SmartTextChecker` adds logging and measures reading time.
        - `SmartTextReaderLocker` adds access control to files based on regular expressions.

    - **Open/Closed Principle (OCP)**: Classes can be extended without modifying their code, using additional decorators such as `SmartTextChecker` or `SmartTextReaderLocker`.

    - **Liskov Substitution Principle (LSP)**: Each decorator is a subtype of the `TextReaderInterface`, so substitution works correctly.

    - **Interface Segregation Principle (ISP)**: Since there is only one interface (`TextReaderInterface`) with one clearly defined task (reading files), it complies with this principle.

    - **Dependency Inversion Principle (DIP)**: Dependencies are injected via constructors, allowing classes to change their behavior without direct dependence.

- **DRY (Don't Repeat Yourself)**: The logic for reading files and generating random data is encapsulated in separate methods, avoiding code duplication.

## Class Descriptions:

1. **TextReaderInterface**:
    - The interface for reading files. It defines the `readFile()` method, which returns an array containing the file content.

2. **SmartTextReader**:
    - A `TextReaderInterface` implementation that checks if a file exists. If the file is not found, it is created with random data.

3. **SmartTextChecker**:
    - A decorator that adds logging to the file reading process. It measures time, counts lines, and characters.

4. **SmartTextReaderLocker**:
    - A decorator that controls access to files based on regular expressions. If the file name matches the given pattern, access is denied, and the file is created with random data.
## Setup:

1. Download the project.
2. Install PHP.
3. Run the `index.php`:
