<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Настройки куки
ini_set('session.cookie_lifetime', 3600); // Время жизни куки - 1 час
ini_set('session.cookie_path', '/');
ini_set('session.cookie_domain', '.entify.kz'); // Ваш домен
require_once('googleauth.php');
?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animations.css">
    <link rel="stylesheet" href="profile-styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Roboto:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div class="top-menu" style='background: linear-gradient(315deg, #5F2A5F, #9A3B9A, #FF4B4B);'>
            <div class="Logo">
                <a href="index.php">
                    <img src="photos/Logo.png" alt="Логотип">
                </a>
            </div>
            <div class="nav-links">
                <a href="index.php">Главная</a>
                <a href="exams.html.php">Экзамены</a>
                <a href="contact.html.php">О Нас</a>
            </div>
            <div class="auth-button" id="auth-status">
            <?php
            if (isset($_COOKIE['user'])) {
                echo "<a href='profile.html.php' id='profile-btn' style='color:white; text-decoration:none; font-family:\"Benzin\";'>". htmlspecialchars($_COOKIE['user']) ."</a>" ;
            }else {
                echo "<a href='#' class='cta-button' id='login-link'>Войти</a>";
            }
            
            ?>
            </div>
        </div>
        
    </header>

    <main>
    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-photo">
                <img src="https://jfmshop1.hb.kz-ast.bizmrg.com/NEWPHOTOS/default-profile.png" alt="Фото профиля" id="profile-img" onclick="openAvatarDialog()">
            </div>
            <div class="profile-name">
                <?php
                echo"<h2 id='user-name' style='font-family: \"Benzin\";'>". $_COOKIE['user']." " .$_COOKIE['lastname'] ."</h2>";
                ?>
            </div>
            <div class="profile-details">
            <?php
                // Логин
                echo "<p onclick='openLoginDialog()'><strong>Логин:</strong> " . $_COOKIE['username'] . "</p>";
    
                // Дата рождения
                echo "<p onclick='openBirthdateDialog()'><strong>Дата рождения:</strong> " . $_COOKIE['birth'] . "</p>";

                echo "<button id='deleteCookiesBtn'>Удалить все куки</button>";
            ?>
            </div>
    </div>
   

    <!-- Модальное окно для редактирования аватара -->
    <dialog id="avatar-dialog">
        <div class="dialog-content">
            <h2>Изменить аватар</h2>
            <form action="update_avatar.php" method="POST" enctype="multipart/form-data">
                <label for="avatar">Выберите новое изображение:</label>
                <input type="file" name="avatar" id="avatar" accept="image/*" required>
                <button type="submit" class="cta-button">Сохранить</button>
            </form>
            <button class="cta-button close-dialog" onclick="closeAvatarDialog()">Закрыть</button>
        </div>
    </dialog>

    <!-- Модальное окно для редактирования логина -->
    <dialog id="login-dialog">
        <div class="dialog-content">
            <h2>Изменить логин</h2>
            <form action="update_login.php" method="POST">
                <label for="login">Введите новый логин:</label>
                <input type="text" name="newlogin" id="login" placeholder="Новый логин" required>
                <input type="text" name="newreplogin" id="login" placeholder="Повтор Нового логина" required>
                <button type="submit" class="cta-button">Сохранить</button>
            </form>
            <button class="cta-button close-dialog" onclick="closeLoginDialog()">Закрыть</button>
        </div>
    </dialog>

    <!-- Модальное окно для редактирования даты рождения -->
    <dialog id="birthdate-dialog">
        <div class="dialog-content">
            <h2>Изменить дату рождения</h2>
            <form action="update_birthdate.php" method="POST">
                <label for="birthdate">Введите новую дату рождения:</label>
                <input type="date" name="birthdate" id="birthdate" required>
                <button type="submit" class="cta-button">Сохранить</button>
            </form>
            <button class="cta-button close-dialog" onclick="closeBirthdateDialog()">Закрыть</button>
        </div>
    </dialog>
</main>



    <!-- Подвал -->
    <footer>
        <div class="contactUs">
            <h1 class="footh1 animIt">Связь с нами!</h1>
            <div class="adr">
                <div class="socialMedia animIt">
                    <p>Наши соцсети</p>
                    <ul>
                        <li><a href="https://www.instagram.com/dostyqschool_almaty/">Instagram</a></li>
                        <li><a href="https://dostyq-bilim.kz/">Школа</a></li>
                        <li><a href="https://www.instagram.com/dostyqschool_government/">Правительство</a></li>
                    </ul>
                </div>
                <div class="number animIt">
                    <p>Наши номера</p>
                    <ul>
                        <li>+7 (707) 123-45-67</li>
                        <li>+7 (727) 212-34-56</li>
                        <li>+7 (777) 123-45-67</li>
                    </ul>
                </div>
                <div class="adress animIt">
                    <p>Наши адреса</p>
                    <ul>
                        <li><a href="https://2gis.kz/almaty/firm/9429940001626510/76.85773%2C43.227116?m=76.858053%2C43.227464%2F18.83">Dostyq School, Алматы</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
    <script>
// Функция для открытия диалога
function openAvatarDialog() {
    const dialog = document.getElementById('avatar-dialog');
    if (dialog) {
        dialog.showModal(); // Открываем диалог
        console.log('Success!')
    } else {
        console.error("Dialog not found");
    }
}

// Функция для закрытия диалога
function closeAvatarDialog() {
    const dialog = document.getElementById('avatar-dialog');
    if (dialog) {
        dialog.close(); // Закрываем диалог
    } else {
        console.error("Dialog not found");
    }
}
// Функция для открытия диалога
function openLoginDialog() {
    const dialog = document.getElementById('login-dialog');
    if (dialog) {
        dialog.showModal(); // Открываем диалог
        console.log('Success!')
    } else {
        console.error("Dialog not found");
    }
}

// Функция для закрытия диалога
function closeLoginDialog() {
    const dialog = document.getElementById('login-dialog');
    if (dialog) {
        dialog.close(); // Закрываем диалог
    } else {
        console.error("Dialog not found");
    }
}
// Функция для открытия диалога
function openBirthdateDialog() {
    const dialog = document.getElementById('birthdate-dialog');
    if (dialog) {
        dialog.showModal(); // Открываем диалог
        console.log('Success!')
    } else {
        console.error("Dialog not found");
    }
}

// Функция для закрытия диалога
function closeBirthdateDialog() {
    const dialog = document.getElementById('birthdate-dialog');
    if (dialog) {
        dialog.close(); // Закрываем диалог
    } else {
        console.error("Dialog not found");
    }
}

document.getElementById("deleteCookiesBtn").addEventListener("click", function() {
    // Пройдемся по всем куки и удалим их
    document.cookie.split(";").forEach(function(c) {
        let cookie = c.split("=")[0];
        document.cookie = cookie + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    });
    window.location.replace("https://jfm-shop.kz"); // Замените на нужный URL

    alert("Все куки удалены!");
});

</script>
</body>
</html>
