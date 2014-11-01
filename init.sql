DROP database IF EXISTS YHack;
create database YHack;
GRANT usage on *.* to 'YHackUser'@'localhost';
DROP USER 'YHackUser'@'localhost';
CREATE USER 'YHackUser'@'localhost' IDENTIFIED BY 'mypass';
GRANT ALL PRIVILEGES ON YHack.* TO 'YHackUser'@'localhost';

USE YHack;

DROP table IF EXISTS student;
CREATE TABLE student
(
username varchar(255) NOT NULL,
LastName varchar(255) NOT NULL,
FirstName varchar(255) NOT NULL,
password varchar(255) NOT NULL,
access_token varchar(255),
refresh_token varchar(255),
expire_time int,
PRIMARY KEY (username)
);

insert into student(username, LastName, FirstName, password) values
('Smi_Jo', 'Smith', 'John', MD5('password')),
('Jo_Bo', 'Jones', 'Bob', MD5('password')),
('Bi_bo', 'Bob', 'Billy', MD5('password')),
('Wi_Whe', 'Wheaton', 'Will', MD5('password'));

DROP table IF EXISTS faculty;
CREATE TABLE faculty
(
id int NOT NULL AUTO_INCREMENT,
name varchar(255) NOT NULL,
PRIMARY KEY (id)
);

insert into faculty(name) values
('Engineering And Computer Science'),
('Creative Arts');

DROP table IF EXISTS course;
CREATE TABLE course
(
faculty_id int NOT NULL,
faculty varchar(5) NOT NULL,
code int NOT NULL,
name varchar(255) NOT NULL,
PRIMARY KEY (faculty, code),
FOREIGN KEY (faculty_id) REFERENCES faculty(id)
);

insert into course(faculty_id, faculty, code, `name`) values
((select id from faculty limit 1),'COMP', 326, 'Algorithms'),
((select id from faculty limit 1),'COMP', 202, 'Data Structures'),
((select id from faculty limit 1),'ENGR', 213, 'Differential Equations'),
((select id from faculty limit 1),'MAST', 309, 'Crazy Rocket science math');

DROP table IF EXISTS bookListing;
CREATE TABLE bookListing
(
id int NOT NULL AUTO_INCREMENT,
faculty varchar(5) NOT NULL,
code int NOT NULL,
isbn varchar(13) NOT NULL,
title varchar(255) NOT NULL,
author varchar(255) NOT NULL,
seller varchar(255) NOT NULL,
price DECIMAL(10,2) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (faculty, code) REFERENCES course(faculty, code),
FOREIGN KEY (seller) REFERENCES student(username)
);

insert into bookListing(faculty, code, isbn, title, author, seller, price) values
('COMP', 326, '5423659874512', 'Really Cool Algorithms', 'Allan Turing', 'Smi_Jo', 30),
('COMP', 326, '5423659874512', 'Cool Algorithms', 'Allan Turing', 'Jo_Bo', 25.6),
('COMP', 202, '5423659874514', 'Really Cool Algorithms', 'Donald Knuth', 'Wi_Whe', 8.2),
('COMP', 202, '5423659874514', 'Really Cool Algorithms', 'Donald Knuth', 'Smi_Jo', 9.5),
('ENGR', 213, '5423659874516', 'Math Book', 'Isaac Newton', 'Bi_bo', 21.3),
('ENGR', 213, '5423659874516', 'Important Math Book', 'Newton', 'Smi_Jo', 40),
('MAST', 309, '5423659874518', 'How do to rocket science math', 'Einstein', 'Bi_bo', 8.4),
('MAST', 309, '5423659874518', 'How to do rocket science', 'Albert Einstein', 'Smi_Jo', 12.8);

DROP table IF EXISTS book_transaction;
CREATE TABLE book_transaction
(
id int NOT NULL,
buyer varchar(255) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (id) REFERENCES bookListing(id),
FOREIGN KEY (buyer) REFERENCES student(username)
);

insert into book_transaction(id, buyer) values
((select id from bookListing where seller = 'Smi_Jo' limit 1), 'Wi_Whe'),
((select id from bookListing where seller = 'Wi_Whe' limit 1), 'Smi_Jo'),
((select id from bookListing where seller = 'Bi_bo' limit 1), 'Jo_Bo');
