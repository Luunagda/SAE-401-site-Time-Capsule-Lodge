-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 11 sep. 2023 à 14:43
-- Version du serveur : 5.7.40
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc_lite`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `lieu_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `accueil` varchar(10) NOT NULL,
  `css` varchar(100) DEFAULT NULL,
  `annee` smallint(11) NOT NULL,
  `type_chambre` varchar(40) NOT NULL,
  `chambre_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_articles_Lieu1_idx` (`lieu_id`),
  KEY `fk_articles_categories1_idx` (`categories_id`),
  KEY `fk_articles_chambre1_idx` (`chambre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `slug`, `image`, `alt`, `lieu_id`, `categories_id`, `prix`, `accueil`, `css`, `annee`, `type_chambre`, `chambre_id`) VALUES
(44, 'Hannibal marche sur Rome', 'L\'itinéraire du général carthaginois en octobre -128 reste méconnu. Joignez-vous à son armé qui a l’origine devait marcher sur Rome. L’histoire en décidera autrement mais Hannibal restera à jamais l’un des meilleurs tacticiens de son époque. Lui qui a marqué les esprits en traversant toute l\'Italie avec des éléphants de guerre.', 'hannibal', '/img/punique.jpg', 'Bataille de Zama', 3, 1, 50000, 'non', '', -128, 'couple', 16),
(45, 'Bug de l’an 2000', 'Votre horloge indique 11h16 premier janvier 1900 ? vous étiez pourtant sur d’être en 1999 hier ! Vous voilà en plein bug de l’an 2000.', 'bug-2000', '/img/2000.jpg', 'Error 2000', 2, 1, 25000, 'non', '', 2000, 'couple', 14),
(46, 'Débarquement du 6 juin', 'Débarquez le 6 juin 1944 au matin avec les forces américaine sur la plage française d’Utah beach. Votre objectif est de libérer la côte de Normandie pour porter un coup décisif au Allemand lors de la seconde guerre mondiale. Cet événement peut être très impressionnant, ne le prenez pas à la légère.', 'debarquement', '/img/Dday.jpg', 'barge de débarquement', 3, 1, 70000, 'non', NULL, 1944, 'couple', 15),
(47, 'Live Aid de Londres', 'Ce double concert de Londres et Philadelphie a permis de lever plus de 120 millions de dollars dans le but de soulager la famine éthiopienne et soutenir la lutte contre le sida. Des artistes mythiques se sont succédés de 12h à 22h pour les 90 000 spectateurs présents à chaque concert. Revivez cet événement aux premières loges le 13 juillet 1985.', 'live-aid', '/img/Queen.jpg', 'Freddy Mercurie au Live Aid de Londres', 3, 1, 40000, 'non', NULL, 1985, 'couple', 15),
(48, 'Le départ d’Apollo 11', 'Le 16 juillet 1969 à 13h32 le lanceur Saturn V décolle vers la Lune pour la mission américaine Apollo 11, avec à son bord Neil Armstrong, commandant, Edwin « Buzz » Aldrin et Michael Collins. On estime à un million le nombre de spectateur ce jour là. Que diriez vous d’en faire partie ?', 'apollo-11', '/img/apollon11.jpg', 'Saturn V décolle', 2, 1, 30000, 'non', NULL, 1969, 'couple', 15),
(49, 'Un sacrifice aztèque', 'Les aztèque sont le peuple d\'Amérique latine connus pour ses sacrifices humains de masse. Cela s’explique par leurs croyances selon lesquelles “l’eau précieuse” est nécessaire pour faire fonctionner le monde. Venez étudiez leurs rites et cultures avant l\'arrivée des colons.', 'sacrifice-azteque', '/img/aztèque.jpg', 'Dessin Aztèque sacrifice', 2, 2, 60000, 'oui', 'left: 14.5%; top: 40%;', 1400, 'couple', 14),
(56, 'Crucifixion de Jésus de Nazareth', 'Assistez Ponce Pilat durant le procès de Jésus de Nazareth puis assister à sa condamnation le vendredi 7 avril 30. Voyez de vos yeux l’homme à la base de la plus grande religion de l’histoire, à un moment clef de son existence qui ne s\'arrête peut être pas après cette condamnation.', 'crucifixion-jesus', '/img/Jesus.jpg', 'Peinture crucifixion', 5, 1, 100000, 'non', NULL, 30, 'couple', 17),
(57, 'Chute du Mur de Berlin ', 'Nous vous proposons une formule inédite ! Assistez à la construction du Mur de Berlin la nuit du 12 au 13 août 1961. Grâce à nos capsules n’attendez pas pour voir sa chute qui aura pourtant lieu des années plus tard, le 1er décembre 1989.', 'mur-berlin', '/img/murberlin.jpg', 'Pent de mur qui tombe au milieu de la foule', 3, 1, 30000, 'non', NULL, 1989, 'couple', 15),
(58, 'L’attentat le plus meurtrier de l’histoire', 'Tout le monde connaît l’attentat du 11 septembre 2001, nous vous proposons d’assister en direct et en toute sécurité à cet événement. Attention âmes sensibles s’abstenir.', 'attentat-deux-tours', '/img/deuxtours.jpg', 'Explosion deux tours', 2, 1, 40000, 'non', NULL, 2001, 'couple', 14),
(59, 'La guerre des émeus', 'Le 4 novembre 1932 la guerre des émeus débuta, venez vous battre au côté de la Septième Batterie Lourde du Régiment royal de l\'Artillerie australienne. Défendez les terres Australiennes contre ces volatiles envahisseurs.', 'guerre-emeus', '/img/émeus.jpg', 'Emeus menaçant', 6, 1, 30000, 'oui', 'left: 23.5%; top: 55%;', 1932, 'couple', 15),
(60, 'La culture Lapita en Nouvelle-Calédonie', 'Il y a environ 3 000 ans, les premiers habitants de Nouvelle-Calédonie mettaient pied à terre. Ce sont des représentants du peuple Lapita. Découvrez leur façon de vivre à Koné, l’un des sites les plus connus de nos jours pour les fouilles Lapita.', 'lapita-nc', '/img/lapita.jpg', 'Pirogue Lapita', 6, 2, 30000, 'oui', 'left: 32.5%; top: 55%;', -1300, 'couple', 11),
(61, 'Vivez la catastrophe de pompeii en toute sécurité', 'Le 24 octobre 79 le Vésuve entre en éruption et ensevelit la ville de Pompeii sous 2.8 m de scories et 1.8 m de cendres. Nous ne vous laisserons pas aller en ville sans l’assurance vie proposée par notre hôtel. Vous pouvez tout de même en profiter à Misène en compagnie de Pline le jeune qui a décrit les événements suite à ses observations.', 'pompeii-catastrophe', '/img/pompeii.jpg', 'Gravure explosion du Vésuve', 3, 1, 60000, 'oui', 'left: 41.8%; top: 35%;', 79, 'couple', 16),
(62, 'Comment ont-il honoré la mort de César !', 'Tarquin l\'ancien instaure vers 600 avant notre ère les premiers lupi magni qui à l\'origine ne durait qu\'un jour, au fil du temps ce nombre a augmenté. Venez assister au premier jeu de 16 jours instauré en l\'honneur du célèbre Jules César, mort en -44 ! Des courses de chars, de la boxe, du théâtre et des combats de gladiateurs sont au programme ainsi que beaucoup d\'autres choses.', 'jeu-mort-cesar', '/img/colosseum1.jpg', 'Tableau gladiateur vainqueur', 3, 2, 60000, 'oui', 'left: 50.8%; top: 40%;', -44, 'couple', 16),
(63, 'Tous les chemins mènent à Rome', 'La légende raconte que Romulus et Remus, deux frères, se sont battus pour savoir qui allait diriger la ville encore naissante. Venez découvrir la part de vérité que cache cette légende.', 'remus-et-romulus', '/img/Romulus.jpg', 'Statue de la louve nourrice de romulus et remus', 3, 2, 45000, 'non', NULL, -753, 'couple', 16),
(64, 'La révolution bat son plein', 'La prise de la Bastille le 14 juillet 1789 est l’un des évènements les plus marquant de la Révolution française.', 'prise-bastille', '/img/Marianne1-min.png', 'Tableau Marianne', 3, 1, 50000, 'non', NULL, 1789, 'couple', 13),
(65, 'Jeanne d’Arc et le siège d’Orléans', 'Le siège d’Orléans est une bataille capitale, suivie par toute l’Europe pour ses implications politiques et religieuses. Le 8 mai 1429, les Anglais se rangent en ordre de bataille, Jeanne interdit à l\'armée française d\'engager le combat, car c\'est un dimanche, un jour sacré pour les chrétiens. A vous de découvrir la suite des évènements. ', 'jeanne-d-arc', '/img/Jeanne.jpg', 'Tableau Jeanne d’Arc en armure', 3, 1, 40000, 'non', NULL, 1429, 'couple', 13),
(66, 'Clovis roi des Francs et premiers roi Chrétiens', 'La conversion au christianisme du chef franc Clovis, baptisé à Reims le 24 décembre 496 par l\'évêque saint Rémi, fait de lui le premier roi chrétiens en France. Venez assister à son baptême et au conflits des différentes cultures qui se croisent à cette période dans le royaume de France.', 'clovis', '/img/Clovis.jpg', 'Tableau baptême de Clovis', 3, 1, 35000, 'non', NULL, 496, 'couple', 13),
(67, 'Alésia et la fin de la Guerre des Gaules', 'Prenez part à la guerre qui mettra fin à la Gaule libre. Choisissez votre camp, préférez vous découvrir un camp romains en plein siège ou voulez vous découvrir le point de vue d\'un Gaulois de l’époque.', 'guerre-des-gaules', '/img/Alesia1.jpg', 'Tableau Vercingétorix devant César', 3, 1, 45000, 'non', NULL, -52, 'couple', 16),
(68, 'La grotte de Lascaux', 'Laissez votre trace dans la grotte de Lascaux accompagner des hommes qui habitaient les lieux au Paléolithique soit en -18000 environ.', 'grotte-lascaux', '/img/lascaux.jpg', 'Peinture rupestre', 3, 2, 30000, 'non', NULL, -18000, 'couple', 14),
(69, 'Le début de l’Empire du Japon', 'Suite à la politique de la canonnière des Etats-Unis, le Japon signé en 1854 l’accord de Kanagawa qui oblige le Japon à s\'ouvrir au reste du monde après plus de 200 ans de paix et d’enfermement. Assister à l\'abolition du Shogunat et de l’ordre des samouraïs.', 'empire-japonnais', '/img/Empereurjaponais.jpg', 'Estampe moderne de l’empereur', 4, 2, 35000, 'non', NULL, 1854, 'couple', 12),
(70, 'Les castes de l\'ère Edo', 'En 1700 vous découvrirez que le déclin du shogunat et de l’économie a provoqué la création de 3 castes sociales. Les guerriers, les artisans ruraux et les artisans citadins. Les moins, les nobles et les parias ne sont pas soumis à cette classification, que diriez vous de découvrir la vie de chacun d’eux.', 'declin-du-shogunat', '/img/estepe.jpg', 'Estampe Tori japonais', 4, 2, 50000, 'non', NULL, 1700, 'couple', 12),
(71, 'Le premiers Shogun', 'Suite à la guerre civile de Genpei, assisté à la montée en puissance des samouraïs et l\'arrivée au pouvoir du premier Shogun (chef militaire) en 1192. C’est le début du Japon féodal.', 'premier-shogun', '/img/Samourais.jpg', 'Gravure samouraïs', 4, 2, 50000, 'non', NULL, 1192, 'couple', 12),
(72, 'La grande Alexandrie', 'Suite à la défaite de Cléopâtre et Marc Antoine (-30) le futur empereur Auguste fait de la ville d’Alexandrie le centre névralgique de la route du commerce vers l’Orient.', 'grande-alexandrie', '/img/Alexandrie.jpg', 'Gravure du phare d’Alexandrie', 1, 2, 45000, 'non', NULL, -30, 'couple', 17),
(73, 'Entrée dans le quotidien d’un scribe', 'L’administration centrale prend de l’importance et les sbires aussi. Que diriez vous de découvrir son quotidien et participez vous même à la montée économique de l’égypte auprès du reste du monde. ', 'scribe', '/img/Scribe.jpg', 'Sculpture de scribe', 1, 2, 35000, 'non', NULL, -2450, 'couple', 17),
(74, 'L\'apogé des pyramides', 'Un voyage en -2600 vous permettra de mieux connaître le système économique prospère de l’ancien empire egypsien, mais aussi d\'assister à la construction des pyramides de Khéops.', 'pyramides', '/img/Khéops.jpg', 'Peinture ancienne pyramide', 1, 2, 40000, 'non', NULL, -2600, 'couple', 17),
(75, 'Assisté à la réunification de la Haute et Basse-Egypte', 'En -3200 le roi Meni aurait mené une guerre pour réunir la Haute et Bas égypte, venait confirmer cette hypothèse écrite par le prêtre égyptien Manéthon. ', 'reunification-de-l-egypte', '/img/egypte1.jpg', 'Statue de pharaon', 1, 2, 50000, 'non', NULL, -3200, 'couple', 17),
(90, 'Bug de l’an 2000 - Chambre famille', 'Votre horloge indique 11h16 premier janvier 1900 ? vous étiez pourtant sur d’être en 1999 hier ! Vous voilà en plein bug de l’an 2000.', 'bug-2000-famille', '/img/2000.jpg', 'Error 2000', 2, 1, 25000, 'non', NULL, 2000, 'familial', 14),
(91, 'Live Aid de Londres - Chambre famille', 'Ce double concert de Londres et Philadelphie a permis de lever plus de 120 millions de dollars dans le but de soulager la famine éthiopienne et soutenir la lutte contre le sida. Des artistes mythiques se sont succédés de 12h à 22h pour les 90 000 spectateurs présents à chaque concert. Revivez cet événement aux premières loges le 13 juillet 1985.', 'live-aid-famille', '/img/Queen.jpg', 'Freddy Mercurie au Live Aid de Londres', 3, 1, 40000, 'non', NULL, 1985, 'familial', 15),
(92, 'Le départ d’Apollo 11 - Chambre famille', 'Le 16 juillet 1969 à 13h32 le lanceur Saturn V décolle vers la Lune pour la mission américaine Apollo 11, avec à son bord Neil Armstrong, commandant, Edwin « Buzz » Aldrin et Michael Collins. On estime à un million le nombre de spectateur ce jour là. Que diriez vous d’en faire partie ?', 'apollo-11-famille', '/img/apollon11.jpg', 'Saturn V décolle', 2, 1, 30000, 'non', NULL, 1969, 'familial', 15),
(93, 'Chute du Mur de Berlin - Chambre famille', 'Nous vous proposons une formule inédite ! Assistez à la construction du Mur de Berlin la nuit du 12 au 13 août 1961. Grâce à nos capsules n’attendez pas pour voir sa chute qui aura pourtant lieu des années plus tard, le 1er décembre 1989.', 'mur-berlin-famille', '/img/murberlin.jpg', 'Pent de mur qui tombe au milieu de la foule', 3, 1, 30000, 'non', NULL, 1989, 'familial', 15),
(94, 'La guerre des émeus - Chambre famille', 'Le 4 novembre 1932 la guerre des émeus débuta, venez vous battre au côté de la Septième Batterie Lourde du Régiment royal de l\'Artillerie australienne. Défendez les terres Australiennes contre ces volatiles envahisseurs.', 'guerre-emeus-famille', '/img/émeus.jpg', 'Emeus menaçant', 6, 1, 30000, 'non', 'left: 23.5%; top: 55%;', 1932, 'familial', 15),
(95, 'La culture Lapita en Nouvelle-Calédonie - Chambre famille', 'Il y a environ 3 000 ans, les premiers habitants de Nouvelle-Calédonie mettaient pied à terre. Ce sont des représentants du peuple Lapita. Découvrez leur façon de vivre à Koné, l’un des sites les plus connus de nos jours pour les fouilles Lapita.', 'lapita-nc-famille', '/img/lapita.jpg', 'Pirogue Lapita', 6, 2, 30000, 'non', 'left: 32.5%; top: 55%;', -1300, 'familial', 11),
(96, 'Tous les chemins mènent à Rome - Chambre famille', 'La légende raconte que Romulus et Remus, deux frères, se sont battus pour savoir qui allait diriger la ville encore naissante. Venez découvrir la part de vérité que cache cette légende.', 'remus-et-romulus-famille', '/img/Romulus.jpg', 'Statue de la louve nourrice de romulus et remus', 3, 2, 45000, 'non', NULL, -753, 'familial', 16),
(97, 'Clovis roi des Francs et premiers roi Chrétiens - Chambre famille', 'La conversion au christianisme du chef franc Clovis, baptisé à Reims le 24 décembre 496 par l\'évêque saint Rémi, fait de lui le premier roi chrétiens en France. Venez assister à son baptême et au conflits des différentes cultures qui se croisent à cette période dans le royaume de France.', 'clovis-famille', '/img/Clovis.jpg', 'Tableau baptême de Clovis', 3, 1, 35000, 'non', NULL, 496, 'familial', 13),
(98, 'La grotte de Lascaux - Chambre famille', 'Laissez votre trace dans la grotte de Lascaux accompagner des hommes qui habitaient les lieux au Paléolithique soit en -18000 environ.', 'grotte-lascaux-famille', '/img/lascaux.jpg', 'Peinture rupestre', 3, 2, 30000, 'non', NULL, -18000, 'familial', 14),
(99, 'Le début de l’Empire du Japon - Chambre famille', 'Suite à la politique de la canonnière des Etats-Unis, le Japon signé en 1854 l’accord de Kanagawa qui oblige le Japon à s\'ouvrir au reste du monde après plus de 200 ans de paix et d’enfermement. Assister à l\'abolition du Shogunat et de l’ordre des samouraïs.', 'empire-japonnais-famille', '/img/Empereurjaponais.jpg', 'Estampe moderne de l’empereur', 4, 2, 35000, 'non', NULL, 1854, 'familial', 12),
(100, 'Les castes de l\'ère Edo - Chambre famille', 'En 1700 vous découvrirez que le déclin du shogunat et de l’économie a provoqué la création de 3 castes sociales. Les guerriers, les artisans ruraux et les artisans citadins. Les moins, les nobles et les parias ne sont pas soumis à cette classification, que diriez vous de découvrir la vie de chacun d’eux.', 'declin-du-shogunat-famille', '/img/estepe.jpg', 'Estampe Tori japonais', 4, 2, 50000, 'non', NULL, 1700, 'familial', 12),
(101, 'La grande Alexandrie - Chambre famille', 'Suite à la défaite de Cléopâtre et Marc Antoine (-30) le futur empereur Auguste fait de la ville d’Alexandrie le centre névralgique de la route du commerce vers l’Orient.', 'grande-alexandrie-famille', '/img/Alexandrie.jpg', 'Gravure du phare d’Alexandrie', 1, 2, 45000, 'non', NULL, -30, 'familial', 17),
(102, 'Entrée dans le quotidien d’un scribe - Chambre famille', 'L’administration centrale prend de l’importance et les sbires aussi. Que diriez vous de découvrir son quotidien et participez vous même à la montée économique de l’égypte auprès du reste du monde. ', 'scribe-famille', '/img/Scribe.jpg', 'Sculpture de scribe', 1, 2, 35000, 'non', NULL, -2450, 'familial', 17),
(103, 'L\'apogé des pyramides - Chambre famille', 'Un voyage en -2600 vous permettra de mieux connaître le système économique prospère de l’ancien empire egypsien, mais aussi d\'assister à la construction des pyramides de Khéops.', 'pyramides-famille', '/img/Khéops.jpg', 'Peinture ancienne pyramide', 1, 2, 40000, 'non', NULL, -2600, 'familial', 17);

-- --------------------------------------------------------

--
-- Structure de la table `articles_en`
--

DROP TABLE IF EXISTS `articles_en`;
CREATE TABLE IF NOT EXISTS `articles_en` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `lieu_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `accueil` varchar(10) NOT NULL,
  `css` varchar(100) DEFAULT NULL,
  `annee` smallint(11) NOT NULL,
  `type_chambre` varchar(40) NOT NULL,
  `chambre_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_articles_Lieu1_idx` (`lieu_id`),
  KEY `fk_articles_categories1_idx` (`categories_id`),
  KEY `fk_articles_chambre1_idx` (`chambre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles_en`
--

INSERT INTO `articles_en` (`id`, `titre`, `contenu`, `slug`, `image`, `alt`, `lieu_id`, `categories_id`, `prix`, `accueil`, `css`, `annee`, `type_chambre`, `chambre_id`) VALUES
(44, 'Hannibal marches on Rome', 'The Carthaginian general\'s itinerary in October 128 remains little-known. Join his army, which was originally intended to march on Rome. History would have it otherwise, but Hannibal will forever remain one of the finest tacticians of his time. He left his mark by crossing the whole of Italy with war elephants.', 'hannibal', '/img/punique.jpg', 'Battle of Zama', 3, 1, 50000, 'non', '', -128, 'couple', 16),
(45, 'Year 2000 bug', 'Your clock reads 11:16 on January 1, 1900? but you were sure it was 1999 yesterday! Now you\'re in the middle of the Y2K bug.', 'bug-2000', '/img/2000.jpg', 'Error 2000', 2, 1, 25000, 'non', '', 2000, 'couple', 14),
(46, 'Landing on June 6', 'Land on the morning of June 6, 1944 with American forces on the French beach of Utah Beach. Your objective is to liberate the Normandy coast and strike a decisive blow against the Germans in the Second World War. This can be a very impressive event, so don\'t take it lightly.', 'landing', '/img/Dday.jpg', 'landing barge', 3, 1, 70000, 'non', NULL, 1944, 'couple', 15),
(47, 'London Live Aid', 'This double concert in London and Philadelphia raised over $120 million to help alleviate famine in Ethiopia and support the fight against AIDS. Legendary artists performed from 12pm to 10pm for the 90,000 spectators present at each concert. Relive this event from the front row on July 13, 1985.', 'live-aid', '/img/Queen.jpg', 'Freddy Mercurie at London\'s Live Aid', 3, 1, 40000, 'non', NULL, 1985, 'couple', 15),
(48, 'The departure of Apollo 11', 'On July 16, 1969 at 1:32 p.m., the Saturn V launch vehicle lifted off for the American Apollo 11 mission to the Moon, with Neil Armstrong, commander, Edwin \"Buzz\" Aldrin and Michael Collins on board. An estimated one million people watched the flight. How would you like to be one of them?', 'apollo-11', '/img/apollon11.jpg', 'Saturn V takes off', 2, 1, 30000, 'non', NULL, 1969, 'couple', 15),
(49, 'An Aztec sacrifice', 'The Aztecs are the Latin American people known for their mass human sacrifices. This is explained by their belief that \"precious water\" is necessary to keep the world running. Come and study their rites and cultures before the arrival of the colonists.', 'sacrifice-azteque', '/img/aztèque.jpg', 'Aztec sacrifice drawing', 2, 2, 60000, 'oui', 'left: 14.5%; top: 40%;', 1400, 'couple', 14),
(56, 'Crucifixion of Jesus of Nazareth', 'Attend Pontius Pilate\'s trial of Jesus of Nazareth, then witness his condemnation on Friday, April 7, 30. See for yourself the man behind history\'s greatest religion, at a key moment in his life that may not end with his condemnation.', 'crucifixion-jesus', '/img/Jesus.jpg', 'Crucifixion painting', 5, 1, 100000, 'non', NULL, 30, 'couple', 17),
(57, 'Fall of Berlin Wall', 'We\'re offering you a unique experience!Watch the Berlin Wall being built on the night of August 12-13, 1961. Thanks to our capsules, you won\'t have to wait to see the Wall come down, even though it did, years later, on December 1, 1989.', 'mur-berlin', '/img/murberlin.jpg', 'Wall hinge falling through the crowd', 3, 1, 30000, 'non', NULL, 1989, 'couple', 15),
(58, 'The deadliest attack in history', 'Everyone is familiar with the attack of September 11, 2001, and we invite you to witness the event live and in complete safety. Sensitive souls please.', 'attentat-deux-tours', '/img/deuxtours.jpg', 'Two-tower explosion', 2, 1, 40000, 'non', NULL, 2001, 'couple', 14),
(59, 'The emu war', 'On November 4, 1932, the emu war began. Come and fight alongside the Seventh Heavy Battery, Royal Regiment of Australian Artillery. Defend Australian lands against these invading birds.', 'guerre-emeus', '/img/émeus.jpg', 'Threatening emus', 6, 1, 30000, 'oui', 'left: 23.5%; top: 55%;', 1932, 'couple', 15),
(60, 'Lapita culture in New Caledonia', 'Around 3,000 years ago, the first inhabitants of New Caledonia set foot on land. They were representatives of the Lapita people. Discover their way of life at Koné, one of today\'s best-known sites for Lapita excavations.', 'lapita-nc', '/img/lapita.jpg', 'Lapita canoe', 6, 2, 30000, 'oui', 'left: 32.5%; top: 55%;', -1300, 'couple', 11),
(61, 'Experience the pompeii disaster in complete safety', 'On October 24 79, Vesuvius erupted, burying the town of Pompeii under 2.8 m of slag and 1.8 m of ash. We won\'t let you go into town without the life insurance offered by our hotel. You can, however, enjoy a visit to Misene in the company of Pliny the Younger, who described the events based on his observations.', 'pompeii-catastrophe', '/img/pompeii.jpg', 'Vesuvius explosion engraving', 3, 1, 60000, 'oui', 'left: 41.8%; top: 35%;', 79, 'couple', 16),
(62, 'How they honored Caesar\'s death!', 'Around 600 B.C., Tarquin the Elder introduced the first lupi magni, which originally lasted just one day. Join us for the first 16-day game, in honor of Julius Caesar, who died in 44 BC! Chariot races, boxing, theater and gladiatorial combat are on the program, along with much more.', 'jeu-mort-cesar', '/img/colosseum1.jpg', 'Painting gladiator victorious', 3, 2, 60000, 'oui', 'left: 50.8%; top: 40%;', -44, 'couple', 16),
(63, 'All roads lead to Rome', 'Legend has it that Romulus and Remus, two brothers, fought over who would rule the fledgling city. Come and discover the truth behind this legend.', 'remus-et-romulus', '/img/Romulus.jpg', 'Statue of the she-wolf nurse of Romulus and Remus', 3, 2, 45000, 'non', NULL, -753, 'couple', 16),
(64, 'The revolution is in full swing', 'The storming of the Bastille on July 14, 1789 was one of the most significant events of the French Revolution.', 'prise-bastille', '/img/Marianne1-min.png', 'Marianne painting', 3, 1, 50000, 'non', NULL, 1789, 'couple', 13),
(65, 'Joan of Arc and the siege of Orléans', 'The siege of Orleans was a momentous battle, watched by the whole of Europe for its political and religious implications. On May 8, 1429, the English lined up in order of battle, and Jeanne forbade the French army to engage in combat, as it was a Sunday, a sacred day for Christians. Find out what happened next. ', 'jeanne-d-arc', '/img/Jeanne.jpg', 'Painting Joan of Arc in armor', 3, 1, 40000, 'non', NULL, 1429, 'couple', 13),
(66, 'Clovis king of the Franks and first Christian king', 'The conversion to Christianity of the Frankish chieftain Clovis, baptized in Reims on December 24, 496 by the bishop Saint Rémi, made him the first Christian king in France. Come and witness his baptism and the clash of different cultures in the kingdom of France at that time.', 'clovis', '/img/Clovis.jpg', 'Painting Baptism of Clovis', 3, 1, 35000, 'non', NULL, 496, 'couple', 13),
(67, 'Painting Baptism of Clovis', 'Take part in the war that will put an end to free Gaul. Choose your side, whether you prefer to discover a Roman camp under siege, or the viewpoint of a Gaul of the time.', 'guerre-des-gaules', '/img/Alesia1.jpg', 'Painting Vercingetorix before Caesar', 3, 1, 45000, 'non', NULL, -52, 'couple', 16),
(68, 'The Lascaux cave', 'Leave your mark in the Lascaux cave with the men who inhabited the area in the Palaeolithic period, around 18,000 BC.', 'grotte-lascaux', '/img/lascaux.jpg', 'Rock painting', 3, 2, 30000, 'non', NULL, -18000, 'couple', 14),
(69, 'The beginning of the Empire of Japan', 'Following the United States\' gunboat policy, Japan signed the Kanagawa Agreement in 1854, forcing it to open up to the rest of the world after more than 200 years of peace and confinement. Witness the abolition of the shogunate and the samurai order.', 'empire-japonnais', '/img/Empereurjaponais.jpg', 'Modern print of the emperor', 4, 2, 35000, 'non', NULL, 1854, 'couple', 12),
(70, 'Castes of the Edo era', 'In 1700, you\'ll discover that the decline of the shogunate and the economy led to the creation of 3 social castes. Warriors, rural craftsmen and urban artisans. The minuses, nobles and outcasts are not subject to this classification, so how about discovering the lives of each of them.', 'declin-du-shogunat', '/img/estepe.jpg', 'Japanese Tori print', 4, 2, 50000, 'non', NULL, 1700, 'couple', 12),
(71, 'The first Shogun', 'The Genpei civil war saw the rise of the samurai and the arrival in power of the first shogun (military leader) in 1192. This marked the beginning of feudal Japan.', 'premier-shogun', '/img/Samourais.jpg', 'Samurai engraving', 4, 2, 50000, 'non', NULL, 1192, 'couple', 12),
(72, 'The great Alexandria', 'Following the defeat of Cleopatra and Mark Antony (30 BC), the future emperor Augustus made Alexandria the nerve center of the trade route to the Orient.', 'grande-alexandrie', '/img/Alexandrie.jpg', 'Engraving of the Alexandria lighthouse', 1, 2, 45000, 'non', NULL, -30, 'couple', 17),
(73, 'Entering the daily life of a scribe', 'The central administration is growing in importance, and so are its henchmen. What would you say to discover its daily life and participate yourself in the economic rise of Egypt to the rest of the world. ', 'scribe', '/img/Scribe.jpg', 'Sculpture of a scribe', 1, 2, 35000, 'non', NULL, -2450, 'couple', 17),
(74, 'The apogee of the pyramids', 'A trip back to 2600 BC will give you an insight into the prosperous economic system of the ancient Egyptian empire, and allow you to witness the construction of the Cheops pyramids.', 'pyramides', '/img/Khéops.jpg', 'Old pyramid painting', 1, 2, 40000, 'non', NULL, -2600, 'couple', 17),
(75, 'Assisté à la réunification de la Haute et Basse-Egypte', 'En -3200 le roi Meni aurait mené une guerre pour réunir la Haute et Bas égypte, venait confirmer cette hypothèse écrite par le prêtre égyptien Manéthon. ', 'reunification-de-l-egypte', '/img/egypte1.jpg', 'Statue de pharaon', 1, 2, 50000, 'non', NULL, -3200, 'couple', 17),
(90, 'Bug de l’an 2000 - Chambre famille', 'Votre horloge indique 11h16 premier janvier 1900 ? vous étiez pourtant sur d’être en 1999 hier ! Vous voilà en plein bug de l’an 2000.', 'bug-2000-famille', '/img/2000.jpg', 'Error 2000', 2, 1, 25000, 'non', NULL, 2000, 'familial', 14),
(91, 'Live Aid de Londres - Chambre famille', 'Ce double concert de Londres et Philadelphie a permis de lever plus de 120 millions de dollars dans le but de soulager la famine éthiopienne et soutenir la lutte contre le sida. Des artistes mythiques se sont succédés de 12h à 22h pour les 90 000 spectateurs présents à chaque concert. Revivez cet événement aux premières loges le 13 juillet 1985.', 'live-aid-famille', '/img/Queen.jpg', 'Freddy Mercurie au Live Aid de Londres', 3, 1, 40000, 'non', NULL, 1985, 'familial', 15),
(92, 'Le départ d’Apollo 11 - Chambre famille', 'Le 16 juillet 1969 à 13h32 le lanceur Saturn V décolle vers la Lune pour la mission américaine Apollo 11, avec à son bord Neil Armstrong, commandant, Edwin « Buzz » Aldrin et Michael Collins. On estime à un million le nombre de spectateur ce jour là. Que diriez vous d’en faire partie ?', 'apollo-11-famille', '/img/apollon11.jpg', 'Saturn V décolle', 2, 1, 30000, 'non', NULL, 1969, 'familial', 15),
(93, 'Chute du Mur de Berlin - Chambre famille', 'Nous vous proposons une formule inédite ! Assistez à la construction du Mur de Berlin la nuit du 12 au 13 août 1961. Grâce à nos capsules n’attendez pas pour voir sa chute qui aura pourtant lieu des années plus tard, le 1er décembre 1989.', 'mur-berlin-famille', '/img/murberlin.jpg', 'Pent de mur qui tombe au milieu de la foule', 3, 1, 30000, 'non', NULL, 1989, 'familial', 15),
(94, 'La guerre des émeus - Chambre famille', 'Le 4 novembre 1932 la guerre des émeus débuta, venez vous battre au côté de la Septième Batterie Lourde du Régiment royal de l\'Artillerie australienne. Défendez les terres Australiennes contre ces volatiles envahisseurs.', 'guerre-emeus-famille', '/img/émeus.jpg', 'Emeus menaçant', 6, 1, 30000, 'non', 'left: 23.5%; top: 55%;', 1932, 'familial', 15),
(95, 'La culture Lapita en Nouvelle-Calédonie - Chambre famille', 'Il y a environ 3 000 ans, les premiers habitants de Nouvelle-Calédonie mettaient pied à terre. Ce sont des représentants du peuple Lapita. Découvrez leur façon de vivre à Koné, l’un des sites les plus connus de nos jours pour les fouilles Lapita.', 'lapita-nc-famille', '/img/lapita.jpg', 'Pirogue Lapita', 6, 2, 30000, 'non', 'left: 32.5%; top: 55%;', -1300, 'familial', 11),
(96, 'Tous les chemins mènent à Rome - Chambre famille', 'La légende raconte que Romulus et Remus, deux frères, se sont battus pour savoir qui allait diriger la ville encore naissante. Venez découvrir la part de vérité que cache cette légende.', 'remus-et-romulus-famille', '/img/Romulus.jpg', 'Statue de la louve nourrice de romulus et remus', 3, 2, 45000, 'non', NULL, -753, 'familial', 16),
(97, 'Clovis roi des Francs et premiers roi Chrétiens - Chambre famille', 'La conversion au christianisme du chef franc Clovis, baptisé à Reims le 24 décembre 496 par l\'évêque saint Rémi, fait de lui le premier roi chrétiens en France. Venez assister à son baptême et au conflits des différentes cultures qui se croisent à cette période dans le royaume de France.', 'clovis-famille', '/img/Clovis.jpg', 'Tableau baptême de Clovis', 3, 1, 35000, 'non', NULL, 496, 'familial', 13),
(98, 'La grotte de Lascaux - Chambre famille', 'Laissez votre trace dans la grotte de Lascaux accompagner des hommes qui habitaient les lieux au Paléolithique soit en -18000 environ.', 'grotte-lascaux-famille', '/img/lascaux.jpg', 'Peinture rupestre', 3, 2, 30000, 'non', NULL, -18000, 'familial', 14),
(99, 'Le début de l’Empire du Japon - Chambre famille', 'Suite à la politique de la canonnière des Etats-Unis, le Japon signé en 1854 l’accord de Kanagawa qui oblige le Japon à s\'ouvrir au reste du monde après plus de 200 ans de paix et d’enfermement. Assister à l\'abolition du Shogunat et de l’ordre des samouraïs.', 'empire-japonnais-famille', '/img/Empereurjaponais.jpg', 'Estampe moderne de l’empereur', 4, 2, 35000, 'non', NULL, 1854, 'familial', 12),
(100, 'Les castes de l\'ère Edo - Chambre famille', 'En 1700 vous découvrirez que le déclin du shogunat et de l’économie a provoqué la création de 3 castes sociales. Les guerriers, les artisans ruraux et les artisans citadins. Les moins, les nobles et les parias ne sont pas soumis à cette classification, que diriez vous de découvrir la vie de chacun d’eux.', 'declin-du-shogunat-famille', '/img/estepe.jpg', 'Estampe Tori japonais', 4, 2, 50000, 'non', NULL, 1700, 'familial', 12),
(101, 'La grande Alexandrie - Chambre famille', 'Suite à la défaite de Cléopâtre et Marc Antoine (-30) le futur empereur Auguste fait de la ville d’Alexandrie le centre névralgique de la route du commerce vers l’Orient.', 'grande-alexandrie-famille', '/img/Alexandrie.jpg', 'Gravure du phare d’Alexandrie', 1, 2, 45000, 'non', NULL, -30, 'familial', 17),
(102, 'Entrée dans le quotidien d’un scribe - Chambre famille', 'L’administration centrale prend de l’importance et les sbires aussi. Que diriez vous de découvrir son quotidien et participez vous même à la montée économique de l’égypte auprès du reste du monde. ', 'scribe-famille', '/img/Scribe.jpg', 'Sculpture de scribe', 1, 2, 35000, 'non', NULL, -2450, 'familial', 17),
(103, 'L\'apogé des pyramides - Chambre famille', 'Un voyage en -2600 vous permettra de mieux connaître le système économique prospère de l’ancien empire egypsien, mais aussi d\'assister à la construction des pyramides de Khéops.', 'pyramides-famille', '/img/Khéops.jpg', 'Peinture ancienne pyramide', 1, 2, 40000, 'non', NULL, -2600, 'familial', 17);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Évènement'),
(2, 'Époque');

-- --------------------------------------------------------

--
-- Structure de la table `categories_en`
--

DROP TABLE IF EXISTS `categories_en`;
CREATE TABLE IF NOT EXISTS `categories_en` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories_en`
--

INSERT INTO `categories_en` (`id`, `nom`) VALUES
(1, 'Event'),
(2, 'Period');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id_chambre` int(11) NOT NULL AUTO_INCREMENT,
  `image_chambre` varchar(255) NOT NULL,
  `alt_chambre` varchar(255) NOT NULL,
  `contenu_chambre` varchar(500) NOT NULL,
  PRIMARY KEY (`id_chambre`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `image_chambre`, `alt_chambre`, `contenu_chambre`) VALUES
(11, '/img/case.jpg', 'case', 'Cette chambre n’est disponible que pour cette capsule bien particulière. Admiré l’architecture de l’habitat traditionnel Calédonien dans cette grande case. Les porte volontairement très basses vous obligent à vous incliner devant les esprits de la case. Vous pouvez dormir jusqu\'à six dans cette case de chef, l\'entrée étant occupée par le foyer, n\'hésitez pas à l\'allumer.\r\n'),
(12, '/img/minka.jpg', 'minka', 'Cette suite a l’image d’une maison traditionnelle japonaise vous accueille avant que vous poursuivez vos aventure dans le temps. Nous sommes heureux de pouvoir vous proposer un authentique onsen thermal. Deux chambres sont à votre disposition toutes deux accompagnées de trois futons.'),
(13, '/img/renaissance.jpg', 'chambre renaissance', 'Cette suite inspirée de la Renaissance Française vous transportera au porte du temps. Le mobilier d’époque en lui-même sera un premier pas dans votre voyage temporel. Dormez dans un lit digne d’un roi (dimension 200*200) et profitez d’un assortiment de 3 authentiques fauteuils en acajou Henri II.\r\n'),
(14, '/img/simple.jpg', 'suite simple', 'Pour votre confort, cette chambre reste sobre et moderne. Son coins salons et son lit king size font d’elle un espace confortable. Une kitchenette est disponible avec un petit kit de vaisselle, pourquoi ne pas aller au marché de l’époque choisi et revenir cuisiner le soir tranquillement. '),
(15, '/img/vintage.jpg', 'chambre vintage', 'Une ambiance cozy et vintage incomparable. La classe de cette suite et son confort vous permet de vous reposer entre deux voyages dans votre capsule temporelle. Une seule chambre meublée d’un lit king size mène vers une petite salle de séjour ou un gramophone d’époque vous attend. '),
(16, '/img/antique.jpg', 'chambre antique', 'Faite un premier pas dans l’antiquité avec cette chambre d’époque. Beaucoup de style et d’inspiration méditeranéen y sont visibles, notamment un set de chaise curule d’origine. Le niveau de vie proposée ici est digne d’un grand marchand d’amphore de l’époque. Dormez jusqu\'à 4 grâce à un lit double et deux lits simples.'),
(17, '/img/egyptien.jpg', 'chambre égyptienne', 'LFaite un premier pas dans l’antiquité avec cette chambre d’époque. Beaucoup de style et d’inspiration méditeranéen y sont visibles, notamment un set de chaise curule d’origine. Le niveau de vie proposée ici est digne d’un grand marchand d’amphore de l’époque. Dormez jusqu\'à 4 grâce à un lit double et deux lits simples.');

-- --------------------------------------------------------

--
-- Structure de la table `chambre_en`
--

DROP TABLE IF EXISTS `chambre_en`;
CREATE TABLE IF NOT EXISTS `chambre_en` (
  `id_chambre` int(11) NOT NULL AUTO_INCREMENT,
  `image_chambre` varchar(255) NOT NULL,
  `alt_chambre` varchar(255) NOT NULL,
  `contenu_chambre` varchar(500) NOT NULL,
  PRIMARY KEY (`id_chambre`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre_en`
--

INSERT INTO `chambre_en` (`id_chambre`, `image_chambre`, `alt_chambre`, `contenu_chambre`) VALUES
(11, '/img/case.jpg', 'case', 'This room is available only for this very special capsule. Admire the architecture of traditional Caledonian housing in this large hut. The deliberately low doors force you to bow to the spirits of the hut. You can sleep up to six in this chief\'s hut, the entrance being occupied by the fireplace, so don\'t hesitate to light it.\r\n'),
(12, '/img/minka.jpg', 'minka', 'This suite, with the feel of a traditional Japanese home, welcomes you before you continue your adventure back in time. We\'re delighted to be able to offer you an authentic thermal onsen. Two rooms are available, both with three futons.'),
(13, '/img/renaissance.jpg', 'chambre renaissance', 'This suite, inspired by the French Renaissance, will transport you back in time. The period furniture itself will be the first step in your journey back in time. Sleep in a bed fit for a king (size 200*200) and enjoy an assortment of 3 authentic Henri II mahogany armchairs.\r\n'),
(14, '/img/simple.jpg', 'suite simple', 'For your comfort, this room is sober and modern. Its sitting area and king-size bed make it a comfortable space. A kitchenette is available with a small crockery kit, so why not go to the market of the chosen period and come back to cook in the evening? '),
(15, '/img/vintage.jpg', 'chambre vintage', 'A cozy, vintage atmosphere like no other. This suite\'s class and comfort allow you to rest between two journeys in your time capsule. A single bedroom furnished with a king-size bed leads into a small living room where a vintage gramophone awaits you. '),
(16, '/img/antique.jpg', 'chambre antique', 'Take your first step into antiquity with this period room. A lot of Mediterranean style and inspiration can be seen here, including an original curule chair set. The standard of living offered here is worthy of a great amphora merchant of the period. Sleep up to 4, thanks to a double bed and two single beds.'),
(17, '/img/egyptien.jpg', 'chambre égyptienne', 'Take your first step into antiquity with this period room. A lot of Mediterranean style and inspiration can be seen here, including an original curule chair set. The standard of living offered here is worthy of a great amphora merchant of the period. Sleep up to 4, thanks to a double bed and two single beds.');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_commande_utilisateur1_idx` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `statut`, `date`, `utilisateur_id`) VALUES
(1, 'livré', '2023-08-09', 1),
(2, 'en cours', '2023-09-22', 1),
(3, 'livré', '2023-08-01', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commande_en`
--

DROP TABLE IF EXISTS `commande_en`;
CREATE TABLE IF NOT EXISTS `commande_en` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_commande_utilisateur1_idx` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande_en`
--

INSERT INTO `commande_en` (`id`, `statut`, `date`, `utilisateur_id`) VALUES
(1, 'delivered', '2023-08-09', 1),
(2, 'in progress', '2023-09-22', 1),
(3, 'delivered', '2023-08-01', 2);

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `id_lieu` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_lieu`),
  UNIQUE KEY `id_UNIQUE` (`id_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`id_lieu`, `Nom`) VALUES
(1, 'Afrique'),
(2, 'Amérique du Nord et du Sud'),
(3, 'Europe'),
(4, 'Asie'),
(5, 'Moyen-Orient'),
(6, 'Océanie');

-- --------------------------------------------------------

--
-- Structure de la table `lieu_en`
--

DROP TABLE IF EXISTS `lieu_en`;
CREATE TABLE IF NOT EXISTS `lieu_en` (
  `id_lieu` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_lieu`),
  UNIQUE KEY `id_UNIQUE` (`id_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lieu_en`
--

INSERT INTO `lieu_en` (`id_lieu`, `Nom`) VALUES
(1, 'Africa'),
(2, 'North and South America'),
(3, 'Europe'),
(4, 'Asia'),
(5, 'Middle East'),
(6, 'Oceania');

-- --------------------------------------------------------

--
-- Structure de la table `liste_articles`
--

DROP TABLE IF EXISTS `liste_articles`;
CREATE TABLE IF NOT EXISTS `liste_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_depart` date NOT NULL,
  `date_arrivee` date NOT NULL,
  `prix_unitaire` int(45) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_liste_articles_commande1_idx` (`commande_id`),
  KEY `fk_liste_articles_articles1_idx` (`articles_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `liste_articles`
--

INSERT INTO `liste_articles` (`id`, `date_depart`, `date_arrivee`, `prix_unitaire`, `commande_id`, `articles_id`) VALUES
(1, '2023-10-04', '2023-11-01', 15000, 1, 59),
(2, '2024-01-04', '2024-01-17', 19000, 2, 61),
(3, '2023-08-27', '2023-08-27', 80000, 3, 70),
(4, '2024-08-07', '2024-08-21', 17000, 2, 75),
(6, '2023-08-28', '2023-09-02', 1, 59, 10000000),
(8, '2023-08-09', '2023-08-08', 2, 3, 1),
(15, '2023-09-06', '2023-09-21', 100, 1, 45);

-- --------------------------------------------------------

--
-- Structure de la table `liste_articles_en`
--

DROP TABLE IF EXISTS `liste_articles_en`;
CREATE TABLE IF NOT EXISTS `liste_articles_en` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_depart` date NOT NULL,
  `date_arrivee` date NOT NULL,
  `prix_unitaire` int(45) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_liste_articles_commande1_idx` (`commande_id`),
  KEY `fk_liste_articles_articles1_idx` (`articles_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `liste_articles_en`
--

INSERT INTO `liste_articles_en` (`id`, `date_depart`, `date_arrivee`, `prix_unitaire`, `commande_id`, `articles_id`) VALUES
(1, '2023-10-04', '2023-11-01', 15000, 1, 59),
(2, '2024-01-04', '2024-01-17', 19000, 2, 61),
(3, '2023-08-27', '2023-08-27', 80000, 3, 70),
(4, '2024-08-07', '2024-08-21', 17000, 2, 75),
(6, '2023-08-28', '2023-09-02', 1, 59, 10000000),
(8, '2023-08-09', '2023-08-08', 2, 3, 1),
(15, '2023-09-06', '2023-09-21', 100, 1, 45);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `imageprofil` varchar(255) DEFAULT NULL,
  `adresse` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `email`, `imageprofil`, `adresse`, `telephone`) VALUES
(1, 'test', '$2y$10$lGCetF3SjQPUBkWlpu.GuOpXkPaG0qtTflYVITYKb7.zoQ4JeTECy', 'tes@test.test', '', '45 rue tuband Nouméa', '212121'),
(2, 'utilisateur2', '$2y$10$SFcG653oHVbXR29B24QEdu0sqfuIicWvVJfssBEMpUKyoW8QkgAFG', 'utilisateur2@mail.com', NULL, '20 rue jesaispas Nouméa', '975271'),
(8, 'test1', '$2y$10$oFpjUz8IjakJ1TTLKdlaj.vS0T0oU4iOjnmUTFP/OAKARRmn7ZJZ2', 'test@fghj.fgh', NULL, '19 rue Du Test', '975657');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_en`
--

DROP TABLE IF EXISTS `utilisateur_en`;
CREATE TABLE IF NOT EXISTS `utilisateur_en` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `imageprofil` varchar(255) DEFAULT NULL,
  `adresse` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur_en`
--

INSERT INTO `utilisateur_en` (`id`, `login`, `password`, `email`, `imageprofil`, `adresse`, `telephone`) VALUES
(1, 'test', '$2y$10$lGCetF3SjQPUBkWlpu.GuOpXkPaG0qtTflYVITYKb7.zoQ4JeTECy', 'tes@test.test', '', '45 rue tuband Nouméa', '212121'),
(2, 'utilisateur2', '$2y$10$SFcG653oHVbXR29B24QEdu0sqfuIicWvVJfssBEMpUKyoW8QkgAFG', 'utilisateur2@mail.com', NULL, '20 rue jesaispas Nouméa', '975271'),
(8, 'test1', '$2y$10$oFpjUz8IjakJ1TTLKdlaj.vS0T0oU4iOjnmUTFP/OAKARRmn7ZJZ2', 'test@fghj.fgh', NULL, '19 rue Du Test', '975657');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`lieu_id`) REFERENCES `lieu` (`id_lieu`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_articles_chambre1` FOREIGN KEY (`chambre_id`) REFERENCES `chambre` (`id_chambre`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;