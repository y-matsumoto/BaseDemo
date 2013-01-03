 // データベース作成
 CREATE DATABASE IF NOT EXISTS `basedemo` ;
 
 // userアカウント作成
CREATE USER 'basedemo'@'localhost' IDENTIFIED BY 'password';

// 権限をサラにする
GRANT USAGE ON * . * TO 'basedemo'@'localhost' IDENTIFIED BY 'password' 
 WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 
 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
 
 // userアカウントへ権限付与
 GRANT ALL PRIVILEGES ON `basedemo` . * TO 'basedemo'@'localhost';