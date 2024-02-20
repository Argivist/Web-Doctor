DROP DATABASE IF EXISTS webdoc; 

CREATE DATABASE webdoc;

USE web_doctors;

CREATE TABLE Pharmacy (
	pharmID INT AUTO_INCREMENT PRIMARY KEY,
	pharmName VARCHAR(50) NOT NULL,
	pharmInventory INT NOT NULL
 );

CREATE TABLE Customer (
	customID INT AUTO_INCREMENT PRIMARY KEY,
	customName VARCHAR(50) NOT NULL
 );
 
 CREATE TABLE Medicine_inventory (
	medicineID INT AUTO_INCREMENT PRIMARY KEY,
    	amount DECIMAL(13,2) NOT NULL,
    	pharmID INT,
	FOREIGN KEY (pharmID) REFERENCES Pharmacy(pharmID)
);

CREATE TABLE Prescription (
	prescriptionID INT AUTO_INCREMENT PRIMARY KEY, 
	customID INT,
    	medicineID INT,
    	FOREIGN KEY (customID) REFERENCES Customer(customID),
    	FOREIGN KEY (medicineID) REFERENCES Medicine_inventory(medicineID)
 );


