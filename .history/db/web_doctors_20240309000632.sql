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
  `desc` LONGTEXT NOT NULL,
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

CREATE TABLE `cart`(
  `cart_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `med_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_cost` decimal(11,0) NOT NULL,
)

-- Generate Medications --

INSERT INTO `pharmacy` (`pharm_id`, `pharm_name`, `pharm_inventory`) VALUES
(1, 'CVS', 100),
(2, 'Walgreens', 100),
(3, 'Rite Aid', 100),
(4, 'Walmart', 100),
(5, 'Kroger', 100);

INSERT INTO `medicine_inventory` (`img_url`,`medicine_id`,`medicine_name`, `medicine_qty`, `medicine_price`, `pharm_id`,`desc`) VALUES
('..\\img\\meds\\product_01.png', 1, 'Bioderma', 100, 10, 1, 'Bioderma Sensibio H2O Soothing Micellar Cleansing Water and Makeup Removing Solution for Sensitive Skin'),
('..\\img\\meds\\product_02.png', 2, 'CP', 100, 10, 1, 'Cetaphil Pro Dermacontrol Purifying Clay Mask With bentonite Clay for Oily, Sensitive Skin, 3 Oz Jar'),
('..\\img\\meds\\product_03.png', 3, 'Umcka', 100, 10, 1, "Nature\'s Way Umcka ColdCare Cherry Syrup, 4 Ounce"),
('..\\img\\meds\\product_04.png', 4, 'cety1Pure', 100, 10, 1,'Cetaphil Gentle Skin Cleanser for All Skin Types, Face Wash for Sensitive Skin, 16 oz'),
('..\\img\\meds\\product_05.png', 5, 'Claritin', 100, 10, 1, 'Claritin 24 Hour Allergy Medicine, Non-Drowsy Prescription Strength Allergy Relief, Loratadine Antihistamine Tablets, 45 Count'),
('..\\img\\meds\\product_06.png', 6, 'Pourrie', 100, 10, 1,'Purina Pro Plan Savor Shredded Blend Chicken & Rice Formula Adult Dry Dog Food'),
('..\\img\\meds\\product_07.png', 7, 'Cetaphil', 100, 10, 1, 'Cetaphil Moisturizing Cream for Very Dry, Sensitive Skin, Extra Strength, Fragrance Free, 3 Ounce (Pack of 3)');

INSERT INTO `people` (`user_id`, `fname`, `lname`, `email`, `tel`, `address`, `passwd`) VALUES
(1, 'John', 'Doe', 'j.d@test.com',`0921093102`,'asd','$2y$10$ECHIPPZkVnVonsM53RiHIuGxTZn79WKjk5YpOaQxXRRHlZGoWH/fW'),
(2,