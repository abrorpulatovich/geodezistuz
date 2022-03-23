-- MySQL dump 10.13  Distrib 8.0.27, for macos12.0 (arm64)
--
-- Host: localhost    Database: geodezistuz
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `question_id` int NOT NULL,
  `answer_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breadcrumb_bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_order` int NOT NULL COMMENT 'Joylashish tartibi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,1,'test',2,'test',NULL,1,'2022-03-19 16:05:52','2022-03-19 16:05:54');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `region_id` int NOT NULL,
  `name_uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=224 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (10,8,'Nukus shahar','г. Нукус',NULL,NULL),(12,8,'Amudaryo tumani','Амударьинский район',NULL,NULL),(13,8,'Beruniy tumani','Берунийский район',NULL,NULL),(14,8,'Qonliko’l tumani','Канлыкульский район',NULL,NULL),(15,8,'Qorao’zak tumani','Караузякский район',NULL,NULL),(16,8,'Kegeyli tumani','Кегейлийский район',NULL,NULL),(17,8,'Qo’ng’irot tumani','Кунградский район',NULL,NULL),(18,8,'Muynoq tumani','Муйнакский район',NULL,NULL),(19,8,'Nukus tumani','Нукусский район',NULL,NULL),(20,8,'Taxtako’prik tumani','Тахтакупырский район',NULL,NULL),(21,8,'To’rtko’l tumani','Турткульский район',NULL,NULL),(22,8,'Xo’jayli tumani','Ходжейлийский район',NULL,NULL),(23,8,'Chimboy tumani','Чимбайский район',NULL,NULL),(24,8,'Sho’manay tumani','Шуманайский район',NULL,NULL),(25,8,'Ellikqal’a tumani','Элликкалинский район',NULL,NULL),(26,9,'Buxoro shahar','г. Бухара',NULL,NULL),(27,9,'Buxoro tuman','Бухарский район',NULL,NULL),(28,9,'Vobkent tuman','Вабкентский район',NULL,NULL),(29,9,'G’ijduvon tuman','Гиждуванский район',NULL,NULL),(30,9,'Jondor tuman','Жондорский район',NULL,NULL),(32,9,'Kogon tuman','г. Каган район',NULL,NULL),(33,9,'Olot tuman','Алатский район',NULL,NULL),(34,9,'Peshku tuman','Пешкунский район',NULL,NULL),(35,9,'Romitan tuman','Ромитанский район',NULL,NULL),(36,9,'Shofirkon tuman','Шафирканский район',NULL,NULL),(37,9,'Qorako’l tuman','Каракульский район',NULL,NULL),(38,9,'Qorovulbozor tuman','Караулбазарский район',NULL,NULL),(39,10,'Samarqand shahar','г. Самарканд',NULL,NULL),(40,10,'Oqdaryo tumani','Акдарьинский район',NULL,NULL),(41,10,'Bulung’ur tumani','Булунгурский район',NULL,NULL),(42,10,'Jomboy tumani','Джамбайский район',NULL,NULL),(43,10,'Kattaqo’rg’on tumani','Каттакурганский район',NULL,NULL),(44,10,'Kattaqo’rg’on shahar','г. Каттакурган',NULL,NULL),(45,10,'Qo’shrabod tumani','Кошрабадский район',NULL,NULL),(46,10,'Narpay tumani','Нарпайский район',NULL,NULL),(47,10,'Nurobod tumani','Нурабадский район',NULL,NULL),(48,10,'Payariq tumani','Пайарыкский район',NULL,NULL),(49,10,'Pastdarg’om tumani','Пасдаргомский район',NULL,NULL),(50,10,'Paxtachi tumani','Пахтачийский район',NULL,NULL),(51,10,'Samarqand tumani','Самаркандский район',NULL,NULL),(53,10,'Tayloq tumani','Тайлакский район',NULL,NULL),(54,10,'Urgut tumani','Ургутский район',NULL,NULL),(55,11,'Navoiy shahar','г. Навои',NULL,NULL),(56,11,'Karmana tumani','Карманинский район',NULL,NULL),(57,11,'Navbaxor tumani','Навбахорский район',NULL,NULL),(58,11,'Nurota tumani','Нуратинский район',NULL,NULL),(59,11,'Xatirchi tumani','Хатырчинский район',NULL,NULL),(60,11,'Qiziltepa tumani','Кызылтепинский район',NULL,NULL),(61,11,'Konimex tumani','Канимехский район',NULL,NULL),(62,11,'Uchquduq tumani','Учкудукский район',NULL,NULL),(63,11,'Zarafshon shahar','г.  Зарафшан',NULL,NULL),(64,11,'Tomdi tumani','Тамдынский район',NULL,NULL),(65,12,'Andijon shahar','г. Андижан',NULL,NULL),(66,12,'Xonobod shahar','г. Ханабад',NULL,NULL),(67,12,'Andijon tumani','Андижанский район',NULL,NULL),(68,12,'Asaka tumani','Асакинский район',NULL,NULL),(69,12,'Baliqchi tumani','Балыкчинский район',NULL,NULL),(70,12,'Bo’z tumani','Бозский район',NULL,NULL),(71,12,'Buloqboshi tumani','Булакбашинский район',NULL,NULL),(72,12,'Jalolquduq tumani','Жалакудукский район',NULL,NULL),(73,12,'Izboskan tumani','Избасканский район',NULL,NULL),(74,12,'Ulug’nor tumani','Улугнорский район',NULL,NULL),(75,12,'Qo’rg’ontepa tumani','Кургантепинский район',NULL,NULL),(76,12,'Marxamat tumani','Мархаматский район',NULL,NULL),(77,12,'Oltinko’l tumani','Алтынкульский район',NULL,NULL),(78,12,'Paxtaobod tumani','Пахтаабадский район',NULL,NULL),(79,12,'Ho’jaobod tumani','Ходжаабадский район',NULL,NULL),(80,12,'Shaxrixon tumani','Шахриханский район',NULL,NULL),(82,13,'Marg’ilon shahar','г. Маргилан',NULL,NULL),(83,13,'Farg’ona shahar','г. Фергана',NULL,NULL),(84,13,'Quvasoy shahar','г. Кувасай',NULL,NULL),(85,13,'Qo’qon shahar','г. Коканд',NULL,NULL),(86,13,'Bog’dod tumani','Багдадский район',NULL,NULL),(87,13,'Beshariq tumani','Бешарыкский район',NULL,NULL),(88,13,'Buvayda tumani','Бувайдинский район',NULL,NULL),(89,13,'Dang’ara tumani','Дангаринский район',NULL,NULL),(90,13,'Yozyovon tumani','Язъяванский район',NULL,NULL),(91,13,'Oltiariq tumani','Алтыарыкский район',NULL,NULL),(92,13,'Qo’shtepa tumani','Коштепинский район',NULL,NULL),(93,13,'Rishton tumani','Риштанский район',NULL,NULL),(94,13,'So’x tumani','Сохский район',NULL,NULL),(95,13,'Toshloq tumani','Ташлакский район',NULL,NULL),(96,13,'Uchko’prik tumani','Учкуприкский район',NULL,NULL),(97,13,'Farg’ona tumani','Ферганский район',NULL,NULL),(98,13,'Furqat tumani','Фуркатский район',NULL,NULL),(99,13,'O’zbekiston tumani','Узбекистанский район',NULL,NULL),(100,13,'Quva tumani','Кувинский район',NULL,NULL),(101,14,'Angor tumani','Ангорский район',NULL,NULL),(102,14,'Boysun tumani','Байсунский район',NULL,NULL),(103,14,'Denov tumani','Денауский район',NULL,NULL),(104,14,'Jarqo’rg’on tumani','Джаркурганский район',NULL,NULL),(105,14,'Qiziriq tumani','Кизирыкский район',NULL,NULL),(106,14,'Qumqo’rg’on tumani','Кумкурганский район',NULL,NULL),(107,14,'Muzrabot tumani','Музрабатский район',NULL,NULL),(108,14,'Oltinsoy tumani','Алтынсайский район',NULL,NULL),(109,14,'Sariosiyo tumani','Сариасийский район',NULL,NULL),(110,14,'Termiz tumani','Термезский район',NULL,NULL),(111,14,'Termiz shahar','г. Термез',NULL,NULL),(112,14,'Uzun tumani','Узунский район',NULL,NULL),(113,14,'Sherobod tumani','Шерабадский район',NULL,NULL),(114,14,'Sho’rchi tumani','Шурчинский район',NULL,NULL),(115,15,'Oqoltin tumani','Акалтынский район',NULL,NULL),(116,15,'Boyovut tumani','Баяутский район',NULL,NULL),(117,15,'Guliston tumani','Гулистанский район',NULL,NULL),(118,15,'Mirzaobod tumani','Мирзаабадский район',NULL,NULL),(119,15,'Sayxunobod tumani','Сайхунабадский район',NULL,NULL),(120,15,'Sirdaryo tumani','Сырдарьинский район',NULL,NULL),(121,15,'Sardoba tumani','Сардобинский район',NULL,NULL),(122,15,'Xovos tumani','Хавастский район',NULL,NULL),(123,15,'Guliston shahar','г. Гулистан',NULL,NULL),(124,15,'Shirin shahar','г. Ширин',NULL,NULL),(126,15,'Yangiyer shahar','г. Янгиер',NULL,NULL),(127,16,'Urganch shahar','г. Ургенч',NULL,NULL),(128,16,'Bog’ot tumani','Багатский район',NULL,NULL),(129,16,'Gurlan tumani','Гурленский район',NULL,NULL),(130,16,'Xozarasp tumani','Хазараспский район',NULL,NULL),(131,16,'Xiva tumani','Хивинский район',NULL,NULL),(132,16,'Xonqa tumani','Ханкинский район',NULL,NULL),(133,16,'Urganch tumani','Ургенчский район',NULL,NULL),(134,16,'Qo’shko’pir tumani','Кошкупырский район',NULL,NULL),(135,16,'Shovot tumani','Шаватский район',NULL,NULL),(136,16,'Yangiariq tumani','Янгиарыкский район',NULL,NULL),(137,16,'Yangibozor tumani','Янгибазарский район',NULL,NULL),(138,17,'Angren shahar','г. Ангрен',NULL,NULL),(139,17,'Bekobod shahar','г. Бекабад',NULL,NULL),(140,17,'Olmaliq shahar','г. Алмалик',NULL,NULL),(141,17,'Chirchiq shahar','г. Чирчик',NULL,NULL),(142,17,'Bekobod tumani','Бекабадский район',NULL,NULL),(143,17,'Bo’ka tumani','Букинский район',NULL,NULL),(144,17,'Bo’stonliq tumani','Бостанлыкский район',NULL,NULL),(145,17,'Qibray tumani','Кибрайский район',NULL,NULL),(146,17,'Zangiota tumani','Зангиатинский район',NULL,NULL),(148,17,'Quyichirchiq tumani','Куйичирчикский район',NULL,NULL),(149,17,'Oqqo’rg’on tumani','Аккурганский район',NULL,NULL),(150,17,'Oxongaron tumani','Ахангаранский район',NULL,NULL),(151,17,'Parkent tumani','Паркентский район',NULL,NULL),(152,17,'Pskent tumani','Пскентский район',NULL,NULL),(153,17,'O’rtachirchiq tumani','Уртачирчикский район',NULL,NULL),(154,17,'Chinoz tumani','Чиназский район',NULL,NULL),(155,17,'Yuqorichirchiq tumani','Юкоричирчикский район',NULL,NULL),(156,17,'Yangiyo’l tumani','Янгиюльский район',NULL,NULL),(158,18,'Qarshi shahar','г. Карши',NULL,NULL),(159,18,'G’uzor tumani','Гузарский район',NULL,NULL),(160,18,'Qarshi tumani','Каршинский район',NULL,NULL),(161,18,'Kasbi tumani','Касбинский район',NULL,NULL),(162,18,'Koson tumani','Касанский район',NULL,NULL),(163,18,'Kitob tumani','Китабский район',NULL,NULL),(164,18,'Mirishkor tumani','Миришкорский район',NULL,NULL),(165,18,'Muborak tumani','Мубарекский район',NULL,NULL),(166,18,'Nishon tumani','Нишанский район',NULL,NULL),(167,18,'Chiroqchi tumani','Чиракчинский район',NULL,NULL),(168,18,'Shaxrisabz tumani','Шахрисабзский район',NULL,NULL),(170,18,'Qamashi tumani','Камашинский район',NULL,NULL),(171,18,'Dexqonobod tumani','Дехканабадский район',NULL,NULL),(172,18,'Yakkabog’ tumani','Яккабакский район',NULL,NULL),(173,19,'Jizzax shahar','г. Джизак',NULL,NULL),(174,19,'Baxmal tumani','Бахмальский район',NULL,NULL),(175,19,'Do’stlik tumani','Дустликский район',NULL,NULL),(176,19,'G’allaorol tumani','Галляаральский район',NULL,NULL),(177,19,'Jizzax tumani','Джизакский район',NULL,NULL),(178,19,'Zarbdor tumani','Зарбдорский район',NULL,NULL),(179,19,'Zafarobod tumani','Зафарабадский район',NULL,NULL),(180,19,'Zomin tumani','Зааминский район',NULL,NULL),(181,19,'Paxtakor tumani','Пахтакорский район',NULL,NULL),(182,19,'Mirzacho’l tumani','Мирзачульский район',NULL,NULL),(183,19,'Forish tumani','Фаришский район',NULL,NULL),(184,19,'Yangiobod tumani','Янгиабадский район',NULL,NULL),(185,21,'Namangan shahar','г. Наманган',NULL,NULL),(186,21,'Mingbuloq tumani','Мингбулакский район',NULL,NULL),(189,21,'Pop tumani','Папский район',NULL,NULL),(190,21,'Norin tumani','Нарынский район',NULL,NULL),(191,21,'To’raqo’rg’on tumani','Туракурганский район',NULL,NULL),(192,21,'Uychi tumani','Уйчинский район',NULL,NULL),(194,21,'Chortoq tumani','Чартакский район',NULL,NULL),(195,21,'Chust tumani','Чустский район',NULL,NULL),(196,21,'Yangiqo’rg’on tumani','Янгикурганский район',NULL,NULL),(198,22,'Yunusobod tumani','Юнусабадский район',NULL,NULL),(199,22,'Mirobod tumani','Мирабадский район',NULL,NULL),(200,22,'Yakkasaroy tumani','Яккасарайский район',NULL,NULL),(201,22,'Olmazor tumani','Алмазарский район',NULL,NULL),(202,22,'Bektemir tumani','Бектемирский район',NULL,NULL),(203,22,'Yashnobod tumani','Яшанабадский район',NULL,NULL),(204,22,'Chilonzor tumani','Чиланзарский район',NULL,NULL),(205,22,'Uchtepa tumani','Учтепинский район',NULL,NULL),(207,22,'Mirzo Ulug’bek tumani','Мирзо-Улугбекский район',NULL,NULL),(208,22,'Sergeli tumani','Сергелийский район',NULL,NULL),(209,10,'Ishtixon tumani','Иштиханский район',NULL,NULL),(210,9,'Kogon shahar','г.Когон',NULL,NULL),(211,19,'Arnasoy tumani','Арнасайский район',NULL,NULL),(212,22,'Shayxontoxur tumanI','Шайхантохурский район',NULL,NULL),(214,21,'Namangan tumani','Наманганский район',NULL,NULL),(215,21,'Uchqo’rg’on tumani','Ускурганский район',NULL,NULL),(216,21,'Kosonsoy tumani','Касанский район',NULL,NULL),(217,16,'Xiva shahar','г.Хива',NULL,NULL),(218,8,'Taxiatosh',' Тахиатош',NULL,NULL),(219,18,'Shaxrisabz shahar','г. Шахрисабз',NULL,NULL),(220,17,'Тошкент тумани','Тошкент тумани',NULL,NULL),(221,17,'Янгийўл шаҳар','Янгийўл шаҳар',NULL,NULL),(222,17,'Оҳангарон шаҳар','Оҳангарон шаҳар',NULL,NULL),(223,17,'Нурафшон шаҳар','Нурафшон шаҳар',NULL,NULL);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citizens`
