-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2017 at 01:10 PM
-- Server version: 5.5.38-0+wheezy1-log
-- PHP Version: 5.5.19-1~dotdeb.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unn_w13004905`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_counties`
--

CREATE TABLE IF NOT EXISTS `project_counties` (
`countyID` tinyint(3) NOT NULL,
  `countyname` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_counties`
--

INSERT INTO `project_counties` (`countyID`, `countyname`) VALUES
(1, 'Bedfordshire'),
(2, 'Berkshire'),
(3, 'Bristol'),
(4, 'Buckinghamshire'),
(5, 'Cambridgeshire'),
(6, 'Cheshire'),
(7, 'City of London'),
(8, 'Cornwall'),
(9, 'Cumbria'),
(10, 'Derbyshire'),
(11, 'Devon'),
(12, 'Dorset'),
(13, 'Durham'),
(14, 'East Riding of Yorkshire'),
(15, 'East Sussex'),
(16, 'Essex'),
(17, 'Gloucestershire'),
(18, 'Greater London'),
(19, 'Greater Manchester'),
(20, 'Hampshire'),
(21, 'Herefordshire'),
(22, 'Hertfordshire'),
(23, 'Isle of Wight'),
(24, 'Kent'),
(25, 'Lancashire'),
(26, 'Leicestershire'),
(27, 'Lincolnshire'),
(28, 'Merseyside'),
(29, 'Norfolk'),
(30, 'North Yorkshire'),
(31, 'Northamptonshire'),
(32, 'Northumberland'),
(33, 'Nottinghamshire'),
(34, 'Oxfordshire'),
(35, 'Rutland'),
(36, 'Shropshire'),
(37, 'Somerset'),
(38, 'South Yorkshire'),
(39, 'Staffordshire'),
(40, 'Suffolk'),
(41, 'Surrey'),
(42, 'Tyne and Wear'),
(43, 'Warwickshire'),
(44, 'West Midlands'),
(45, 'West Sussex'),
(46, 'West Yorkshire'),
(47, 'Wiltshire'),
(48, 'Worcestershire');

-- --------------------------------------------------------

--
-- Table structure for table `project_dog_advert`
--

CREATE TABLE IF NOT EXISTS `project_dog_advert` (
`advertID` smallint(5) NOT NULL,
  `advert_title` varchar(100) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `price` int(8) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `breedID` smallint(4) NOT NULL,
  `countyID` tinyint(3) NOT NULL,
  `start_date` varchar(45) NOT NULL,
  `userID` smallint(5) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `Available` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_dog_advert`
--

INSERT INTO `project_dog_advert` (`advertID`, `advert_title`, `description`, `price`, `dob`, `gender`, `breedID`, `countyID`, `start_date`, `userID`, `created_at`, `Available`) VALUES
(30, 'Rodger', 'Rodger is a chusky looking for friendly owner who will pamper him.', 1000, '2009-11-14', 'Male', 226, 37, '2017-03-07', 1, '2017-03-07', 1),
(33, 'Bobby', 'I have 1 beautiful litttle boy looking for his forever home he has been reared in a busy family home with children and other dogs he loves having cuddles and playing with the children he has been flead and wormed to date and microchipped', 900, '2016-03-26', 'Female', 3, 15, '2017-03-23T15:01:31.411Z', 1, '2017-03-23T15:01:31.411Z', 1),
(44, 'Alfie', 'Full pedigree with all paperwork. Chipped and registered with Kennel Club. Reluctant sale if our lovely dog. Loves walks and playing with his toys. House trained and will respond to commands.', 500, '2010-01-24', 'Male', 60, 25, '2017-03-28', 1, '2017-03-28', 1),
(45, 'Sam', 'Sam is very playful and outgoing. Parents imported from Russia with fantastic pedigrees. KC registered. microchipped and fully vaccinated.', 800, '2017-01-06', 'Male', 198, 3, '2017-03-28', 1, '2017-03-28', 1),
(46, 'Dog Bowls for sale', 'Get personalised dog bowls at this website - https://www.google.co.uk/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=personalised+dog+bowls&* ', 15, '2016-08-13', 'Male', 1, 40, '2017-03-28', 1, '2017-03-15', 1),
(59, 'Rocky', 'Rocky is a lovable American Bulldog. He loves to chase a ball but needs some work with lead walking. He is up to date with all of his injections.', 450, '2016-10-13', 'Male', 6, 25, '2017-03-29', 27, '2017-03-29', 1),
(60, 'Rocky', 'Rocky is a lovely American bulldog. He is lovable and affectionate. He is up to date with all of his injections', 450, '2016-10-13', 'Male', 6, 25, '2017-03-29T17:01:09.260Z', 10, '2017-03-29T17:01:09.260Z', 1),
(61, 'Murphy', 'Murphy is a gentle German Shepherd who is 13 weeks old. He is very friendly and like having company. Murphy is good around other dogs. He has all of his injections and has been wormed.', 800, '2016-12-28', 'Male', 97, 32, '2017-03-29', 28, '2017-03-29', 1),
(62, 'Murphy', 'Murphy is a 13 week old german shepherd looking for a new home, he has all of his injections and is very friendly.', 800, '2016-12-28', 'Male', 97, 32, '2017-03-29T22:13:03.708Z', 10, '2017-03-29T22:13:03.708Z', 1),
(63, 'Lola', 'Lola is a very shy puppy looking for a quiet home. She is very good around people and loves to be cuddled. She has been wormed recently and she has had all of her injections', 850, '2016-12-22', 'Female', 197, 25, '2017-03-29', 29, '2017-03-29', 1),
(64, 'Lola', 'Lola is a very shy puppy looking for a quiet home. She is very good around people and loves to be cuddled. She has been wormed recently and she has had all of her injections', 850, '2016-12-21', 'Female', 197, 25, '2017-03-29T22:41:47.705Z', 10, '2017-03-29T22:41:47.705Z', 1),
(65, 'Abby', 'Abby is a french bulldog who is lively and energetic. She is good around children and loves to play with toys. She has had all of her injections and is ready to start a new life with a friendly family.', 1450, '2017-01-03', 'Female', 94, 25, '2017-03-30', 30, '2017-03-30', 1),
(66, 'Abby', 'Abby is a lovely french bulldog looking for a new home. She is very friendly around children and loves playing with toys.', 1450, '2017-01-03', 'Female', 94, 25, '2017-03-29T23:13:06.207Z', 10, '2017-03-29T23:13:06.207Z', 1),
(67, 'Lucy', 'Lucy is a Irish terrier who is ten weeks old. Her mum and dad are full breed and have been to cruffs a view years in a row. Lucy has had all her injections.', 800, '2017-01-18', 'Female', 113, 15, '2017-03-30', 31, '2017-03-30', 1),
(68, 'Lucy', 'Lucy is a Irish terrier who is looking for a new home. She is 10 weeks old and her mum and dad are full breed and have been to cruffs a few times.', 800, '2017-02-02', 'Female', 113, 15, '2017-03-29T23:44:29.656Z', 10, '2017-03-29T23:44:29.656Z', 1),
(69, 'Maggie', 'Maggie is a toy poodle who is 3 years old. We are moving house so we are having to sell her as we dont have the space. She is very good with children and loves other dog company.', 875, '2014-03-13', 'Female', 200, 1, '2017-03-30', 32, '2017-03-30', 1),
(71, 'Maggie', 'Maggie is a toy poodle who is 3 years old. We are selling her because we are moving home. She loves children and other dog company.', 875, '2014-03-13', 'Female', 200, 1, '2017-03-30T00:19:27.622Z', 10, '2017-03-30T00:19:27.622Z', 1),
(72, 'Zoe', 'Zoe is my dear beagle who we sadly have to re home. She has had all of her injections and is well trained. She needs a home which will give her a lot of love.', 600, '2016-11-11', 'Female', 22, 4, '2017-03-30', 33, '2017-03-30', 1),
(73, 'Zoe', 'We are selling our beagle who is needing a new home due to change in situations. She has all of her injections and is looking for a home which will give her a lovely home with los of love.', 600, '2017-11-11', 'Female', 22, 5, '2017-03-30T08:48:30.752Z', 10, '2017-03-30T08:48:30.752Z', 1),
(83, 'Jake', 'Jake is a lovely cockapoo looking for a new home, he is ten weeks old and wants a family who will play ball and give him lots of walks. He loves the outdoors and is friendly with children.', 1200, '2017-01-18', 'Male', 243, 13, '2017-03-30', 35, '2017-03-30', 1),
(84, 'Jake', 'Jake is a lovable cockapoo looking for a new home, he is wanting a family who can play with him and take him for lots of walks. He loves the outdoors.', 1200, '2017-01-18', 'Male', 243, 13, '2017-03-30T11:01:09.308Z', 10, '2017-03-30T11:01:09.308Z', 1),
(85, 'Jack', 'Jack is my 11 week old labradoodle, he is the only one left from a litter of 4. He can be shy when first meeting new people but once he is settled in he is a lovable and friendly dog. Wanting a family to love and give him a good home.', 435, '2017-01-13', 'Male', 239, 25, '2017-03-31', 36, '2017-03-31', 1),
(86, 'Jack', 'Jack is the only one left from a litter of 4. He is 11 weeks old and is looking for a family home. He can be shy but once he is settled in he is a lovable and friendly dog.', 425, '2017-01-13', 'Male', 239, 25, '2017-03-31T03:52:43.427Z', 10, '2017-03-31T03:52:43.427Z', 1),
(88, 'Luna', 'Beautiful dog for sale her name is luna brill with other dogs and children loves having cuddles and shes up to date with all of her vaccinations. She comes with a harness and a crate. She is a white siberian husky', 400, '2015-02-05', 'Female', 109, 25, '2017-03-31T04:36:03.483Z', 10, '2017-03-31T04:36:03.483Z', 1),
(89, 'Teddy', 'Sadly due to relationship breakup we are having to find a new home for our lovable Bernese Mountain Dog Teddy. Teddy is 6 years old and is a big softy. He is used to children. We have to be sure that teddy is going to a new home where he will have lots of company, love and affection. He is micro chipped and has been neutered.', 1800, '2010-07-08', 'Male', 32, 42, '2017-03-31', 38, '2017-03-31', 1),
(90, 'Teddy', 'We are looking to re home are beloved Teddy who is a Bernese Mountain Dog. He is 6 years old and loves children. He has been microchipped and is neutered. We are only asking money for him to ensure a genuine people are interested. I think Ted would need to be an only dog until he settles in and he will need to go to someone who is used to large dogs.', 1800, '2010-09-14', 'Male', 32, 42, '2017-03-31T05:23:15.775Z', 10, '2017-03-31T05:23:15.775Z', 1),
(91, 'Buster', 'Hello, My name is Buster, well that is my temporary name but i am really looking forward to my new name, chosen by my new family.', 400, '2017-01-13', 'Male', 41, 7, '2017-03-31', 39, '2017-03-31', 1),
(92, 'Buster', 'Hello, My name is buster, well that is my temporary name but i am really looking forward to my new name, chosen by my new family.', 400, '2017-01-13', 'Male', 41, 7, '2017-03-31T06:01:20.810Z', 10, '2017-03-31T06:01:20.810Z', 1),
(93, 'Daisy', 'Chocolate and tan mini long gorgeous little girl. KC registered, micro chipped, vaccinations and wormed up to date.', 900, '2016-02-04', 'Female', 131, 25, '2017-03-31', 40, '2017-03-31', 1),
(94, 'Daisy', 'Chocolate and tan mini long, gorgeous little girl. KC registered, micro chipped, vaccinations are up to date.', 900, '2016-02-14', 'Female', 131, 25, '2017-03-31T06:29:16.583Z', 10, '2017-03-31T06:29:16.583Z', 1),
(95, 'Bubbles', 'Bubbles is a lovely girl who is very friendly. She is 3/4 pug 1/4 beagle. She is only small and is up to date with her vaccination and is microchipped. She will need some training, so needs someone willing and able to put the time in.', 395, '2017-01-02', 'Female', 228, 25, '2017-03-31', 41, '2017-03-31', 1),
(96, 'Bubbles', 'Bubbles is a lovely girl who is very friendly. She is 3/4 pug and 1/4 beagle. She is only small and is up to date with her vaccinations and is microchipped. She requires some training so she is looking for someone who will put in the time.', 395, '2017-01-23', 'Female', 228, 25, '2017-03-31T07:07:20.670Z', 10, '2017-03-31T07:07:20.670Z', 1),
(97, 'Bernard', 'For sale through no fault of his own. He is good with kids and has been brought up with other dogs. He can be shy on the first meeting but within minutes he will want to sit on your knee. Good in the house and walks well on the lead.', 1000, '2016-05-08', 'Male', 170, 25, '2017-03-31', 42, '2017-03-31', 1),
(98, 'Bernard', 'Bernard is for sale through no fault of his own. He is good in the house and walks well on a lead. He lives with another dog and is good around children. He can be shy when you first meet him but he soon wants to sit on your knee', 1000, '2016-04-04', 'Male', 170, 25, '2017-03-31T09:27:59.739Z', 10, '2017-03-31T09:27:59.739Z', 1),
(99, 'Luna', 'We have one available beautiful loving home raised girl, she has been raised with children, other dogs and cats, she is very loving sweet and friendly natured. Both parents imported from Europe from some of the best lines from around the world and the father of the litter is a UK champion and a top working dog. ', 1000, '2016-12-04', 'Female', 5, 25, '2017-04-01', 43, '2017-04-01', 1),
(100, 'Luna', 'We have one available beautiful loving home raised girl, she has been raised with children, other dogs and cats. she is loving sweet and friendly natured. Both parents imported from Europe from some of the best lines from around the world and the father of the litter is a UK champion.', 1000, '2016-12-03', 'Female', 5, 25, '2017-04-01T12:09:42.879Z', 10, '2017-04-01T12:09:42.879Z', 1),
(101, 'Reggie', 'Reggie is a large white boxer. We are reluctantly looking to rehome him due to a recent house move which he is not settling in. The new house is too small for his needs. He is very energetic and needs a lot of exercise and play time.', 200, '2015-02-18', 'Male', 45, 1, '2017-04-01', 44, '2017-04-01', 1),
(102, 'Reggie', 'Reggie is a large white boxer. We are reluctantly looking to rehome him due to a recent house move which he is not settling in. The new house is too small for his needs. He is very energetic and needs a lot of exercise and play time.', 200, '2015-02-18', 'Male', 45, 1, '2017-04-01T12:40:19.332Z', 10, '2017-04-01T12:40:19.332Z', 1),
(103, 'Tes', 'Our yorkie is available for a re-home due to no fault of her own. She is 3 years old lovely and well behaved dog. Family circumstances and a house move forces this sad sale. She is a full size yorkshire terrier, quite big for her breed, not a tea cup yorkie', 300, '2014-02-28', 'Female', 209, 3, '2017-04-01', 45, '2017-04-01', 1),
(104, 'Tes', 'Our yorkie is available for a re-home due to no fault of her own. She is 3 years old, lovely and very well behaved dog. Family circumstances and a house move forces this sad safe. She is a full size yorkshire terrier, quite big for a yorkie and not a tea cup yorkie', 300, '2014-02-28', 'Female', 209, 3, '2017-04-01T13:10:56.806Z', 10, '2017-04-01T13:10:56.806Z', 1),
(105, 'Magic', 'Fawn and black mask great dane, fully house trained, good on and off the lead. Excellent with other dogs and great with children. Vaccinations worming and flea up to date.', 650, '2016-05-07', 'Male', 105, 37, '2017-04-01', 46, '2017-04-01', 1),
(106, 'Magic', 'Fawn and black mask great dane fully house trained, good on and off the lead. Excellent with other dogs and great with children. Vaccinations worming and flea up to date.', 650, '2016-05-07', 'Male', 105, 37, '2017-04-01T13:41:41.839Z', 10, '2017-04-01T13:41:41.839Z', 1),
(107, 'River', 'Cavalier King Charles who is a great dog around families and children. Reason for selling we have a new baby and its too difficult to manage both.', 450, '2009-05-05', 'Male', 60, 8, '2017-04-01', 47, '2017-04-01', 1),
(108, 'River', 'Cavalier king charles who is a great dog around families and children. Reason for sale is because we have a new baby', 450, '2009-05-05', 'Male', 60, 8, '2017-04-01T14:02:49.935Z', 10, '2017-04-01T14:02:49.935Z', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_dog_breed`
--

CREATE TABLE IF NOT EXISTS `project_dog_breed` (
`breedID` smallint(4) NOT NULL,
  `breed_name` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_dog_breed`
--

INSERT INTO `project_dog_breed` (`breedID`, `breed_name`) VALUES
(1, 'Affenpinscher'),
(2, 'Afghan Hound'),
(3, 'Airedale Terrier'),
(4, 'Akita Inu'),
(5, 'Alaskan Malamute'),
(6, 'American Bulldog'),
(7, 'American Cocker Spaniel'),
(8, 'American Pit Bull Terrier'),
(9, 'Amstaff'),
(10, 'Appenzell Mountain Dog'),
(11, 'Australian Cattle Dog'),
(12, 'Australian Shepherd'),
(13, 'Australian Silky Terrier'),
(14, 'Australian Terrier'),
(15, 'Austrian Shorthaired Pinscher'),
(16, 'Azawakh'),
(17, 'Barbet'),
(18, 'Basenji'),
(19, 'Basset Artesien Normand'),
(20, 'Basset Fauve de Bretagne'),
(21, 'Basset Hound'),
(22, 'Beagle'),
(23, 'Bearded Collie'),
(24, 'Beauceron'),
(25, 'Bedlington Terrier'),
(26, 'Belgian Shepherd Groenendael'),
(27, 'Belgian Shepherd Laekenois'),
(28, 'Belgian Shepherd Malinois'),
(29, 'Belgian Shepherd Tervuren'),
(30, 'Bergamasco'),
(31, 'Berger Picard'),
(32, 'Bernese Mountain Dog'),
(33, 'Bichon Frise'),
(34, 'Bichon Havanais'),
(35, 'Bichon Maltese'),
(36, 'Bloodhound'),
(37, 'Blue Gascony Basset'),
(38, 'Blue Picardy Spaniel'),
(39, 'Boerboel'),
(40, 'Bolognese'),
(41, 'Border Collie'),
(42, 'Border Terrier'),
(43, 'Borzoi'),
(44, 'Bouvier des Flandres'),
(45, 'Boxer'),
(46, 'Bracco Italiano'),
(47, 'Briard'),
(48, 'Brittany'),
(49, 'Brussels Griffon'),
(50, 'Bucovina Shepherd Dog'),
(51, 'Bull terrier'),
(52, 'Bulldog'),
(53, 'Bullmastiff'),
(54, 'Cairn Terrier'),
(55, 'Cane Corso'),
(56, 'Cao da Serra de Aires'),
(57, 'Cardigan Welsh corgi'),
(58, 'Carpathian Shepherd Dog'),
(59, 'Caucasian Shepherd'),
(60, 'Cavalier King Charles Spaniel'),
(61, 'Cesky Fousek'),
(62, 'Cesky Terrier'),
(63, 'Chesapeake Bay Retriever'),
(64, 'Chihuahua'),
(65, 'Chinese Shar-Pei'),
(66, 'Chinese crested dog'),
(67, 'Chow chow'),
(68, 'Cirneco dell Etna'),
(69, 'Clumber Spaniel'),
(70, 'Corb Shepherd'),
(71, 'Coton de Tulear'),
(72, 'Curly Coated Retriever'),
(73, 'Dachshund'),
(74, 'Dachshund - the wiry hair variety'),
(75, 'Dalmatian'),
(76, 'Dandie Dinmont Terrier'),
(77, 'Doberman'),
(78, 'Dogo Argentino'),
(79, 'Dogue de Bordeaux'),
(80, 'Drentsche Patrijshond'),
(81, 'Dutch Shepherd Dog'),
(82, 'English Cocker Spaniel'),
(83, 'English Mastiff'),
(84, 'English Setter'),
(85, 'English Springer Spaniel'),
(86, 'Entlebucher Mountain Dog'),
(87, 'Eurasier'),
(88, 'Field Spaniel'),
(89, 'Fila Brasileiro'),
(90, 'Finnish Lapphund'),
(91, 'Finnish Spitz'),
(92, 'Flat Coated Retriever'),
(93, 'Fox Terrier'),
(94, 'French Bulldog'),
(95, 'French Spaniel'),
(96, 'German Pinscher'),
(97, 'German Shepherd'),
(98, 'German Shorthaired Pointer'),
(99, 'German Wirehaired Pointer'),
(100, 'German longhaired pointer'),
(101, 'Giant Schnauzer'),
(102, 'Glen of Imaal Terrier'),
(103, 'Golden Retriever'),
(104, 'Gordon Setter'),
(105, 'Great Dane'),
(106, 'Greater Swiss Mountain Dog'),
(107, 'Greenland Dog'),
(108, 'Hovawart'),
(109, 'Husky'),
(110, 'Ibizan Hound'),
(111, 'Icelandic sheepdog'),
(112, 'Irish Setter'),
(113, 'Irish Terrier'),
(114, 'Irish Water Spaniel'),
(115, 'Irish Wolfhound'),
(116, 'Italian Greyhound'),
(117, 'Japanese Chin'),
(118, 'Japanese Spitz'),
(119, 'Karelian Bear Dog'),
(120, 'Keeshond'),
(121, 'Kerry Blue Terrier'),
(122, 'King Charles Spaniel'),
(123, 'Komondor'),
(124, 'Kooikerhondje'),
(125, 'Kuvasz'),
(126, 'Labrador Retriever'),
(127, 'Lakeland Terrier'),
(128, 'Large Munsterlander'),
(129, 'Leonberger'),
(130, 'Lhasa Apso'),
(131, 'Long-haired dachshund'),
(132, 'Lowchen'),
(133, 'Lundehund'),
(134, 'Manchester Terrier'),
(135, 'Maremma Sheepdog'),
(136, 'Mexican Hairless Dog'),
(137, 'Miniature Pinscher'),
(138, 'Miniature Poodle'),
(139, 'Miniature Schnauzer'),
(140, 'Mioritic'),
(141, 'Mudi'),
(142, 'Neapolitan Mastiff'),
(143, 'Newfoundland'),
(144, 'Norbottenspets'),
(145, 'Norfolk Terrier'),
(146, 'Norwegian Buhund'),
(147, 'Norwegian Elkhound'),
(148, 'Norwich Terrier'),
(149, 'Nova Scotia Duck Tolling Retriever'),
(150, 'Old English Sheepdog'),
(151, 'Otterhound'),
(152, 'Papillon and Phalene'),
(153, 'Parson Russell Terrier'),
(154, 'Pekingese'),
(155, 'Pembroke Welsh corgi'),
(156, 'Perro de Presa Canario'),
(157, 'Petit Basset Griffon Vendeen'),
(158, 'Pharaoh Hound'),
(159, 'Pointer'),
(160, 'Polish Lowland Sheepdog'),
(161, 'Pomeranian'),
(162, 'Portuguese Water Dog'),
(163, 'Pug'),
(164, 'Puli'),
(165, 'Pumi'),
(166, 'Pyrenean Mountain Dog'),
(167, 'Pyrenean Shepherd'),
(168, 'Rhodesian Rodgeback'),
(169, 'Rottweiler'),
(170, 'Saint Bernard'),
(171, 'Saluki'),
(172, 'Samoyed'),
(173, 'Schapendoes'),
(174, 'Schipperke'),
(175, 'Scotch Collie'),
(176, 'Scottish Deerhound'),
(177, 'Scottish Terrier'),
(178, 'Scottish-Skye Terrier'),
(179, 'Sealyham Terrier'),
(180, 'Shetland Sheepdog'),
(181, 'Shiba Inu'),
(182, 'Shih Tzu'),
(183, 'Sloughi'),
(184, 'Small Munsterlander'),
(185, 'Soft-Coated Wheaten Terrier'),
(186, 'Spanish greyhound'),
(187, 'Spinone Italiano'),
(188, 'Stabyhoun'),
(189, 'Staffordshire Bull Terrier'),
(190, 'Standard Poodle'),
(191, 'Standard Schnauzer'),
(192, 'Sussex Spaniel'),
(193, 'Swedish Lapphund'),
(194, 'Swedish vallhund'),
(195, 'Thai Ridgeback'),
(196, 'Tibetan Spaniel'),
(197, 'Tibetan Terrier'),
(198, 'Tibetan mastiff'),
(199, 'Tosa Inu'),
(200, 'Toy Poodle'),
(201, 'Vizsla'),
(202, 'Weimaraner'),
(203, 'Welsh Springer Spaniel'),
(204, 'Welsh Terrier'),
(205, 'West highland White Terrier'),
(206, 'Wetterhoun'),
(207, 'Whippet'),
(208, 'Wirehaired Pointing Griffon'),
(209, 'Yorkshire terrier'),
(210, 'Afador (Afghan Hound and Labrador Retriever)'),
(211, 'Boweimar (Weimaraner and Boxer)'),
(212, 'Malador (Alaskan Malamute and Labrador\r\n)'),
(213, 'Border Beagle (Border Collie and Beagle)'),
(214, 'Bullmatian (Bulldog and Dalmatian)'),
(215, 'Pitt Plott (Plott Hound and Pitbull)'),
(216, 'Gerberian Shepsky (German Shepherd and Husky)'),
(217, 'Beaglier (Beagle and Cavalier King Charles Spaniel)'),
(218, 'Golden Cocker Retriever (Golden Retriever and Cocker Spaniel)'),
(219, 'Dalmachshund (Dalmatian and Dachshund)'),
(220, 'Yorktese (Yorkie and Maltese mix)'),
(221, 'Bullpug (Pug and English Bulldog)'),
(222, 'Corgidor (Labrador Retriever and Corgi)'),
(223, 'Bernedoodle (Bernese Mountain Dog and Poodle)'),
(224, 'Chiweenie (Chihuahua and Dachschund)'),
(225, 'Pomsky (Pomeranian and Husky)'),
(226, 'Chusky (Chow Chow and Husky)'),
(227, 'Alusky (Alaskan Malamute and Siberian Husky)'),
(228, 'Puggle (Pug and Beagle)'),
(229, 'Corgipoo (Corgi and Toy Poodle)'),
(230, 'Siberpoo (Siberian Husky and Poodle)'),
(231, 'Schnoodle (Schnauzer and Poodle)'),
(232, 'Chug (Chihuahua and Pug)'),
(233, 'Golden Doodle (Golden Retriever and Poodle)'),
(234, 'Dorgi (Corgi and Dachshund mix)'),
(235, 'Goberian (Golden Retriever and Siberian Husky mix)'),
(236, 'Beabull (Beagle and Bull Dog)'),
(237, 'Spanador (Labrador Retriever and American Cocker Spaniel mix)'),
(238, 'Lab Pei (Labrador Retriever and Chinese Shar pei mix)'),
(239, 'Labradoodle (Labrador Retriever and Poodle mix)'),
(240, 'Double Doodle (Goldendoodle and Labradoodle)'),
(241, 'Labbe (Labrador Retriever and Beagle mix)'),
(242, 'Jackshund (Jack Russell Terrier and Dachshund mix)'),
(243, 'Cockapooo (Cocker Spaniel and Poodle mix)'),
(244, 'Morkie (Maltese and Yorkie mix)'),
(245, 'Labradinger (Labrador Retriever and English Springer Spaniel mix)'),
(246, 'Chow Pei (Chow Chow and Shar Pei)'),
(247, 'Labrottie (Labrador Retriever and Rottweiler mix)'),
(248, 'Lab-Pointer (Labrador Retriever and Pointer mix)'),
(249, 'German Sheprador (Labrador Retriever and German Shepherd Dog mix)'),
(250, 'Cavalon (Cavalier King Charles Spaniel and Papillon mix)'),
(251, 'Shepherd Chow (Chow Chow and German Shepherd)');

-- --------------------------------------------------------

--
-- Table structure for table `project_dog_buying`
--

CREATE TABLE IF NOT EXISTS `project_dog_buying` (
`buyingID` int(5) NOT NULL,
  `userID` smallint(5) NOT NULL,
  `advertID` smallint(5) NOT NULL,
  `title` varchar(7) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_num` varchar(11) NOT NULL,
  `buying_date` varchar(45) NOT NULL,
  `new_purchase` varchar(3) NOT NULL,
  `edited_purchase` varchar(3) NOT NULL,
  `deleted_purchase` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE IF NOT EXISTS `project_images` (
`imageID` smallint(7) NOT NULL,
  `image_path` varchar(1000) NOT NULL,
  `advertID` smallint(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`imageID`, `image_path`, `advertID`) VALUES
(16, '../uploads/rodger.jpg', 30),
(19, '../uploads/bobby.jpg', 33),
(29, '../uploads/alfie.jpg', 44),
(30, '../uploads/samTibetan.jpg', 45),
(31, '../uploads/dogBowls.jpeg', 46),
(48, '../uploads/user_1_img1.jpg', 59),
(49, '../uploads/user_1_img2.jpg', 60),
(50, '../uploads/user_2_img1.jpg', 61),
(51, '../uploads/user_2_img2.jpg', 62),
(52, '../uploads/user_3_img1.jpg', 63),
(53, '../uploads/user_3_img2.jpg', 64),
(54, '../uploads/user_4_img1.jpg', 65),
(55, '../uploads/user_4_img2.jpg', 66),
(56, '../uploads/user_5_img1.jpg', 67),
(57, '../uploads/user_5_img2.jpg', 68),
(58, '../uploads/user_6_img1.jpg', 69),
(59, '../uploads/user_6_img2.jpg', 71),
(60, '../uploads/user_7_img1.jpg', 72),
(61, '../uploads/user_7_img2.jpg', 73),
(72, '../uploads/user_8_img1.jpeg', 83),
(73, '../uploads/user_8_img2.jpeg', 84),
(74, '../uploads/user_9_img1.jpg', 85),
(75, '../uploads/user_9_img2.jpg', 86),
(77, '../uploads/user_10_img2.JPG', 88),
(78, '../uploads/user_11_img1.jpg', 89),
(79, '../uploads/user_11_img2.jpg', 90),
(80, '../uploads/user_12_img1.jpg', 91),
(81, '../uploads/user_12_img2.jpg', 92),
(82, '../uploads/user_13_img1.jpg', 93),
(83, '../uploads/user_13_img2.jpg', 94),
(84, '../uploads/user_14_img1.jpg', 95),
(85, '../uploads/user_14_img2.jpg', 96),
(86, '../uploads/user_15_img1.jpg', 97),
(87, '../uploads/user_15_img2.jpg', 98),
(88, '../uploads/user_16_img1.jpg', 99),
(89, '../uploads/user_16_img2.jpg', 100),
(90, '../uploads/user_17_img1.jpg', 101),
(91, '../uploads/user_17_img2.jpg', 102),
(92, '../uploads/user_18_img1.jpg', 103),
(93, '../uploads/user_18_img2.jpg', 104),
(94, '../uploads/user_19_img1.jpeg', 105),
(95, '../uploads/user_19_img2.png', 106),
(96, '../uploads/user_20_img1.jpg', 107),
(97, '../uploads/user_20_img2.jpg', 108);

-- --------------------------------------------------------

--
-- Table structure for table `project_report_advert`
--

CREATE TABLE IF NOT EXISTS `project_report_advert` (
`reportID` smallint(5) NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `description` varchar(4000) DEFAULT NULL,
  `date_posted` varchar(45) NOT NULL,
  `advertID` smallint(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_review`
--

CREATE TABLE IF NOT EXISTS `project_review` (
`reviewID` smallint(5) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `comment` varchar(600) DEFAULT NULL,
  `date_posted` varchar(45) NOT NULL,
  `userID` smallint(5) NOT NULL,
  `advertID` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_users`
--

CREATE TABLE IF NOT EXISTS `project_users` (
`userID` smallint(6) NOT NULL,
  `title` varchar(7) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(130) NOT NULL,
  `contact_num` varchar(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `birthdate` varchar(45) NOT NULL,
  `countyID` tinyint(3) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_users`
--

INSERT INTO `project_users` (`userID`, `title`, `first_name`, `surname`, `email`, `contact_num`, `username`, `password`, `birthdate`, `countyID`, `created_at`) VALUES
(1, 'Miss', 'Elsie', 'Howarth', 'elsiehowarth@hotmail.co.uk', '12345678910', 'ElsieHowarth', '$2y$10$ccpudEZg8/UhvWSjp5AWbOp1OeBkuWOWYRjKOAFm2lxY0sTGf29rS', '1994-10-29', 25, '2016-12-21'),
(8, 'Miss', 'Jane', 'Howarth', 'janieox@hotmail.co.uk', '07772290970', 'janieox', '$2y$10$aHnCy7UqeWPl1LCnchHLO.8Zk6vAMUc/NDgwOpph3.1r9QDuDcpNi', '1993-05-24', 25, '2017-01-14'),
(9, 'Mr', 'Test', 'Test', 'test@hotmail.com', '90874635213', 'test', '$2y$10$NFGfk9PoJYg.cxdQCDWYTuHDsOh.pJvF1Wt4eHBC0aTkvzdi1UI9y', '1987-07-23', 8, '2017-02-02'),
(10, 'Mr', 'Robert', 'Horsburgh', 'robH@hotmail.co.uk', '83728949503', 'rob', '$2y$10$wAk1wgmv0o.0ZKAxu3iwq.3z0aMrbOwvB.O4PCUK.EfCIFrHdLK8K', '1984-05-18', 42, '0000-00-00'),
(11, 'Mr', 'Michael', 'Braithwaite', 'm.j.braith@hotmail.co.uk', '09868646575', 'MichaelBraithwaite', '$2y$10$evOovHLOG3qxlqi7T4e0yu/7r0/3F6j0XEqvZqNjkRkxp74aKM7/K', '1970-05-07', 8, '0000-00-00'),
(27, 'Mrs', 'User', '1', 'user1@hotmail.co.uk', '12345678910', 'user1', '$2y$10$XaMPC/JDP6xkTgINIxtt5e36AMauTEp0O.qYHXRB5UVCo7iao8uVK', '1983-08-20', 25, '0000-00-00'),
(28, 'Mr', 'User', '2', 'user2@hotmail.com', '12345678910', 'user2', '$2y$10$NxzS5xX29HQ/Ovg9MfBto.H9SgDorXJ8eUMLViwDJaAMuvqpp/0fe', '1972-08-13', 32, '0000-00-00'),
(29, 'Miss', 'User', '3', 'user3@hotmail.com', '95674567834', 'user3', '$2y$10$LdRmCrtSK1LWbzYnP9sDDuLQ9aAqI1WomSLKW2n.f3WlbpYUV3WNS', '1982-06-03', 25, '0000-00-00'),
(30, 'Miss', 'User', '4', 'user4@hotmail.com', '09876543253', 'user4', '$2y$10$msfjz90wCwJCpXXuIAb03e0xn6PKl1xIBSRjjl/I4.GTwmFU4eFBa', '1982-09-05', 25, '0000-00-00'),
(31, 'Ms', 'User', '5', 'user5@hotmail.com', '98273097903', 'user5', '$2y$10$.eRFTEp/gen0hJljEYrtJOpWtlR5kcVstf/tAX6Swh.jbJBYgbJWu', '1982-04-03', 15, '0000-00-00'),
(32, 'Miss', 'user', '6', 'user6@hotmail.co.uk', '90948574637', 'user6', '$2y$10$NfAsL.3lVOfHMpr9QmmDO.tmDHfc2yGgJS3RENp5eET2XBAlyXjUy', '1980-07-04', 1, '0000-00-00'),
(33, 'Ms', 'User 7', 'User 7', 'user7@test.com', '02938475689', 'user7', '$2y$10$Yr9C/KViTsXKAYDNP75lXeOQ2phlIh3/OsJGT0fYUESmoX5R76u5O', '1978-06-27', 5, '0000-00-00'),
(35, 'Mr', 'User 8', 'User 8', 'user8@test.com', '12345678910', 'user8', '$2y$10$KWe6xEIuLZNARqimnH4RY.PvwSH9tmpzlaj8QCqWQK60ONCs8/4xi', '1991-07-07', 13, '0000-00-00'),
(36, 'Mr', 'User', '9', 'user9@hotmail.com', '09283748390', 'user9', '$2y$10$9jtjbyBX3fGvcFosXAdZEO46FA6uXBdhJakRRUHU7cC4wXVQMNh8O', '1967-03-27', 25, '0000-00-00'),
(37, 'Miss', 'User', '10', 'user10@hotmail.com', '93049859302', 'user10', '$2y$10$Jq4HXXPraXu7cjKdLs9G0Ou0I5NJUfKDmllNI1WPUd9lr6j5v0UTi', '1975-03-09', 25, '0000-00-00'),
(38, 'Mrs', 'User', '11', 'user11@gmail.com', '09384958767', 'user11', '$2y$10$h5iR3rYZBACOV.5qPjkZ7e9JpYPdtTLUWx.rWt4R0bzkCgO3xs8o2', '1980-08-03', 42, '0000-00-00'),
(39, 'Mr', 'User', '12', 'user12@gmail.com', '89405938495', 'user12', '$2y$10$NbzqFNAUvd7O8iAu7TSN4e1uUOs113Q8qg8bthpF9LFNsYCyXez6W', '1973-12-09', 7, '0000-00-00'),
(40, 'Ms', 'User', '13', 'user13@hotmail.co.uk', '78495839302', 'user13', '$2y$10$.67O.HxJK9TiiwsYFIzavumJlCSxodGD7NhT5Pn/wxzqp7BKswADK', '1970-07-05', 25, '0000-00-00'),
(41, 'Ms', 'User', '14', 'user14@gmail.com', '09394876789', 'user14', '$2y$10$5ds.XVDPDSXXQ24Avac1YORml0fG7qnz3TD./iqc7T45Aa7KaMPd2', '1990-05-24', 25, '0000-00-00'),
(42, 'Mr', 'User', '15', 'usertest@gmail.com', '98394586970', 'user15', '$2y$10$JiyMny7fjMHN1GUFeJH/Ne9gcY.G6yqU3Fn6Fhl3U7ZXM8YiwSofu', '1993-04-04', 25, '0000-00-00'),
(43, 'Mrs', 'User', '16', 'user16@yahoo.com', '43561390678', 'user16', '$2y$10$ZBIOeKyBfHrmFEr9XMvYnemCu35tsmDBi/lrFj6wmxrVrFu7.j.bK', '1965-07-03', 25, '0000-00-00'),
(44, 'Ms', 'User', '17', 'user17@hotmail.com', '07938492034', 'user17', '$2y$10$E.d37B65R0XLQTcX1mnj/e6iG6DLLS207LNnCFNMgPthZDAxM12HO', '1993-10-29', 1, '0000-00-00'),
(45, 'Mr', 'user', '18', 'user18@gmail.co.uk', '72930281938', 'user18', '$2y$10$JT6zPnZPk1L/95zAAoH8SugnVmLOKyJLWGhHg79b3BTXQumajMsc6', '1977-02-20', 3, '0000-00-00'),
(46, 'Mr', 'user', '19', 'user19@gmail.com', '07485948374', 'user19', '$2y$10$01Jpx4V1CjhahgHQx9XMPeW/2elxu6vF3zfvy5aLl8i.EbHOTmV/i', '1991-12-07', 37, '0000-00-00'),
(47, 'Mr', 'user20', 'user20', 'user20@test.com', '09837463567', 'user20', '$2y$10$sIKHAlfb0slba9no8N0oMutO8Um2Fd4c8ZrPspeI2BWg1Nl73ZEjC', '1990-08-06', 6, '0000-00-00'),
(49, 'Mr', 'James A', 'Tuttle', 'j.tuttle@help.com', '01920394959', 'jamesTuttle', '$2y$10$6JadWd/f.jm/WBvdFzkpq.l9fM1il2SJhp8EFfs5WgaQ.LnSgW8hO', '1994-02-10', 4, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_counties`
--
ALTER TABLE `project_counties`
 ADD PRIMARY KEY (`countyID`);

--
-- Indexes for table `project_dog_advert`
--
ALTER TABLE `project_dog_advert`
 ADD PRIMARY KEY (`advertID`), ADD KEY `userID` (`userID`), ADD KEY `breedID` (`breedID`), ADD KEY `countyID` (`countyID`);

--
-- Indexes for table `project_dog_breed`
--
ALTER TABLE `project_dog_breed`
 ADD PRIMARY KEY (`breedID`);

--
-- Indexes for table `project_dog_buying`
--
ALTER TABLE `project_dog_buying`
 ADD PRIMARY KEY (`buyingID`), ADD UNIQUE KEY `advertID` (`advertID`), ADD KEY `userID` (`userID`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
 ADD PRIMARY KEY (`imageID`), ADD KEY `advertID` (`advertID`);

--
-- Indexes for table `project_report_advert`
--
ALTER TABLE `project_report_advert`
 ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `project_review`
--
ALTER TABLE `project_review`
 ADD PRIMARY KEY (`reviewID`), ADD KEY `advertID` (`advertID`), ADD KEY `userID` (`userID`);

--
-- Indexes for table `project_users`
--
ALTER TABLE `project_users`
 ADD PRIMARY KEY (`userID`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`), ADD KEY `countyID` (`countyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_counties`
--
ALTER TABLE `project_counties`
MODIFY `countyID` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `project_dog_advert`
--
ALTER TABLE `project_dog_advert`
MODIFY `advertID` smallint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `project_dog_breed`
--
ALTER TABLE `project_dog_breed`
MODIFY `breedID` smallint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT for table `project_dog_buying`
--
ALTER TABLE `project_dog_buying`
MODIFY `buyingID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
MODIFY `imageID` smallint(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `project_report_advert`
--
ALTER TABLE `project_report_advert`
MODIFY `reportID` smallint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `project_review`
--
ALTER TABLE `project_review`
MODIFY `reviewID` smallint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_users`
--
ALTER TABLE `project_users`
MODIFY `userID` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_dog_advert`
--
ALTER TABLE `project_dog_advert`
ADD CONSTRAINT `project_dog_advert_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `project_users` (`userID`),
ADD CONSTRAINT `project_dog_advert_ibfk_2` FOREIGN KEY (`countyID`) REFERENCES `project_counties` (`countyID`),
ADD CONSTRAINT `project_dog_advert_ibfk_3` FOREIGN KEY (`breedID`) REFERENCES `project_dog_breed` (`breedID`);

--
-- Constraints for table `project_dog_buying`
--
ALTER TABLE `project_dog_buying`
ADD CONSTRAINT `project_dog_buying_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `project_users` (`userID`),
ADD CONSTRAINT `project_dog_buying_ibfk_1` FOREIGN KEY (`advertID`) REFERENCES `project_dog_advert` (`advertID`);

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
ADD CONSTRAINT `project_images_ibfk_1` FOREIGN KEY (`advertID`) REFERENCES `project_dog_advert` (`advertID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_review`
--
ALTER TABLE `project_review`
ADD CONSTRAINT `project_review_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `project_users` (`userID`),
ADD CONSTRAINT `project_review_ibfk_1` FOREIGN KEY (`advertID`) REFERENCES `project_dog_advert` (`advertID`);

--
-- Constraints for table `project_users`
--
ALTER TABLE `project_users`
ADD CONSTRAINT `county_foreign_key` FOREIGN KEY (`countyID`) REFERENCES `project_counties` (`countyID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
