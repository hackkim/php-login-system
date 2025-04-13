Access MySQL by entering the following in the terminal: mysql -u root -p
  
Create the tools_db Database: CREATE DATABASE tools_db;

Use the tools_db Database: USE tools_db;

Create the users Table: CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
