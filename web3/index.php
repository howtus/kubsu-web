<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Задание 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script defer src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script defer src="js/main.js"></script>
</head>

<body>
    <form id="form" action="php/send.php" method="POST">
        <!-- Текстовое поле для имени -->
        <div class="field">
            <label class="label" for="name-input">Имя</label>
            <div class="control">
                <input id="name-input" name="name" class="input is-primary" type="text" placeholder="Ваше имя">
            </div>
        </div>
        <!-- Текстовое поле для почты -->
        <div class="field">
            <label for="form-email" class="label">Email</label>
            <div class="control">
                <input id="form-email" name="email" class="input is-primary" type="email" placeholder="Ваш email">
            </div>
        </div>
        <!-- Выбор из списка для года рождения -->
        <div class="field">
            <label for="age-select" class="label">Год рождения</label>
            <div class="control">
                <div class="select is-primary">
                    <select name="age" id="age-select"></select>
                </div>
            </div>
        </div>
        <!-- Радиокнопки для пола -->
        <div class="field">
            <label class="label">Пол</label>
            <div class="control">
                <label class="radio">
                    <input type="radio" name="sex" value="male" checked>
                    Мужской
                </label>
                <label class="radio">
                    <input type="radio" name="sex" value="female">
                    Женский
                </label>
            </div>
        </div>
        <!-- Радиокнопки для количества конечностей -->
        <div class="field">
            <label class="label">Количество конечностей</label>
            <div class="control">
                <label class="radio">
                    <input type="radio" name="limbs" checked value="4">
                    4
                </label>
                <label class="radio">
                    <input type="radio" name="limbs" value="6">
                    6
                </label>
                <label class="radio">
                    <input type="radio" name="limbs" value="8">
                    8
                </label>
            </div>
        </div>
        <!-- Множественный выбор сверхспособностей -->
        <div class="field">
            <label for="form-select" class="label">Сверхспособности</label>
            <div class="control">
                <div class="select is-multiple is-primary">
                    <select id="form-select" multiple size="3" name="powers[]">
                        <option value="immortality" selected>Бессмертие</option>
                        <option value="levitation">Левитация</option>
                        <option value="walls-walking">Хождение сквозь стены</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- Текстовое поле для биографии -->
        <div class="field">
            <label for="form-text" class="label">Биография</label>
            <div class="control">
                <textarea id="form-text" name="bio" class="textarea  is-primary"
                    placeholder="Напишите здесь немного о себе..."></textarea>
            </div>
        </div>
        <!-- Чекбокс -->
        <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox" name="check" checked>
                    С <a href="#" class="has-text-primary">контрактом</a> ознакомлен(а).
                </label>
            </div>
        </div>
        <!-- Кнопка отправить -->
        <div class="control">
            <button id="btn" type="submit" class="button is-light is-primary">Отправить</button>
        </div>
    </form>
</body>

</html>
