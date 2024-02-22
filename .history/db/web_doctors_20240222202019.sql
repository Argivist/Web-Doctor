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
  `img_url` varchar(100) NOT NULL,
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

INSERT INTO `medicine_inventory` (`img_url`,`medicine_id`,`medicine_name`, `medicine_qty`, `medicine_price`, `pharm_id`) VALUES
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 1, 'Tylenol', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 2, 'Advil', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 3, 'Aspirin', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 4, 'Benadryl', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 5, 'Claritin', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 6, 'Zyrtec', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 7, 'Mucinex', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 8, 'Robitussin', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 9, 'Pepto Bismol', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 10, 'Imodium', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 11, 'Tums', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 12, 'Gas-X', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 13, 'Excedrin', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 14, 'Bayer', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 15, 'Aleve', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 16, 'Motrin', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 17, 'Sudafed', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 18, 'Nyquil', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 19, 'Dayquil', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 20, 'Theraflu', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 21, 'Vicks', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 22, 'Halls', 100, 10, 1),
('https://www.cvs.com/bizcontent/merchandising/productimages/large/5042847001.jpg', 23, 'Ricola', 100, 10, 1)
