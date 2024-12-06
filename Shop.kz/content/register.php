<?php
 require_once('datebase.php');
$firstname = $_POST['first-name'];
$surname = $_POST['last-name'];
$pass = $_POST['password'];
$repeatpass = $_POST['repeat-password'];
$username = $_POST['username'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$isAdmin = 0;



$checkQuery = "SELECT * FROM user WHERE login = '$username' OR email = '$email'";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) {
    echo "<script>
            alert('Логин или email уже заняты. Выберите другие.');
            window.location.href = 'index.php';
          </script>";
    exit();
}



if($pass != $repeatpass){
    
    echo"<script>
            alert('Пароли не совпадают!');
            window.location.href = 'index.php';
        </script>";
}else{
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);  // Хешируем
    $hashedPassword;

    $dateinsert = "INSERT INTO `user` (login,password,email,name,surname,birthTime,Admin,googleAuth,FacebookAuth) VALUES ('$username','$hashedPassword','$email','$firstname','$surname','$birthdate','$isAdmin','0','0')";

    $conn -> query($dateinsert);
    header("Location: index.php"); // Замените ссылку на ваш сайт или нужную страницу
    exit();
}





?>