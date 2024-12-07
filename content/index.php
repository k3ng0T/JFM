<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('session.cookie_lifetime', 3600);  // Установим продолжительность жизни cookie на 1 час
ini_set('session.cookie_path', '/');
ini_set('session.cookie_domain', '.entify.kz');  // Ваш домен
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

require_once('googleauth.php')
?>

<!DOCTYPE html>
<html lang="kk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Страница экзаменов</title>
        <link rel="stylesheet" href="style.css?v=1.0.2">
        <link rel="stylesheet" href="animations.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>
<body>
    <header>
    <div class="top-menu visible" style='  background: linear-gradient(135deg, #af32c6, #7839d9, #2bbdee, #152cc7);'>
            <div class="Logo">
                <a href="index.php">
                    <img src="https://jfmshop1.hb.kz-ast.bizmrg.com/NEWPHOTOS/Logo.png" alt="Логотип" >
                </a>
            </div>
            <div class="nav-links">
                <a href="index.php">Главная</a>
                <a href="catalog.html.php">Каталог</a>
                <a href="bin.html.php">Корзина</a>
            </div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Поиск по сайту" />
                <button onclick="searchProducts()" class="cta-button">Поиск</button>
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
    <div id="login-dia">

<div class="login-container" id="login-container" style="height: 650px;">
    <div id="closemodal">
        <span>&#10005;</span>
    </div>
    <div class="login-form-container login-sign-up">
        <form action="register.php" method="post">
            <h1>Регистрация</h1>
            <div class="login-logo-container">
                <img src="" alt="Логотип" class="login-logo">
            </div>
            <div class="login-social-icons">
                <a href="<?= $url ?>" class="login-icons google-login"><i class='bx bxl-google'></i></a>
                <a href="#" class="login-icons"><i class='bx bxl-facebook'></i></a>
                <a href="#" class="login-icons"><i class='bx bxl-github'></i></a>
                <a href="#" class="login-icons"><i class='bx bxl-linkedin'></i></a>
            </div>
            <div class="login-input-group">
                <input type="text" placeholder="Имя" name="first-name" required>
            </div>
            <div class="login-input-group">
                <input type="text" placeholder="Фамилия" name="last-name" required>
            </div>
            <div class="login-input-group">
                <input type="text" placeholder="Логин" name="username" required>
            </div>
            <div class="login-input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="login-input-group">
                <input type="password" placeholder="Пароль" name="password" required>
            </div>
            <div class="login-input-group">
                <input type="password" placeholder="Повтор Пароля" name="repeat-password" required>
            </div>
            <div class="login-input-group">
                <input type="date" id="birthdate" name="birthdate" placeholder="Дата Рождения" required>
            </div>

            <button type="submit" class="login-cta-button">Зарегистрироваться</button>
        </form>
    </div>

    <div class="login-form-container login-sign-in">
        <form action="checklogin.php" method="POST" id="myForm">
            <h1>Вход</h1>
            <div class="login-logo-container">
                <img src="" alt="Логотип" class="login-logo">
            </div>
            <div class="login-social-icons">
                <a href="<?= $url ?>" class="login-icons google-login"><i class='bx bxl-google'></i></a>
                <a href="#" class="login-icons"><i class='bx bxl-facebook'></i></a>
                <a href="#" class="login-icons"><i class='bx bxl-github'></i></a>
                <a href="#" class="login-icons"><i class='bx bxl-linkedin'></i></a>
            </div>
            <div class="login-input-group">
                <input type="text" placeholder="Логин" name="login" required>
            </div>
            <div class="login-input-group">
                <input type="password" placeholder="Пароль" name="password" required>
            </div>
            <button type="submit" class="login-cta-button">Войти</button>
        </form>
    </div>

    <div class="login-toggle-container">
        <div class="login-toggle">
            <div class="login-toggle-panel login-toggle-left">
                <h1>Добро Пожаловать В <br>JFM Store!</h1>
                <p>Регистрация и создание нового аккаунта!</p>
                <p class="login-register-text">
                    Уже есть аккаунт? <br><button class="login-hidden" id="login">Войти</button>
                </p>
            </div>
            <div class="login-toggle-panel login-toggle-right">
                <h1>Приветствую вас! <br> С возвращением в <br>JFM Store!</h1>
                <p>Войдите, чтобы продолжать работу на сайте</p>
                <p class="login-register-text">
                    Нету еще аккаунта на нашем сайте? <br>
                    <button class="login-hidden" id="register">Создать Аккаунт</button>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<main>
    <div class="logocat">
        <a href="index.php"><img src="https://jfmshop1.hb.kz-ast.bizmrg.com/NEWPHOTOS/Logo.png" alt=""></a>
        <a href="#" id="catalog-button"><p>Каталог</p></a>
        </div>

        <div class="catalog-menu">
          <ul class="catalog-categories">
            <li class="category">
              <a href="#">Бытовая техника</a>
              <div class="submenu">
                <ul>
                  <li><a href="#">Варочные панели (752)</a></li>
                  <li><a href="#">Духовые шкафы (579)</a></li>
                  <li><a href="#">Вытяжки (155)</a></li>
                </ul>
              </div>
            </li>
            <li class="category">
              <a href="#">Красота и здоровье</a>
              <div class="submenu">
                <ul>
                  <li><a href="#">Фены (45)</a></li>
                  <li><a href="#">Массажеры (22)</a></li>
                </ul>
              </div>
            </li>
            <li class="category">
              <a href="#">Смартфоны и фототехника</a>
              <div class="submenu">
                <ul>
                  <li><a href="#">Смартфоны (320)</a></li>
                  <li><a href="#">Планшеты (180)</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    <div class="mainimg">
        <img src="/photos/main.png" alt="" srcset="">
    </div>
    <section class="buttons-section">
    
    <div class="button-card btncrd1">
    <a href="catalog.php" class="image-link">
        <img src="https://jfmshop1.hb.kz-ast.bizmrg.com/NEWPHOTOS/home.png" alt="" class="button-image">
        <span class="button-title">Товары для дома</span>
        <p class="button-desc">Тут все товары для быта и дома.</p>
    </a>
