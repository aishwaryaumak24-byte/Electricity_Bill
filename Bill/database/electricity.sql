-- Create Database
CREATE DATABASE IF NOT EXISTS electricity_db;

USE electricity_db;

-- Create Bills Table
CREATE TABLE bills (

    id INT AUTO_INCREMENT PRIMARY KEY,

    month VARCHAR(20) NOT NULL,

    customer_name VARCHAR(100) NOT NULL,

    address TEXT NOT NULL,

    mobile VARCHAR(15) NOT NULL,

    units INT NOT NULL,

    amount DECIMAL(10,2) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);