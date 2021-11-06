-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2021 at 01:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviestreaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieID` int(11) NOT NULL,
  `movie_poster_path` varchar(255) NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `movie_vote_average` varchar(255) NOT NULL,
  `movie_overview` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `userlistID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `movie_poster_path` varchar(255) NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `movie_vote_average` varchar(255) NOT NULL,
  `movie_overview` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`userlistID`, `userID`, `movie_poster_path`, `movie_title`, `movie_vote_average`, `movie_overview`) VALUES
(3, 3, '/7p0O4mKYLIhU2E5Zcq9Z3vOZ4e9.jpg', 'Narco Sub', '3.3', 'A man will become a criminal to save his family.  Director: Shawn Welling  Writer: Derek H. Potts  Stars: Tom Vera, Tom Sizemore, Lee Majors |'),
(5, 3, '/8YZiA1o264dk0cr1USyMdph6SZl.jpg', 'Coming to America', '6.8', 'An African prince decides it’s time for him to find a princess... and his mission leads him and his most loyal friend to Queens, New York. In disguise as an impoverished immigrant, the pampered prince quickly finds himself a new job, new friends, new digs'),
(6, 3, '/acCS12FVUQ7blkC8qEbuXbsWEs2.jpg', 'Free Guy', '7.9', 'A bank teller called Guy realizes he is a background character in an open world video game called Free City that will soon go offline.'),
(13, 8, '/ttpKJ7XQxDZV252KNEHXtykYT41.jpg', 'The Last Mercenary', '7', 'A mysterious former secret service agent must urgently return to France when his estranged son  is falsely accused of arms and drug trafficking by the government, following a blunder by an overzealous bureaucrat and a mafia operation.'),
(14, 8, '/tIpGQ9uuII7QVFF0GHCFTJFfXve.jpg', 'Brahms: The Boy II', '6.1', 'After a family moves into the Heelshire Mansion, their young son soon makes friends with a life-like doll called Brahms.'),
(16, 8, '/iCi4c4FvVdbaU1t8poH1gvzT6xM.jpg', 'The Suicide Squad', '8', 'Supervillains Harley Quinn, Bloodsport, Peacemaker and a collection of nutty cons at Belle Reve prison join the super-secret, super-shady Task Force X as they are dropped off at the remote, enemy-infused island of Corto Maltese.'),
(17, 8, '/5bFK5d3mVTAvBCXi5NPWH0tYjKl.jpg', 'Space Jam: A New Legacy', '7.5', 'When LeBron and his young son Dom are trapped in a digital space by a rogue A.I., LeBron must get them home safe by leading Bugs, Lola Bunny and the whole gang of notoriously undisciplined Looney Tunes to victory over the A.I.'),
(18, 3, '/uJgdT1boTSP0dDIjdTgGleg71l4.jpg', 'Kate', '6.8', 'After she'),
(19, 3, '/kw57mXcLSshE6VzaAd7Sb6tdAcg.jpg', 'Aap Ki Khatir', '3.5', 'Widowed Arjun Khanna lives a wealthy lifestyle in London, England, along with his daughter, Shirani. He decides to re-marry widowed Betty, who also lives in London with her daughter, Anu. Years later both daughters have grown up and are of marriageable ag'),
(20, 3, '/bZnOioDq1ldaxKfUoj3DenHU7mp.jpg', 'Jurassic Hunt', '5.1', 'Female adventurer Parker joins a crew of male trophy hunters in a remote wilderness park. Their goal: slaughter genetically recreated dinosaurs for sport using rifles, arrows, and grenades. After their guide is killed by raptors, the team tries to escape ');

-- --------------------------------------------------------

--
-- Table structure for table `usermovie`
--

CREATE TABLE `usermovie` (
  `UserId` int(11) NOT NULL,
  `movieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `username`, `password`, `email`) VALUES
(2, 'verdure', '$2y$10$5hfl7ThfYDQbpelg5D3tQ.vYkmuuGCZKj.0QleNEsCHaOfoIXOu8y', 'fabricekalvanda@yahoo.com'),
(3, 'Brielle', '$2y$10$8EGUjcJQwnVlULeKqqodj.SMETGN4AylbQepVc1Loj7NnamghdthK', 'fabricekalvanda@gmail.com'),
(4, 'Gossy', '$2y$10$EM6U6Kn6yjQQKTT3l5/d3OQ/3b8txRx9nD23IVSYtFjHwUjg7wsXy', 'noellakitambila@gmail.com'),
(5, 'kalvin', '$2y$10$e.8ovklu6KNxVzcibjpw1uxDICIL8Kc2sCFAa5XktaWo7d8F7oM3K', 'example@test.com'),
(6, 'kalvina', '$2y$10$UBVVEbb1X2uh1BlwoL3e1.wMNBqaivZCp.msSnV7pUk8o67uYeUsm', 'test@example.com'),
(7, 'usertest', '$2y$10$d8xLvPrwb8utXao5M2xcROLY.O39heARTkzacPsQnRiFxCRBwdjEO', 'usertest@example.com'),
(8, 'test', '$2y$10$8USMOtM0uy/1QKbS425BA.VBWu8B.p1ZEBzlMBdVbHeVsC73cZKbO', 'test@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieID`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`userlistID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `usermovie`
--
ALTER TABLE `usermovie`
  ADD KEY `UserId` (`UserId`),
  ADD KEY `movieID` (`movieID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `userlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userlist`
--
ALTER TABLE `userlist`
  ADD CONSTRAINT `userlist_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`UserId`);

--
-- Constraints for table `usermovie`
--
ALTER TABLE `usermovie`
  ADD CONSTRAINT `usermovie_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`),
  ADD CONSTRAINT `usermovie_ibfk_2` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
