CREATE TABLE appointment (id BIGINT AUTO_INCREMENT, start DATETIME NOT NULL, end DATETIME NOT NULL, title VARCHAR(255), info TEXT, dog_id BIGINT, user_id BIGINT, INDEX dog_id_idx (dog_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE breed (id BIGINT AUTO_INCREMENT, name VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE dog (id BIGINT AUTO_INCREMENT, name VARCHAR(255), photo VARCHAR(255), gender VARCHAR(6), birthday DATETIME, user_id BIGINT, breed_id BIGINT, INDEX user_id_idx (user_id), INDEX breed_id_idx (breed_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user (id BIGINT AUTO_INCREMENT, name VARCHAR(255), second_name VARCHAR(255), email VARCHAR(255) NOT NULL, birthday DATETIME, gender VARCHAR(6), address VARCHAR(255), city VARCHAR(255), cap VARCHAR(10), phone VARCHAR(255), cell VARCHAR(255), info TEXT, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE appointment ADD CONSTRAINT appointment_user_id_user_id FOREIGN KEY (user_id) REFERENCES user(id);
ALTER TABLE appointment ADD CONSTRAINT appointment_dog_id_dog_id FOREIGN KEY (dog_id) REFERENCES dog(id);
ALTER TABLE dog ADD CONSTRAINT dog_user_id_user_id FOREIGN KEY (user_id) REFERENCES user(id);
ALTER TABLE dog ADD CONSTRAINT dog_breed_id_breed_id FOREIGN KEY (breed_id) REFERENCES breed(id);