</div>
<div class="button-card btncrd2">
    <a href="#" class="image-link">
        <img src="https://jfmshop1.hb.kz-ast.bizmrg.com/NEWPHOTOS/massage.png" alt="" class="button-image">
        <span class="button-title">Акции</span>
        <p class="button-desc">Узнайте о текущих скидках и предложениях.</p>
    </a>
</div>
<div class="button-card btncrd3">
    <a href="#" class="image-link">
        <img src="https://jfmshop1.hb.kz-ast.bizmrg.com/NEWPHOTOS/forcomp.png" alt="" class="button-image">
        <span class="button-title">Собрать ПК</span>
        <p class="button-desc">Соберите идеального пк под свои задачи</p>
    </a>
</div>

<div class="button-card btncrd4">
    <a href="#" class="image-link">
        <img src="https://jfmshop1.hb.kz-ast.bizmrg.com/NEWPHOTOS/comp.png" alt="" class="button-image">
        <span class="button-title">Готовые сборки</span>
        <p class="button-desc">Популярные и качественные варианты ПК</p>
    </a>
</div>

    </section>
    
<div class="catalog"></div>
<div class="modal-overlay">
<div class="product-card modal"></div>
</div>



</main>
    <footer>
        <div class="contactUs">
            <h1 class="footh1 animIt">Связь с нами!</h1>
            <div class="adr">
                <div class="socialMedia animIt">
                    <p>Наши Соц. сети</p>
                    <ul>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Telegram</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ul>
                </div>
                <div class="number animIt">
                    <p id="moveRight">Наши Номерa</p>
                    <ul>
                        <li>+7(707)123-45-67</li>
                        <li>+7(727)212-34-56</li>
                        <li>+7(777)123-45-67</li>
                    </ul>
                </div>
                <div class="adress animIt">
                    <p>Филиалы</p>
                    <ul>
                        <li><a href="#">Алматы</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <p style='color:#333333'>© 2024 Наш магазин. Все права защищены.</p>
        </div>
    </footer>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="script.js"></script>
    <script>
        const lgb = document.getElementsByClassName('login-body');
        const container = document.getElementById('login-container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });


        const ld = document.getElementById('login-dia');
        const opendia = document.getElementById('login-link');
        opendia.addEventListener('click', () => {
            ld.style.transform='translateX(0)';
            ld.style.display='block';
            opendia.style.display='none';
        })
        const closedia = document.getElementById('closemodal');
        closedia.addEventListener('click', () => {
            ld.style.transform='translateX(-50%)';
            ld.style.display='none';
            opendia.style.display='block';
            opendiaf.style.display='inline-block';
            document.body.classList.remove('no-scroll');
        })



        ld.addEventListener('click', (event) => {
         if (event.target === ld) {
            ld.style.transform='translateX(-50%)';
            ld.style.display='none';
            opendia.style.display='block';
            opendiaf.style.display='inline-block';
            document.body.classList.remove('no-scroll');
            }
        });
    </script>
</body>
</html>