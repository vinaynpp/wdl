-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 07:01 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mrp` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `mrp`, `qty`, `image`, `description`, `status`) VALUES
(6, '7 HABBITS OF HIGHLY EFFECTIVE PEOPLE', 599, 4, '7_habbits.JPG', 'Stephen R. Covey\'s book, The 7 Habits of Highly Effective People®, continues to be a best seller for the simple reason that it ignores trends and pop psychology and focuses on timeless principles of fairness, integrity, honesty, and human dignity. ', 1),
(7, 'ZERO TO ONE', 549, 3, 'zero_to_one.JPG', 'Zero to One: Notes on Startups, or How to Build the Future is a 2014 book by the American entrepreneur and investor Peter Thiel co-written with Blake Masters', 1),
(8, 'ALIBABA', 479, 5, 'alibaba.JPG', 'In just a decade and half Jack Ma, a man who rose from humble beginnings and started his career as an English teacher, founded and built Alibaba into the second largest Internet company in the world. The company’s $25 billion IPO in 2014 was the world’s largest, valuing the company more than Facebook ', 1),
(9, 'ELON MUSK', 888, 12, 'elon_musk.JPG', 'Elon Musk: Tesla, SpaceX, and the Quest for a Fantastic Future is Ashlee Vance\'s biography of Elon Musk, published in 2015. The book traces Elon Musk\'s life from his childhood up to the time he spent at Zip2 and PayPal, and then onto SpaceX, Tesla, and SolarCity.', 1),
(10, 'HOW TO THINK LIKE STEVE JOBS', 225, 1, 'think_like_steve_jobs.JPG', 'A titan of technological innovation, Steve Jobs thought differently to everyone else. He had the mercurial ability to know what people wanted before they knew it themselves, and what\'s more, he knew how to sell that idea', 1),
(11, '$100 STARTUP', 899, 4, '100$startup.JPG', '\"Here, Chris Guillebeau shows you how to lead a life of adventure, meaning and purpose--and earn a good living. Still in his early thirties, Chris has traveled around the world--and yet he\'s never held a \"real job\" or earned a regular paycheck', 1),
(12, 'CHANAKYA NEETI', 180, 20, 'chanakya_neeti.JPG', 'Chanakya Neeti, a collection of aphorisms on topics ranging from ethics, morality to governance and more, is said to have been compiled by Chandragupta Mauryaï¿½s royal advisor, Chanakya, from a variety of ancient Indian treatises on the aforementioned topics. Chanakya, traditionally known as Kautilya or Vishnu Gupta, was an Indian teacher, philosopher, economist, jurist and royal advisor. He wrote the Arthashastra, an ancient Indian political treatise. ', 1),
(13, 'RICH DAD POOR DAD', 502, 3, 'rich_dad_poor_dad.JPG', 'Rich Dad Poor Dad is a 1997 book written by Robert Kiyosaki and Sharon Lechter. It advocates the importance of financial literacy, financial independence and building wealth through investing in assets', 1),
(14, 'THINK AND GROW RICH', 176, 4, 'think_and_grow_rich.JPG', 'Think and Grow Rich was written by Napoleon Hill in 1937 and promoted as a personal development and self-improvement book. He claimed to be inspired by a suggestion from business magnate and later-philanthropist Andrew Carnegie.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
