-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 10:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ultronbookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminname` varchar(30) NOT NULL,
  `adminpass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminname`, `adminpass`) VALUES
('UltronAfif', '1dda88a83afcdc380da7'),
('UltronDaus', '370906517483dca1e425'),
('UltronUniKL', 'ultronadmin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn` varchar(20) NOT NULL,
  `booktitle` varchar(50) NOT NULL,
  `bookdesc` text NOT NULL,
  `bookprice` decimal(6,2) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `bookimage` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `booktitle`, `bookdesc`, `bookprice`, `author`, `publisher`, `category`, `bookimage`) VALUES
('081356381X', 'Frank Miller\'s Daredevil and the Ends of Heroism', 'In the late 1970s and early 1980s, writer-artist Frank Miller turned Daredevil from a tepid-selling comic into an industry-wide success story, doubling its sales within three years. Lawyer by day and costumed vigilante by night, the character of Daredevil was the perfect vehicle for the explorations of heroic ideals and violence that would come to define Miller\'s work. Frank Miller\'s Daredevil and the Ends of Heroism is both a rigorous study of Miller\'s artistic influences and innovations and a reflection on how his visionary work on Daredevil impacted generations of comics publishers, creators, and fans. Paul Young explores the accomplishments of Miller the writer, who fused hardboiled crime stories with superhero comics, while reimagining Kingpin (a classic Spider-Man nemesis), recuperating the half-baked villain Bullseye, and inventing a completely new kind of Daredevil villain in Elektra. Yet, he also offers a vivid appreciation of the indelible panels drawn by Miller the artist, taking a fresh look at his distinctive page layouts and lines. A childhood fan of Miller\'s Daredevil, Young takes readers on a personal journey as he seeks to reconcile his love for the comic with his distaste for the fascistic overtones of Miller\'s controversial later work. What he finds will resonate not only with Daredevil fans, but with anyone who has contemplated what it means to be a hero in a heartless world. Other titles in the Comics Culture series include Twelve-Cent Archie, Wonder Woman: Bondage and Feminism in the Marston/Peter Comics, 1941-1948, and Considering Watchmen: Poetics, Property, Politics.', '152.40', 'Paul Young', 'RUTGERS UNIV PR', 'Comics', 'daredevil.jpg'),
('978-0-321-94786-4', 'Learning Mobile App Development', 'Now, one book can help you master mobile app development with both market-leadin', '20.00', 'Jakob Iversen, Michael Eierman', 'Addison-Wesley', 'Technology', 'mobile_app.jpg'),
('978-0-7303-1484-4', 'Doing Good By Doing Good', 'Doing Good by Doing Good shows companies how to improve the bottom line by implementing an engaging, authentic, and business-enhancing program that helps staff and business thrive. International CSR consultant Peter Baines draws upon lessons learnt from the challenges faced in his career as a police officer, forensic investigator, and founder of Hands Across the Water to describe the Australian CSR landscape, and the factors that make up a program that benefits everyone involved. Case studies illustrate the real effect of CSR on both business and society, with clear guidance toward maximizing involvement, engaging all employees, and improving the bottom line. The case studies draw out the companies that are focusing on creating shared value in meeting the challenges of society whilst at the same time bringing strong economic returns.\r\n\r\nConsumers are now expecting that big businesses with ever-increasing profits give back to the community from which those profits arise. At the same time, shareholders are demanding their share and are happy to see dividends soar. Getting this right is a balancing act, and Doing Good by Doing Good helps companies delineate a plan of action for getting it done.', '18.00', 'Peter Baines', 'Wiley', 'Guide', 'doing_good.jpg'),
('9780008327330', 'How to Fail: Everything Iâ€™ve Ever Learned From T', 'This is a book for anyone who has ever failed. Which means itâ€™s a book for everyone.\r\n \r\nIf I have learned one thing from this shockingly beautiful venture called life, it is this: failure has taught me lessons I would never otherwise have understood. I have evolved more as a result of things going wrong than when everything seemed to be going right. Out of crisis has come clarity, and sometimes even catharsis.\r\n \r\nPart memoir, part manifesto, and including chapters on dating, work, sport, babies, families, anger and friendship, it is based on the simple premise that understanding why we fail ultimately makes us stronger. It\'s a book about learning from our mistakes and about not being afraid.\r\n \r\nUplifting, inspiring and rich in stories from Elizabethâ€™s own life, How to Fail reveals that failure is not what defines us; rather it is how we respond to it that shapes us as individuals.\r\n \r\nBecause learning how to fail is actually learning how to succeed better. And everyone needs a bit of that.', '59.90', 'Day, Elizabeth', 'HarperCollins', 'Biography', '16.PNG'),
('9780062911735', 'Be Self : Be You, Only Better', 'Ask yourself...are you truly who you want to be? Is this the life you really want? Are you living each day as your best self? What can you change, today?\r\n\r\nHow would you answer those questions? Think about your daily life. Are you thriving, or going through the motions? Are your days full of work, relationships and activities that are true to your authentic self, or do you feel trapped on a treadmill of responsibility? If you dream of a better life, now is the time to turn your dream into reality. And the tools you need are within your grasp, to design a life that is fulfilling on the deepest levels. Best Self will show you how.\r\n\r\nMike Bayer, known to the thousands of clients whose lives he has changed as Coach Mike, has helped everyone from pop stars to business executives to people just like you discover the freedom to be their best selves. By asking them and leading them to ask themselves a series of important but tough questions--such as \"What are your core values?\" \"Do you go to bed each day more knowledgeable than when you woke up?\" and \"Am I neglecting some aspect of my physical health out of fear or denial?\"--he helps them see what their Best Selves and Anti-Selves really look like. As a mental health specialist, a personal development coach, and an all-around change agent, Mike has seen the amazing ways in which lives can improve with honesty and clarity. He understands our struggles intimately, because he\'s faced--and overcome--his own. And he knows that change is possible.', '101.66', 'Bayer, Mike', 'Dey Street Books', 'Guide', '12.PNG'),
('9780198821472', 'Dictionary of Physics 8ED', 'Now with over 4,000 entries, this new eighth edition has been fully updated to reflect progress in physics and related fields. It sees expansion to the areas of cosmology, astrophysics, condensed matter, quantum technology, and nanotechnology, with 125 new entries including Deep Underground Neutrino Experiment, kilonova, leptoquark, and muscovium. \r\n \r\nThe dictionary\'s range of appendices, updated for the new edition, includes the periodic table, the electromagnetic spectrum, and a detailed chronology of key dates. 15 new diagrams add to the clarity and accessibility of the text, with 150 line drawings, tables, and graphs in total, and many entries contain recommended web links.', '39.90', 'Rennie, Richard', 'Oxford University Press', 'science', '3.PNG'),
('9780233005416', 'The Military History Of China', 'ISBN - 9780233005416', '94.90', 'Durschmied, Erik', 'Carlton', 'History', '27.PNG'),
('9780241279151', 'The Rough Guide To Japan', 'This in-depth coverage of Japan\'s attractions, sights, and restaurants takes you to the most rewarding spotsâ€”from the cutting-edge modernism of Tokyo, the history and culture of Kyoto, to the heights of Mt. Fujiâ€”and stunning color photography brings the nation to life.\r\n \r\nThe locally based Rough Guides author team introduces the best places to stop and explore, and provides reliable insider tips on topics such as driving the roads, taking walking tours, or visiting local landmarks. You\'ll find special coverage of history, art, architecture, and literature, and detailed information on the best markets and shopping for each area in this fascinating country.\r\n \r\nThe Rough Guide to Japan also unearths the best restaurants, nightlife, and places to stay, from backpacker hostels to beachfront villas and boutique hotels, and color-coded maps feature every sight and listing.', '94.90', 'Rough Guides', 'APA PROD.', 'Guide', '23.PNG'),
('9781119548218', 'Artificial Intelligence in Practice: How 50 Succes', 'Cyber-solutions to real-world business problems Artificial Intelligence in Practice is a fascinating look into how companies use AI and machine learning to solve problems. Presenting 50 case studies of actual situations, this book demonstrates practical applications to issues faced by businesses around the globe. The rapidly evolving field of artificial intelligence has expanded beyond research labs and computer science departments and made its way into the mainstream business environment. Artificial intelligence and machine learning are cited as the most important modern business trends to drive success. It is used in areas ranging from banking and finance to social media and marketing. This technology continues to provide innovative solutions to businesses of all sizes, sectors and industries. This engaging and topical book explores a wide range of cases illustrating how businesses use AI to boost performance, drive efficiency, analyse market preferences and many others. Best-selling author and renowned AI expert Bernard Marr reveals how machine learning technology is transforming the way companies conduct business. This detailed examination provides an overview of each company, describes the specific problem and explains how AI facilitates resolution. Each case study provides a comprehensive overview, including some technical details as well as key learning summaries: Understand how specific business problems are addressed by innovative machine learning methods Explore how current artificial intelligence applications improve performance and increase efficiency in various situations Expand your knowledge of recent AI advancements in technology Gain insight on the future of AI and its increasing role in business and industry Artificial Intelligence in Practice: How 50 Successful Companies Used Artificial Intelligence to Solve Problems is an insightful and informative exploration of the transformative power of technology in 21st century commerce.', '180.00', 'MARR,WARD', 'John Wiley & Sons', 'Technology', '5.PNG'),
('9781465462862', 'Crime Book: Big Ideas Simply Explained', 'An essential guide to criminology, exploring the most infamous cases of all time, from serial killers to mob hits to war crimes and more.\r\n \r\nFrom Jack the Ripper to Jeffrey Dahmer, The Crime Book is a complete study of international true crime history that unpacks the shocking stories through infographics and in-depth research that lays out every key fact and detail. Examine the science, psychology, and sociology of criminal behavior, and read profiles of villains, victims, and detectives. See each clue and follow the investigation from start to finish, and study the police and detective work of each case.\r\n \r\nFind out how pirates, the Japanese yakuza, Chinese triads, and modern drug cartels operate around the world. Dive deep into the Black Dahlia murder investigation and follow other high-profile cases, including Lizzie Borden with her ax and the Patty Hearst kidnapping.\r\n \r\nLearn how media coverage changed through history, from the tragic assassination of President Abraham Lincoln to romanticizing Bonnie and Clyde\'s doomed fate to the kidnapping and murder of Charles Lindbergh\'s baby, which is considered the first international crime tabloid story.', '104.50', 'DK Publishing', 'DK Publishing', 'Crime', '20.PNG'),
('9781474947060', 'Look Inside Seas and Oceans', 'Open the flaps of this book and dive into a watery world full of amazing creatures. Explore coasts, coral reefs and mangrove forests, and find out what lives in the deepest, darkest part of the ocean.', '65.90', 'Daynes, Katie', 'USBORNE', 'Comics', '2.PNG'),
('9781488938627', 'Art Maker Acrylic Paints', 'Learning how to paint with acrylics has never been easier or more enjoyable that with Artmaker: Acrylics Masterclass. This comprehensive kit offers a practical guide and all the artistic tools that you need to start creating dynamic art straight away! \r\n \r\nThe instructional 48-page book, Acrylics Masterclass, allows you to discover the joys of painting with this versatile medium and to experience how it can be used to great effect in a wide range of painting styles. This handbook includes an extensive introduction to painting materials and equipment; covers essential acrylic-paint concepts, such as tone, scaling, washes, blending, scumbling and more, providing many illustrated examples; as well as expert advice to help build your skills and improve your understanding of this exciting art form. Finally, it offers complete step-by-step guides with colour photographs to striking finished compositions â€“ from the tranquility of fallen leaves to a bustling cafÃ© scene. \r\n \r\nWith a white art-canvas to create and display your own masterpiece, a paint palette, four paintbrushes and ten tubes of acrylic paint, this kit contains everything you need to get painting right away.', '149.90', 'Hinkler Book', 'Hinkler', 'Art', '8.PNG'),
('9781488938634', 'Art Maker Watercolour Paints', 'Learning how to paint with watercolour paints has never been easier or more enjoyable with Artmaker: Watercolour Masterclass. This comprehensive kit offers a practical guide and all the artistic tools that you need to begin practising this exciting and evocative art style straight away! \r\n \r\nThis instructional 48-page book, Watercolour Masterclass, introduces you to the materials, equipment and skills associated with this popular technique. As a budding artist, you will be guided through a range of skills and styles of painting, before being taken step-by-step through stunning watercolour compositions with subjects ranging from a still-life composition to a picturesque canal and a fun scene of people unwinding at the beach. \r\n \r\nThis kit features everything you need to get painting right away: five sheets of 300 gsm paper, a paint palette, four different paintbrushes and ten tubes of paints. In no time at all, youâ€™ll be painting boldly and with confidence, producing interesting and beautiful effects and creating your own unique watercolor artworks that you can proudly put on display.', '59.90', 'Hinkler Book', 'Hinkler', 'Art', '9.PNG'),
('9781509724567', 'ACCA P5 Advanced Performance Management Practice a', 'BPP Learning Media is an ACCA approved content provider. Our suite of study tools will provide you with all the accurate and up-to-date material you need for exam success.', '79.00', 'BPP Learning Media', 'BPP LEARNING MEDIA', 'Technology', '1.PNG'),
('9781780220253', 'Jerusalem: The Biography', 'Jerusalem is the universal city, the capital of two peoples, the shrine of three faiths; it is the prize of empires, the site of Judgement Day and the battlefield of today\'s clash of civilizations. From King David to Barack Obama, from the birth of Judaism, Christianity and Islam to the Israel-Palestine conflict, this is the epic history of 3,000 years of faith, slaughter, fanaticism and coexistence.\r\n\r\nHow did this small, remote town become the Holy City, the \'centre of the world\' and now the key to peace in the Middle East? In a gripping narrative, Simon Sebag Montefiore reveals this ever-changing city in its many incarnations, bringing every epoch and character blazingly to life. Jerusalem\'s biography is told through the wars, love affairs and revelations of the men and women - kings, empresses, prophets, poets, saints, conquerors and whores - who created, destroyed, chronicled and believed in Jerusalem.\r\n\r\nDrawing on new archives, current scholarship, his own family papers and a lifetime\'s study, Montefiore illuminates the essence of sanctity and mysticism, identity and empire in a unique chronicle of the city that many believe will be the setting for the Apocalypse. This is how Jerusalem became Jerusalem, and the only city that exists twice - in heaven and on earth.', '69.90', 'Montefiore, Simon Sebag', 'Orion', 'Biography', '15.PNG'),
('9781783784028', 'The Future is History: How Totalitarianism Reclaim', 'In The Future is History Masha Gessen follows the lives of four Russians, born as the Soviet Union crumbled, at what promised to be the dawn of democracy. Each came of age with unprecedented expectations, some as the children or grandchildren of the very architects of the new Russia, each with newfound aspirations of their own - as entrepreneurs, activists, thinkers and writers, sexual and social beings. Gessen charts their paths not only against the machinations of the regime that would seek to crush them all (censorship, intimidation, violence) but also against the war it waged on understanding itself, ensuring the unobstructed emergence of the old Soviet order in the form of today\'s terrifying and seemingly unstoppable mafia state. The Future is History is a powerful and urgent cautionary tale by contemporary Russia\'s most fearless inquisitor.', '62.90', 'Gessen, Masha', 'Granta Books', 'History', '28.PNG'),
('9781786488473', 'Serial Killers: Shocking, Gripping True Crime Stor', 'The Terrifying Story of the Most Monstrous Serial Killers through History. Serial Killers are the most notorious and disturbing of all criminals, representing the very darkest side of humanity. Yet they endlessy fascinate and continue to capture the public\'s attention with their strange charisma and deadly deeds. From Jack the Ripper to Ted Bundy and the Moors Murderers Ian Brady and Myra Hindley, these killers transfix us with their ability to commit utterly savage acts of cruelty and depravity. Only with modern police detection methods and psychological profiling, have these figures that have existed throughout human history finally been identified in the deadliest category: serial killers. These methods, the killers\' characters and their crimes are described here in fascinating and terrifyingly gripping detail.', '49.90', 'Brian, Innes', 'Quercus', 'Crime', '19.PNG'),
('9781786574756', 'Lonely Planet Brazil (Travel Guide)', 'Lonely Planetâ€™s Brazil is your passport to the most relevant, up-to-date advice on what to see and skip, and what hidden discoveries await you. Party at Carnaval in Rio, come face to face with monkeys and other creatures in the Amazon, and snorkel the natural aquariums of Bonito â€“ all with your trusted travel companion. Get to the heart of Brazil and begin your journey now!', '149.90', 'Lonely Planet', 'LONELY PLANET', 'Travel', '6.PNG'),
('9789670835181', 'Conditions of Laa Ilaaha Illallah', 'The famous Taabi’i Wahb ibn Munabbih was once asked, “Isn’t the statement of laa ilaaha ill-Allah the key to Paradise?” He answered, “Yes, but every key has ridges, the door will open for you. Yet if you do not have the right ridges the door will not open for you.” That is, it is saying {while meeting} certain conditions. These conditions are what will differentiate the person who will benefit from his making of that statement from the one who will not benefit from that statement. This book will be available in next few weeks In Sha Allah.', '13.00', 'Jamaal Al-Din Zarabozo', 'UNKNOWN', 'Religion', '10.PNG'),
('9789670835198', 'Learning the Pillars of Islam with Jibril', 'This book is specially designed as a guide for young Muslims as well as new Muslims and non-Muslims who may desire to see Islam at a glance.\r\n \r\nThe most basic details of the Islamic faith and rituals need be presented in a simple yet thorough manner, enough for them to grasp the main purpose behind the faith, in its recommended forms, as taught by the Prophet PBUH himself.\r\n \r\nConcise and to the point, this book will certainly take the reader by the hand and lead him/her with ease into appreciating the pillars of Islam.', '20.00', 'Abu Ahmed Farid', 'UNKNOWN', 'Religion', '11.PNG'),
('9789671495681', 'Johorror', 'Sebuah antologi cerpen seram yang berlatarbelakangkan negeri Johor Darul Takzim. Ia meliputi kisah-kisah yang popular di kalangan masyarakat Johor seperti lagenda Hantu Lilin, Villa Nabilla, Hantu Kum-Kum dan sebagainya. Ia juga memuatkan kisah seram lagenda urban masa kini yang viral di media-media sosial.', '30.00', 'Kamarul Ariffin', 'White Coat', 'Horror', '25.PNG'),
('9789672137320', 'Jangan Benci Cintaku', 'Perkahwinan mereka bukan atas dasar cinta tetapi cinta boleh datang bila-bila masa. Bagi Shahrizal, tiada sebab untuk dia tidak jatuh cinta pada Rafeeqa tapi bagi Rafeeqa, perkahwinan itu satu bebanan. Lantas, Sunderland dan sambung belajar menjadi alasan.\r\n\r\nâ€œTak payah pergi boleh tak? Kat sini pun boleh sambung belajar.â€ â€“ Shahrizal\r\n\r\nâ€˜A NO is always a NO Shah.\' Itu jawapan hati Rafeeqa.\r\n\r\nAwalnya, Shahrizal masih melayannya dengan baik. Namun, segalanya berubah pada tahun terakhir dia di Sunderland. Dinginnya Shahrizal buat Rafeeqa mengesyaki sesuatu. Saat itu dia mula rasa kehilangan. Kembali dan mahu berubah. Dia mahu menjadi isteri yang baik pada lelaki sebaik Shahrizal. Tetapiâ€¦..\r\n\r\nâ€œYour instinct was right. There is someone else besides you.â€ - Shahrizal\r\n\r\nPengakuan Shahrizal buat hati Rafeeqa retak seribu. Dia sudah terlewat rupanya. Shahrizal sudah ada orang ketiga. Tapi, dia tidak mahu mengalah.\r\n\r\nâ€˜Make him fall for you!\'- Damia Ya! Dia akan berusaha agar Shahrizal kembali menyintainya. Cuma, Husna itu bukan sembarangan wanita. Usaha Husna untuk merampas suaminya kadangkala buat Rafeeqa mahu menyerah kalah.\r\n\r\nâ€œFika, you\'ve lose weight.â€ â€“ Shahrizal\r\n\r\nâ€œBerat saya masih okey lagi, Shah.â€ - Rafeeqa\r\n\r\nâ€œMari, saya peluk.â€ - Shahrizal Jika dah tak cinta, kenapa masih mengambil berat? Kalau dah tak sayang, kenapa masih ingin membelai dan dibelai? Siapa sebenarnya yang Shahrizal pilih? Rafeeqa yang berusaha untuk berubah dan menjadi isteri yang baik? Atau Husna yang berusaha untuk merampas dan menguasai semuanya?', '26.00', 'Emy Roberto', 'Idea Kreatif', 'Drama', '21.PNG'),
('9789674154899', 'The So Fat-lah! Cookbook', 'Brimming with exciting recipes and ideas, The â€œSo Fat-lah!â€ Cookbook serves up delicious, nutritious meals curated by foodie Christina Hiew and weight-loss guru Tunku Halim. From colourful beverages to creative fruit salads, from delightful snacks to mouth-watering local and Western main courses, this is a celebration of nourishing, life-affirming food. All here for you to enjoy while taking those kilos off!', '32.90', 'Tunku Halim; Hiew, Christina', 'MPH GROUP PUBLISHING', 'Cookbook', '17.PNG'),
('9789674690878', 'Andainya Takdir (Novel Diadaptasi daripada Drama)', 'Pertama kali bertentang mata,ada rasa aneh menjengah hati kedua-duanya. Namun rasa yg terbit terpaksa disembunyikan di sudut hati yg paling dalam kerana si dia itu bakal menjadi milik orang. Tiga tahun berlalu, kedua-dua hati itu ditemukan kembali. Masing-masing dengan lara di hati lantaran kesakitan yang ditinggalkan insan tersayang. Cinta kembali mengetuk hati kedua-duanya. Bagi Diyana Aqilah, rasa cinta itu perlu dilawan. Bimbang kalau hati bakal dilukai lagi. Namun, bagi Engku Razil pula, peluang yg muncul takkan dilepaskan lagi begitu sahaja. Cukuplah tiga tahun dia memendam rasa. Kehadiran si cilik, Sarah Akisya yang comel dengan pelatnya melancarkan lagi misi memikat Engku Razil. \r\n\r\nâ€œSebab Kisya aje?â€ ~Diya \r\n\r\nâ€œSebabâ€¦hati abang juga inginkan Umi Kisya ada di sini. Hati abang ckp, jangan sesekali lepaskan Umi Kisya pergi dari sini.â€ ~ Engku Razil  Ketika hati sudah bersedia untuk menerima, sebuah musibah mula menguji kedua-duanya. Lain yang diimpikan, lain yang berlaku. Walaupun mereka bersatu, namun rasa kecewa di hati mengatasi segala-galanya hingga Diya ambil keputusan untuk menjauh. Cinta itu memang sudah lama ada. Rindu itu juga sudah lama memekar. Tapi bila acapkali diuji,hati Diya jadi nanar! \r\n\r\nâ€œAbang dah tiupkan penawar yang paling mujarab untuk luka di jari isteri abg ni. Cuma abang tak pasti, penawar yang sama akan berjaya untuk mengubati luka di hati Diya. Tapi abang takkan berputus asa. Abang akan terus mencari dan terus merawat sehingga luka di hati isteri abang ni sembuh tanpa tinggal segaris parut.â€ ~ Engku Razil. \r\n\r\nMampukah Encik Imam Ekspres merawat luka di hatinya sekaligus melenyapkan semua rasa kecewa yang ada? Ataupun perhubungan mereka bakal berakhir sepantas ia bermula?', '30.00', 'Fryer, Hannah', 'MPH GROUP PUBLISHING', 'Drama', '22.PNG'),
('9789679784046', 'Sun Tzu\'s Art of War', 'Recognised as the oldest and the most popular military treatlise of all time, Sun Tzu\'s ART OF WAR has ben studied by world leaders, military strategiests and business executives all over the world.\r\n\r\nThe principle outlined here will provoke much thought and will be an invaluable aid for those who desire success in life, career and business.', '19.90', 'Khoo Kheng Hor (Editor)', 'PELANDUK', 'Autobiography', '14.PNG'),
('9789814841511', 'My Rendang Isn\'t Crispy and Other Favourite Malays', 'Take a culinary voyage through the vibrant flavours of Malaysia with MasterChef UK contestant, Zaleha Kadir Olpin, as she shares her favourite family recipes in this cookbook. Malaysian-born Zaleha pays tribute to dishes she grew up with, including laksam, a rolled rice noodle dish unique to the East Coast of Malaysia; nasi lemak, \r\none of Malaysia\'s most iconic dishes; as well as chicken rendang, the controversial dish she prepared on the show.\r\n \r\nMostly handed down from her mother and grandmother, Zaleha\'s recipes maintain traditional methods of cooking, but are suitable for use in the modern kitchen so you can experience Malaysian cuisine in all its authenticity. She also shares lessons she learnt growing up in a culinary family, with insights into the importance of food in Malaysian culture. Written from the heart, this book will appeal to anyone looking to expand their flavour repertoire or just wanting to dip their toes into the delightful world of Malaysian cooking.', '99.90', 'ZALEHA OLPIN', 'MARSHALL CAVENDISH', 'Cookbook', '18.PNG'),
('9789960969046', 'Ultimate Guide to Umrah', 'After Hajj, a Muslim considers Umrah to be the most significant worship that brings the opportunity of rewards and blessings of visiting Ka\'bah and the Prophet\'s Mosque along with other sacred places one wishes to visit. This title is based on the book \"Getting the Best out of Hajj\" and contains chapters on Umrah in Ramadaan and visiting Madinah.', '44.00', 'Abu Muneer Ismail Davids', 'Darussalam', 'Guide', '24.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(8) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `address` varchar(80) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `country` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `fname`, `lname`, `gender`, `address`, `city`, `zipcode`, `country`, `email`, `phone`, `username`, `password`) VALUES
(1, 'Afif', 'Zuhair', 'Male', 'Hostel Jalan Tandok', 'Bangsar', '53100', 'Malaysia', 'afifzuhair@gmail.com', '0104122818', 'afif123', '54e5018672fba9a5977f7e20e87cf4');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `custname` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`custname`, `email`, `phone`, `message`) VALUES
('Ali bin Ahmad', 'ali@gmail.com', '0104122818', 'Good website'),
('Daus', 'dausdadada@gmail.com', '01234567890', 'I\'m looking for the new updates on comic books. Thanks.'),
('fakri', 'fakri@gmail.com', '01345678965', 'Yes thank you.');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `orderid` int(10) NOT NULL,
  `bookisbn` varchar(20) NOT NULL,
  `bookprice` decimal(6,2) NOT NULL,
  `quantity` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`orderid`, `bookisbn`, `bookprice`, `quantity`) VALUES
