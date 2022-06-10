-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 juin 2022 à 17:59
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `ma_petite_cuisine`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL,
  `desc_avis` varchar(255) NOT NULL,
  `indice_note` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `desc_avis`, `indice_note`, `id_recette`, `id_utilisateur`) VALUES
(1, 'Un régal à chaque fois... Avec double dose... Sinon ils disparaissent', 5, 1, 1),
(2, 'C est délicieux si on aime ce qui est fort en goût, simplissime... économique : on en fait et en refait', 5, 2, 2),
(3, 'C est délicieux si on aime ce qui est fort en goût, simplissime... économique : on en fait et en refait', 4, 3, 3),
(4, 'C est délicieux si on aime ce qui est fort en goût, simplissime... économique : on en fait et en refait', 3, 4, 4),
(5, 'C est délicieux si on aime ce qui est fort en goût, simplissime... économique : on en fait et en refait', 1, 6, 2),
(6, 'C est délicieux si on aime ce qui est fort en goût, simplissime... économique : on en fait et en refait', 5, 1, 6),
(7, 'C est délicieux si on aime ce qui est fort en goût, simplissime... économique : on en fait et en refait', 3, 5, 4),
(8, 'C est délicieux si on aime ce qui est fort en goût, simplissime... économique : on en fait et en refait', 4, 2, 5),
(9, 'C est délicieux si on aime ce qui est fort en goût, simplissime... économique : on en fait et en refait', 2, 12, 5),
(10, 'C est délicieux si on aime ce qui est fort en goût, simplissime... économique : on en fait et en refait', 3, 11, 3);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Apéritifs'),
(2, 'Entrées'),
(3, 'Plats'),
(4, 'Desserts');

-- --------------------------------------------------------

--
-- Structure de la table `couts`
--

