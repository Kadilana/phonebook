-- SQL queries for the contacts system database 

CREATE DATABASE contact_php;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone_no TEXT
);


CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone_no TEXT,
    email VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE share (
    id INT AUTO_INCREMENT PRIMARY KEY,
    share_from VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    share_to VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    status TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
    shared INT NOT NULL,
    FOREIGN KEY (shared) REFERENCES contacts(id) ON DELETE CASCADE ON UPDATE CASCADE
);
