CREATE DATABASE online_voting;

USE online_voting;

CREATE TABLE voters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    voter_id VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Prepopulate with voters
INSERT INTO voters (voter_id, password) VALUES
('voter1', 'password1'),
('voter2', 'password2'),
('voter3', 'password3'),
('voter4', 'password4'),
('voter5', 'password5');
