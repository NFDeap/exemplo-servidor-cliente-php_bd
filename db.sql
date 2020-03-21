CREATE DATABASE teste;
USE teste;

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` text DEFAULT NULL,
  `comment` text DEFAULT NULL,  
  `timestamp` timestamp DEFAULT CURRENT_TIMESTAMP(),   
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;


INSERT INTO notifications(id, author, comment, timestamp) VALUES(1,'Teste', 'Oi, sou um comentário', CURTIME());


