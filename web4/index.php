<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  $messages = array();
  $messages['save'] = '';
  $messages['name'] = '';
  $messages['email'] = '';
  $messages['powers'] = '';
  $messages['bio'] = '';
  $messages['check'] = '';

  if (!empty($_COOKIE['save'])) {
    setcookie('save', '', 100000);
    $messages['save'] = 'Спасибо, результаты отправлены в базу данных';
  }

  if (!empty($_COOKIE['notsave'])) {
      setcookie('notsave', '', 100000);
      $messages['save'] = 'Ошибка отправления в базу данных.';
  }

  $errors = array();
  $errors['name'] = empty($_COOKIE['name_error']) ? '' : $_COOKIE['name_error'];
  $errors['email'] = empty($_COOKIE['email_error']) ? '' : $_COOKIE['email_error'];
  $errors['powers'] = empty($_COOKIE['powers_error']) ? '' : $_COOKIE['powers_error'];
  $errors['bio'] = empty($_COOKIE['bio_error']) ? '' : $_COOKIE['bio_error'];
  $errors['check'] = empty($_COOKIE['check_error']) ? '' : $_COOKIE['check_error'];

  // name error print
  if ($errors['name'] == 'null') {
    setcookie('name_error', '', 100000);
    $messages['name'] = 'Заполните имя';
  }
  else if ($errors['name'] == 'incorrect') {
      setcookie('name_error', '', 100000);
      $messages['name'] = 'Недопустимые символы. Введите имя заново';
  }

  // email error print
  if ($errors['email']) {
    setcookie('email_error', '', 100000);
    $messages['email'] = 'Заполните почту';
  }

  // powers error print
  if ($errors['powers']) {
    setcookie('powers_error', '', 100000);
    $messages['powers'] = 'Выберите хотя бы одну сверхспособность';
  }

  if ($errors['bio']) {
    setcookie('bio_error', '', 100000);
    $messages['bio'] = 'Напишите что-нибудь о себе';
  }

  if ($errors['check']) {
    setcookie('check_error', '', 100000);
    $messages['check'] = 'Вы не можете отправить форму не согласившись с контрактом';
  }

  // Складываем предыдущие значения полей в массив, если есть.
  $values = array();
  $powers = array();
  $powers['immortality'] = "Бессмертие";
  $powers['levitation'] = "Левитация";
  $powers['walls-walking'] = "Хождение сквозь стены";

  $values['name'] = empty($_COOKIE['name_value']) ? '' : $_COOKIE['name_value'];
  $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
  $values['year'] = empty($_COOKIE['year_value']) ? '' : $_COOKIE['year_value'];
  $values['sex'] = empty($_COOKIE['sex_value']) ? 'male' : $_COOKIE['sex_value'];
  $values['limbs'] = empty($_COOKIE['limbs_value']) ? '4' : $_COOKIE['limbs_value'];
  $values['bio'] = empty($_COOKIE['bio_value']) ? '' : $_COOKIE['bio_value'];
  // pizdec
  if (!empty($_COOKIE['powers_value'])) {
      $powers_value = json_decode($_COOKIE['powers_value']);
  }
  $values['powers'] = [];
  if (isset($powers_value) && is_array($powers_value)) {
      foreach ($powers_value as $power) {
          if (!empty($powers[$power])) {
              $values['powers'][$power] = $power;
          }
      }
  }

  include('form.php');
}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.
else {
  // Проверяем ошибки.
  $errors = FALSE;
  if (empty($_POST['name'])) {

    // Выдаем куку на день с флажком об ошибке в поле name.
    setcookie('name_error', 'null', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else if (!preg_match("#^[aA-zZ0-9-]+$#", $_POST["name"])) {
      setcookie('name_error', 'incorrect', time() + 24 * 60 * 60);
      $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на месяц.
    setcookie('name_value', $_POST['name'], time() + 30 * 24 * 60 * 60);
  }

  if (empty($_POST['email'])) {
    // Выдаем куку на день с флажком об ошибке в поле name.
    setcookie('email_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на месяц.
    setcookie('email_value', $_POST['email'], time() + 30 * 24 * 60 * 60);
  }

  $powers = array();
  foreach ($_POST['powers'] as $key => $value) {
      $powers[$key] = $value;
  }
  if (!sizeof($powers)) {
    setcookie('powers_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('powers_value', json_encode($powers), time() + 30 * 24 * 60 * 60);
  }

  if (empty($_POST['bio'])) {
    // Выдаем куку на день с флажком об ошибке в поле name.
    setcookie('bio_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на месяц.
    setcookie('bio_value', $_POST['bio'], time() + 30 * 24 * 60 * 60);
  }

  if (empty($_POST['check'])) {
    // Выдаем куку на день с флажком об ошибке в поле name.
    setcookie('check_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }

  setcookie('year_value', $_POST['year'], time() + 30 * 24 * 60 * 60);
  setcookie('sex_value', $_POST['sex'], time() + 30 * 24 * 60 * 60);
  setcookie('limbs_value', $_POST['limbs'], time() + 30 * 24 * 60 * 60);

// *************
// TODO: тут необходимо проверить правильность заполнения всех остальных полей.
// Сохранить в Cookie признаки ошибок и значения полей.
// *************

  if ($errors) {
    // При наличии ошибок перезагружаем страницу и завершаем работу скрипта.
    header('Location: index.php');
    exit();
  }
  else {
    // Удаляем Cookies с признаками ошибок.
    setcookie('name_error', '', 100000);
    setcookie('email_error', '', 100000);
    setcookie('powers_error', '', 100000);
    setcookie('bio_error', '', 100000);
    setcookie('check_error', '', 100000);
    // TODO: тут необходимо удалить остальные Cookies.
  }

    // Параметры для подключения
    $db_user = "u16347"; // Логин БД
    $db_password = "5403462"; // Пароль БД
    $db_table = "app"; // Имя Таблицы БД

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['year'];
    $sex = $_POST['sex'];
    $limbs = $_POST['limbs'];
    $bio = $_POST['bio'];
    $check = $_POST['check'];
    $powers_bd = array();
    foreach ($_POST['powers'] as $key => $value) {
        $powers_bd[$key] = $value;
    }
    $powers_string = implode(', ', $powers_bd);

    try {
        // Подключение к базе данных
        $db = new PDO('mysql:host=localhost;dbname=u16347', $db_user, $db_password, array(PDO::ATTR_PERSISTENT => true));

        // Создаем запрос в базу данных и записываем его в переменную
        $statement = $db->prepare("INSERT INTO ".$db_table." (name, email, age, sex, limbs, powers, bio) VALUES ('$name','$email',$age,'$sex',$limbs,'$powers_string','$bio')");

        $statement = $db->prepare('INSERT INTO '.$db_table.' (name, email, age, sex, limbs, powers, bio) VALUES (:name, :email, :age, :sex, :limbs, :powers, :bio)');

        $statement->execute([
            'name' => $name,
            'email' => $email,
            'age' => $age,
            'sex' => $sex,
            'limbs' => $limbs,
            'bio' => $bio,
            'powers' => $powers_string
        ]);
        setcookie('save', '1');
    } catch (PDOException $e) {
        setcookie('notsave', '1');
    }

  // Делаем перенаправление.
  header('Location: index.php');
}
?>
