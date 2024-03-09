<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы</title>
</head>
<body>
    <div class="form">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <fieldset>
                <legend>Оставьте отзыв!</legend>
                <div id="main_info">
                    <div>
                        <label for="name">Имя:</label>
                        <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"/>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"/>
                    </div>
                </div>
                <div id="extra_info">
                    <p><label for="review">Оцените наш сервис!</label></p>
                    <div>
                        <input id="review_good" type="radio" name="review" value="Хорошо" <?php echo (isset($_POST['review']) && $_POST['review'] == 'Хорошо') ? 'checked' : ''; ?>><label for="review_good">Хорошо</label>
                        <input id="review_satisfactory" type="radio" name="review" value="Удовлетворительно" <?php echo (isset($_POST['review']) && $_POST['review'] == 'Удовлетворительно') ? 'checked' : ''; ?>><label for="review_satisfactory">Удовлетворительно</label>
                        <input id="review_poor" type="radio" name="review" value="Плохо" <?php echo (isset($_POST['review']) && $_POST['review'] == 'Плохо') ? 'checked' : ''; ?>><label for="review_poor">Плохо</label>
                    </div>
                </div>
                <div id="message_info">
                    <label for="comment">Ваш комментарий:</label>
                    <textarea id="comment" name="comment" cols="30" rows="10"><?php echo isset($_POST['comment']) ? $_POST['comment'] : ''; ?></textarea>
                </div>
                <div id="buttons">
                    <input type="submit" name="submit" value="Отправить"/>
                    <input type="reset" value="Очистить"/>
                </div>
            </fieldset>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $review = $_POST["review"];
            $comment = $_POST["comment"];

            // Проверка заполнения всех полей и корректности e-mail
            if (empty($name) || empty($email) || empty($review) || empty($comment) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<p style='color: red;'>Пожалуйста, заполните все поля и введите корректный e-mail.</p>";
            } else {
                echo "<div id='result'>
                        <p>Ваше имя: <b>$name</b></p>
                        <p>Ваш e-mail: <b>$email</b></p>
                        <p>Оценка сервиса: <b>$review</b></p>
                        <p>Ваше сообщение: <b>$comment</b></p>
                    </div>";
            }
        }
        ?>
    </div>
</body>
</html>