CREATE TABLE `couts` (
  `id_cout` int(11) NOT NULL,
  `nom_cout` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `couts`
--

INSERT INTO `couts` (`id_cout`, `nom_cout`) VALUES
(1, 'Bon marché'),
(2, 'Coût moyen'),
(3, 'Assez cher');

-- --------------------------------------------------------

--
-- Structure de la table `difficultes`
--

CREATE TABLE `difficultes` (
  `id_difficulte` int(11) NOT NULL,
  `nom_difficulte` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `difficultes`
--

INSERT INTO `difficultes` (`id_difficulte`, `nom_difficulte`) VALUES
(1, 'Facile'),
(2, 'Moyen'),
(3, 'Difficile');

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

CREATE TABLE `etapes` (
  `id_etape` int(11) NOT NULL,
  `desc_etape` text NOT NULL,
  `id_recette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etapes`
--

INSERT INTO `etapes` (`id_etape`, `desc_etape`, `id_recette`) VALUES
(1, 'Epluchez les asperges vertes. Coupez la base des asperges si elle vous semble trop dure.', 2),
(2, 'Portez à ébullition un grand volume d’eau salée.', 2),
(3, 'A ébullition, plongez-y les asperges et faites-les cuire (tête en haut si possible) pendant 15 min.', 2),
(4, 'A la fin de la cuisson, égouttez-les et laissez refroidir sur un linge propre.', 2),
(5, 'Pressez le citron pour en recueillir le jus. Fouettez la mayonnaise avec le citron.', 2),
(6, 'Lavez, séchez soigneusement puis hachez finement le persil frais.', 2),
(7, 'Ajoutez ensuite la moitié du persil haché à la mayonnaise au citron.', 2),
(8, 'Réservez vos asperges en mayonnaise au réfrigérateur jusqu’au moment de les servir.', 2),
(9, 'Au moment de servir, décorez vos asperges vertes avec le reste de persil haché.', 2),
(10, 'Servez vos asperges en mayonnaise bien froides.', 2),
(11, 'Pendant la cuisson al dente de vos pâtes, préparez le pesto. Commencez par mettre les morceaux de parmesan, les pignons préalablement grillés et les pistaches dans le bol de votre mixeur. Mixez jusqu’à obtenir une poudre.', 9),
(12, 'Ajoutez ensuite la coriandre lavée, grossièrement coupée (conservez la partie haute de la tige qui est tout aussi parfumée que les feuilles), les tomates cerises, le jus de citron vert, l’ail, l’huile d’olive et la fleur de sel. Mixez jusqu’à l’obtention d’une crème épaisse.', 9),
(13, 'Une fois que vos pâtes sont cuites, servez-les avec le pesto fraîchement mixé !', 9),
(14, 'Faites cuire votre riz, en veillant à ce qu\'il reste légèrement croquant. Égouttez-le et laissez-le refroidir puis mettez-le dans un grand saladier.', 10),
(15, 'Lavez les carottes et coupez-les en julienne. Égouttez les petits pois et le maïs. Coupez les tomates en dés puis coupez les saucisses de Francfort en rondelles. Ajoutez le tout sur le riz et réservez. Mélangez le vinaigre avec le sel, ajoutez l’huile, la moutarde et le poivre. Mélangez bien le tout et versez la vinaigrette sur la salade.', 10),
(16, 'Faites cuire les œufs dans de l’eau bouillante pendant une dizaine de minutes, jusqu’à ce qu\'ils soient cuits durs. Écaillez-les et coupez-les en quartiers. Ajoutez-les sur le dessus de la salade.', 10),
(17, 'Décorez votre salade, si vous le souhaitez, avec les olives noires et la ciboulette et mettez au frais quelques minutes.', 10),
(18, 'Couper les plus gros poissons en morceaux. Les disposer dans un plat et arroser d\'huile d\'olive. Ajouter les pistils de safran, le laurier et l’écorce d’orange. Mélanger délicatement, couvrir et laisser mariner les poissons 1 heure au frais.', 5),
(19, 'Peler et émincer finement les oignons et l’ail. Ébouillanter 30 secondes les tomates, puis les peler et les épépiner, enfin concasser la chair. Éplucher les pommes de terre, les couper en rondelles un peu épaisses.', 5),
(20, 'Faire chauffer un filet d’huile dans une grande cocotte. Mettre les oignons et l’ail, puis les tomates à revenir 5 minutes. Verser 1,5 l d’eau bouillante et ajouter les pommes de terre, laisser cuire à petits bouillons 10 minutes.', 5),
(21, 'Ajouter la rascasse, le grondin et le congre dans le faitout, et compter 5 minutes d’ébullition à gros bouillons. Mettre ensuite dans la cocotte le reste des poissons et la marinade. Compter à nouveau 5 minutes d’ébullition.', 5),
(22, 'Éteindre le feu, saler, poivrer, mélanger délicatement. Servir la bouillabaisse très chaude et accompagner de rouille.', 5),
(23, 'Dans un plat à gratin, alterner plusieurs fois une couche de pommes de terre, une couche de reblochon en lamelles. Saupoudrez de sel, de poivre et ciboulette à chaque fois.', 4),
(24, 'Mettre à four préchauffé à 200° pendant 10 à 15minutes. Napper avec la crème fraîche 5 minutes avant la ﬁn de la cuisson.', 4),
(25, 'Servir chaud, éventuellement accompagné de salade verte.', 4),
(26, 'Préchauffer le four à 210°C.', 3),
(27, 'Laver et peler les pommes de terre. Les trancher finement à la mandoline ou avec un couteau puis les mettre à tremper dans de l\'eau froide pour retirer l\'amidon.', 3),
(28, 'Pendant ce temps, laver et découper en tranches fines les courgettes.', 3),
(29, 'Peler et dégermer les gousses d\'ail. Les émincer et les mélanger dans la crème fraiche avec du sel et du poivre.', 3),
(30, 'Beurrer un plat à gratin et disposer les pommes de terre égoutter en alternant avec les courgettes. Recouvrir de crème fraiche et disposer les branches de romarin.', 3),
(31, 'Couvrir le plat avec du papier d\'aluminium et enfourner 40 minutes. Passé ce temps, enlever la feuille d\'aluminium, saupoudrer de mozzarella et remettre au four pendant 20 minutes pour gratiner. Déguster chaud !', 3),
(32, 'La veille, faire tremper les haricots dans un grand volume d\'eau froide.', 11),
(33, 'Laver et éplucher la carotte. Éplucher les oignons. Éplucher et dégermer l\'ail, puis conserver 1 gousse pour le montage. Piquer 1 oignon avec le clou de girofle et ciseler l\'autre. Couper la couenne en fines lanières. Colorer dans une poêle avec la poitrine.', 11),
(34, 'Dans une casserole, disposer les légumes, le bouquet garni, la couenne, la poitrine et les haricots. Couvrir d\'eau froide et cuire à feu doux et à couvert pendant 1 h 30. Écumer de temps en temps.', 11),
(35, 'Égoutter les cuisses de canard et conserver 2 cuillères à soupe de graisse. Couper ensuite les cuisses en 2 à la jointure. Dans une cocotte, faire chauffer 1 cuillère à soupe de graisse, puis colorer les saucisses sur toutes les faces. Les tailler ensuite en gros morceaux puis les réserver. Dans la même cocotte, colorer les tranches de gigot et les morceaux de canard. Saler et poivrer, puis réserver. Dans la cocotte, déposer 1 cuillère à soupe de graisse, puis faire suer l\'oignon ciselé avec 1 pincée de sel pendant 1 minute. Ajouter la purée de tomates, cuire 1 minute et déposer les tranches de gigot. Couvrir d\'eau froide puis laisser mijoter à feu doux pendant 20 min. Ajouter ensuite les morceaux de saucisses, et poursuivre la cuisson 10 min.', 11),
(36, 'Préchauffer le four à 160 °C.', 11),
(37, 'Égoutter les haricots et la poitrine, conserver un peu de bouillon. Tailler la poitrine en cubes. Frotter un plat à gratin avec la gousse d\'ail restante, puis déposer un lit de haricots. Disposer ensuite les viandes et les recouvrir de haricots, puis ajouter le jus de cuisson du gigot et compléter à hauteur avec le bouillon. Parsemer le tout d\'une poignée de chapelure puis enfourner pendant 15 minutes. Sortir le plat du four et briser la croûte, puis ajouter 1 petite poignée de chapelure. Répéter l\'opération 5 fois. Déguster aussitôt sorti du four.', 11),
(38, 'La veille, mettre à tremper les pois chiches dans de l\'eau froide.', 6),
(39, 'Les mettre dans 2 l d\'eau froide avec le laurier et 1 gousse d\'ail, porter à ébullition et laisser cuire 1 h 30 à 2 h.', 6),
(40, 'Saler et poivrer à mi-cuisson.', 6),
(41, 'Egoutter les pois chiches, conserver l\'eau de cuisson.', 6),
(42, 'Mixer les pois chiches en purée, remettre dans une casserole et chauffer à feu doux.', 6),
(43, 'Incorporer 10 cl d\'huile tiède en fouettant, allonger un peu de jus de cuissons et du jus de citron.', 6),
(44, 'Piler l\'ail au mortier avec 2 cuillerées d\'huile, rajouter cela dans la casserole hors du feu, saupoudrer 1 pincée de piment.', 6),
(45, 'Servir saupoudré de paprika, garni d\'olives noires et accompagné de quartiers de citrons.', 6),
(46, 'Sans oublier le pain grillé ou le pain libanais !', 6),
(47, 'Mélanger les ingrédients pour la pâte et bien pétrir. Laisser reposer au moins deux heures dans un endroit sec et à l\'abri de la lumière.', 7),
(48, 'Préparer la farce en mélangeant le zaatar avec l\'huile végétal. Si le mélange reste trop épais, rajouter de l\'huile. Attention, la farce ne doit être ni épaisse ni liquide.', 7),
(49, 'Etaler la pâte sur un plan de travail et faire des cercles.', 7),
(50, 'Les disposer sur une plaque allant au four (pour éviter que les galettes ne collent, il faut mettre soit du papier sulfurisé, soit de l\'huile sur le fond de la plaque).', 7),
(51, 'Rajouter par-dessus la farce de Zaatar et enfourner à 180°C.', 7),
(52, 'Au bout de 15 minutes, commencez à surveiller la cuisson.', 7),
(53, 'Une fois sorti du four, vous pouvez les servir directement ou tièdes.', 7),
(54, 'Pour le gâteau : Commencez par séparer les blancs d\'œuf des jaunes. Montez ensuite les blancs en neige.', 8),
(55, 'Battez les jaunes avec le sucre. Ajoutez la fécule de pomme de terre.', 8),
(56, 'Puis faites fondre le chocolat et additionnez le beurre.', 8),
(57, 'Ajoutez le mélange de chocolat et beurre avec la préparation jaunes d’œuf, sucre et fécule.', 8),
(58, 'Mélangez puis Incorporée petit à petit les blancs montés. Versez dans le moule et enfournez à 180 degrés pendant 25 minutes.', 8),
(59, 'Pour le glaçage : faites fondre le chocolat avec le beurre. Versez après sur le gâteau froid et bien étaler.', 8),
(60, 'Préparer la pâte brisée avec la farine le beurre coupé en petits morceaux, le sel et le sucre. Mélanger avec un demi- verre d\'eau jusqu\'à obtenir une boule et laisser reposer 20 mn min si possible', 12),
(61, 'Préparer une petite compote de pommes : faire cuire dans une petite casserole 2 pommes coupées en petits morceaux avec le sucre, un peu d\'eau, la cannelle ou un bâton de vanille fendu pendant 15 mn environ à feu doux (ou 8 min au micro- ondes) puis mixer la compote', 12),
(62, 'Préchauffer le four à 200°', 12),
(63, 'Étaler la pâte dans le moule à tarte et la piquer à l\'aide d\'une fourchette. Déposer une couche de compote de pommes sur le fond de la tarte', 12),
(64, 'Disposer dessus les 3 autres pommes coupées en fines lamelles', 12),
(65, 'Saupoudrer de sucre selon son goût', 12),
(66, 'Faire cuire à 200°C pendant 30 mn environ', 12),
(67, 'Cisailler la viande en tranches très fines, et faire mariner au frigo avec le curry, ail, glutamate et les sauces, au moins 30 mn.', 12),
(68, 'Pendant ce temps préparer la sauce, si vous cuisinez souvent asiatique, doubler les proportions et conservez-là dans un bocal. Vous pouvez ajouter une pointe de piment (sauce chili) pour la parfumer. Faire bouillir tous les ingrédients et réserver.', 12),
(69, 'Pendant ce temps préparer la sauce, si vous cuisinez souvent asiatique, doubler les proportions et conservez-là dans un bocal. Vous pouvez ajouter une pointe de piment (sauce chili) pour la parfumer. Faire bouillir tous les ingrédients et réserver.', 12),
(70, 'Faire revenir la viande dans un peu d\'huile, à feu très fort et très brièvement : la viande doit être saisie simplement, pour la garder tendre.', 12),
(71, 'Servir dans des grand bols de préférence : commencer par la batavia, le soja, puis 3 ou 4 poignées de vermicelles par personnes, 2 nems coupés petits morceaux par personne, la viande. Décorer avec la coriandre hachée, la menthe et quelques cacahuètes concassées (facultatif). Arroser de sauce et c\'est prêt !', 12);

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id_ingredient` int(11) NOT NULL,
  `nom_ingredient` varchar(150) NOT NULL,
  `photo_ingredient` varchar(150) NOT NULL,
  `id_unite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id_ingredient`, `nom_ingredient`, `photo_ingredient`, `id_unite`) VALUES
(1, 'Abricot ', '', 1),
(2, 'Abricot sec', '', 1),
(3, 'Ail', 'Ail.jpg', 1),
(4, 'Agneau (gigot)', 'Gigot_agneau.jpg', 1),
(5, 'Amande sèche', '', 5),
(6, 'Ananas ', '', 1),
(7, 'Arachide', 'Arachide.jpeg', 5),
(8, 'Artichaut ', '', 1),
(9, 'Asperge ', 'Asperges.jpg', 1),
(10, 'Aubergine ', '', 1),
(11, 'Banane ', '', 1),
(12, 'Batavia', 'Batavia.jpeg', 1),
(13, 'Bettes ', '', 1),
(14, 'Beurre ', 'Beurre.jpg', 5),
(15, 'Bière', '', 1),
(16, 'Biscottes ', '', 1),
(17, 'Biscuit sec', '', 1),
(18, 'Blé ', '', 5),
(19, 'Bœuf ', 'Bœuf.jpeg', 5),
(20, 'Bouquet_garni', 'Bouquet_garni.jpg', 1),
(21, 'Brochet ', '', 1),
(22, 'Brugnon ', '', 1),
(23, 'Cabillaud ', '', 1),
(24, 'Cacahuète ', '', 5),
(25, 'Cacao en poudre', '', 4),
(26, 'Café ', '', 4),
(27, 'Camembert ', '', 1),
(28, 'Canard (cuisses)', 'Cuisses_de_Canard.jpg', 1),
(29, 'Carottes ', 'Carottes.jpg', 5),
(30, 'Cassis ', '', 5),
(31, 'Caviar', '', 5),
(32, 'Céleri rave', '', 1),
(33, 'Cerise ', '', 5),
(34, 'Champignon de Paris', '', 5),
(35, 'Châtaigne ', '', 5),
(36, 'Chèvre frais', '', 5),
(37, 'Chocolat ', 'Chocolat_noir.jpg', 5),
(38, 'Chou rouge', '', 5),
(39, 'Chou-fleur', '', 1),
(40, 'Ciboulette', 'Ciboulette.jpg', 1),
(41, 'Cidre', '', 2),
(42, 'Citron ', 'Citrons.jpg', 1),
(43, 'Citron vert', 'Citrons_verts.jpg', 1),
(44, 'Citrouille ', '', 1),
(45, 'Clou de Girofle', 'Clou_de_Girofle.jpg', 1),
(46, 'Concombre', '', 1),
(47, 'Coriandre', 'Coriandre.jpg', 1),
(48, 'Courgette ', 'Courgettes.jpg', 1),
(49, 'Crème fraîche', 'Crème_fraiche.jpg', 2),
(50, 'Curry', 'Curry.jpg', 4),
(51, 'Datte ', '', 5),
(52, 'Eau', 'Eau.jpg', 2),
(53, 'Epices zaatar', 'Epices_zaatar.jpg', 5),
(54, 'Emmental', '', 5),
(55, 'Endive ', '', 1),
(56, 'Epinard ', '', 5),
(57, 'Farine ', 'Farine.jpg', 5),
(58, 'Fécule pomme de terre', 'Fecule_pomme_de_terre.jpg', 5),
(59, 'Fèves ', '', 5),
(60, 'Figue ', '', 5),
(61, 'Flocons d\'avoine', '', 5),
(62, 'Fraise ', '', 5),
(63, 'Framboise ', '', 5),
(64, 'Groseille ', '', 5),
(65, 'Haricots verts', '', 5),
(66, 'Haricots blancs', 'Haricots_blancs.jpg', 5),
(67, 'Huile', 'Huile.jpg', 2),
(68, 'Huile d\'olive', 'Huile_dolive.jpg', 2),
(69, 'Huîtres ', '', 1),
(70, 'Kiwi ', '', 1),
(71, 'Lait de vache écrémé', '', 2),
(72, 'Lait de vache entier', '', 2),
(73, 'Lapin', '', 5),
(74, 'Lard', '', 5),
(75, 'Laurier', 'Lauriers.jpg', 1),
(76, 'Lentilles ', '', 5),
(77, 'Levure de boulanger', 'Levure_de_boulanger.jpg', 5),
(78, 'Limande  ', '', 1),
(79, 'Limonade', '', 2),
(80, 'Mais ', 'Mais.jpg', 5),
(81, 'Mandarine ', '', 1),
(82, 'Margarine ', '', 5),
(83, 'Melon ', '', 1),
(84, 'Menthe', 'Menthe.jpeg', 5),
(85, 'Merlan ', '', 5),
(86, 'Miel ', '', 4),
(87, 'Moutarde', 'Moutarde.jpg', 4),
(88, 'Mouton', '', 5),
(89, 'Mozzarella', 'Mozzarella.jpg', 5),
(90, 'Mûre ', '', 5),
(91, 'Nems', 'Nems.jpg', 1),
(92, 'Noisette ', '', 5),
(93, 'Noix ', '', 5),
(94, 'Noix de coco', '', 1),
(95, 'Œuf (blanc d\'œuf)', '', 1),
(96, 'Œuf (jaune d\'œuf)', '', 1),
(97, 'Œuf entier', 'Œufs.jpg', 1),
(98, 'Oignons ', 'Oignons.jpg', 1),
(99, 'Olives (noire)', 'Olives_noires.jpg', 1),
(100, 'Orange ', 'Oranges.jpg', 1),
(101, 'Pamplemousse ', '', 1),
(102, 'Paprika', 'Paprika.jpg', 5),
(103, 'Parmesan', 'Parmesan.jpg', 5),
(104, 'Pastèque ', '', 1),
(105, 'Pate brisée', 'Pate_brisee.jpg', 1),
(106, 'Pâtes ', 'Pates.jpg', 5),
(107, 'Pêche ', '', 1),
(108, 'Persil', 'Persil.jpg', 1),
(109, 'Petits pois', 'Petits_pois.jpg', 5),
(110, 'Pignons de pin', 'Pignons_de_pin.jpg', 5),
(111, 'Piment en poudre', 'Piment_en_poudre.jpg', 4),
(112, 'Pistache', 'Pistaches.jpg', 5),
(113, 'Poire ', '', 1),
(114, 'Poireau ', '', 1),
(115, 'Pois chiches', 'Pois_chiches.jpg', 5),
(116, 'Pois mange-tout', '', 5),
(117, 'Poissons', 'Poissons.jpg', 5),
(118, 'Poivre', 'Poivre.jpg', 4),
(119, 'Poivron ', '', 1),
(120, 'Pomme ', 'Pommes.jpg', 1),
(121, 'Pomme de terre', 'Pomme_de_terre.jpg', 1),
(122, 'Porc ', 'Porcs.jpg', 5),
(123, 'Poulet ', '', 5),
(124, 'Prune ', '', 5),
(125, 'Pruneau ', '', 5),
(126, 'Raisin ', '', 5),
(127, 'Reblochon', 'Reblochon.jpg', 1),
(128, 'Rillettes', '', 1),
(129, 'Riz blanc', 'Riz_blanc.jpg', 5),
(130, 'Roquefort ', '', 5),
(131, 'Safrans', 'Safrans.jpg', 5),
(132, 'Saindoux ', '', 5),
(133, 'Salade (verte)', '', 1),
(134, 'Sardine ', '', 5),
(135, 'Sauce huitre', 'Sauce_huitre.jpeg', 2),
(136, 'Saucisse', 'Saucisse.jpg', 1),
(137, 'Saucisses (toulouses)', 'Saucisse_toulouses.jpg', 1),
(138, 'Saumon  frais', '', 5),
(139, 'Sel', 'Sel.jpg', 4),
(140, 'Sésame (graines)', 'Graines_sesame_dore.jpeg', 3),
(141, 'Soda', '', 2),
(142, 'Soja ', 'Soja .jpeg', 2),
(143, 'Sucre', 'Sucre.jpg', 5),
(144, 'Thon frais', '', 5),
(145, 'Tomate ', 'Tomates.jpg', 1),
(146, 'Tomate (cerise)', 'Tomates_cerises.jpg', 5),
(147, 'Tomate (purée)', 'Purée_de_tomates.jpg', 4),
(148, 'Truffe ', '', 5),
(149, 'Vanille', 'Batton_vanille.jpg', 1),
(150, 'Truite ', '', 1),
(151, 'Veau ', '', 5),
(152, 'Vermicelle de riz', 'Vermicelle_de_riz.jpg', 5),
(153, 'Vin ', '', 2),
(154, 'Vinaigre (balsamique)', 'Vinaigre_balsamique.jpg', 2),
(155, 'Yaourt ', '', 1),
(156, 'Mayonnaise', 'Mayonnaise', 4),
(157, 'Romarin', 'Romarin.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int(11) NOT NULL,
  `nom_photo` varchar(255) NOT NULL,
  `id_recette` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id_photo`, `nom_photo`, `id_recette`) VALUES
(1, 'Bobun.jpeg', 1),
(5, 'Asperges_en_mayonnaise.jpg', 2),
(6, 'Gratin_patates_courgettes.jpg', 3),
(7, 'Tartiflette.jpg', 4),
(8, 'Boullabaise_de_marseille.jpg', 5),
(9, 'Houmous.jpg', 6),
(10, 'Galette_au_zaatar.jpg', 7),
(11, 'Gateau_au_chocolat.jpg', 8),
(12, 'Pates_au_pesto_de_coriandre.jpg', 9),
(13, 'Salade_de_riz_complete.jpg', 10),
(14, 'Cassoulet.jpg', 11),
(15, 'Tarte_aux_pommes.jpg', 12);

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id_recette` int(11) NOT NULL,
  `nom_recette` varchar(50) NOT NULL,
  `temps_preparation` varchar(50) NOT NULL,
  `temps_cuisson` varchar(50) NOT NULL,
  `validation_admin` tinyint(1) NOT NULL,
  `date_publication` date NOT NULL,
  `id_cout` int(11) NOT NULL,
  `id_difficulte` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id_recette`, `nom_recette`, `temps_preparation`, `temps_cuisson`, `validation_admin`, `date_publication`, `id_cout`, `id_difficulte`, `id_utilisateur`) VALUES
(1, 'Bo-Bun', '00:35:00', '00:15:00', 1, '2022-05-04', 1, 2, 6),
(2, 'Asperges en mayonnaise', '00:10:00', '00:15:00', 1, '2021-05-05', 2, 1, 5),
(3, 'Gratin de pommes de terre et courgettes', '00:10:00', '01:00:00', 1, '2021-06-19', 1, 1, 4),
(4, 'Tartiflette', '00:10:00', '00:15:00', 1, '2018-01-09', 2, 3, 2),
(5, 'La bouillabaisse', '00:40:00', '00:25:00', 1, '2021-02-25', 3, 2, 3),
(6, 'Houmous ', '00:30:00', '02:00:00', 1, '2017-04-15', 1, 1, 1),
(7, 'Galette au zaatar', '01:30:00', '00:20:00', 1, '2020-05-17', 1, 2, 6),
(8, 'Gâteau au chocolat', '00:10:00', '00:25:00', 1, '2019-07-08', 1, 1, 2),
(9, 'Pâtes au pesto de coriandre', '00:05:00', '00:10:00', 0, '2021-05-05', 3, 1, 1),
(10, 'Salade de riz complète', '00:25:00', '00:20:00', 0, '2021-05-05', 1, 1, 5),
(11, 'Le cassoulet', '00:30:00', '03:20:00', 0, '2020-12-13', 2, 3, 4),
(12, 'Tarte aux pommes', '00:30:00', '00:30:00', 0, '2019-10-11', 1, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `recettes_categories`
--

CREATE TABLE `recettes_categories` (
  `id_recette` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recettes_categories`
--

INSERT INTO `recettes_categories` (`id_recette`, `id_categorie`) VALUES
(6, 1),
(7, 1),
(2, 2),
(6, 2),
(7, 2),
(10, 2),
(1, 3),
(3, 3),
(4, 3),
(5, 3),
(9, 3),
(10, 3),
(11, 3),
(8, 4),
(12, 4);

-- --------------------------------------------------------

--
-- Structure de la table `recettes_ingredients`
--

CREATE TABLE `recettes_ingredients` (
  `id_recette` int(11) NOT NULL,
  `id_ingredients` int(11) NOT NULL,
  `Dosage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recettes_ingredients`
--

INSERT INTO `recettes_ingredients` (`id_recette`, `id_ingredients`, `Dosage`) VALUES
(1, 3, '0,25'),
(3, 3, '0,5'),
(5, 3, '0,833333333'),
(6, 3, '0,5'),
(9, 3, '0,5'),
(1, 5, '175'),
(1, 7, '7,5'),
(2, 9, '1000'),
(1, 12, '0,25'),
(3, 14, '2,5'),
(8, 14, '18,33333333'),
(12, 14, '16,66666667'),
(10, 29, '0,5'),
(8, 37, '48,33333333'),
(4, 40, '0,25'),
(10, 40, '2,5'),
(2, 42, '0,5'),
(6, 42, '0,333333333'),
(9, 43, '0,5'),
(3, 46, '0,5'),
(1, 47, '0,25'),
(9, 47, '0,25'),
(3, 49, '125'),
(4, 49, '2,5'),
(1, 50, '0,25'),
(7, 52, '43,75'),
(7, 53, '12,5'),
(7, 57, '62,5'),
(12, 57, '33,33333333'),
(8, 58, '13,33333333'),
(5, 68, '15'),
(6, 68, '16,66666667'),
(7, 68, '56,25'),
(9, 68, '22,5'),
(10, 68, '7,5'),
(5, 75, '0,166666667'),
(6, 75, '0,166666667'),
(7, 77, '1,875'),
(10, 80, '62,5'),
(1, 84, '2,5'),
(10, 87, '0,25'),
(3, 89, '37,5'),
(8, 95, '1'),
(10, 97, '1'),
(5, 98, '0,333333333'),
(6, 99, '1'),
(10, 99, '2'),
(5, 100, '0,166666667'),
(6, 102, '0,833333333'),
(9, 103, '40'),
(12, 105, '0,166666667'),
(9, 106, '100'),
(2, 108, '0,25'),
(10, 109, '62,5'),
(9, 110, '15'),
(6, 111, '0,833333333'),
(9, 112, '12,5'),
(6, 115, '83,33333333'),
(5, 117, '500'),
(1, 118, '0,25'),
(3, 118, '0,25'),
(4, 118, '0,25'),
(5, 118, '0,166666667'),
(10, 118, '1,25'),
(12, 120, '0,833333333'),
(3, 121, '200'),
(4, 121, '250'),
(5, 121, '100'),
(4, 127, '0,25'),
(10, 129, '30'),
(5, 131, '0,833333333'),
(1, 135, '0,75'),
(10, 136, '0,5'),
(1, 139, '0,25'),
(3, 139, '0,5'),
(4, 139, '0,25'),
(5, 139, '0,166666667'),
(7, 139, '0,125'),
(9, 139, '3,75'),
(10, 139, '1,25'),
(12, 139, '0,833333333'),
(7, 143, '1,875'),
(8, 143, '20'),
(12, 143, '7,5'),
(5, 145, '0,5'),
(10, 145, '0,75'),
(9, 146, '125'),
(12, 149, '0,166666667'),
(10, 154, '7,5'),
(2, 156, '1,5'),
(3, 157, '0,5');

-- --------------------------------------------------------

--
-- Structure de la table `recettes_regimes`
--

CREATE TABLE `recettes_regimes` (
  `id_recette` int(11) NOT NULL,
  `id_regime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recettes_regimes`
--

INSERT INTO `recettes_regimes` (`id_recette`, `id_regime`) VALUES
(2, 1),
(3, 1),
(4, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(12, 1),
(6, 2),
(7, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(12, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(8, 4);

-- --------------------------------------------------------

--
-- Structure de la table `recettes_saisons`
--

CREATE TABLE `recettes_saisons` (
  `id_recette` int(11) NOT NULL,
  `id_saison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recettes_saisons`
--

INSERT INTO `recettes_saisons` (`id_recette`, `id_saison`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3),
(4, 4),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(11, 3),
(11, 4),
(12, 1),
(12, 2),
(12, 3),
(12, 4);

-- --------------------------------------------------------

--
-- Structure de la table `regimes`
--

CREATE TABLE `regimes` (
  `id_regime` int(11) NOT NULL,
  `nom_regime` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `regimes`
--

INSERT INTO `regimes` (`id_regime`, `nom_regime`) VALUES
(1, 'Végétarien'),
(2, 'Végan'),
(3, 'Sans porc'),
(4, 'Sans gluten');

-- --------------------------------------------------------

--
-- Structure de la table `saisons`
--

CREATE TABLE `saisons` (
  `id_saison` int(11) NOT NULL,
  `nom_saison` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `saisons`
--

INSERT INTO `saisons` (`id_saison`, `nom_saison`) VALUES
(1, 'Printemps'),
(2, 'Eté'),
(3, 'Automne'),
(4, 'Hiver');

-- --------------------------------------------------------

--
-- Structure de la table `unites`
--

CREATE TABLE `unites` (
  `id_unite` int(11) NOT NULL,
  `nom_unite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `unites`
--

INSERT INTO `unites` (`id_unite`, `nom_unite`) VALUES
(1, 'Pièces'),
(2, 'ml'),
(3, 'Cuillère à soupe'),
(4, 'Cuillère à café'),
(5, 'g');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `prenom_utilisateur` varchar(50) NOT NULL,
  `mail_utilisateur` varchar(50) NOT NULL,
  `mdp_utilisateur` varchar(50) NOT NULL,
  `pseudo_utilisateur` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `mdp_utilisateur`, `pseudo_utilisateur`, `admin`) VALUES
(1, 'Blanc', 'Christopher', 'christopher.blanc@viacesi.fr', '123456', 'Chris', 1),
(2, 'Hassan', 'Philippe', 'philippe.hassan@viacesi.fr', '123456', 'Phil', 1),
(3, 'Gaigneux', 'Ugo', 'ugo.gaigneux@viacesi.fr', '123456', 'Ugz', 1),
(4, 'Bidegain', 'Mathieu', 'mathieu.bidegain@viacesi.fr', '456789', 'Math', 0),
(5, 'Belkadi', 'Florian', 'florian.belkadi@viacesi.fr', '456789', 'Flo', 0),
(6, 'Salaberria', 'Xavier', 'xsalaberria@cesi.fr', '456789', 'Xav', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `Avis_Recettes_FK` (`id_recette`),
  ADD KEY `Avis_Utilisateurs0_FK` (`id_utilisateur`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `couts`
--
ALTER TABLE `couts`
  ADD PRIMARY KEY (`id_cout`);

--
-- Index pour la table `difficultes`
--
ALTER TABLE `difficultes`
  ADD PRIMARY KEY (`id_difficulte`);

--
-- Index pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD PRIMARY KEY (`id_etape`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id_ingredient`),
  ADD KEY `Ingredients_Unites_FK` (`id_unite`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `Photos_Recettes_FK` (`id_recette`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id_recette`),
  ADD KEY `Recettes_Couts_FK` (`id_cout`),
  ADD KEY `Recettes_Difficultes0_FK` (`id_difficulte`),
  ADD KEY `Recettes_Utilisateurs1_FK` (`id_utilisateur`);

--
-- Index pour la table `recettes_categories`
--
ALTER TABLE `recettes_categories`
  ADD PRIMARY KEY (`id_categorie`,`id_recette`),
  ADD KEY `recettes_categories_Recettes0_FK` (`id_recette`);

--
-- Index pour la table `recettes_ingredients`
--
ALTER TABLE `recettes_ingredients`
  ADD PRIMARY KEY (`id_ingredients`,`id_recette`),
  ADD KEY `recettes_ingredients_Recettes0_FK` (`id_recette`);

--
-- Index pour la table `recettes_regimes`
--
ALTER TABLE `recettes_regimes`
  ADD PRIMARY KEY (`id_regime`,`id_recette`),
  ADD KEY `recettes_regimes_Recettes0_FK` (`id_recette`);

--
-- Index pour la table `recettes_saisons`
--
ALTER TABLE `recettes_saisons`
  ADD PRIMARY KEY (`id_recette`,`id_saison`),
  ADD KEY `recettes_saisons_Saisons0_FK` (`id_saison`);

--
-- Index pour la table `regimes`
--
ALTER TABLE `regimes`
  ADD PRIMARY KEY (`id_regime`);

--
-- Index pour la table `saisons`
--
ALTER TABLE `saisons`
  ADD PRIMARY KEY (`id_saison`);

--
-- Index pour la table `unites`
--
ALTER TABLE `unites`
  ADD PRIMARY KEY (`id_unite`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `couts`
--
ALTER TABLE `couts`
  MODIFY `id_cout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `difficultes`
--
ALTER TABLE `difficultes`
  MODIFY `id_difficulte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `id_etape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id_ingredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id_recette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `regimes`
--
ALTER TABLE `regimes`
  MODIFY `id_regime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `saisons`
--
ALTER TABLE `saisons`
  MODIFY `id_saison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `unites`
--
ALTER TABLE `unites`
  MODIFY `id_unite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `Avis_Recettes_FK` FOREIGN KEY (`id_recette`) REFERENCES `recettes` (`id_recette`),
  ADD CONSTRAINT `Avis_Utilisateurs0_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `Ingredients_Unites_FK` FOREIGN KEY (`id_unite`) REFERENCES `unites` (`id_unite`);

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `Photos_Recettes_FK` FOREIGN KEY (`id_recette`) REFERENCES `recettes` (`id_recette`);

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `Recettes_Couts_FK` FOREIGN KEY (`id_cout`) REFERENCES `couts` (`id_cout`),
  ADD CONSTRAINT `Recettes_Difficultes0_FK` FOREIGN KEY (`id_difficulte`) REFERENCES `difficultes` (`id_difficulte`),
  ADD CONSTRAINT `Recettes_Utilisateurs1_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `recettes_categories`
--
ALTER TABLE `recettes_categories`
  ADD CONSTRAINT `recettes_categories_Categories_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `recettes_categories_Recettes0_FK` FOREIGN KEY (`id_recette`) REFERENCES `recettes` (`id_recette`);

--
-- Contraintes pour la table `recettes_ingredients`
--
ALTER TABLE `recettes_ingredients`
  ADD CONSTRAINT `recettes_ingredients_Ingredients_FK` FOREIGN KEY (`id_ingredients`) REFERENCES `ingredients` (`id_ingredient`),
  ADD CONSTRAINT `recettes_ingredients_Recettes0_FK` FOREIGN KEY (`id_recette`) REFERENCES `recettes` (`id_recette`);

--
-- Contraintes pour la table `recettes_regimes`
--
ALTER TABLE `recettes_regimes`
  ADD CONSTRAINT `recettes_regimes_Recettes0_FK` FOREIGN KEY (`id_recette`) REFERENCES `recettes` (`id_recette`),
  ADD CONSTRAINT `recettes_regimes_regimes_FK` FOREIGN KEY (`id_regime`) REFERENCES `regimes` (`id_regime`);

--
-- Contraintes pour la table `recettes_saisons`
--
ALTER TABLE `recettes_saisons`
  ADD CONSTRAINT `recettes_saisons_Recettes_FK` FOREIGN KEY (`id_recette`) REFERENCES `recettes` (`id_recette`),
  ADD CONSTRAINT `recettes_saisons_Saisons0_FK` FOREIGN KEY (`id_saison`) REFERENCES `saisons` (`id_saison`);
COMMIT;
