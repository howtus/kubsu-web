<?php

// Отправляем правильную кодировку.
header('Content-Type: text/html; charset=UTF-8');

// Выводим все полученные через POST параметры.
// если запрос 2-5) сделан правильно, то можно будет увидеть
// отправленный комментарий в ответе веб-сервера.
print_r($_POST);

print('Привет, мир!');
?>

<html>
<head>
	<title>Задание 2</title>
</head>
<body>
	<br>
	<img src="1.png"><br>
	<img src="2.png"><br>
	<img src="3.png"><br>
	<img src="4.png"><br>
	<img src="5.png"><br>
	<img src="6.png"><br>
	<img src="7.png">
</body>
</html>