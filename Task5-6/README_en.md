
# Project: LightHTML


## Description

This task implements a structure for creating HTML elements using objects, with interfaces and abstract classes to ensure flexibility and extensibility of the system. It follows the concept of building HTML elements through classes that extend the abstract class `LightNode`, and applies **SOLID** principles to achieve a clean and understandable architecture.

## Applied Design Principles:

- **SOLID**:
    - **Single Responsibility Principle (SRP)**: Each class has a well-defined responsibility:
        - `LightElementNode` is responsible for creating and rendering HTML elements.
        - `LightTextNode` is responsible for rendering text nodes.
        - `LightNode` is the abstract class that defines common behavior for all nodes.

    - **Open/Closed Principle (OCP)**: The `LightNode` class is open for extension but closed for modification. We can add new types of nodes without changing existing code.

    - **Liskov Substitution Principle (LSP)**: All classes inheriting from `LightNode` can be substituted for each other without breaking the program's correctness.

    - **Interface Segregation Principle (ISP)**: `LightNodeInterface` only contains the necessary method for rendering nodes, ensuring the code remains clean and understandable.

    - **Dependency Inversion Principle (DIP)**: Node classes depend on abstractions (`LightNodeInterface`), not on concrete implementations.

## Class Descriptions:

1. **LightNodeInterface**:
    - An interface defining the `render()` method, which is used to render HTML content for different node types.

2. **LightNode (abstract class)**:
    - An abstract class for all node types. It contains the abstract `render()` method, which is implemented by subclasses.

3. **LightElementNode**:
    - A concrete implementation of an HTML element node. It includes properties for the tag name, CSS classes, display type, self-closing status, and child nodes. It supports adding classes and children, and renders the element as HTML.

4. **LightTextNode**:
    - A concrete implementation of a text node. It contains the text and renders it as HTML, escaping special characters.
## Setup:

1. Download the project.
2. Install PHP.
3. Run the `index.php`:
