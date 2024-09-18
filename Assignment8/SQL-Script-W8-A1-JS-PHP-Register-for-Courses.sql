-- SQL-Script-W8-A1-JS-PHP-Register-for-Courses.sql - SQL script to load data into CMSC340.w8_avail_Reg_Courses table

/*

To manage and load data into MySQL you can use either one of these tools:

1) VS Code SQL Tools 
2) mysql command Line Interface

It is recommended to use VS Code SQL Tools. It is GUI based and easier to use.

1) VS Code SQL Tools
Extension to connect to MySQL from VS Code
Connect to MySQL Database from Visual Studio Code and Run SQL Queries using SQLTools Extension
https://www.youtube.com/watch?v=wzdCpJY6Y4c&t=100s


2) mysql command Line Interface
To use the Command Line Interface (CLI) to mysql client, you have two options of invoking mysql

a)
Interactive:
start a command window on Windows (search cmd ENTER)
inside the command window, invoke mysql
cd C:\"Program Files\Ampps\mysql\bin"
mysql -u root -pmysql

inside mysql
enter SQL commands by hand one at a time and execute

to quit the session:
quit

b)
Batch:
cd to folder where this script (SQL-Script-For-Publications.sql) is located  
start a command window on Windows in the folder where the script is located
inside the command window, invoke mysql
"C:\Program Files\Ampps\mysql\bin\mysql" -u root -pmysql < SQL-Script-For-Publications.sql

*/

# inside myql, test you can access
SHOW databases;

DROP DATABASE IF EXISTS cmsc340;

CREATE DATABASE cmsc340;

USE cmsc340;

DROP TABLE IF EXISTS w8_avail_Reg_Courses;

CREATE TABLE w8_avail_Reg_Courses (
 code VARCHAR(10),
 title VARCHAR(128),
 creditHours int,
 registered boolean
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DESCRIBE w8_avail_Reg_Courses;


INSERT INTO w8_avail_Reg_Courses(code, title, creditHours, registered) 
    VALUES ("CMSC 105", "Introduction to Problem Solving and Algorithm Design", 3, False);

INSERT INTO w8_avail_Reg_Courses(code, title, creditHours, registered) 
    VALUES ("CMSC 115", "Introductory Programming", 3, False);

INSERT INTO w8_avail_Reg_Courses(code, title, creditHours, registered) 
    VALUES ("CMSC 215", "Intermediate Programming", 3, False);

INSERT INTO w8_avail_Reg_Courses(code, title, creditHours, registered) 
    VALUES ("CMSC 310", "Computer Systems and Architecture", 3, False);

INSERT INTO w8_avail_Reg_Courses(code, title, creditHours, registered) 
    VALUES ("CMSC 315", "Data Structures and Analysis", 3, False);

INSERT INTO w8_avail_Reg_Courses(code, title, creditHours, registered) 
    VALUES ("CMSC 320", "Relational Database Concepts and Applications", 3, False);

INSERT INTO w8_avail_Reg_Courses(code, title, creditHours, registered) 
    VALUES ("CMSC 345", "Software Engineering Principles and Techniques", 3, False);


SELECT * from w8_avail_Reg_Courses;