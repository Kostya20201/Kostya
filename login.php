<?php
// Шлях до файлу з даними користувача
$userDataFile = 'user_data.txt';

// Перевірка, чи була форма відправлена
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Отримання даних з форми
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Читання правильного логіну та пароля з файлу
    if (file_exists($userDataFile)) {
        $userData = file_get_contents($userDataFile);
        list($correctLogin, $correctPassword) = explode("\n", $userData);

        // Видалення зайвих пробілів і перевірка
        $correctLogin = trim($correctLogin);
        $correctPassword = trim($correctPassword);

        if ($login === $correctLogin && $password === $correctPassword) {
            $message = 'Ви залогінені!';
        } else {
            $message = 'Неправильний логін або пароль!';
        }
    } else {
        $message = 'Помилка: файл з даними користувача не знайдено!';
    }
} else {
    $message = '';
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма Авторизації</title>
    <style>
        /* Загальні стилі для розташування форми */
body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
}

/* Стилі форми */
.login-form {
    background-color: #fff;
    padding: 30px;
    border-radius: 50px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 300px;
    text-align: center;
    align-items: center; /* Вирівнюємо всі елементи по центру */
}

/* Заголовок форми */
.login-form h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Стиль для підписів */
.login-form label {
    display: block;
    text-align: left;
    margin-bottom: 5px;
    font-size: 14px;
    color: #555;
    width: 100%; /* Щоб підпис займав всю ширину форми */
}

/* Поля вводу */
.login-form input {
    width: 90%; /* Менше ширини для відступів */
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

/* Кнопка */
.login-form button {
    width: 61.25%; /* Менше ширини для гармонійного вигляду */
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

/* Ховер-ефект для кнопки */
.login-form button:hover {
    background-color: #0056b3;
}

/* Повідомлення */
.login-form p {
    margin-top: 15px;
    font-size: 14px;
    text-align: center;
    color: #e74c3c;
}

    </style>
</head>
<body>
    <form class="login-form" method="POST" action="">
        <h1>Авторизація</h1>
        <label for="login">Логін:</label>
        <input type="text" id="login" name="login" required>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Увійти</button>
        <p><?= htmlspecialchars($message) ?></p>
    </form>
</body>
</html>
