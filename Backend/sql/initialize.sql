-- Create the database (if not already created)
CREATE DATABASE IF NOT EXISTS orisweb;

-- Use the database
USE orisweb;

-- Create the ads table
CREATE TABLE IF NOT EXISTS ads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deletion_token VARCHAR(255) NOT NULL
);
