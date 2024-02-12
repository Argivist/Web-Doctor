DROP DATABASE IF EXISTS web_doctors; 

CREATE DATABASE web_doctors;

USE web_doctors;

CREATE TABLE doctors (docId INT PRIMARY KEY, docName VARCHAR(100));

CREATE TABLE Pharmacist (pharmId INT PRIMARY KEY, pharmName VARCHAR(50));

