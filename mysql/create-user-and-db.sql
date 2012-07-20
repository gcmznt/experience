CREATE USER 'uid'@'localhost' IDENTIFIED BY 'pwd';
GRANT USAGE ON * . * TO 'uid'@'localhost' IDENTIFIED BY 'pwd';
CREATE DATABASE IF NOT EXISTS dbname;
GRANT ALL PRIVILEGES ON dbname . * TO 'uid'@'localhost';
