CREATE TABLE app (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    name varchar(128) NOT NULL,
    email varchar(256) NOT NULL,
    age int(4) UNSIGNED NOT NULL,
    sex varchar(6) NOT NULL,
    limbs int(2) UNSIGNED NOT NULL,
    powers varchar(512) NULL,
    bio varchar(512) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO app (name, email, age, sex, limbs, powers, bio) VALUES ("Diana", "expample@mail.ru", 2014, "female", 6, "super", "dasdsadas");

INSERT INTO app (name, email, age, sex, limbs, powers, bio) VALUES ("Martin", "martin228@gmail.com", 1955, "male", 6, "super, duper", "I'm from the USA!");

INSERT INTO app VALUES (0, "user", "email@email.com", 2000, "male", 4, "test power", "biography");
