CREATE DATABASE mycontacts;

USE mycontacts;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nickname VARCHAR(100),
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20)
);
