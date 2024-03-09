<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы</title>
    <style>
        /* Стили для меню, формы и кнопки */
        nav {
            background-color: #444;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-bottom: 20px;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }
        nav a:hover {
            background-color: #555;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-container input[type="checkbox"] {
            margin-right: 5px;
        }
        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <nav>
        <a href="#">#my shop</a>
        <a href="#">home</a>
        <a href="#">comments</a>
        <a href="#">exit</a>
        
    </nav>
    <h3>#write-comment<h3>
    <div class="form-container">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" required></textarea>
            <label>
                <input type="checkbox" name="agree" required>
                Do you agree with data processing?
            </label>
            <button type="submit">Send</button>
        </form>
    </div>
    <?php
function validateForm($formData) {
    $errors = array();

    // Проверка имени
    if (empty($formData['name'])) {
        $errors[] = 'Name is required';
    } elseif (strlen($formData['name']) < 3 || strlen($formData['name']) > 20) {
        $errors[] = 'Name must be between 3 and 20 characters';
    } elseif (preg_match('/\d/', $formData['name'])) {
        $errors[] = 'Name cannot contain digits';
    }

    // Проверка email
    if (empty($formData['email'])) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }

    // Проверка комментария
    if (empty($formData['comment'])) {
        $errors[] = 'Comment is required';
    } elseif (strlen($formData['comment']) < 10) {
        $errors[] = 'Comment must be at least 10 characters long';
    }

    // Проверка согласия с обработкой данных
    if (empty($formData['agree'])) {
        $errors[] = 'You must agree with data processing';
    }

    return $errors;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка и валидация данных
    $validationErrors = validateForm($_POST);

    // Если есть ошибки, выводим их
    if (!empty($validationErrors)) {
        echo '<div class="form-container">';
        echo '<h3>Validation Errors:</h3>';
        echo '<ul>';
        foreach ($validationErrors as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
        echo '</div>';
    } else {
        // Вывод комментария
        echo '<div class="form-container">';
        echo '<h3>Comment:</h3>';
        echo '<p>' . $_POST['comment'] . '</p>';
        echo '</div>';
    }
}
?>
</body>
</html>