--

DROP TABLE IF EXISTS `citizens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citizens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `passport` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` int NOT NULL,
  `city_id` int DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `specialist_id` int DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citizens`
--

LOCK TABLES `citizens` WRITE;
/*!40000 ALTER TABLE `citizens` DISABLE KEYS */;
INSERT INTO `citizens` VALUES (1,'AA7011683',1,'Abror Pulatovich',19,183,1,1,'+99899 886 17 92','17-11-1992',NULL,1,'2022-03-12 06:28:37','2022-03-12 06:28:37',NULL),(2,'AA8766556',7,'Nodir Azizov',19,183,1,1,'+99897 665 54 54','11-10-1993',NULL,1,'2022-03-20 13:46:12','2022-03-20 13:46:12',NULL),(6,'AA7011683',11,'Anna Karenina',12,68,1,1,'+99891 667 67 76','10-10-1991',NULL,1,'2022-03-21 01:09:43','2022-03-21 01:09:43',NULL);
/*!40000 ALTER TABLE `citizens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `news_id` int NOT NULL,
  `comment_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `region_id` int NOT NULL,
  `city_id` int NOT NULL,
  `company_inn` int NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,2,19,183,787887787,'Khantech','Abror Pulatovich','+99899 766 76 76','Forish city','khantech.uz',NULL,1,'2022-03-12 06:30:35','2022-03-12 06:30:35',NULL),(2,14,22,212,655565665,'Uzinfocom','Gimranov Emil','+99871 656 56 56','Manzil','uzinfocom.uz',NULL,2,'2022-03-21 01:35:10','2022-03-21 01:35:10',NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Salom','+99899 788 77 77','Mavzu','Xabar',1,'2022-03-20 07:54:44','2022-03-20 10:23:03'),(2,'Kamola Aliqulova','+99897 777 66 66','Maecenas vel sodales nisi. Sed efficitur dictum orci non feugiat.','Donec non augue quis lorem tristique convallis in et urna. Morbi eget euismod orci. Ut eget justo aliquet, vehicula leo finibus, porttitor libero. Sed lorem quam, convallis nec tempor vitae, dictum et erat. Maecenas eget erat tincidunt nunc cursus luctus in in augue. Ut id nisl tellus. Praesent vulputate mollis eros a tincidunt. Quisque in gravida purus, ac rutrum sapien.',1,'2022-03-20 08:13:35','2022-03-20 10:59:20'),(3,'Abror Pulatovich','+99890 766 66 76','Morbi posuere nunc sed purus pulvinar hendrerit.','Phasellus iaculis blandit tellus vestibulum aliquet. Vivamus viverra ac ipsum vitae tempor. Sed vitae vehicula augue, vitae imperdiet enim. Mauris auctor fringilla tellus, cursus tempus nibh congue non. Nulla facilisi. Fusce nec tincidunt leo. Vivamus ac eros sagittis, consequat nisl non, sagittis lacus. Maecenas vel sodales nisi. Sed efficitur dictum orci non feugiat. Vestibulum condimentum mauris sit amet auctor dignissim.\r\n\r\nPellentesque malesuada nulla eu scelerisque congue. Aliquam augue ex, congue et nunc nec, tincidunt maximus nisl. Cras lacinia aliquam lacus, semper aliquet dolor volutpat a. Duis pharetra tortor non blandit consequat. Sed mollis imperdiet orci sed luctus. Nulla facilisis purus sit amet ex ullamcorper lacinia. Nulla facilisi. Aenean mauris lacus, viverra ac dignissim id, facilisis vel leo. Curabitur tempor sapien eu faucibus mattis. Etiam porttitor egestas enim et egestas. Vivamus at nisi ut mi cursus congue. Aliquam erat volutpat. Integer pretium semper porta.',0,'2022-03-20 08:23:29','2022-03-20 08:23:29'),(4,'Nazarov Bobur','+99890 877 67 66','Proin erat purus, elementum quis orci eu, fringilla molestie augue.','Quisque erat nulla, sodales sed pulvinar at, porta ac neque. Cras condimentum eget eros sed consectetur. Phasellus ac mollis leo. Sed odio nunc, posuere nec mollis non, pellentesque eget arcu. Donec non augue quis lorem tristique convallis in et urna. Morbi eget euismod orci. Ut eget justo aliquet, vehicula leo finibus, porttitor libero. Sed lorem quam, convallis nec tempor vitae, dictum et erat. Maecenas eget erat tincidunt nunc cursus luctus in in augue. Ut id nisl tellus. Praesent vulputate mollis eros a tincidunt. Quisque in gravida purus, ac rutrum sapien.\r\n\r\nCras finibus arcu metus, et tempor odio condimentum sit amet. Sed feugiat sem vitae iaculis mattis. Phasellus faucibus velit vel feugiat ullamcorper. Nunc suscipit leo ac arcu malesuada, nec malesuada ante porta. Vivamus a augue justo. Praesent sed luctus nibh. Curabitur laoreet imperdiet fringilla. Proin erat purus, elementum quis orci eu, fringilla molestie augue.',0,'2022-03-20 10:59:09','2022-03-20 10:59:09');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instruments`
