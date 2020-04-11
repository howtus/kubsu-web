<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Задание 4</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
    <form id="form" action="" method="POST">
        <?php
        if ($messages['save'] != '') {
            print '<div class="notification has-text-primary">'.$messages["save"].'</div>';
        }
        ?>
        <!-- Текстовое поле для имени -->
        <div class="field">
            <label class="label" for="name-input">Имя</label>
            <div class="control">
                <input id="name-input" name="name" class="input <?php if ($errors['name']) print 'is-danger'; else print 'is-primary' ?>" type="text" placeholder="Ваше имя" value="<?php print $values['name']; ?>" />
            </div>
            <?php
                print '<p class="help is-danger">'.$messages["name"].'</p>';
            ?>
        </div>
        <!-- Текстовое поле для почты -->
        <div class="field">
            <label for="form-email" class="label">Email</label>
            <div class="control">
                <input id="form-email" name="email" class="input <?php if ($errors['email']) print 'is-danger'; else print 'is-primary' ?>" type="email" placeholder="Ваш email" value="<?php print $values['email']; ?>" />
            </div>
            <?php
                print '<p class="help is-danger">'.$messages["email"].'</p>';
            ?>
        </div>
        <!-- Выбор из списка для года рождения -->
        <div class="field">
            <label for="year-select" class="label">Год рождения</label>
            <div class="control">
                <div class="select is-primary">
                    <select name="year" id="year-select">
                    <?php
                    for ($i = 2014; $i > 1955; $i--) {
                        print('<option value="'.$i.'"');
                        if ($values['year'] == $i) {
                            print('selected');
                        }
                        print('>'.$i.'</option>');
                    }
                    ?>
                    </select>
                </div>
            </div>
        </div>
        <!-- Радиокнопки для пола -->
        <div class="field">
            <label class="label">Пол</label>
            <div class="control">
                <label class="radio">
                    <input type="radio" name="sex" value="male"<?php if ($values['sex'] == 'male') print(' checked'); ?>/>
                    Мужской
                </label>
                <label class="radio">
                    <input type="radio" name="sex" value="female"<?php if ($values['sex'] == 'female') print(' checked'); ?>/>
                    Женский
                </label>
            </div>
        </div>
        <!-- Радиокнопки для количества конечностей -->
        <div class="field">
            <label class="label">Количество конечностей</label>
            <div class="control">
                <label class="radio">
                    <input type="radio" name="limbs" value="2"<?php if ($values['limbs'] == 2) print(" checked "); ?> />
                    2
                </label>
                <label class="radio">
                    <input type="radio" name="limbs" value="4"<?php if ($values['limbs'] == 4) print(" checked "); ?> />
                    4
                </label>
                <label class="radio">
                    <input type="radio" name="limbs" value="8"<?php if ($values['limbs'] == 8) print(" checked "); ?> />
                    8
                </label>
            </div>
        </div>
        <!-- Множественный выбор сверхспособностей -->
        <div class="field">
            <label for="form-select" class="label">Сверхспособности</label>
            <div class="control">
                <div class="select is-multiple <?php if ($errors['powers']) print 'is-danger'; else print 'is-primary' ?>">
                    <select id="form-select" name="powers[]" multiple size="3">
                        <?php
                            foreach ($powers as $key => $value) {
                                $selected = empty($values['powers'][$key]) ? '' : ' selected="selected" ';
                                printf('<option value="%s",%s>%s</option>', $key, $selected, $value);
                            }
                        ?>
                    </select>
                </div>
            </div>
            <?php
                print '<p class="help is-danger">'.$messages["powers"].'</p>';
            ?>
        </div>
        <!-- Текстовое поле для биографии -->
        <div class="field">
            <label for="form-text" class="label">Биография</label>
            <div class="control">
                <textarea id="form-text" name="bio" class="textarea <?php if ($errors['bio']) print 'is-danger'; else print 'is-primary' ?>" placeholder="Напишите здесь немного о себе..."><?php print $values['bio']; ?></textarea>
            </div>
            <?php
                print '<p class="help is-danger">'.$messages["bio"].'</p>';
            ?>
        </div>
        <!-- Чекбокс -->
        <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox" name="check" value="ok">
                    С <a href="#" class="has-text-primary">контрактом</a> ознакомлен(а).
                </label>
            </div>
        </div>
        <?php
            print '<p class="help is-danger">'.$messages["check"].'</p>';
        ?>
        <!-- Кнопка -->
        <div class="control">
            <button id="btn" type="submit" class="button is-light is-primary">Отправить</button>
        </div>
    </form>
</body>
</html>
