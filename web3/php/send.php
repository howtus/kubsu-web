<?php
    // Заголовки
    header('Content-Type: text/html; charset=UTF-8');

    // Параметры для подключения
    $db_host = "localhost";
    $db_user = "u16347"; // Логин БД
    $db_password = "5403462"; // Пароль БД
    $db_base = "u16347"; // Имя БД
    $db_table = "app"; // Имя Таблицы БД

    // Переменные с формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $limbs = $_POST['limbs'];
    $bio = $_POST['bio'];
    $check = $_POST['check'];
    $powers = array();
    foreach ($_POST['powers'] as $key => $value) {
        $powers[$key] = $value;
    }
    $powers_string = implode(', ', $powers);


    // Подключение к базе данных
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_base);

    // Если есть ошибка соединения, выводим её и убиваем подключение
    if ($mysqli->connect_error) {
        die('Ошибка подключения к базе данных : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

    // Если пользователь не ввел имя, сообщаем ему об этом и убиваем подключение
    if ($name == "") {
        die("Ошибка! Введите своё имя.");
    }

    // Если пользователь не ввел почту, сообщаем ему об этом и убиваем подключение
    if ($email == "") {
        die("Ошибка! Введите свой email.");
    }

    // Если пользователь не ввел биографию, сообщаем ему об этом и убиваем подключение
    if ($bio == "") {
        die("Ошибка! Напишите что-нибудь о себе.");
    }

    // Если пользователь не поставил галочку, сообщаем ему об этом и убиваем подключение
    if ($check != "on") {
        die("Вы не можете отправить форму, если не согласны с контрактом.");
    }

    // Создаем запрос в базу данных и записываем его в переменную
    $result = $mysqli->query("INSERT INTO ".$db_table." (name, email, age, sex, limbs, powers, bio) VALUES ('$name','$email',$age,'$sex',$limbs,'$powers_string','$bio')");

    // Проверка
    if ($result == true) {
        echo "<script>alert('Успешно отправлено!')</script>";
        header('Refresh: 1; url=/kubsu-web/web3/');
    } else {
        echo "Ошибка! Информация не занесена в базу данных";
    }
?>
