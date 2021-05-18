-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 11:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novel_vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(50) NOT NULL,
  `vehicle_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `vehicle_id`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `address_id` int(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_licence` varchar(50) NOT NULL,
  `customer_number` varchar(50) NOT NULL,
  `customer_locality` varchar(50) NOT NULL,
  `customer_town` varchar(50) NOT NULL,
  `customer_state` varchar(50) NOT NULL,
  `customer_pin` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`address_id`, `customer_name`, `customer_licence`, `customer_number`, `customer_locality`, `customer_town`, `customer_state`, `customer_pin`, `user_id`) VALUES
(1, 'user', 'Vehicle5865', '1536587458', 'Phagwara', 'Jalandhar', 'Punjab', '526548', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rent_details`
--

CREATE TABLE `rent_details` (
  `rent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `rent_days` int(11) NOT NULL,
  `rent_date` date NOT NULL,
  `total_price` int(50) NOT NULL,
  `seller_confirmation` varchar(50) NOT NULL,
  `user_confirmation` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_details`
--

INSERT INTO `rent_details` (`rent_id`, `user_id`, `address_id`, `vehicle_id`, `seller_id`, `rent_days`, `rent_date`, `total_price`, `seller_confirmation`, `user_confirmation`, `payment_status`) VALUES
(7, 1, 1, 19, 3, 4, '2021-03-21', 560, 'GoingOn', 'Pending', 'Pending'),
(8, 1, 1, 12, 2, 2, '2021-03-21', 800, 'Pending', 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `seller_details`
--

CREATE TABLE `seller_details` (
  `seller_id` int(50) NOT NULL,
  `seller_name` varchar(50) NOT NULL,
  `seller_phone` varchar(50) NOT NULL,
  `seller_email` varchar(50) NOT NULL,
  `seller_dl` varchar(50) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_locality` varchar(50) NOT NULL,
  `shop_town_pin` int(50) NOT NULL,
  `shop_town` varchar(50) NOT NULL,
  `shop_district` varchar(50) NOT NULL,
  `shop_state` varchar(50) NOT NULL,
  `seller_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_details`
--

INSERT INTO `seller_details` (`seller_id`, `seller_name`, `seller_phone`, `seller_email`, `seller_dl`, `shop_name`, `shop_locality`, `shop_town_pin`, `shop_town`, `shop_district`, `shop_state`, `seller_password`) VALUES
(1, 'seller', '9115486817', 'seller@gmail.com', 'seller45652', 'myshop11', 'lpu', 144411, 'jalandhar', 'jalandhar', 'punjab', 'seller'),
(2, 'PD', '9115486855', 'pd@gmail.com', 'pd1234', 'Best Agriculture', 'Bareilly', 263514, 'Bareilly', 'Bareilly', 'Uttar Pradesh', 'pd123'),
(3, 'Viraj', '9156887435', 'viraj@gmail.com', 'viraj7865', 'Travel && Tour', 'Allahabad', 458766, 'Allahabad', 'Allahabad', 'Uttar Pradesh', 'viraj');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_aadhaar` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_pass`, `user_aadhaar`, `user_address`) VALUES
(1, 'User', '8365884168', 'user@gmail.com', 'user', '', ''),
(2, 'Prabhakar', '8638952652', 'prabhakar@gmail.com', 'prabhakar', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_cat` varchar(50) NOT NULL,
  `vehicle_subcat` varchar(50) NOT NULL,
  `vehicle_company` varchar(50) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `vehicle_images` varchar(50) NOT NULL,
  `vehicle_number` varchar(50) NOT NULL,
  `vehicle_model` varchar(50) NOT NULL,
  `vehicle_fuel` varchar(50) NOT NULL,
  `vehicle_details` text NOT NULL,
  `vehicle_price` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_cat`, `vehicle_subcat`, `vehicle_company`, `vehicle_name`, `vehicle_images`, `vehicle_number`, `vehicle_model`, `vehicle_fuel`, `vehicle_details`, `vehicle_price`, `seller_id`) VALUES
