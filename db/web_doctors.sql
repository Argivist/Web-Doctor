Drop Database If Exists web_doctors;
Create Database web_doctors;
Use web_doctors;

CREATE TABLE `people` (
  `p_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) unique NOT NULL,
  `tel` bigint(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `passwd` varchar(20) NOT NULL
);

CREATE TABLE `customer` (
  `custom_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `p_id` int(11),
  `custom_fname` varchar(50) NOT NULL,
  `custom_lname` varchar(50) NOT NULL,
  foreign key(p_id) references people(p_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `pharmacy` (
  `pharm_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `pharm_name` varchar(50) NOT NULL,
  `pharm_inventory` int(11) NOT NULL
);

CREATE TABLE `medicine_inventory` (
  `medicine_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `medicine_qty` int(11) NOT NULL,
  `medicine_price` decimal(11,0) NOT NULL,
  `pharm_id` int(11),
  foreign key(pharm_id) references pharmacy(pharm_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `prescription` (
  `prescript_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `custom_id` int(11),
  `medicine_id` int(11),
  foreign key(custom_id) references customer(custom_id) ON DELETE CASCADE ON UPDATE CASCADE,
  foreign key(medicine_id) references medicine_inventory(medicine_id) ON DELETE CASCADE ON UPDATE CASCADE
);