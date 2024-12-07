<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('datebase.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем, что данные действительно поступили
    $login = $_POST['login'];
    $pass = $_POST['password'];

    $query = "SELECT password, name, login, surname, birthTime FROM `user` WHERE login = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Ошибка SQL: " . $conn->error);
    }
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
}

if (isset($_COOKIE['loged']) && $_COOKIE['loged'] === 'true') {
    // Если пользователь уже авторизован, перенаправляем его на главную
    header("Location: index.php?loged");
    exit;
} else {
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($pass, $user['password'])) {
            // Успешная авторизация, устанавливаем куки
            setcookie("loged", "true", time() + 3600, "/");
            setcookie("user", $user['name'], time() + 3600, "/");
            setcookie("username", $user['login'], time() + 3600, "/");
            setcookie("lastname", $user['surname'], time() + 3600, "/");
            setcookie("birth", $user['birthTime'], time() + 3600, "/"); // Здесь сохраняем имя пользователя (realname) в куки

            // Перенаправляем пользователя на главную страницу
            header("Location: index.php?loged");
            if($user['Admin'] == '1'){
                setcookie("admin", "true", time() + 3600, "/");
            }else{
                setcookie("admin", "false", time() + 3600, "/");
                exit;
            }

        } else {
            echo "<script>
            alert('Пароль неверный');
            window.location.href = 'index.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Пользователь не найден');
            window.location.href = 'index.php';
        </script>";
    }
}