(1, 'Tractor', 'agriculture', 'Mahindra ', 'Mahindra 40 HP 415 DI Tractor, Lifting Capacity: 1', 't1.jpg', 'up1254', '415 DI', 'diesel', 'Mahindra 415 is a true 40 HP tractor that has all the features which make it the perfect khaki ka boss. A powerful cylinder naturally aspirated engine offering best-in-class power. Best-in-segment torque and great backup torque gives it outstanding pulling capability. It\'s smooth PCM transmission system, optimum gear speeds, low fuel consumption, oil immersed brakes and all come together to offer the best age tractor. Go ahead and test drive the Kheti Ka Boss.', 500, 1),
(2, 'Tractor', 'agriculture', 'Massey Ferguson', 'Massey Ferguson 2635 75 HP 4WD Tractor, Cubic Capa', 't2.jpg', 'up854', '2635', 'diesel', 'Foldable ROPS, Extra heavy duty swinging Drawbar, Double spool valve, Telescopic stabilizer, Seat with belt, Front and rear weights, Round fenders, Hand parking brake, Independently working foot and hand throttle, Front weight frame.', 855, 1),
(3, 'Tractor', 'agriculture', 'Escorts', 'Escorts Farmtrac ATOM 26 Tractor', 't3.jpg', 'mp854', 'm875', 'diesel', 'Foldable ROPS, Extra heavy duty swinging Drawbar, Double spool valve, Telescopic stabilizer, Seat with belt, Front and rear weights, Round fenders, Hand parking brake, Independently working foot and hand throttle, Front weight frame.', 785, 1),
(4, 'Tractor', 'agriculture', 'Eicher', 'Eicher 188 18 HP Tractor, 1 Cylinde', 't4.jpg,t4.1.jpg,t4.2.jpg,t4.3.jpg', 'up1254', '188', 'diesel', 'Air-cooled engine\r\nDual PTO\r\nADDC, Hydromatic\r\n10 speed gearbox, Glide shift\r\nOptimised front and rear track width', 785, 1),
(5, 'Tractor', 'agriculture', 'VST', 'VST Mitsubishi Shakti VT 224 1D Ajai 4WB Tractor', 't5.jpeg', 'mp854', 'VT224-1D / AJAI-4WB', 'diesel', 'Leveraging on our skilled and qualified professionals, we are actively involved in offering a trendy range of VST Mitsubishi Shakti VT 224 1D Ajai 4WB Tractor to our valuable customers at pocket-friendly prices.', 785, 2),
(6, 'BIKE', 'traveling', 'Hero', 'HF deluxe', 'bd1.jpg', 'UP57A1212', '2019', 'petrol', 'This is best bike under this price.', 200, 2),
(7, 'BIKE', 'traveling', 'Hero', 'Splendor+', 'bs.jpg', 'UP52Q1212', '2020', 'petrol', 'Hero Splendor Plus is powered by 97.2 cc engine.This Splendor Plus engine generates a power of 8.02 PS @8000 rpm and a torque of 8.05 Nm @ 6000 rpm. Hero Splendor Plus gets Drum brakes in the front and rear. The kerb weight of Splendor Plus is 112 Kg. Hero Splendor Plus has Tubeless Tyre and Alloy Wheels.', 200, 2),
(8, 'BIKE', 'traveling', 'Hero', 'Splendor+', 'bs1.png,bs2.jpg,bs3.jpg,bs4.jpg.', 'UP52Q1215', '2020', 'petrol', 'Hero Splendor Plus is powered by 97.2 cc engine.This Splendor Plus engine generates a power of 8.02 PS @8000 rpm and a torque of 8.05 Nm @ 6000 rpm. Hero Splendor Plus gets Drum brakes in the front and rear. The kerb weight of Splendor Plus is 112 Kg. Hero Splendor Plus has Tubeless Tyre and Alloy Wheels.', 100, 2),
(9, 'BIKE', 'traveling', 'Bajaj', 'Platina ', 'p.jpg,p1.jpg,p2.jpg,p3.jpg.', 'UP57A1233', '2020', 'petrol', 'Bajaj Platina 100 is powered by 102 cc engine.This Platina 100 engine generates a power of 7.9 PS @ 7500 rpm and a torque of 8.3 Nm @ 5500 rpm. Bajaj Platina 100 gets Drum brakes in the front and rear. The kerb weight of Platina 100 is 119 Kg. Bajaj Platina 100 has Tube Tyre and Alloy Wheels.', 250, 2),
(11, 'BIKE', 'traveling', 'Eicher motor', 'Bullet', 'bike.jpg,bike1.jpg,bike2.jpg,bike3.jpg,bike4.jpg.', 'UP57A1232', '2020', 'petrol', 'The Royal Enfield Bullet was originally an overhead-valve single-cylinder four-stroke motorcycle made by Royal Enfield in Redditch, Worcestershire, now produced by Royal Enfield (India) at Chennai, Tamil Nadu, a company originally founded by Madras Motors to build Royal Enfield motorcycles under licence in India.', 150, 2),
(12, 'Trolley', 'agriculture', 'TATA', 'trolley', 'tr.png,tr1.jpeg,tr2.jpg,tr3jpg,tr3.jpg,tr4.jpg.', 'UP52w1412', '2020', 'none', 'The Tractor Trolleys are available in Two and Four wheel models. The most basic term used for the tractor attachment is Trolley or Trailer. The Tractor Trolley is known for its quality, durability, best service and availability of spare parts.', 400, 2),
(13, 'Car', 'traveling', 'Hyundai', 'i10', 'i10.jpg,i10.1.jpg,i10.2.jpg,i10.3.jpg,i10.4.jpg.', 'UP57g1231', '2020', 'petrol', 'Hyundai operates the world\'s largest integrated automobile manufacturing facility in Ulsan, South Korea which has an annual production capacity of 1.6 million units. The company employs about 75,000 people worldwide. Hyundai vehicles are sold in 193 countries through 5,000 dealerships and showrooms.', 50, 2),
(14, 'Car', 'traveling', 'Hyundai', 'I20', 'I.jpg,I1.jpg,I2.jpg,I3.jpg', 'UP57A1444', '2021', 'petrol', 'Hyundai operates the world\'s largest integrated automobile manufacturing facility in Ulsan, South Korea which has an annual production capacity of 1.6 million units.The company employs about 75,000 people worldwide. Hyundai vehicles are sold in 193 countries through 5,000 dealerships and showrooms.', 150, 2),
(15, 'Car', 'traveling', 'TATA', 'Nexon', 'n.jpg,n1.jpeg,n2.jpg,3jpg', 'UP57A6666', '2021', 'petrol', 'The sub-4m Tata Nexon is priced in the range of Rs 6.99 – Rs 12.70 lakh (ex-showroom, Delhi). Available with 1.2L petrol and 1.5L diesel engine, the Nexon returns an impressive mileage of 17.0kmpl and 21.5kmpl, respectively. Offered with an automatic as well, its key features include Harman-Kardon infotainment unit, projector headlamps, etc.', 300, 2),
(16, 'Car', 'traveling', 'Suzuki', 'swift', 'sw.jpeg,sw1.jpeg,sw2.jpeg,sw3.jpeg,sw4.jpeg.', 'UP57A1667', '2021', 'petrol', 'On road price for Maruti Suzuki Swift by cityOn road price for Maruti Suzuki Swift in IndiaBest Hatchback carsBest Maruti Suzuki carsBest Petrol carsBest Petrol Maruti Suzuki carsBest Petrol Hatchback carsBest Diesel carsBest Diesel Maruti Suzuki carsBest Diesel Hatchback carsBest cars between 3 Lakh to 5 LakhBest Maruti Suzuki cars between 3 Lakh to 5 LakhBest Hatchback between 3 Lakh to 5 LakhBest cars between 5 Lakh to 10 LakhBest Maruti Suzuki cars between 5 Lakh to 10 LakhBest Hatchback between 5 Lakh to 10 Lakh', 800, 3),
(17, 'Scooty', 'traveling', 'Honda', 'Activa', 'h.png,h1.png,h2.jpg,h3.jpg', 'mp57A1212', '2021', 'petrol', 'The Honda Activa 125 is powered by a 124 cc air-cooled engine which produces of power. It has a fuel tank of 5.3 L and a . The Honda Activa 125 starts at Rs 70,629 and goes up to Rs 77,752 (ex-showroom, Delhi). It is available in three variants.', 100, 3),
(18, 'Scooty', 'traveling', 'YAMAHA', 'fascino', 'y.jpg,y1.jpg,y2.jpg,y3.jpg', 'UP57A4444', '2021', 'petrol', 'Yamaha Scooters price starts at Rs 70,330. Yamaha offers total of 3 scooters of which 1 model is upcoming which include NMax 155.\r\n...\r\nYamaha Scooters Price List 2021 in India.\r\n', 300, 3),
(19, 'E-Riksha', 'earn_money', ' Erickshaw.', 'E-Riksha', 'e.jpg,e1.jpg,e2.jpg,e3.jpg,e4.jpg', 'UP57A1555', '2021', 'electric', 'Electric rickshaws (also known as electric tuk-tuks or e-rickshaws or toto or e-tricycles) have been becoming more popular in some cities since 2008 as an alternative to auto rickshaws and pulled rickshaws because of their low fuel cost, and less human effort compared to pulled rickshaws.', 140, 3),
(20, 'Cycle', '', 'Hero', 'hero', 'cy.jpg,cy1.jpeg,cy2.jpg,cy3.jpg,cy4.jpg', 'UP52Q1212', '2021', 'none', 'The business cycle is the natural rise and fall of economic growth that occurs over time. The cycle is a useful tool for analyzing the economy. It can also help you make better financial decisions.', 230, 3),
(21, 'Bus', 'earn_money', 'TATA', 'super', 'bus.jpg,bus1.jpg,bus2.jpg.', 'UP52z1312', '2021', 'diesel', '', 170, 3),
(22, 'taxi', 'earn_money', 'Mahindra', 'Mahindra', 'j.jpg,j1.jpg,j2.jpg', 'UP52p1912', '2021', 'diesel', 'Jeep is a brand of American automobile and a division of Stellantis. ... Jeep\'s current product range consists solely of sport utility vehicles – both crossovers and fully off-road worthy SUVs and models, including one pickup truck.', 280, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `rent_details`
--
ALTER TABLE `rent_details`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `seller_details`
--
ALTER TABLE `seller_details`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `address_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rent_details`
--
ALTER TABLE `rent_details`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seller_details`
--
ALTER TABLE `seller_details`
  MODIFY `seller_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
