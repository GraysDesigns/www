/*
Name:   Richard gray
Course: CMSC 340 6380
Desc:
    SQL code for creating a database and table to house course codes, titles, and credit hours.
*/

DROP DATABASE IF EXISTS cmsc340;

CREATE DATABASE cmsc340;

USE cmsc340;

DROP TABLE IF EXISTS mycourses;

CREATE TABLE IF NOT EXISTS mycourses (
    courseCode varchar(10) NOT NULL default '',
    courseTitle varchar(128) DEFAULT NULL,
    creditHours int DEFAULT 3,
    PRIMARY KEY (courseCode),
    KEY courseTitle (courseTitle(20))
) ENGINE InnoDB DEFAULT CHARSET=latin1;

SELECT * FROM cmsc340;