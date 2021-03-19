-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 18 mars 2021 à 12:48
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecf_6`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_art` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_art` date NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_art`, `titre`, `auteur`, `image`, `description`, `created_art`, `id_categorie`) VALUES
(1, 'Des relations sereines et épanouies avec ses enfants', 'Amelie Blot', 'image_article1.jpg', 'Je vous délivre dans cet article, 3 clés fondamentales pour retrouver des relations sereines et épanouies avec vos enfants. Vous avez parfois du mal à garder votre calme face aux tempêtes émotionnelles de vos enfants ? Vous pouvez même ressentir de la culpabilité de ne pas savoir comment agir. Et pourtant ce n’est pas de votre faute. On vit dans une société d’image et de communication dans laquelle les images véhiculées et renvoyées sont très fortes et omniprésentes. Où les femmes doivent performer sur tous les fronts : travail, maison, relation sociale, organisation, etc… L’arrivée du premier enfant vient renforcer ces statistiques car la charge mentale est principalement liée à l’enfant. Ce rapport tient principalement dans le fait qu’avec le congé maternité, la maman prend en charge la majeure partie de la gestion quotidienne, comme faire les courses, s’occuper du linge, faire le ménage, préparer les repas, inscrire les enfants à diverses activités, etc… La maman devient la “responsable organisationnelle” de la famille. Et lorsqu’elle reprend une activité, salariée ou non-salariée, ce rapport n’évolue quasiment pas. De nombreuses femmes n’arrêtent leur journée que lorsqu’elles se couchent. Elles sont dans un continuum épuisant. Le cerveau enregistre cet idéal inatteignable et les maintient inconsciemment en situation d’échec. L’échec amène une dévalorisation personnelle qui va entraîner, à plus ou moins long terme, une perte de confiance et une dégradation de l’estime de soi. C’est à ce moment, précisément, que la culpabilité prend racine. La culpabilité enferme l’esprit dans un pessimisme environnemental, le fait dévier de ses idéaux et nous fait passer à côté de notre parentalité en incarnant trop souvent un parent que nous ne voulons pas être : trop de cris, d’ordres, d’injonctions, de stress, de menaces, de punitions… trop de situations que vous ne souhaitez pas vivre au quotidien. J’ai une bonne nouvelle pour vous : Vous êtes votre propre saboteur ! La plupart du temps, lorsqu’on place sous silence ses propres besoins, on cultive de la frustration, de la rancœur et de l’amertume. Et pourtant, c’est possible d’accompagner les besoins de ses enfants sans empiéter sur les siens...', '2021-01-15', 2),
(2, 'Où sont les limites de l\'éducation positive ?', 'Leslie Rezzoug', 'image_article2.jpg', 'De plus en plus de parents estiment que cette méthode est aussi culpabilisante qu\'inapplicable au quotidien. &quot;Cela a commencé par des publications sur mon mur Facebook, des pubs ciblées sur Youtube, des suggestions de comptes sur Instagram... Comme si Internet savait que je galérais avec mes trois enfants !&quot; Shivmama, blogueuse et &quot;mère indigne à la parentalité décomplexée&quot; a été happée presque malgré elle par le raz-de-marée de l\'éducation positive. Cette méthode très en vogue professe une nouvelle approche des rapports parents/enfants. &quot;Il est primordial d\'écouter l\'enfant, de se mettre à sa hauteur&quot;. &quot;On ne dit pas qu\'il y a une \'parentalité malveillante\', s\'amuse Arnaud Riou, conférencier et auteur de Pour une parentalité bienveillante (éd. Leduc). On estime simplement qu\'il y a une dureté, un besoin de domination dans l\'attitude de certains parents. Dans l\'éducation positive, on considère qu\'il est primordial d\'écouter l\'enfant, de se mettre à sa hauteur.&quot; Conditionnés par des décennies d\'éducation &quot;à la dure&quot;, les parents seraient rigides, prompts à s\'énerver pour un oui ou pour un non. &quot;Si j\'invite une amie à dîner et qu\'elle renverse du vin sur ma nappe, je ne vais pas lui crier dessus. Pourquoi cela serait-il différent avec mon enfant ?, interroge Arnaud Riou. La violence ordinaire, elle est là. L\'enfant n\'est pas blessé par un \'non\' mais par le manque de considération dont il est victime.&quot; &quot;Aujourd\'hui, les parents sont extrêmement désemparés&quot;. Pour Claude Halmos, psychanalyste, auteure de Dessine-moi un enfant (éd. Livre de Poche) et spécialiste de la petite enfance, le battage autour de l\'éducation positive s\'explique surtout par un total sentiment de confusion. &quot;Aujourd\'hui, les parents sont extrêmement désemparés. La position de l\'enfant a changé. On le considère comme une personne à part entière. On en vient à se dire : \'de quel droit puis-je lui interdire quelque chose ?\' Ils sont aussi, et à juste titre, de plus en plus effrayés par la violence du monde, ajoute-t-elle. Ils ont tendance à se replier sur une enfance prolongée pour mettre leur progéniture à l\'abri de cette violence. Ce sont les parents qui disent à tout bout de champ : \'il est encore petit, on ne peut pas lui interdire ça.', '2018-05-23', 1),
(3, 'Comment donner confiance en lui à son enfant ?', 'Joséphine Lebard', 'image_article3.jpg', 'Croire en soi: un défi compliqué à relever pour beaucoup d\'entre nous. Quand la confiance en soi fait défaut, il n\'est pas toujours facile d\'accompagner ses enfants sur la voie d\'une meilleure estime d\'eux-mêmes. Voici des pistes de réflexion pour leur permettre d\'y arriver. &quot;J\'espère transmettre certaines de mes qualités à mes garçons, explique Camille, mère de deux enfants. Mais s\'il est bien un de mes défauts auquel je souhaiterais qu\'ils échappent, c\'est mon manque de confiance en moi.&quot; Camille n\'est pas la seule. La préoccupation semble traverser largement la génération actuelle de parents. Parents peu sûrs d\'eux, enfants idem ? Pour la psychologue Florence Millot, cela n\'a rien d\'étonnant. &quot;Nous sommes la première génération à nous interroger autant sur nos ancêtres et sur la façon dont nous avons été éduqués&quot;, relève-t-elle. Conséquence, pour élever nos enfants, nous nous appuyons de plus en plus sur des repères externes comme les livres, Internet et autres conseils amicaux. Quitte à faire moins confiance à notre instinct. Ballottés entre des conseils contradictoires, nos principes éducatifs peuvent alors apparaître peu enracinés. Ce doute permanent qui infuse en nous, nos enfants le perçoivent aisément. Florence Millot voit aussi une autre raison à ce manque de confiance en soi palpable chez les jeunes parents. &quot;Depuis une vingtaine d\'années, analyse-t-elle, se développe une \'fatigue d\'être soi\'. Elle repose sur une quête galvaudée du bonheur qui voudrait que nous pourrions tout faire, tout changer dans notre vie, tout seuls.&quot; Or, à courir derrière un épanouissement total, dans notre travail, en amour, en famille sans aucune baisse de régime, nous nous décourageons plus facilement. En ne parvenant pas à ce bonheur absolu que célèbre la société, nous finissons par nous juger inconséquents, nuls. Dès lors, difficile d\'aider nos enfants à bâtir leur estime d\'eux-mêmes alors que la nôtre est elle-même déficiente.', '2016-12-06', 1),
(4, 'Dix conseils pour être gentil tout en s\'affirmant', 'Caroline Franc Desages', 'image_apropos.jpg', 'Si la gentillesse a sa journée dédiée le 3 novembre, elle est encore bien souvent considérée comme une faille. Comment faire pour être gentil avec les autres sans se faire marcher sur les pieds? Voici nos conseils. Longtemps moquée, la gentillesse est peu à peu réhabilitée. Elle bénéficie même désormais d\'une journée dédiée, c\'est dire. Mais malgré tout, au mot &quot;gentil&quot; est encore régulièrement accolé l\'adverbe &quot;trop&quot;. Quatre petites lettres qui soudain transforment le &quot;gentil&quot; en &quot;pigeon&quot;. Pourtant, tous les experts que nous avons interrogés sont formels: être gentil n\'est en aucun cas synonyme de faiblesse. Mieux, la gentillesse est souvent le meilleur moyen pour être entendu, compris et même respecté. Voici dix conseils destinés aux gentils mais aussi à tous ceux qui doutent que leur tempérament bienveillant leur permette de pouvoir s\'affirmer... en douceur. Être en premier lieu gentil avec soi-même. &quot;Insinuer qu\'être gentil peut empêcher de s\'affirmer, c\'est dénaturer la notion même de gentillesse&quot;, prévient la psychanalyste Laura Gélin. &quot;Cela vient sans doute d\'une confusion. Être gentil en effet, ce n\'est pas accéder aux désirs des autres en premier, jusqu\'à s\'oublier.&quot; Être gentil, c\'est avant tout savoir ce qui nous convient, ce qu\'on souhaite, ce qui nous porte. Et c\'est en étant &quot;en cohérence avec soi-même que l\'on est alors en mesure d\'être entendu et compris&quot;.  Ne pas être en attente d\'un retour. Etre gentil n\'est en aucun cas synonyme de faiblesse.Si la gentillesse a sa journée dédiée le 3 novembre, elle est encore bien souvent considérée comme une faille. Comment faire pour être gentil avec les autres sans se faire marcher sur les pieds? Voici nos conseils. Longtemps moquée, la gentillesse est peu à peu réhabilitée. Elle bénéficie même désormais d\'une journée dédiée, c\'est dire. Mais malgré tout, au mot &quot;gentil&quot; est encore régulièrement accolé l\'adverbe &quot;trop&quot;. Quatre petites lettres qui soudain transforment le &quot;gentil&quot; en &quot;pigeon&quot;. Pourtant, tous les experts que nous avons interrogés sont formels: être gentil n\'est en aucun cas synonyme de faiblesse. Mieux, la gentillesse est souvent le meilleur moyen pour être entendu, compris et même respecté. Voici dix conseils destinés aux gentils mais aussi à tous ceux qui doutent que leur tempérament bienveillant leur permette de pouvoir s\'affirmer... en douceur. Être en premier lieu gentil avec soi-même&quot;. Insinuer qu\'être gentil peut empêcher de s\'affirmer, c\'est dénaturer la notion même de gentillesse&quot;, prévient la psychanalyste Laura Gélin. &quot;Cela vient sans doute d\'une confusion. Être gentil en effet, ce n\'est pas accéder aux désirs des autres en premier, jusqu\'à s\'oublier.&quot; Être gentil, c\'est avant tout savoir ce qui nous convient, ce qu\'on souhaite, ce qui nous porte. Et c\'est en étant &quot;en cohérence avec soi-même que l\'on est alors en mesure d\'être entendu et compris&quot;. Ne pas être en attente d\'un retour. &quot;Le dictionnaire dit de la gentillesse que c\'est une attention bienveillante à autrui a priori inconditionnelle&quot;, souligne la psychothérapeute Béatrice Voirin. &quot;Et dans inconditionnelle il y a \'sans condition\'. En somme, la gentillesse doit être un don. Sans conditions.&quot; Et le problème, pointe la psychothérapeute, c\'est que souvent, juste avant le &quot;je suis trop gentil(le)&quot; prononcé sous forme de plainte, est venu le &quot;avec tout ce que je fais pour eux , elle, lui...&quot;. &quot;La gentillesse est bien trop souvent une stratégie pour survivre, pour ne pas perdre l\'amour, l\'amitié.&quot; Et dans ce cas, elle ne permet en effet pas de trouver sa place ni de s\'affirmer. S\'approprier le droit d\'être là. &quot;Les gens que l\'on dit \'trop gentils\' ont fréquemment en réalité un problème d\'estime de soi, constate Sylvaine Pascual. Or n\'est pas gentil celui qui laisse toute la place aux autres, et n\'est pas nécessairement méchant celui qui assume d\'occuper la place qui lui revient.&quot; Pour s\'affirmer, il faut donc se réapproprier le droit d\'être là sans redouter de ne pas être gentil pour autant.  &quot;Prenons l\'exemple d\'une réunion à laquelle on est convié. On a plusieurs choix qui s\'offrent à nous. On peut se dire que si on y a été invité, c\'est parce qu\'on a une légitimité et décider d\'en faire la preuve en prenant cette place qui nous a été offerte. On peut aussi faire le choix de se mettre en retrait. Mais si on prend la parole, si on se met en avant, ce n\'est pas le signe d\'un manque de gentillesse ou d\'humilité pour autant.&quot; Adopter la communication non violente. &quot;La communication non violente est pour moi l\'exemple même de ce que la gentillesse peut accomplir comme miracles. Elle permet d\'obtenir une véritable compréhension entre les parties prenantes sans qu\'il y ait de contrainte de l\'autre&quot;, vante Sylvaine Pascual, coach et spécialiste du plaisir au travail. Quatre grands principes sous-tendent cette technique de communication, poursuit la coach. &quot;Dans un premier temps, il faut exprimer des faits. Souvent quand on est tendu ou timide, on a tendance à présenter les choses en les teintant de nos émotions, ce qui nous rend moins crédible ou nous fait passer pour une victime. Ce n\'est qu\'après avoir fait cette présentation des faits objectifs que l\'on peut exprimer sa propre perception de ces faits et exprimer nos émotions. Ce qui génère de l\'empathie. Vient ensuite, en troisième étape, l\'expression du besoin. Et enfin, la proposition d\'une solution.&quot; Une méthode préconisée par Sylvaine Pascual dans des contextes professionnels mais qui &quot;fonctionne aussi très bien dans la vie personnelle&quot;, assure-t-elle.', '2015-11-28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `nom_cat`) VALUES
(1, 'Education'),
(2, 'Psy');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `statut` int(11) NOT NULL,
  `created_user` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `login`, `pass`, `statut`, `created_user`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1, '2021-03-16 12:56:07'),
(2, 'user', '202cb962ac59075b964b07152d234b70', 2, '2021-03-16 12:56:20'),
(3, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 2, '2021-03-16 14:35:48'),
(4, 'admin', '202cb962ac59075b964b07152d234b70', 2, '2021-03-16 15:14:23'),
(5, 'usernew', '202cb962ac59075b964b07152d234b70', 2, '2021-03-17 23:12:42'),
(6, 'adminnew', '202cb962ac59075b964b07152d234b70', 1, '2021-03-17 23:13:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_art`),
  ADD KEY `fk` (`id_categorie`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
