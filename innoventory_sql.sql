-- Run this SQL in phpMyAdmin to create DB and table + a sample admin user
CREATE DATABASE IF NOT EXISTS innoventory_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE innoventory_db;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role ENUM('admin','user') DEFAULT 'user',
  status ENUM('pending','approved','denied') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Example admin account (password is 'admin123' hashed)
INSERT INTO users (name,email,password,role,status) VALUES
('Admin','admin@local','<?php // placeholder ?>','admin','approved'); 
-- NOTE: Replace the placeholder password with a real hashed password or use phpMyAdmin to set password.