(1, '978-0-7303-1484-4', '18.00', 1),
(2, '978-0-7303-1484-4', '18.00', 1),
(1, '081356381X', '152.40', 1),
(1, '978-0-7303-1484-4', '18.00', 1),
(1, '9781465462862', '104.50', 1),
(1, '978-0-321-94786-4', '20.00', 1),
(1, '9780008327330', '59.90', 1),
(1, '9780233005416', '94.90', 2),
(1, '9780198821472', '39.90', 1),
(1, '081356381X', '152.40', 1),
(1, '9781783784028', '62.90', 1),
(1, '9781488938627', '49.90', 1),
(1, '9789960969046', '44.00', 1),
(0, '9780062911735', '101.66', 1),
(0, '081356381X', '152.40', 1),
(0, '9781783784028', '62.90', 1),
(0, '9781786574756', '149.90', 1),
(0, '9781488938634', '49.90', 1),
(0, '9789672137320', '26.00', 1),
(0, '081356381X', '152.40', 1),
(8, '978-0-321-94786-4', '20.00', 1),
(9, '9789670835181', '13.00', 1),
(9, '9789670835198', '20.00', 1),
(9, '9789960969046', '44.00', 1),
(10, '9781509724567', '79.00', 1),
(11, '9789671495681', '30.00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `customerid` int(10) UNSIGNED NOT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  `orderdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `orderdate`) VALUES
(1, 1, '18.00', '2019-05-27 02:48:26'),
(2, 2, '18.00', '2019-05-27 03:17:51'),
(3, 1, '274.90', '2019-05-27 22:54:22'),
(4, 1, '79.90', '2019-05-27 23:26:05'),
(5, 1, '538.90', '2019-05-27 23:37:14'),
(6, 1, '542.76', '2019-05-27 23:44:11'),
(7, 1, '152.40', '2019-05-27 23:46:57'),
(8, 1, '20.00', '2019-05-28 00:53:39'),
(9, 1, '77.00', '2019-05-28 00:58:10'),
(10, 1, '79.00', '2019-05-28 02:36:48'),
(11, 1, '300.00', '2019-05-28 02:51:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminname`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
