<?php
require_once 'autoload.php';

use classes\Circle;
use classes\Square;
use classes\Triangle;
use classes\VectorRenderer;
use classes\RasterRenderer;

// Функція для логування з кольоровим виводом
function logMessage(string $message, string $type = 'INFO'): void {
    // Використовуємо ANSI escape-коди для різних типів логів
    $colorCodes = [
        'INFO' => "\033[32m", // зелений
        'ERROR' => "\033[31m", // червоний
        'WARN' => "\033[33m", // жовтий
        'DEBUG' => "\033[34m", // синій
    ];

    $color = $colorCodes[$type] ?? $colorCodes['INFO'];
    echo $color . "[{$type}] " . $message . "\033[0m\n";
}

$vectorRenderer = new VectorRenderer();
$rasterRenderer = new RasterRenderer();

// Отримуємо тип рендерингу через GET-запит або за замовчуванням векторний
$renderType = $_GET['render_type'] ?? 'vector';
logMessage("Отримано параметр render_type: {$renderType}", 'DEBUG');

// Вибір рендерера в залежності від типу
if ($renderType === 'raster') {
    $renderer = $rasterRenderer;
    logMessage("Обрано растровий рендерер (RasterRenderer).", 'DEBUG');
} else {
    $renderer = $vectorRenderer;
    logMessage("Обрано векторний рендерер (VectorRenderer).", 'DEBUG');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Графічний редактор</title>
    <!-- Підключення Bootstrap для стилізації -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .canvas-container {
            display: flex;
            justify-content: space-around;
        }
        canvas {
            border: 1px solid black;
            margin: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Графічний редактор - Вибір рендерингу</h2>

    <!-- Форма для вибору типу рендерингу -->
    <form method="GET" class="form-inline mb-4">
        <label for="render_type" class="mr-2">Оберіть тип рендерингу:</label>
        <select name="render_type" id="render_type" class="form-control mr-2">
            <option value="vector" <?php echo $renderType === 'vector' ? 'selected' : ''; ?>>Векторна графіка</option>
            <option value="raster" <?php echo $renderType === 'raster' ? 'selected' : ''; ?>>Растрова графіка</option>
        </select>
        <button type="submit" class="btn btn-primary">Змінити</button>
    </form>

    <h3>Рендеринг фігур:</h3>

    <div class="canvas-container">
        <div>
            <h4>Коло:</h4>
            <canvas id="circleCanvas" width="200" height="200"></canvas>
        </div>
        <div>
            <h4>Квадрат:</h4>
            <canvas id="squareCanvas" width="200" height="200"></canvas>
        </div>
        <div>
            <h4>Трикутник:</h4>
            <canvas id="triangleCanvas" width="200" height="200"></canvas>
        </div>
    </div>
</div>

<!-- Підключення jQuery та Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Логування вибору рендерингу
    console.log("Обрано тип рендерингу:", "<?php echo $renderType; ?>");

    // Функція для рендерингу кола
    function renderCircle(isRaster) {
        console.log("Рендеринг кола. Тип рендерингу:", isRaster ? "растр" : "вектор");
        const canvas = document.getElementById('circleCanvas');
        const ctx = canvas.getContext('2d');
        if (isRaster) {
            // Растровий рендеринг (намалюємо коло з пікселями)
            ctx.fillStyle = "blue";
            ctx.beginPath();
            ctx.arc(100, 100, 50, 0, Math.PI * 2);
            ctx.fill();
        } else {
            // Векторний рендеринг
            ctx.strokeStyle = "green";
            ctx.lineWidth = 5;
            ctx.beginPath();
            ctx.arc(100, 100, 50, 0, Math.PI * 2);
            ctx.stroke();
        }
    }

    // Функція для рендерингу квадрата
    function renderSquare(isRaster) {
        console.log("Рендеринг квадрата. Тип рендерингу:", isRaster ? "растр" : "вектор");
        const canvas = document.getElementById('squareCanvas');
        const ctx = canvas.getContext('2d');
        if (isRaster) {
            // Растровий рендеринг (намалюємо квадрат з пікселями)
            ctx.fillStyle = "red";
            ctx.fillRect(50, 50, 100, 100);
        } else {
            // Векторний рендеринг
            ctx.strokeStyle = "blue";
            ctx.lineWidth = 5;
            ctx.strokeRect(50, 50, 100, 100);
        }
    }

    // Функція для рендерингу трикутника
    function renderTriangle(isRaster) {
        console.log("Рендеринг трикутника. Тип рендерингу:", isRaster ? "растр" : "вектор");
        const canvas = document.getElementById('triangleCanvas');
        const ctx = canvas.getContext('2d');
        if (isRaster) {
            // Растровий рендеринг (намалюємо трикутник з пікселями)
            ctx.fillStyle = "orange";
            ctx.beginPath();
            ctx.moveTo(100, 50);
            ctx.lineTo(150, 150);
            ctx.lineTo(50, 150);
            ctx.fill();
        } else {
            // Векторний рендеринг
            ctx.strokeStyle = "purple";
            ctx.lineWidth = 5;
            ctx.beginPath();
            ctx.moveTo(100, 50);
            ctx.lineTo(150, 150);
            ctx.lineTo(50, 150);
            ctx.closePath();
            ctx.stroke();
        }
    }

    // Викликаємо рендеринг в залежності від типу
    const isRaster = "<?php echo $renderType; ?>" === "raster";
    console.log("Запуск рендерингу фігур:");
    renderCircle(isRaster);
    renderSquare(isRaster);
    renderTriangle(isRaster);
</script>
</body>
</html>
