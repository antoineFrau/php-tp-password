CREATE DATABASE IF NOT EXISTS tp4_password;

CREATE TABLE `users` (
	`id` INT(50) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`date_create_at` DATE NOT NULL,
	`psw_clear` varchar(255) NOT NULL,
	`psw_md5` varchar(255) NOT NULL,
	`psw_hash` varchar(255) NOT NULL,
	`psw_slat` varchar(255) NOT NULL,
	`note` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);