-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 09:16 AM
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
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE `tbl_aboutus` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `status` enum('Publish','unpublish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`id`, `name`, `username`, `password`, `email`, `phone`, `added_on`) VALUES
(1, 'superadmin', 'admin', 'admin', 'test@example.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(1255) NOT NULL,
  `description` mediumtext NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `status` enum('Publish','Unpublish') NOT NULL,
  `added_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`id`, `title`, `description`, `blog_image`, `status`, `added_date`) VALUES
(1, 'Transforming Your Bookstore: Embracing the Power of an Online Platform', '<p>In recent years, the digital transformation has reshaped many industries, including the traditional bookstore. While physical stores continue to have their charm, moving to an online platform unlocks immense potential. Whether you\'re an independent bookstore owner or running a chain, establishing an online presence is no longer just an option&mdash;it&rsquo;s a necessity.</p>\r\n<h4>Why Take Your Bookstore Online?</h4>\r\n<ol>\r\n<li>\r\n<p><strong>Reach a Broader Audience:</strong><br>Your physical store may attract local readers, but an online platform allows you to connect with customers across the globe. With the right marketing strategies, readers can discover your books no matter where they are.</p>\r\n</li>\r\n<li>\r\n<p><strong>24/7 Accessibility:</strong><br>Unlike a brick-and-mortar store, an online bookstore is always open. This allows customers to browse and purchase books at their convenience, significantly improving sales.</p>\r\n</li>\r\n<li>\r\n<p><strong>Personalized Customer Experience:</strong><br>With the help of AI and data analytics, online bookstores can recommend books based on customer preferences, offering a personalized experience that&rsquo;s harder to achieve in-store.</p>\r\n</li>\r\n<li>\r\n<p><strong>Cost-Efficient Operations:</strong><br>While managing a physical store involves overhead costs like rent and utilities, an online platform can reduce expenses and streamline operations.</p>\r\n</li>\r\n</ol>\r\n<h4>Steps to Establish Your Online Bookstore</h4>\r\n<ol>\r\n<li>\r\n<p><strong>Choose the Right Platform</strong><br>Selecting an eCommerce platform tailored to your bookstore&rsquo;s needs is crucial. Look for features like a customizable storefront, mobile responsiveness, inventory management, and secure payment gateways. Platforms like Shopify, WooCommerce, or Magento are popular choices, offering scalability as your store grows.</p>\r\n</li>\r\n<li>\r\n<p><strong>Create an Attractive, User-Friendly Website</strong><br>Your website is the heart of your online store. Ensure it\'s visually appealing, easy to navigate, and optimized for speed. Include categories for different genres, a search bar for easy book discovery, and an intuitive checkout process.</p>\r\n</li>\r\n<li>\r\n<p><strong>Curate and Upload Your Catalog</strong><br>Organizing your book catalog is essential. Provide detailed descriptions for each book, including author bios, genres, and reviews. High-quality images of book covers and excerpts can help potential buyers make informed decisions.</p>\r\n</li>\r\n<li>\r\n<p><strong>Offer Seamless Payment and Shipping</strong><br>Customers expect secure and flexible payment options. Provide multiple payment methods, including credit cards, PayPal, and even digital wallets. Additionally, partner with reliable shipping services to ensure timely and affordable deliveries.</p>\r\n</li>\r\n<li>\r\n<p><strong>Implement Marketing Strategies</strong><br>Once your bookstore is online, you\'ll need to drive traffic to it. Utilize SEO to increase organic traffic, invest in targeted ads, and promote your store on social media. Email marketing campaigns can help engage customers with personalized recommendations, special offers, and newsletters.</p>\r\n</li>\r\n<li>\r\n<p><strong>Build a Community of Readers</strong><br>An online bookstore is more than just a shopping site&mdash;it can be a hub for book lovers. Start a blog featuring author interviews, book reviews, and reading lists. Host virtual book clubs, webinars, or live readings to foster engagement.</p>\r\n</li>\r\n<li>\r\n<p><strong>Provide Excellent Customer Support</strong><br>Offering prompt, friendly customer service is key to building trust. Include chat support or a detailed FAQ page to assist users with any inquiries about purchases, deliveries, or book recommendations.</p>\r\n</li>\r\n</ol>\r\n<h4>Key Features of a Successful Online Bookstore</h4>\r\n<ul>\r\n<li><strong>Mobile-Friendly Design:</strong> Ensure your site is optimized for mobile devices, as many users shop on their smartphones.</li>\r\n<li><strong>Book Reviews and Ratings:</strong> Allow customers to review and rate books to create a more interactive shopping experience.</li>\r\n<li><strong>Wish Lists and Personalized Recommendations:</strong> These features help engage readers and encourage repeat purchases.</li>\r\n<li><strong>Flexible Return and Refund Policies:</strong> Establish customer-friendly policies to gain trust and build loyalty.</li>\r\n</ul>\r\n<h4>Conclusion</h4>\r\n<p>As the world becomes increasingly digital, having an online platform is crucial for bookstores to thrive. By embracing eCommerce, you can extend your reach, offer a personalized experience, and stay competitive in the evolving book market. With the right strategy, your online bookstore can not only mirror the success of your physical store but even surpass it.</p>\r\n<p>Are you ready to take your bookstore online? Start today and unlock new opportunities in the digital landscape!</p>', '66f7acb145d9d_image.jpg', 'Publish', '2024-09-28 09:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(1255) NOT NULL,
  `book_description` mediumtext NOT NULL,
  `book_image` varchar(255) NOT NULL,
  `author` varchar(1255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `added_date` varchar(255) NOT NULL,
  `updated_date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`id`, `book_name`, `book_description`, `book_image`, `author`, `category_name`, `status`, `position`, `added_date`, `updated_date`) VALUES
(1, 'Master Your Thinking', 'Master Your Thinking” by Thibaut Meurisse is a book that focuses on helping individuals develop a positive mindset and overcome negative thinking patterns. 1. Awareness of your thoughts: The first step towards mastering your thinking is to become aware of your thoughts. Pay attention to the patterns, beliefs, and self-talk that influence your mindset. By understanding your thought processes, you can start making positive changes. 2. Challenge negative thoughts: Negative thoughts can hold you back from reaching your full potential. Learn to challenge these thoughts by questioning their validity and replacing them with more positive and empowering ones. This shift in thinking can lead to a more optimistic and productive mindset. 3. Embrace failure as a learning opportunity: Failure is a natural part of life, and it’s important to view it as a learning opportunity rather than a setback. By reframing failure as a chance to grow and improve, you can overcome fear and take more risks in pursuit of your goals. 4. Cultivate a growth mindset: Adopting a growth mindset means believing that your abilities and intelligence can be developed through dedication and hard work. This mindset encourages continuous learning, resilience, and a willingness to embrace challenges.', '66f27d1f81944_thumb.png', 'Thibaut Meurisse', 'Motivation', 'Unpublish', 0, '2024-09-23 19:06:48', '2024-09-24 14:34:35'),
(2, 'Rich Dad and Poor Dad', '\r\n\"Rich Dad Poor Dad\" by Robert T. Kiyosaki - Book Description:\r\n\r\n\"Rich Dad Poor Dad\" is a transformative personal finance book that has inspired millions worldwide to rethink their approach to money, wealth, and financial freedom. Written by entrepreneur and investor Robert T. Kiyosaki, the book contrasts the financial philosophies and life lessons of two father figures in his life: his own biological father, referred to as his \"Poor Dad,\" and the father of his best friend, who he calls his \"Rich Dad.\"\r\n\r\nThe story centers around these two men who shaped Kiyosaki\'s views on wealth and financial success, despite having starkly different approaches to money. His \"Poor Dad,\" a well-educated, hardworking man, followed the traditional path of getting a stable job, saving money, and living within his means. He believed in the importance of formal education and job security but struggled with financial challenges throughout his life. In contrast, his \"Rich Dad,\" who lacked formal education, was a successful entrepreneur and investor. He believed in the power of financial literacy, investing, and building passive income through smart money management.\r\n\r\nKiyosaki uses these contrasting lessons to introduce readers to key principles of wealth creation, such as the importance of financial education, the difference between assets and liabilities, and the significance of entrepreneurship and investing. He challenges conventional beliefs about work, savings, and retirement, encouraging readers to take control of their financial future by thinking outside the box.', '66f17eafb0a56_thumb.png', 'Robert Kiyosaki and Sharon Lechter', 'Motivation', 'Unpublish', NULL, '2024-09-23 20:29:01', '2024-09-23 20:29:01'),
(3, 'Atomic Habits', '**Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones** by James Clear is a groundbreaking guide that delves into the science of habit formation and transformation. Clear argues that small, incremental changes—what he terms \"atomic habits\"—can lead to remarkable results over time. \r\n\r\nIn this book, Clear presents a compelling framework for understanding how habits work, emphasizing that success is not the result of grand gestures but of consistent, daily practices. He introduces the Four Laws of Behavior Change: Make it obvious, make it attractive, make it easy, and make it satisfying. Each law is intricately explained with real-life examples, practical strategies, and actionable advice that empowers readers to take control of their behaviors.\r\n\r\nClear emphasizes the importance of identity in habit formation, arguing that true change comes from shifting one’s beliefs about oneself. He illustrates this through engaging anecdotes, from athletes to CEOs, demonstrating how embracing a new identity can drive meaningful change.\r\n\r\nThe book is not just theoretical; it is filled with practical tools and techniques, including habit stacking, the two-minute rule, and tracking your habits. These strategies help readers develop a systematic approach to building good habits while dismantling those that hold them back.\r\n\r\n\"Atomic Habits\" is both inspiring and pragmatic, making it a must-read for anyone looking to enhance their productivity, improve their health, or achieve personal goals. Clear’s engaging writing style, combined with his rich insights, makes this book a valuable resource for readers at any stage of their journey toward self-improvement. Whether you\'re looking to make a small change or undertake a significant life overhaul, Clear’s principles can guide you on your path to lasting success.', '66f180dc9de3a_thumb.png', 'James Clear', 'Motivation', 'Unpublish', NULL, '2024-09-23 20:38:16', '2024-09-23 20:38:16'),
(4, 'Srimad Bhagavad Gita', '**Srimad Bhagavad Gita**, often simply referred to as the **Bhagavad Gita**, is one of the most revered spiritual texts in the world. Part of the ancient Indian epic, the Mahabharata, the Gita is presented as a dialogue between Prince Arjuna, a warrior facing a moral and existential crisis on the battlefield of Kurukshetra, and his charioteer, Lord Krishna, who is revealed as the Supreme Divine being. Across its 700 verses, the Gita addresses profound questions about life, duty, ethics, and spirituality, offering wisdom that transcends time and culture.\r\n\r\nThe Gita opens with Arjuna’s dilemma: faced with a war that pits him against his own family, friends, and teachers, he is overwhelmed with doubt and sorrow, questioning the value of war and worldly duty. In response, Lord Krishna delivers a discourse that touches on the deepest aspects of human existence—action, knowledge, love, and renunciation. Krishna explains that it is not the external actions but the intention and detachment from the results that define true spiritual practice. He introduces Arjuna to the paths of **Karma Yoga** (the yoga of selfless action), **Jnana Yoga** (the yoga of knowledge), and **Bhakti Yoga** (the yoga of devotion), each offering different approaches to achieving liberation and union with the Divine.\r\n\r\nOne of the key teachings of the Gita is the idea of **Dharma**, or duty, and how it is shaped by an individual’s role in society and their personal circumstances. Krishna emphasizes that one must act in accordance with their dharma without attachment to success or failure, as this is the path to inner peace and ultimate liberation (Moksha). The Gita’s philosophy extends beyond religious boundaries, addressing the universal struggle between right and wrong, action and inaction, desire and duty.\r\n\r\nWhat makes the Srimad Bhagavad Gita timeless is its holistic approach to life. It blends metaphysics with practical advice, showing that spirituality is not divorced from daily life but integrated into every action. The text teaches that while material pursuits are transient, spiritual wisdom leads to lasting peace and fulfillment. It also speaks of the eternal nature of the soul, offering a vision of immortality and the continuous journey of the soul through cycles of birth and death.\r\n\r\nThe Bhagavad Gita has been praised by philosophers, theologians, and thinkers worldwide for its profound insights. Mahatma Gandhi called it his \"spiritual dictionary,\" and countless others have found in it a roadmap to ethical living and inner harmony. With its universal teachings, the Gita speaks to readers of all walks of life, offering guidance on how to live with integrity, compassion, and wisdom in the face of life\'s challenges.\r\n\r\nThrough its exploration of the highest truths, the **Srimad Bhagavad Gita** remains a source of inspiration for seekers of knowledge, peace, and purpose, providing timeless teachings that resonate deeply in the modern world. Whether read as a spiritual guide, a philosophical discourse, or a sacred scripture, the Gita continues to illuminate paths to self-realization and harmony with the divine.', '66f1823ad9ac5_thumb.png', 'Maharishi Veda Vyasa', 'Religious', 'Unpublish', NULL, '2024-09-23 20:44:07', '2024-09-23 20:44:07'),
(5, 'Harry Potter and the Philosopher\'s Stones', '<p>**Harry Potter and the Philosopher\'s Stones** is the first book in J.K. Rowling\'s beloved fantasy series. It introduces readers to Harry Potter, an orphaned boy who discovers on his eleventh birthday that he is a wizard. Rescued from his mundane life with the Dursleys, Harry is invited to attend Hogwarts School of Witchcraft and Wizardry. There, he meets friends like Ron Weasley and Hermione Granger and learns about magic, spells, and the wizarding world. As Harry uncovers the truth about his parents\' tragic past, he also discovers his own fame within the magical community as \"The Boy Who Lived.\" The story follows Harry\'s adventures as he navigates the challenges of school life, including rivalries, magical creatures, and the mysteries surrounding the Sorcerer&rsquo;s Stone&mdash;an object of immense power. As he and his friends work to thwart the dark forces aiming to steal it, the book blends themes of friendship, courage, and the struggle between good and evil. This enchanting tale captivates readers with its imaginative world, relatable characters, and timeless lessons about bravery and the importance of choice.</p>', '66f3fbe786b57_thumb.png', 'J. K. Rowling', 'Fictional ', 'Unpublish', 0, '2024-09-25 15:39:02', '2024-09-25 17:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_categories`
--

CREATE TABLE `tbl_book_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_book_categories`
--

INSERT INTO `tbl_book_categories` (`id`, `category_name`, `position`) VALUES
(1, 'Motivation', NULL),
(2, 'Romance', NULL),
(3, 'Course', NULL),
(4, 'Fictional ', NULL),
(5, 'History', NULL),
(6, 'Religious', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE `tbl_contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `query_date` varchar(50) NOT NULL,
  `status` enum('Addressed','Unaddressed') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contactus`
--

INSERT INTO `tbl_contactus` (`id`, `name`, `email`, `phone_number`, `message`, `query_date`, `status`) VALUES
(2, 'Adam Ebert', 'adamebert27@gmail.com', '+977 9861435726', 'Testing Prototype 1', '2024-09-28 13:00:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `country_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL DEFAULT 1,
  `country_name` varchar(64) DEFAULT 'Singapore',
  `country_3_code` char(3) DEFAULT NULL,
  `country_2_code` char(2) DEFAULT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Country records';

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `zone_id`, `country_name`, `country_3_code`, `country_2_code`, `area`) VALUES
(1, 1, 'Afghanistan', 'AFG', 'AF', 'other'),
(2, 1, 'Albania', 'ALB', 'AL', 'other'),
(3, 1, 'Algeria', 'DZA', 'DZ', 'other'),
(4, 1, 'American Samoa', 'ASM', 'AS', 'other'),
(5, 1, 'Andorra', 'AND', 'AD', 'other'),
(6, 1, 'Angola', 'AGO', 'AO', 'other'),
(7, 1, 'Anguilla', 'AIA', 'AI', 'other'),
(8, 1, 'Antarctica', 'ATA', 'AQ', 'other'),
(9, 1, 'Antigua and Barbuda', 'ATG', 'AG', 'other'),
(10, 1, 'Argentina', 'ARG', 'AR', 'other'),
(11, 1, 'Armenia', 'ARM', 'AM', 'other'),
(12, 1, 'Aruba', 'ABW', 'AW', 'other'),
(13, 1, 'Australia', 'AUS', 'AU', 'other'),
(14, 1, 'Austria', 'AUT', 'AT', 'europe'),
(15, 1, 'Azerbaijan', 'AZE', 'AZ', 'other'),
(16, 1, 'Bahamas', 'BHS', 'BS', 'other'),
(17, 1, 'Bahrain', 'BHR', 'BH', 'other'),
(18, 1, 'Bangladesh', 'BGD', 'BD', 'other'),
(19, 1, 'Barbados', 'BRB', 'BB', 'other'),
(20, 1, 'Belarus', 'BLR', 'BY', 'other'),
(21, 1, 'Belgium', 'BEL', 'BE', 'europe'),
(22, 1, 'Belize', 'BLZ', 'BZ', 'other'),
(23, 1, 'Benin', 'BEN', 'BJ', 'other'),
(24, 1, 'Bermuda', 'BMU', 'BM', 'other'),
(25, 1, 'Bhutan', 'BTN', 'BT', 'other'),
(26, 1, 'Bolivia', 'BOL', 'BO', 'other'),
(27, 1, 'Bosnia and Herzegowina', 'BIH', 'BA', 'other'),
(28, 1, 'Botswana', 'BWA', 'BW', 'other'),
(29, 1, 'Bouvet Island', 'BVT', 'BV', 'other'),
(30, 1, 'Brazil', 'BRA', 'BR', 'other'),
(31, 1, 'British Indian Ocean Territory', 'IOT', 'IO', 'other'),
(32, 1, 'Brunei Darussalam', 'BRN', 'BN', 'other'),
(33, 1, 'Bulgaria', 'BGR', 'BG', 'europe'),
(34, 1, 'Burkina Faso', 'BFA', 'BF', 'other'),
(35, 1, 'Burundi', 'BDI', 'BI', 'other'),
(36, 1, 'Cambodia', 'KHM', 'KH', 'other'),
(37, 1, 'Cameroon', 'CMR', 'CM', 'other'),
(38, 1, 'Canada', 'CAN', 'CA', 'other'),
(39, 1, 'Cape Verde', 'CPV', 'CV', 'other'),
(40, 1, 'Cayman Islands', 'CYM', 'KY', 'other'),
(41, 1, 'Central African Republic', 'CAF', 'CF', 'other'),
(42, 1, 'Chad', 'TCD', 'TD', 'other'),
(43, 1, 'Chile', 'CHL', 'CL', 'other'),
(44, 1, 'China', 'CHN', 'CN', 'other'),
(45, 1, 'Christmas Island', 'CXR', 'CX', 'other'),
(46, 1, 'Cocos (Keeling) Islands', 'CCK', 'CC', 'other'),
(47, 1, 'Colombia', 'COL', 'CO', 'other'),
(48, 1, 'Comoros', 'COM', 'KM', 'other'),
(49, 1, 'Congo', 'COG', 'CG', 'other'),
(50, 1, 'Cook Islands', 'COK', 'CK', 'other'),
(51, 1, 'Costa Rica', 'CRI', 'CR', 'other'),
(52, 1, 'Cote D\'Ivoire', 'CIV', 'CI', 'other'),
(53, 1, 'Croatia', 'HRV', 'HR', 'other'),
(54, 1, 'Cuba', 'CUB', 'CU', 'other'),
(55, 1, 'Cyprus', 'CYP', 'CY', 'europe'),
(56, 1, 'Czech Republic', 'CZE', 'CZ', 'europe'),
(57, 1, 'Denmark', 'DNK', 'DK', 'europe'),
(58, 1, 'Djibouti', 'DJI', 'DJ', 'other'),
(59, 1, 'Dominica', 'DMA', 'DM', 'other'),
(60, 1, 'Dominican Republic', 'DOM', 'DO', 'other'),
(61, 1, 'East Timor', 'TMP', 'TP', 'other'),
(62, 1, 'Ecuador', 'ECU', 'EC', 'other'),
(63, 1, 'Egypt', 'EGY', 'EG', 'other'),
(64, 1, 'El Salvador', 'SLV', 'SV', 'other'),
(65, 1, 'Equatorial Guinea', 'GNQ', 'GQ', 'other'),
(66, 1, 'Eritrea', 'ERI', 'ER', 'other'),
(67, 1, 'Estonia', 'EST', 'EE', 'europe'),
(68, 1, 'Ethiopia', 'ETH', 'ET', 'other'),
(69, 1, 'Falkland Islands (Malvinas)', 'FLK', 'FK', 'other'),
(70, 1, 'Faroe Islands', 'FRO', 'FO', 'other'),
(71, 1, 'Fiji', 'FJI', 'FJ', 'other'),
(72, 1, 'Finland', 'FIN', 'FI', 'europe'),
(73, 1, 'France', 'FRA', 'FR', 'europe'),
(74, 1, 'France, Metropolitan', 'FXX', 'FX', 'other'),
(75, 1, 'French Guiana', 'GUF', 'GF', 'other'),
(76, 1, 'French Polynesia', 'PYF', 'PF', 'other'),
(77, 1, 'French Southern Territories', 'ATF', 'TF', 'other'),
(78, 1, 'Gabon', 'GAB', 'GA', 'other'),
(79, 1, 'Gambia', 'GMB', 'GM', 'other'),
(80, 1, 'Georgia', 'GEO', 'GE', 'other'),
(81, 1, 'Germany', 'DEU', 'DE', 'europe'),
(82, 1, 'Ghana', 'GHA', 'GH', 'other'),
(83, 1, 'Gibraltar', 'GIB', 'GI', 'other'),
(84, 1, 'Greece', 'GRC', 'GR', 'europe'),
(85, 1, 'Greenland', 'GRL', 'GL', 'other'),
(86, 1, 'Grenada', 'GRD', 'GD', 'other'),
(87, 1, 'Guadeloupe', 'GLP', 'GP', 'other'),
(88, 1, 'Guam', 'GUM', 'GU', 'other'),
(89, 1, 'Guatemala', 'GTM', 'GT', 'other'),
(90, 1, 'Guinea', 'GIN', 'GN', 'other'),
(91, 1, 'Guinea-bissau', 'GNB', 'GW', 'other'),
(92, 1, 'Guyana', 'GUY', 'GY', 'other'),
(93, 1, 'Haiti', 'HTI', 'HT', 'other'),
(94, 1, 'Heard and Mc Donald Islands', 'HMD', 'HM', 'other'),
(95, 1, 'Honduras', 'HND', 'HN', 'other'),
(96, 1, 'Hong Kong', 'HKG', 'HK', 'other'),
(97, 1, 'Hungary', 'HUN', 'HU', 'europe'),
(98, 1, 'Iceland', 'ISL', 'IS', 'other'),
(99, 1, 'India', 'IND', 'IN', 'other'),
(100, 1, 'Indonesia', 'IDN', 'ID', 'other'),
(101, 1, 'Iran (Islamic Republic of)', 'IRN', 'IR', 'other'),
(102, 1, 'Iraq', 'IRQ', 'IQ', 'other'),
(103, 1, 'Ireland', 'IRL', 'IE', 'europe'),
(104, 1, 'Israel', 'ISR', 'IL', 'other'),
(105, 1, 'Italy', 'ITA', 'IT', 'europe'),
(106, 1, 'Jamaica', 'JAM', 'JM', 'other'),
(107, 1, 'Japan', 'JPN', 'JP', 'other'),
(108, 1, 'Jordan', 'JOR', 'JO', 'other'),
(109, 1, 'Kazakhstan', 'KAZ', 'KZ', 'other'),
(110, 1, 'Kenya', 'KEN', 'KE', 'other'),
(111, 1, 'Kiribati', 'KIR', 'KI', 'other'),
(112, 1, 'Korea, Democratic People\'s Republic of', 'PRK', 'KP', 'other'),
(113, 1, 'Korea, Republic of', 'KOR', 'KR', 'other'),
(114, 1, 'Kuwait', 'KWT', 'KW', 'other'),
(115, 1, 'Kyrgyzstan', 'KGZ', 'KG', 'other'),
(116, 1, 'Lao People\'s Democratic Republic', 'LAO', 'LA', 'other'),
(117, 1, 'Latvia', 'LVA', 'LV', 'europe'),
(118, 1, 'Lebanon', 'LBN', 'LB', 'other'),
(119, 1, 'Lesotho', 'LSO', 'LS', 'other'),
(120, 1, 'Liberia', 'LBR', 'LR', 'other'),
(121, 1, 'Libyan Arab Jamahiriya', 'LBY', 'LY', 'other'),
(122, 1, 'Liechtenstein', 'LIE', 'LI', 'other'),
(123, 1, 'Lithuania', 'LTU', 'LT', 'europe'),
(124, 1, 'Luxembourg', 'LUX', 'LU', 'europe'),
(125, 1, 'Macau', 'MAC', 'MO', 'other'),
(126, 1, 'Macedonia, The Former Yugoslav Republic of', 'MKD', 'MK', 'other'),
(127, 1, 'Madagascar', 'MDG', 'MG', 'other'),
(128, 1, 'Malawi', 'MWI', 'MW', 'other'),
(129, 1, 'Malaysia', 'MYS', 'MY', 'other'),
(130, 1, 'Maldives', 'MDV', 'MV', 'other'),
(131, 1, 'Mali', 'MLI', 'ML', 'other'),
(132, 1, 'Malta', 'MLT', 'MT', 'europe'),
(133, 1, 'Marshall Islands', 'MHL', 'MH', 'other'),
(134, 1, 'Martinique', 'MTQ', 'MQ', 'other'),
(135, 1, 'Mauritania', 'MRT', 'MR', 'other'),
(136, 1, 'Mauritius', 'MUS', 'MU', 'other'),
(137, 1, 'Mayotte', 'MYT', 'YT', 'other'),
(138, 1, 'Mexico', 'MEX', 'MX', 'other'),
(139, 1, 'Micronesia, Federated States of', 'FSM', 'FM', 'other'),
(140, 1, 'Moldova, Republic of', 'MDA', 'MD', 'other'),
(141, 1, 'Monaco', 'MCO', 'MC', 'other'),
(142, 1, 'Mongolia', 'MNG', 'MN', 'other'),
(143, 1, 'Montserrat', 'MSR', 'MS', 'other'),
(144, 1, 'Morocco', 'MAR', 'MA', 'other'),
(145, 1, 'Mozambique', 'MOZ', 'MZ', 'other'),
(146, 1, 'Myanmar', 'MMR', 'MM', 'other'),
(147, 1, 'Namibia', 'NAM', 'NA', 'other'),
(148, 1, 'Nauru', 'NRU', 'NR', 'other'),
(149, 1, 'Nepal', 'NPL', 'NP', 'other'),
(150, 1, 'Netherlands', 'NLD', 'NL', 'europe'),
(151, 1, 'Netherlands Antilles', 'ANT', 'AN', 'other'),
(152, 1, 'New Caledonia', 'NCL', 'NC', 'other'),
(153, 1, 'New Zealand', 'NZL', 'NZ', 'other'),
(154, 1, 'Nicaragua', 'NIC', 'NI', 'other'),
(155, 1, 'Niger', 'NER', 'NE', 'other'),
(156, 1, 'Nigeria', 'NGA', 'NG', 'other'),
(157, 1, 'Niue', 'NIU', 'NU', 'other'),
(158, 1, 'Norfolk Island', 'NFK', 'NF', 'other'),
(159, 1, 'Northern Mariana Islands', 'MNP', 'MP', 'other'),
(160, 1, 'Norway', 'NOR', 'NO', 'other'),
(161, 1, 'Oman', 'OMN', 'OM', 'other'),
(162, 1, 'Pakistan', 'PAK', 'PK', 'other'),
(163, 1, 'Palau', 'PLW', 'PW', 'other'),
(164, 1, 'Panama', 'PAN', 'PA', 'other'),
(165, 1, 'Papua New Guinea', 'PNG', 'PG', 'other'),
(166, 1, 'Paraguay', 'PRY', 'PY', 'other'),
(167, 1, 'Peru', 'PER', 'PE', 'other'),
(168, 1, 'Philippines', 'PHL', 'PH', 'other'),
(169, 1, 'Pitcairn', 'PCN', 'PN', 'other'),
(170, 1, 'Poland', 'POL', 'PL', 'europe'),
(171, 1, 'Portugal', 'PRT', 'PT', 'europe'),
(172, 1, 'Puerto Rico', 'PRI', 'PR', 'other'),
(173, 1, 'Qatar', 'QAT', 'QA', 'other'),
(174, 1, 'Reunion', 'REU', 'RE', 'other'),
(175, 1, 'Romania', 'ROM', 'RO', 'europe'),
(176, 1, 'Russian Federation', 'RUS', 'RU', 'other'),
(177, 1, 'Rwanda', 'RWA', 'RW', 'other'),
(178, 1, 'Saint Kitts and Nevis', 'KNA', 'KN', 'other'),
(179, 1, 'Saint Lucia', 'LCA', 'LC', 'other'),
(180, 1, 'Saint Vincent and the Grenadines', 'VCT', 'VC', 'other'),
(181, 1, 'Samoa', 'WSM', 'WS', 'other'),
(182, 1, 'San Marino', 'SMR', 'SM', 'other'),
(183, 1, 'Sao Tome and Principe', 'STP', 'ST', 'other'),
(184, 1, 'Saudi Arabia', 'SAU', 'SA', 'other'),
(185, 1, 'Senegal', 'SEN', 'SN', 'other'),
(186, 1, 'Seychelles', 'SYC', 'SC', 'other'),
(187, 1, 'Sierra Leone', 'SLE', 'SL', 'other'),
(188, 1, 'Singapore', 'SGP', 'SG', 'other'),
(189, 1, 'Slovakia (Slovak Republic)', 'SVK', 'SK', 'other'),
(190, 1, 'Slovenia', 'SVN', 'SI', 'europe'),
(191, 1, 'Solomon Islands', 'SLB', 'SB', 'other'),
(192, 1, 'Somalia', 'SOM', 'SO', 'other'),
(193, 1, 'South Africa', 'ZAF', 'ZA', 'other'),
(194, 1, 'South Georgia and the South Sandwich Islands', 'SGS', 'GS', 'other'),
(195, 1, 'Spain', 'ESP', 'ES', 'europe'),
(196, 1, 'Sri Lanka', 'LKA', 'LK', 'other'),
(197, 1, 'St. Helena', 'SHN', 'SH', 'other'),
(198, 1, 'St. Pierre and Miquelon', 'SPM', 'PM', 'other'),
(199, 1, 'Sudan', 'SDN', 'SD', 'other'),
(200, 1, 'Suriname', 'SUR', 'SR', 'other'),
(201, 1, 'Svalbard and Jan Mayen Islands', 'SJM', 'SJ', 'other'),
(202, 1, 'Swaziland', 'SWZ', 'SZ', 'other'),
(203, 1, 'Sweden', 'SWE', 'SE', 'europe'),
(204, 1, 'Switzerland', 'CHE', 'CH', 'other'),
(205, 1, 'Syrian Arab Republic', 'SYR', 'SY', 'other'),
(206, 1, 'Taiwan', 'TWN', 'TW', 'other'),
(207, 1, 'Tajikistan', 'TJK', 'TJ', 'other'),
(208, 1, 'Tanzania, United Republic of', 'TZA', 'TZ', 'other'),
(209, 1, 'Thailand', 'THA', 'TH', 'other'),
(210, 1, 'Togo', 'TGO', 'TG', 'other'),
(211, 1, 'Tokelau', 'TKL', 'TK', 'other'),
(212, 1, 'Tonga', 'TON', 'TO', 'other'),
(213, 1, 'Trinidad and Tobago', 'TTO', 'TT', 'other'),
(214, 1, 'Tunisia', 'TUN', 'TN', 'other'),
(215, 1, 'Turkey', 'TUR', 'TR', 'other'),
(216, 1, 'Turkmenistan', 'TKM', 'TM', 'other'),
(217, 1, 'Turks and Caicos Islands', 'TCA', 'TC', 'other'),
(218, 1, 'Tuvalu', 'TUV', 'TV', 'other'),
(219, 1, 'Uganda', 'UGA', 'UG', 'other'),
(220, 1, 'Ukraine', 'UKR', 'UA', 'other'),
(221, 1, 'United Arab Emirates', 'ARE', 'AE', 'other'),
(222, 1, 'United Kingdom', 'GBR', 'GB', 'uk'),
(223, 1, 'United States', 'USA', 'US', 'other'),
(224, 1, 'United States Minor Outlying Islands', 'UMI', 'UM', 'other'),
(225, 1, 'Uruguay', 'URY', 'UY', 'other'),
(226, 1, 'Uzbekistan', 'UZB', 'UZ', 'other'),
(227, 1, 'Vanuatu', 'VUT', 'VU', 'other'),
(228, 1, 'Vatican City State (Holy See)', 'VAT', 'VA', 'other'),
(229, 1, 'Venezuela', 'VEN', 'VE', 'other'),
(230, 1, 'Viet Nam', 'VNM', 'VN', 'other'),
(231, 1, 'Virgin Islands (British)', 'VGB', 'VG', 'other'),
(232, 1, 'Virgin Islands (U.S.)', 'VIR', 'VI', 'other'),
(233, 1, 'Wallis and Futuna Islands', 'WLF', 'WF', 'other'),
(234, 1, 'Western Sahara', 'ESH', 'EH', 'other'),
(235, 1, 'Yemen', 'YEM', 'YE', 'other'),
(236, 1, 'Yugoslavia', 'YUG', 'YU', 'other'),
(237, 1, 'The Democratic Republic of Congo', 'DRC', 'DC', 'other'),
(238, 1, 'Zambia', 'ZMB', 'ZM', 'other'),
(239, 1, 'Zimbabwe', 'ZWE', 'ZW', 'other'),
(240, 1, 'East Timor', 'XET', 'XE', 'other'),
(241, 1, 'Jersey', 'XJE', 'XJ', 'other'),
(242, 1, 'St. Barthelemy', 'XSB', 'XB', 'other'),
(243, 1, 'St. Eustatius', 'XSE', 'XU', 'other'),
(244, 1, 'Canary Islands', 'XCA', 'XC', 'other');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book_categories`
--
ALTER TABLE `tbl_book_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_book_categories`
--
ALTER TABLE `tbl_book_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
