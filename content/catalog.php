<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров</title>
    <link rel="stylesheet" href="style.css?v=1.0.2">
</head>
<body>
    <h1 style="text-align:center; margin-top: 20px;">Каталог товаров</h1>
    <div class="catalog">
        <?php
        // Подключение к базе данных
        $servername = "MySQL-8.2";
        $username = "root";
        $password = "";
        $dbname = "JFM-products";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Проверка подключения
        if ($conn->connect_error) {
            die("Ошибка подключения: " . $conn->connect_error);
        }

        // Получение данных из таблицы
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        // Вывод товаров
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>
                        <img src='{$row['imagelink']}' alt='{$row['name']}' style='width: auto;height:200px'>
                        <h3>{$row['name']}</h3>
                        <p>{$row['description']}</p>
                        <div class='price'>{$row['price']} </div>
                        <button>Купить</button>
                      </div>";
            }
        } else {
            echo "<p style='text-align:center;'>Товары отсутствуют</p>";
        }

        // Закрытие соединения
        $conn->close();
        ?>
    </div>
</body>
</html>
