<?php
$logout = ['true'];
if (count($_COOKIE) > 0) {
    foreach ($_COOKIE as $cookie_name => $cookie_value) {
        // Устанавливаем время истечения для всех куки
        setcookie($cookie_name, '', time() - 3600, '/');
    }
}

?>