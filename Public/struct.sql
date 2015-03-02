CREATE TABLE b_posts(
 id INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
 post_author INT(11) NOT NULL DEFAULT 0,
 post_date DATETIME NOT NULL DEFAULT 0,
 post_content LONGTEXT ,
 post_title TEXT ,
 post_excerpt TEXT ,
 post_status VARCHAR(20) NOT NULL DEFAULT '',
 comment_status VARCHAR(20) NOT NULL DEFAULT '',
 post_modified VARCHAR(20) NOT NULL DEFAULT '',
 comment_count INT(20) NOT NULL DEFAULT 0
)DEFAULT CHARSET=utf8

CREATE TABLE b_users(
 id INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
 user_login varchar(60) NOT NULL DEFAULT '',
 user_pass varchar(60) NOT NULL DEFAULT '',
 user_reg DATETIME NOT NULL DEFAULT 0,
 user_nicename varchar(60) NOT NULL DEFAULT '',
 display_name varchar(60) NOT NULL DEFAULT '',
 user_email varchar(100) NOT NULL DEFAULT '',
 user_url varchar(100) NOT NULL DEFAULT '',
 user_status int(11) NOT NULL DEFAULT 0
)DEFAULT CHARSET=utf8