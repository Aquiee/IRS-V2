-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 05:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_irs`
--
CREATE DATABASE IF NOT EXISTS `database_irs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `database_irs`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`email`, `pass`) VALUES
('admin', '$2y$10$hfuB8DCLiLytKva4IyGowOJQU4Y5XS73BzT9TcswYsb2I.jWt4BaO');

-- --------------------------------------------------------

--
-- Table structure for table `approved_papers`
--

CREATE TABLE `approved_papers` (
  `paper_id` int(11) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_papers`
--

CREATE TABLE `research_papers` (
  `paper_id` int(11) NOT NULL,
  `paper_title` varchar(255) DEFAULT NULL,
  `paper_date` date DEFAULT NULL,
  `paper_abstract` text DEFAULT NULL,
  `paper_author` varchar(255) DEFAULT NULL,
  `paper_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_papers`
--

INSERT INTO `research_papers` (`paper_id`, `paper_title`, `paper_date`, `paper_abstract`, `paper_author`, `paper_file`) VALUES
(1, 'Library Management Systems', '2020-01-01', 'With the advancement of technology, it is imperative to exalt all the systems into a user-friendly manner. The Library Management system (LMS) acts as a tool to transform traditional libraries into digital libraries. In traditional libraries, the students/user has to search for books which are hassle process and there is no proper maintenance of database about issues/fines. The overall progress of work is slow and it is impossible to generate a fast report. The librarians have to work allotted for arranging, sorting books in the book sells. At the same time, they have to check and monitor the lend/borrow book details with its fine. It is a tedious process to work simultaneously in different sectors. LMS will assist the librarians to work easily. The LMS supports the librarians to encounter all the issues concurrently. The users need not stand in a queue for a long period to return/borrow a book from the library. The single PC contains all the data\'s in it. The librarians have to assess the system and provide an entry in it. Through LMS the librarian can find the book in the bookshelves. The LMS is designed with the basic features such as librarian can add/view/update/delete books and students\' details in it. Once he/she ingress into the system they can modify any data\'s in the database. The complete model is developed in Dot net technology, the C# language is used to build the front end application whereas the SQL server is exploiting as database. The authorized person can only access the LMS system, they have to log in with their user id and password. As aforementioned that the LMS is designed in a user-friendly manner, so the admin can smoothly activate the system without expert advice. Every data is storing and retrieving from the SQL database so it is highly secure. Thus our system contributes its new approach towards the digital library setup.', 'Shanmugam a P, Sasthri Ganeshan, Ramalakshmi A, Baalachandran S', 'LibraryManagementSystem.pdf'),
(2, 'Sparcl : A language for partially invertible computation', '2024-01-01', 'Invertibility is a fundamental concept in computer science, with various manifestations in software development (serializer/deserializer, parser/printer, redo/undo, compressor/decompressor, and so on). Full invertibility necessarily requires bijectivity, but the direct approach of composing bijective functions to develop invertible programs is too restrictive to be useful. In this paper, we take a different approach by focusing on partially invertible functions—functions that become invertible if some of their arguments are fixed. The simplest example of such is addition, which becomes invertible when fixing one of the operands. More involved examples include entropy-based compression methods (e.g., Huffman coding), which carry the occurrence frequency of input symbols (in certain formats such as Huffman tree), and fixing this frequency information makes the compression methods invertible. We develop a language Sparcl for programming such functions in a natural way, where partial invertibility is the norm and bijectivity is a special case, hence gaining significant expressiveness without compromising correctness. The challenge in designing such a language is to allow ordinary programming (the “partially” part) to interact with the invertible part freely, and yet guarantee invertibility by construction. The language Sparcl is linear-typed and has a type constructor to distinguish data that are subject to invertible computation and those that are not. We present the syntax, type system, and semantics of the language and prove that Sparcl correctly guarantees invertibility for its programs. We demonstrate the expressiveness of Sparcl with examples including tree rebuilding from preorder and inorder traversals, Huffman coding, arithmetic coding, and LZ77 compression.', 'KAZUTAKA MATSUDA, Meng Wang', 'Sparcl_A_language_for_partially_invertible_computa.pdf'),
(3, 'Advances in Human-Robot Handshaking', '2020-08-01', 'The use of social, anthropomorphic robots to support humans in various industries has been on the rise. During Human-Robot Interaction (HRI), physically interactive non-verbal behaviour is key for more natural interactions. Handshaking is one such natural interaction used commonly in many social contexts. It is one of the first non-verbal interactions which takes place and should, therefore, be part of the repertoire of a social robot. In this paper, we explore the existing state of Human-Robot Handshaking and discuss possible ways forward for such physically interactive behaviours.', 'Vignesh Prasad, Ruth Stock-Homburg', 'Advances_in_Human-Robot_Handshaking.pdf'),
(4, 'Current Advances in Biosciences- Nanotechnology in Medicine', '2024-01-01', 'Nanotechnology, a very broad area of research that has great potential in many fields, including health, construction, and electronics, involves manipulating material at the atomic or molecular level to create materials that exhibit astonishing heterogeneity and new properties. In medicine, it is used for the delivery of drugs, gene therapy, diagnosis and the complete transformation of other research, development and medical applications.', 'Divyasree.A, Renuka Devi.K, Deepa Rajendiran', '32.Bookchapter.pdf'),
(5, 'Making “CASES” for AI in Medicine', '2024-01-01', 'In this perspective, “CASES” are made for AI in medicine. The CASES mean Confidence, Adaptability, Stability, Explainability, and Security of AI systems. We underline that these CASES can be addressed not only individually but also synergistically on the large model platform and using cutting-edge diffusion-type models.', 'Ge Wang', 'Making_CASES_for_AI_in_Medicine.pdf'),
(6, 'AI\'s Threat to the Medical Profession', '2024-01-01', 'This Viewpoint discusses the potential drawbacks of the use of artificial intelligence (AI) in medicine, for example, the loss of certain skills due to the reliance on AI, and how physicians should consider how to take advantage of the potential benefits of AI without losing control over their profession.', 'Agnes B Fogo, Andreas Kronbichler, Andreas Kronbichler Medical University of Innsbruck Ingeborg M Bajema', 'Fogo_AIsThreattotheMedicalProfession.pdf'),
(7, 'Application of artificial intelligence in the development of Jamu “traditional Indonesian medicine” as a more effective drug', '2023-11-01', 'None', 'Tedi Rustandi, Erna Prihandiwati, Fakhriah Hayati, Fatah Nugroho', 'Application_of_artificial_intelligence_in_the_deve.pdf'),
(8, 'Sleep Disturbance and Burnout in Emergency Department Health Care Workers', '2023-11-01', 'This cross-sectional study examines the association of sleep disturbances with burnout among emergency medicine health care workers.', 'Ari Shechter, Tsion Firew, Maody Miranda, Nakesha Fray', 'Sleep_Disturbance_and_Burnout_in_Emergency_Departm.pdf'),
(9, 'Some Properties and Application of Cutset of a Graph', '2024-01-01', 'Graph theory is one of the most important and basic topics of discrete mathematics in Mathematics. In all sectors of science graph theory has a great impact. The common use of graphs occurs in Computer Science, Physic, Biology, Finance and Chemistry except within Mathematics itself. Our main objective is to represent the cut-set, another type of subgraph of a connected graph. If deleting a certain number of edges from a graph makes it disconnected, then those set of deleted edges are called the cutset of the graph. Properties of cut-sets and its application will be discussed. When examining the characteristics of communication and transportation networks, cut-sets are crucial, for instance if we want to know if there are any network weak points that may be strengthened.', 'Maria Vianney Any Herawati', 'Some_Properties_and_Application_of_Cutset_of_a_Gra.pdf'),
(10, 'Discovering User Interest in Social Media Based on Correlation', '2024-01-01', 'Recently, with the express growth of social media, users have joined more and more of these networks and live their lives virtually. Consequently, they create a huge amount of data on these social media sites, and they become data resources for information processing and have been widely investigated in computer science. Discovering users interests on social media is a problem that has received a lot of attention because it has high applicability in practice. The purpose of this paper is to introduce a method to detect user-interest topics on social media by analyzing the content of user’ posts. Research used a semantic expansion technique based on the Wikipedia dictionary and the N-gram technique to split; it used the TF.IDF weighted vector to represent and estimate based on Pearson correlation. The experimental results show that the research model can be applied to the analysis of many social media sites with many different languages, regardless of the network structure and language used on these social media.\r\n', 'Thi Hoi Nguyen, Dinh Que Tran', 'DiscoveringUserInterestinSocialMediaBasedonCorrelation.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_email` tinytext NOT NULL,
  `users_pass` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_email`, `users_pass`) VALUES
(4, 'user@gmail.com', '$2y$10$ssq/oVd7p6FRbJJOVE4ATuL8E8NleuVKwO7cDSHOnnxBRt90cdjom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `research_papers`
--
ALTER TABLE `research_papers`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `research_papers`
--
ALTER TABLE `research_papers`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
