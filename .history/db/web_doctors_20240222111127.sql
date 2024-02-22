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
  `passwd` varchar(100) NOT NULL
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
  `medicine_name` varchar(50) NOT NULL,
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

-- Generate Medications --

INSERT INTO `pharmacy` (`pharm_id`, `pharm_name`, `pharm_inventory`) VALUES
(1, 'CVS', 100),
(2, 'Walgreens', 100),
(3, 'Rite Aid', 100),
(4, 'Walmart', 100),
(5, 'Kroger', 100)

INSERT INTO `medicine_inventory` (`medicine_id`, `medicine_qty`, `medicine_price`, `pharm_id`) VALUES
(1, 100, 10, 1),
(2, 100, 20, 2),
(3, 100, 30, 3),
(4, 100, 40, 4),
(5, 100, 50, 5),
(6, 100, 60, 1),
(7, 100, 70, 2),
(8, 100, 80, 3),
(9, 100, 90, 4),
(10, 100, 100, 5)