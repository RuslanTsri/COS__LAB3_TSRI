
# Project: Graphic Editor

This project demonstrates the use of the "Strategy" pattern for rendering graphic shapes (circle, square, triangle) depending on the graphic type (vector or raster). For each shape, a specific rendering strategy is used, allowing easy changes in the rendering method without modifying the main code.

## Task:
1. The "Strategy" pattern is used to determine the rendering type: vector or raster.
2. Different rendering classes (`VectorRenderer`, `RasterRenderer`) implement the `RendererInterface`, allowing the rendering type to be changed without altering the shape classes.

## Design Principles:

### 1. **SOLID**:
- **S** (Single Responsibility Principle): Each class has a single responsibility. For example, the `Circle` class only draws the circle, and the `VectorRenderer` class only renders the graphics.
- **O** (Open/Closed Principle): Classes can be extended without changing the existing code. New shapes or renderers can be added easily without modifying the existing code.
- **L** (Liskov Substitution Principle): Shape classes (e.g., `Circle`, `Square`, `Triangle`) can be substituted without affecting the program’s functionality.
- **I** (Interface Segregation Principle): The `RendererInterface` contains a single method `render`, allowing different rendering types to be easily implemented without unnecessary dependencies.
- **D** (Dependency Inversion Principle): Dependencies are injected via interfaces, allowing for easy changes in the rendering mechanism without affecting shape classes.

### 2. **DRY (Don't Repeat Yourself)**:
The logic for rendering shapes is not duplicated in different classes. All shapes use the same rendering logic via the `RendererInterface`.

### 3. **KISS (Keep It Simple, Stupid)**:
The project simplifies the rendering implementation by clearly separating responsibilities. Each class has a clear task, keeping things simple.

### 4. **Composition over Inheritance**:
The project uses composition over inheritance, which provides more flexibility in changing the rendering strategy without modifying the shape classes.

### 5. **Encapsulation**:
All classes encapsulate their internal implementation. For example, shapes rely on the interface for rendering, without worrying about how rendering is done.

## Setup:

1. Download the project.
2. Install PHP.
3. Run the `index.php` or `app.php`:
