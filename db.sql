CREATE TABLE `users` (
	`id` INT (10) PRIMARY KEY AUTO_INCREMENT, 
	`email` VARCHAR (255) UNIQUE NOT NULL DEFAULT'',
	`password` VARCHAR (765) NOT NULL DEFAULT '',
	`permissions` TEXT ,
	`activated` TINYINT (1),
	`activation_code` VARCHAR (765),
	`activated_at` DATETIME ,
	`last_login` DATETIME ,
	`persist_code` VARCHAR (765),
	`reset_password_code` VARCHAR (765),
	`first_name` VARCHAR (765),
	`last_name` VARCHAR (765),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`deleted_at` DATETIME
)CHARSET='utf8';

CREATE TABLE `posts` (
	`id` INT (10) PRIMARY KEY AUTO_INCREMENT,
	`title` VARCHAR (765),
	`summary` VARCHAR (765),
	`body` TEXT ,
	`user_id` INT (10),
	`created_at` DATETIME ,
	`updated_at` DATETIME ,
	`deleted_at` DATETIME 
)CHARSET='utf8';