DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(
  id int(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  auth_key VARCHAR(32) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  password_reset_token VARCHAR(255) DEFAULT NULL,
  email VARCHAR(255) NOT NULL,
  status SMALLINT(6) NOT NULL DEFAULT 10,
  created_at INT(11) NOT NULL,
  updated_at INT(11) NOT NULL,
  verification_token varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY username (username),
  UNIQUE KEY email (email),
  UNIQUE KEY password_reset_token (password_reset_token)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS tasks;
CREATE TABLE tasks(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description BLOB NOT NULL,
    type ENUM('interno','externo') DEFAULT 'interno' NOT NULL,
    company VARCHAR(100),
    status ENUM('activo','terminado') DEFAULT 'activo' NOT NULL,
    priority ENUM('alta','baja') DEFAULT 'baja' NOT NULL,
    user_id INT NOT NULL,
    create_time datetime DEFAULT NULL COMMENT 'create time',
    update_time datetime DEFAULT NULL COMMENT 'update time',
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
