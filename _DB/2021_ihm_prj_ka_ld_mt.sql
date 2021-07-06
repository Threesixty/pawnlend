-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 06 juil. 2021 à 20:02
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `2021_ihm_prj_ka_ld_mt`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `type`, `created_at`) VALUES
(1, 'Souris', '', 1620764437),
(2, 'Clavier', '', 1620764749),
(3, 'Écrans', '', 1620764761),
(4, 'Unité centrale', '', 1625564144),
(5, 'Ordinateur portable', '', 1625564157),
(6, 'Vidéoprojecteur', '', 1625564168);

-- --------------------------------------------------------

--
-- Structure de la table `lend`
--

CREATE TABLE `lend` (
  `id` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `startdate` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lend_product`
--

CREATE TABLE `lend_product` (
  `id` int(11) NOT NULL,
  `lend_id` int(11) NOT NULL,
  `type` enum('lot','product') COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `reception` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `stock_mini` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `reference`, `supplier`, `category_id`, `description`, `photo`, `stock`, `stock_mini`, `status`, `created_at`) VALUES
(1, 'Clavier Logitech sans fil G613', 'CLA-LOGI-G613', 'Logitech', 2, '', '1625585454_logitech-g613_ea540830b7b0eefe_png__908_512__overflow-jpg', 5, 1, 1, 1625585454),
(2, 'Vidéoprojecteur Xiaomi', 'Vp-Xia-230', 'Xiaomi', 6, 'Le Xiaomi Mi Laser Projector 150 est un modèle d\'intégration. Il délivre une image contrastée et un son de qualité dans un format compact. L\'interface Android TV 8.0 décuple les possibilités et le rend quasiment autonome, lui permettant de venir concurrencer un téléviseur en termes de fonctionnalités. Dommage que toutes ces qualités soient plombées par une calibration douteuse qui fera fuir les puristes du home cinema — quand le retard à l\'affichage fera fuir les joueurs.', '1625587452_xiaomi-mi-laser_b8a2f4f74b0b763b__450_400-jpg', 5, 1, 1, 1625587452),
(3, 'MacBook Pro 15 pouces', 'Mac-15-123', 'Apple', 5, '', '1625587825_1563199365-32-jpg', 5, 1, 1, 1625587825),
(4, 'PC HP fixe', 'HP-12-153', 'DELL', 4, '', '1625588008_unite-central-dell-optiplex-png', 5, 1, 1, 1625588008),
(5, 'Souris Apple', 'APP-33-450', 'APPLE', 1, '', '1625588246_5701ecf1-7617-42e6-a297-06cbf9d8cc59-jpg', 5, 1, 1, 1625588163),
(6, 'Ecran DELL 21 pouces', 'DEL-21-145', 'DELL', 3, '', '1625588328_216887_61941b16-c370-41ed-84f6-1c7801cd0406-jpg', 5, 1, 1, 1625588328);

-- --------------------------------------------------------

--
-- Structure de la table `product_lot`
--

CREATE TABLE `product_lot` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product_lot_product`
--

CREATE TABLE `product_lot_product` (
  `id` int(11) NOT NULL,
  `product_lot_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `password_token`, `lastname`, `firstname`, `email`, `role`, `status`, `created_at`) VALUES
(11, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 'THOMAS', 'Michael', 'michael.convergence@gmail.com', 3, 1, 1613333912),
(34, 'magasinier', 'c3d40736bd58d6c807f65e9b740a8bcbadb89aba', NULL, 'Osborne', 'Harry', 'info@osborne.fr', 1, 1, 1613425652),
(39, 'prescripteur', 'ac509bec2b2162fbda370137dd554518a83b2955', NULL, 'Duponts', 'Jean', 'johndoe@yopmail.com', 2, 1, 1620746924),
(40, 'client', 'd2a04d71301a8915217dd5faf81d12cffd6cd958', NULL, 'Söze', 'Keyser', 'ksoze@yopmail.com', 0, 1, 1625565516);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_product_category` (`category_id`) USING BTREE;

--
-- Index pour la table `product_lot_product`
--
ALTER TABLE `product_lot_product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `product_lot_product`
--
ALTER TABLE `product_lot_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