--

DROP TABLE IF EXISTS `instruments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instruments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `firm_type` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instruments`
--

LOCK TABLES `instruments` WRITE;
/*!40000 ALTER TABLE `instruments` DISABLE KEYS */;
/*!40000 ALTER TABLE `instruments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_01_07_101724_create_citizens_table',1),(6,'2022_01_07_101807_create_companies_table',1),(7,'2022_01_07_101852_create_regions_table',1),(8,'2022_01_07_101901_create_cities_table',1),(10,'2022_01_07_101950_create_comments_table',1),(11,'2022_01_07_102001_create_questions_table',1),(12,'2022_01_07_102016_create_answers_table',1),(13,'2022_01_07_102042_create_specialists_table',1),(14,'2022_01_07_102055_create_workbooks_table',1),(16,'2022_01_07_102133_create_instruments_table',1),(17,'2022_01_07_110609_add_data_to_regions',1),(18,'2022_01_07_110620_add_data_to_cities',1),(19,'2022_01_07_110636_add_data_to_specialists',1),(20,'2022_01_08_100123_create_permission_tables',1),(21,'2022_01_09_161500_create_rezumes_table',1),(22,'2022_01_09_161520_create_vacancies_table',1),(23,'2022_01_10_060312_add_columun_to_vacancy',1),(24,'2022_01_10_060754_add_columun_to_companies',1),(25,'2022_01_10_095529_add_columun_to_citizens',1),(26,'2022_01_10_172501_add_column_to_users',1),(27,'2022_01_11_081607_add_pass_column_to_users',1),(28,'2022_01_12_073811_add_skills_data',1),(29,'2022_01_12_073955_create_skills_table',1),(30,'2022_01_12_074139_add_data_to_skill',1),(31,'2022_01_12_170719_add_soft_deleting_to_vacancies_table',1),(32,'2022_01_16_223515_add_colomun_to_company',1),(33,'2022_01_16_223751_add_soft_deleting_to_companies_table',1),(34,'2022_01_18_044040_add_status_to_citizens_table',1),(35,'2022_01_18_045439_add_passport_to_citizens_table',1),(36,'2022_01_18_063650_add_columns_to_citizens_table',1),(37,'2022_01_18_083151_add_soft_deleting_to_citizens_table',1),(38,'2022_01_18_113544_add_columns_to_rezumes_table',1),(39,'2022_02_02_044722_add_soft_deleting_to_rezume_table',1),(40,'2022_01_07_101937_create_news_table',2),(41,'2022_03_18_102535_create_categories_table',2),(43,'2022_03_19_102158_create_posts_table',3),(44,'2022_03_20_101422_create_contacts_table',4),(45,'2022_03_20_132802_create_vacancy_categories_table',5),(46,'2022_03_20_133547_add_s_order_column_specialists_table',6),(47,'2022_03_20_172645_add_can_login_column_to_users_table',7),(48,'2022_03_21_120952_add_user_id_column_to_rezumes_table',8),(51,'2022_03_21_132609_add_some_columns_to_vacancies_table',9),(52,'2022_03_22_154838_create_resource_types_table',10),(53,'2022_03_22_163152_create_resources_table',11),(54,'2022_03_23_125850_add_about_column_to_rezumes_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_user` int DEFAULT NULL,
  `publish_date` date NOT NULL,
  `status` tinyint NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int NOT NULL DEFAULT '0',
  `p_order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_category_id_index` (`category_id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (4,1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Salom Kamola.','Sed efficitur dictum orci non feugiat. Vestibulum condimentum mauris sit amet auctor dignissim.','<p>Quisque erat nulla, sodales sed pulvinar at, porta ac neque. Cras condimentum eget eros sed consectetur. Phasellus ac mollis leo. Sed odio nunc, posuere nec mollis non, pellentesque eget arcu. Donec non augue quis lorem tristique convallis in et urna. Morbi eget euismod orci. Ut eget justo aliquet, vehicula leo finibus, porttitor libero. Sed lorem quam, convallis nec tempor vitae, dictum et erat. Maecenas eget erat tincidunt nunc cursus luctus in in augue. Ut id nisl tellus. Praesent vulputate mollis eros a tincidunt. Quisque in gravida purus, ac rutrum sapien.</p>\r\n\r\n<p>Cras finibus arcu metus, et tempor odio condimentum sit amet. Sed feugiat sem vitae iaculis mattis. Phasellus faucibus velit vel feugiat ullamcorper. Nunc suscipit leo ac arcu malesuada, nec malesuada ante porta. Vivamus a augue justo. Praesent sed luctus nibh. Curabitur laoreet imperdiet fringilla. Proin erat purus, elementum quis orci eu, fringilla molestie augue. Ut elementum quam felis, in porta nisi hendrerit vel. Donec suscipit sem eu quam cursus, finibus semper elit dictum. Nam sollicitudin blandit augue ultrices aliquet.</p>',2,'2022-03-19',2,'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-salom-kamola','19.03.2022/lamborjgini.jpg.1647710153.jpg',13,1,'2022-03-19 12:15:53','2022-03-22 09:06:35'),(5,1,'Sed efficitur dictum orci non feugiat. Vestibulum condimentum mauris sit amet auctor dignissim.','Nulla facilisi. Fusce nec tincidunt leo. Vivamus ac eros sagittis, consequat nisl non, sagittis lacus. Maecenas vel sodales nisi. Sed efficitur dictum orci non feugiat. Vestibulum condimentum mauris sit amet auctor dignissim.','<p>Phasellus iaculis blandit tellus vestibulum aliquet. Vivamus viverra ac ipsum vitae tempor. Sed vitae vehicula augue, vitae imperdiet enim. Mauris auctor fringilla tellus, cursus tempus nibh congue non. Nulla facilisi. Fusce nec tincidunt leo. Vivamus ac eros sagittis, consequat nisl non, sagittis lacus. Maecenas vel sodales nisi. Sed efficitur dictum orci non feugiat. Vestibulum condimentum mauris sit amet auctor dignissim.</p>\r\n\r\n<p>Pellentesque malesuada nulla eu scelerisque congue. Aliquam augue ex, congue et nunc nec, tincidunt maximus nisl. Cras lacinia aliquam lacus, semper aliquet dolor volutpat a. Duis pharetra tortor non blandit consequat. Sed mollis imperdiet orci sed luctus. Nulla facilisis purus sit amet ex ullamcorper lacinia. Nulla facilisi. Aenean mauris lacus, viverra ac dignissim id, facilisis vel leo. Curabitur tempor sapien eu faucibus mattis. Etiam porttitor egestas enim et egestas. Vivamus at nisi ut mi cursus congue. Aliquam erat volutpat. Integer pretium semper porta.</p>',2,'2022-03-19',2,'sed-efficitur-dictum-orci-non-feugiat-vestibulum-condimentum-mauris-sit-amet-auctor-dignissim','19.03.2022/lamborjgini.jpg.1647710291.jpg',3,2,'2022-03-19 12:18:11','2022-03-23 08:54:31'),(6,1,'Maecenas vel sodales nisi. Sed efficitur dictum orci non feugiat.','Mauris auctor fringilla tellus, cursus tempus nibh congue non. Nulla facilisi. Fusce nec tincidunt leo. Vivamus ac eros sagittis, consequat nisl non, sagittis lacus. Maecenas vel sodales nisi. Sed efficitur dictum orci non feugiat. Vestibulum condimentum mauris sit amet auctor dignissim.','<p>Mauris auctor fringilla tellus, cursus tempus nibh congue non. Nulla facilisi. Fusce nec tincidunt leo. Vivamus ac eros sagittis, consequat nisl non, sagittis lacus. Maecenas vel sodales nisi. Sed efficitur dictum orci non feugiat. Vestibulum condimentum mauris sit amet auctor dignissim.</p>\r\n\r\n<p>Pellentesque malesuada nulla eu scelerisque congue. Aliquam augue ex, congue et nunc nec, tincidunt maximus nisl. Cras lacinia aliquam lacus, semper aliquet dolor volutpat a. Duis pharetra tortor non blandit consequat. Sed mollis imperdiet orci sed luctus. Nulla facilisis purus sit amet ex ullamcorper lacinia. Nulla facilisi. Aenean mauris lacus, viverra ac dignissim id, facilisis vel leo. <strong>Curabitur</strong> tempor sapien eu faucibus mattis. Etiam porttitor egestas enim et egestas. Vivamus at nisi ut mi cursus congue. Aliquam erat volutpat. Integer pretium semper porta.</p>\r\n\r\n<p>Quisque erat nulla, sodales sed pulvinar at, porta ac neque. Cras condimentum eget eros sed consectetur. Phasellus ac mollis leo. Sed odio nunc, posuere nec mollis non, pellentesque eget arcu. Donec non augue quis lorem tristique convallis in et urna. Morbi eget euismod orci. Ut eget justo aliquet, vehicula leo finibus, porttitor libero. Sed lorem quam, convallis nec tempor vitae, dictum et erat. Maecenas eget erat tincidunt nunc cursus luctus in in augue. Ut id nisl tellus. Praesent vulputate mollis eros a tincidunt. Quisque in gravida purus, ac rutrum sapien.</p>',2,'2022-03-19',2,'maecenas-vel-sodales-nisi-sed-efficitur-dictum-orci-non-feugiat','19.03.2022/lamborjgini.jpg.1647710550.jpg',8,3,'2022-03-19 12:22:30','2022-03-20 00:16:04');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `question_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (8,'Qoraqalpog‘iston Respublikasi','Республика Каракалпакстан',NULL,NULL),(9,'Buxoro viloyati','Бухарская область',NULL,NULL),(10,'Samarqand viloyati','Самаркандская область',NULL,NULL),(11,'Navoiy viloyati','Навоийская область',NULL,NULL),(12,'Andijon viloyati','Андижанская область',NULL,NULL),(13,'Farg‘ona viloyati','Ферганская область',NULL,NULL),(14,'Surxondaryo viloyati','Сурхандарьинская область',NULL,NULL),(15,'Sirdaryo viloyati','Сырдарьинская область',NULL,NULL),(16,'Xorazm viloyati','Хорезмская область',NULL,NULL),(17,'Toshkent viloyati','Ташкентская область',NULL,NULL),(18,'Qashqadaryo viloyati','Кашкадарьинская область',NULL,NULL),(19,'Jizzax viloyati','Джизакская область',NULL,NULL),(21,'Namangan viloyati','Наманганская область',NULL,NULL),(22,'Toshkent shahri','город Ташкент',NULL,NULL);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource_types`
--

DROP TABLE IF EXISTS `resource_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resource_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_order` int NOT NULL,
  `status` int NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource_types`
--

LOCK TABLES `resource_types` WRITE;
/*!40000 ALTER TABLE `resource_types` DISABLE KEYS */;
INSERT INTO `resource_types` VALUES (1,'Kitoblar','kitoblar',1,2,'2022-03-22 11:15:46','2022-03-22 11:26:02'),(2,'Dasturlar','dasturlar',2,2,'2022-03-22 11:26:14','2022-03-22 11:26:14'),(3,'Videolar','videolar',3,2,'2022-03-22 11:26:27','2022-03-22 11:26:27');
/*!40000 ALTER TABLE `resource_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resources` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `clicked_count` int NOT NULL DEFAULT '0',
  `r_order` int NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resources`
--

LOCK TABLES `resources` WRITE;
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
INSERT INTO `resources` VALUES (1,1,'Anna Kerinina','anna-kerinina','Lev Tolstoy','<p>Badiiy adabiyotda muhabbat mavzusida yozilgan asarlar qanchalik ko&lsquo;p bo&lsquo;lmasin, ularning hech birida takdirlar, qismatlar, fojialar, o&lsquo;ylar, qarashlar bir-birini takrorlamaydi. Navoiyning Laylisi-yu Majnuni, Shekspirning Otellosi-yu Dezdemonasi, Knut Gamsunning Edvardasi, Chingiz Aytmatovning Jamilasi. Lev Tolstoyning Anna Kareninasi ham haqli ravishda mana shunday asar qahramonlari safida turadiki, adib ijodiga oshno bo&lsquo;lgan har bir kitobxon buni yaxshi anglaydi.</p>\r\n\r\n<p>Adabiyotdan panoh istagan, adabiyotni maʼnaviy kamoloti uchun zarur deb bilgan kitob ixlosmandlari eʼtiboriga qariyb qirq yil lik tanaffusdan so&lsquo;ng havola etilayotgan daho ijodkorning beqiyos asari - &quot;Anna Karenina&quot; Sizga yana yangi dunyolarni ochishga shay.</p>',19,1,'https://asaxiy.uz/product/knigi/badiy-adabiyot/zha%D2%B3on-adabiyoti/lev-tolstoj-anna-karenina-2-ta-kitob?language=uz','2022-03-22 12:07:44','2022-03-23 08:54:43',2),(2,1,'Ufq romani','ufq-romani','Said Ahmad','<p>​​​​&ldquo;Ufq&rdquo; trilogiyasi Oʻzbekiston xalq yozuvchisi Oʻzbekiston Qaxramoni Said Ahmad ijodida alohida oʻrin tutadi. Trilogiya XX asr millat hayotining oʻn yillik davri &mdash; ikkinchi jaxon urushi, urush va urushdan keyingi yillar voqealarini oʻz ichiga oladi. Trilogiyada oʻsha yillari xalq boshiga tushgan musibatlar, odamlar koʻksidagi armonlar, shu munosabatlarni yengishga qodir mislsiz matonat va shijoatlar yozuvchi isteʼdodiga xos ehtiros, zoʻr ilhom bilan aks ettirilgan. Asarda Ikromjon, Jannat, Azizxon, Dildor, Asrora kabi teran, xalqchil, yorqin milliy obrazlar yaratilgan.​</p>\r\n\r\n<p><strong>Muallif:&nbsp;</strong>Said Ahmad<br />\r\n<strong>Tayyorlovchi:&nbsp;</strong>Xusanxodjayeva Nodira Said Ahmad qizi<br />\r\n<b>Nomi:&nbsp;</b>&laquo;Ufq&raquo;</p>',0,2,'https://kitobxon.com/oz/kitob/ufq','2022-03-22 12:43:08','2022-03-22 12:43:08',2);
/*!40000 ALTER TABLE `resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rezumes`
--

DROP TABLE IF EXISTS `rezumes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rezumes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist_id` int NOT NULL,
  `skill` int NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_hidden` tinyint(1) NOT NULL,
  `is_history` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int NOT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rezumes`
--

LOCK TABLES `rezumes` WRITE;
/*!40000 ALTER TABLE `rezumes` DISABLE KEYS */;
INSERT INTO `rezumes` VALUES (1,'AA7011683',2,2,'4 000 000',0,1,1,0,1,'2022-03-23 06:18:22','2022-03-23 06:18:22',NULL,1,'<p>Pellentesque quam odio, ullamcorper egestas nisi sed, maximus posuere tellus. Mauris ornare molestie augue, quis molestie nulla suscipit vulputate. Aenean nisi nisl, placerat tempus lectus in, elementum lacinia felis. In hac habitasse platea dictumst. Curabitur vel leo neque. Praesent sit amet ante a diam rutrum consectetur.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus vitae eleifend diam, gravida lobortis nibh. Ut aliquam velit et metus lacinia, vitae porta velit lobortis. Curabitur ipsum enim, faucibus vel sapien ac, porta consectetur lacus. Maecenas ac nibh nisi. Phasellus at nisl accumsan, facilisis arcu et, rutrum urna. Vivamus interdum, ligula id aliquam tempus, ex velit placerat augue, sed hendrerit massa orci eget dolor. Nulla facilisi. Fusce a mollis ex, nec rutrum mauris. Integer sit amet posuere tortor. Nam eu ultricies nunc.</p>\n'),(2,'AA7011683',4,2,'5 000 000',0,0,1,0,1,'2022-03-23 08:19:00','2022-03-23 08:19:00',NULL,11,'<p>Pellentesque quam odio, ullamcorper egestas nisi sed, maximus posuere tellus. Mauris ornare molestie augue, quis molestie nulla suscipit vulputate. Aenean nisi nisl, placerat tempus lectus in, elementum lacinia felis. In hac habitasse platea dictumst. Curabitur vel leo neque. Praesent sit amet ante a diam rutrum consectetur.</p>\n\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus vitae eleifend diam, gravida lobortis nibh. Ut aliquam velit et metus lacinia, vitae porta velit lobortis. Curabitur ipsum enim, faucibus vel sapien ac, porta consectetur lacus. Maecenas ac nibh nisi. Phasellus at nisl accumsan, facilisis arcu et, rutrum urna. Vivamus interdum, ligula id aliquam tempus, ex velit placerat augue, sed hendrerit massa orci eget dolor. Nulla facilisi. Fusce a mollis ex, nec rutrum mauris. Integer sit amet posuere tortor. Nam eu ultricies nunc.</p>\n');
/*!40000 ALTER TABLE `rezumes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (1,'Farqi yo‘q',NULL,NULL),(2,'0-3 yil',NULL,NULL),(3,'3-5 yil',NULL,NULL),(4,'5-8 yil',NULL,NULL),(5,'8 yildan yuqori',NULL,NULL);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialists`
--

DROP TABLE IF EXISTS `specialists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `specialists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '2',
  `s_order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialists`
--

LOCK TABLES `specialists` WRITE;
/*!40000 ALTER TABLE `specialists` DISABLE KEYS */;
INSERT INTO `specialists` VALUES (1,'Geodezist',2,1,'2022-03-20 13:37:58','2022-03-20 10:42:48','geodezist','lni lni-brush','bg-color-4'),(2,'Topograf',2,2,'2022-03-20 13:37:58','2022-03-20 10:43:25','topograf','lni lni-display','bg-color-1'),(3,'Geolog',2,3,'2022-03-20 13:37:58','2022-03-20 10:38:48','geolog','lni lni-book','bg-color-4'),(4,'Injener geodezist',2,4,'2022-03-20 13:37:58','2022-03-20 10:38:53','injener-geodezist','lni lni-book','bg-color-1'),(5,'Injener topograf',2,5,'2022-03-20 13:37:58','2022-03-20 10:38:59','injener-topograf','lni lni-book','bg-color-1'),(6,'Injener geolog',2,6,'2022-03-20 13:37:58','2022-03-20 10:43:32','injener-geolog','lni lni-display','bg-color-1'),(7,'Texnik geodezist',2,7,'2022-03-20 13:37:58','2022-03-20 10:42:08','texnik-geodezist','lni lni-funnel','bg-color-1'),(8,'Texnik topograf',2,8,'2022-03-20 13:37:58','2022-03-20 10:39:12','texnik-topograf','lni lni-book','bg-color-1'),(9,'Texnik geolog',2,9,'2022-03-20 13:37:58','2022-03-20 10:43:44','texnik-geolog','lni lni-display','bg-color-1'),(11,'Burg‘ulovchi',2,11,'2022-03-20 13:37:58','2022-03-20 10:39:23','burgulovchi','lni lni-book','bg-color-2'),(12,'Yordamchi burg‘ulovchi',2,12,'2022-03-20 13:37:58','2022-03-20 10:43:59','yordamchi-burgulovchi','lni lni-display','bg-color-2'),(13,'Podzemshik',2,13,'2022-03-20 13:37:58','2022-03-20 10:39:43','podzemshik','lni lni-book','bg-color-3'),(14,'Injener podzemshik',2,14,'2022-03-20 13:37:58','2022-03-20 10:39:50','injener-podzemshik','lni lni-book','bg-color-3'),(15,'Kartograf',2,15,'2022-03-20 13:37:58','2022-03-20 10:39:57','kartograf','lni lni-book','bg-color-3'),(16,'Injener kartograf',2,16,'2022-03-20 13:37:58','2022-03-20 10:40:04','injener-kartograf','lni lni-book','bg-color-3'),(17,'Kameralchik',2,17,'2022-03-20 13:37:58','2022-03-20 10:40:11','kameralchik','lni lni-book','bg-color-1'),(18,'Shofyor',2,18,'2022-03-20 13:37:58','2022-03-20 10:41:22','shofyor','lni lni-world','bg-color-4');
/*!40000 ALTER TABLE `specialists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_login` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Abror Pulatovich',3,'abror1992','$2y$10$AjuihT2qD0aXW2JaMLU2YusqVTBqaDXEQEQVtbkoPLduqoOKNXWxq','abror1992','abror.eshkabilov@gmail.com',NULL,NULL,'2022-03-12 06:28:37','2022-03-21 06:36:04',1),(2,'Khantech',2,'khantech1117','$2y$10$gMdA/uGlFKh0KPaxmKopzuCytZ8iM333Tr4is3SQ./CI6QHSzRDky','khantech1117',NULL,NULL,NULL,'2022-03-12 06:30:35','2022-03-21 05:56:54',1),(7,'Nodir Azizov',1,'nodir.a.uzb1990','$2y$10$v9yGPfdvMZ2yDi8wXajnk.a1VvZXbP4x7Xr3XygBu4z8luN2s.Ymy','nodir.a.uzb1990','nodir.a.uzb@gmail.com',NULL,NULL,'2022-03-20 13:46:12','2022-03-20 13:46:12',0),(11,'Anna Karenina',1,'ann.karenina','$2y$10$Lbifls5UUUp/fhcH7PCg5uqpgjOYDWKTw1/cb5K7BZws5OQdCb2Mq','ann.karenina','ann.karenina@gmail.com',NULL,NULL,'2022-03-21 01:09:43','2022-03-23 08:16:32',1),(14,'Gimranov Emil',2,'uzinfocom20','$2y$10$Go2jKWNJ5Kg8euCKYAowleTq91tkSzVRpm2uBe3v5Om.srU.OhWVC','uzinfocom20',NULL,NULL,NULL,'2022-03-21 01:35:10','2022-03-22 12:59:28',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacancies`
--

DROP TABLE IF EXISTS `vacancies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vacancies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_inn` int NOT NULL,
  `specialist_id` int NOT NULL,
  `skill` int NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_hidden` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `company_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `limit_salary` decimal(8,2) DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacancies`
--

LOCK TABLES `vacancies` WRITE;
/*!40000 ALTER TABLE `vacancies` DISABLE KEYS */;
INSERT INTO `vacancies` VALUES (2,655565665,4,3,NULL,1,1,0,1,'2022-03-21 12:12:30','2022-03-23 08:39:04',NULL,2,'Injiner kerak',NULL,NULL,'<h4><strong><span style=\"font-size:14px;\">Job Description</span></strong></h4>\r\n\r\n<p><span style=\"font-size:14px;\">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi umsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit</span></p>\r\n\r\n<p><span style=\"font-size:14px;\">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi umsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</span></p>\r\n\r\n<h5><strong><span style=\"font-size:14px;\">What You Need for this Position</span></strong></h5>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px;\">- Objective-C</span></li>\r\n	<li><span style=\"font-size:14px;\">- iOS SDK</span></li>\r\n	<li><span style=\"font-size:14px;\">- XCode</span></li>\r\n	<li><span style=\"font-size:14px;\">- Cocoa</span></li>\r\n	<li><span style=\"font-size:14px;\">- ClojureScript</span></li>\r\n</ul>\r\n\r\n<h5><strong><span style=\"font-size:14px;\">How To Apply</span></strong></h5>\r\n\r\n<p><span style=\"font-size:14px;\">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</span></p>',13);
/*!40000 ALTER TABLE `vacancies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacancy_categories`
--

DROP TABLE IF EXISTS `vacancy_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vacancy_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vc_order` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacancy_categories`
--

LOCK TABLES `vacancy_categories` WRITE;
/*!40000 ALTER TABLE `vacancy_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacancy_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workbooks`
--

DROP TABLE IF EXISTS `workbooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workbooks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rezume_id` int NOT NULL,
  `old_company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workbooks`
--

LOCK TABLES `workbooks` WRITE;
/*!40000 ALTER TABLE `workbooks` DISABLE KEYS */;
INSERT INTO `workbooks` VALUES (1,2,'MehnatUz MHCJ','Injiner dasturchi','10-10-2015','01-01-2020','2022-03-23 08:19:00','2022-03-23 08:19:00'),(2,2,'Golden house','Menejer','05-01-2020','01-01-2022','2022-03-23 08:19:00','2022-03-23 08:19:00');
/*!40000 ALTER TABLE `workbooks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-23 20:49:24
