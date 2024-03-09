<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма с различными контроллерами</title>
    <style>
        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Заполните форму</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="quantity">Количество товаров:</label>
        <input type="number" id="quantity" name="quantity" min="1" required><br><br>

        <label for="product">Выберите товар:</label>
        <select id="product" name="product" required>
            <option value="">Выберите товар</option>
            <option value="Куртка">Куртка</option>
            <option value="Джинсы">Джинсы</option>
            <option value="Кепка">Кепка</option>
        </select><br><br>

        <input type="submit" value="Отправить">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $quantity = $_POST["quantity"];
        $product = $_POST["product"];

        echo "<h2>Данные из формы:</h2>";
        echo "Количество товаров: $quantity<br>";
        echo "Выбранный товар: $product";
    }
    ?>
</body>
</html>
