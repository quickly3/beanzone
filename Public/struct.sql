CREATE TABLE b_posts(
 id INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
 post_author INT(11) NOT NULL DEFAULT 0,
 post_date DATETIME NOT NULL DEFAULT 0,
 post_content LONGTEXT ,
 post_title TEXT ,
 post_excerpt TEXT ,
 post_status VARCHAR(20) NOT NULL DEFAULT '',
 post_preimg VARCHAR(60) NOT NULL DEFAULT '',
 comment_status VARCHAR(20) NOT NULL DEFAULT '',
 post_modified VARCHAR(20) NOT NULL DEFAULT '',
 comment_count INT(20) NOT NULL DEFAULT 0
)DEFAULT CHARSET=utf8;

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
)DEFAULT CHARSET=utf8;

CREATE TABLE b_project(
 id INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
 pj_lastid INT(11) UNSIGNED not null DEFAULT 0,
 pj_content LONGTEXT ,
 pj_status varchar(20),
 pj_date DATETIME NOT NULL DEFAULT 0
)DEFAULT CHARSET=utf8;

CREATE TABLE b_meta(
 id INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
 meta_pid INT(11) NOT NULL DEFAULT 0,
 meta_cate VARCHAR(10) NOT NULL DEFAULT '',
 meta_val INT(4) NOT NULL DEFAULT 0,
 meta_name VARCHAR(20) NOT NULL DEFAULT '',
 meta_date DATETIME
)DEFAULT CHARSET=utf8;


CREATE TABLE b_postmeta(
 id INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
 meta_id INT(11) NOT NULL DEFAULT 0,
 post_id INT(11) NOT NULL DEFAULT 0,
 meta_val varchar(20) NOT NULL DEFAULT 0,
)DEFAULT CHARSET=utf8;


TRUNCATE b_meta;
TRUNCATE b_postmeta;
TRUNCATE b_posts;
TRUNCATE b_project;
TRUNCATE b_users;

INSERT INTO b_users(`user_login`,`user_pass`,`user_reg`) VALUE('bean',MD5('Beanbean'),NOW())

