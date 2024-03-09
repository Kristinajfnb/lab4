<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест</title>
</head>
<body>
    <h2>Тест</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <label for="name">Ваше имя:</label>
        <input type="text" id="name" name="name" required><br><br>

        <p>1. Какое главное растение в биосфере?</p>
        <input type="radio" name="question1" value="a">Мох<br>
        <input type="radio" name="question1" value="b">Трава<br>
        <input type="radio" name="question1" value="c">Дерево<br>

        <p>2. Что из этого не является фруктом?</p>
        <input type="checkbox" name="question2[]" value="a">Яблоко<br>
        <input type="checkbox" name="question2[]" value="b">Помидор<br>
        <input type="checkbox" name="question2[]" value="c">Огурец<br>

        <p>3. Сколько дней в високосном году?</p>
        <input type="number" name="question3" min="0"><br><br>

        <input type="submit" value="Отправить">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $question1 = $_POST["question1"];
        $question2 = $_POST["question2"] ?? []; // Используем оператор объединения null
        $question3 = $_POST["question3"];

        // Проверяем, что все ответы были даны
        if (!empty($name) && !empty($question1) && !empty($question2) && isset($question3)) {
            // Проверяем правильность ответов
            $correctAnswers = [
                "question1" => "c",
                "question2" => ["b", "c"],
                "question3" => 366 
            ];

            // Создаем массив для хранения правильных и неправильных ответов
            $correct = [];
            $incorrect = [];

            // Проверяем первый вопрос
            if ($question1 === $correctAnswers["question1"]) {
                $correct[] = "1";
            } else {
                $incorrect[] = "1";
            }

            // Проверяем второй вопрос
            if (count(array_diff($question2, $correctAnswers["question2"])) === 0 && count(array_diff($correctAnswers["question2"], $question2)) === 0) {
                $correct[] = "2";
            } else {
                $incorrect[] = "2";
            }

            // Проверяем третий вопрос
            if ($question3 == $correctAnswers["question3"]) {
                $correct[] = "3";
            } else {
                $incorrect[] = "3";
            }

            // Выводим результаты
            echo "<h3>Результаты:</h3>";
            echo "<p>Правильные ответы: " . implode(", ", $correct) . "</p>";
            echo "<p>Неправильные ответы: " . implode(", ", $incorrect) . "</p>";
        } else {
            echo "<p>Пожалуйста, заполните все поля.</p>";
        }
    }
    ?>
</body>
</html>
