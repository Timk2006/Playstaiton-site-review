SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
CREATE DATABASE IF NOT EXISTS `reviewsite` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `reviewsite`;

CREATE TABLE `games` (
  `id` int(9) NOT NULL,
  `title` varchar(200) NOT NULL,
  `summary` text NOT NULL,
  `released_at` date DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `games` (`id`, `title`, `summary`, `released_at`, `age`) VALUES
(1, 'Elden Ring', 'Een fantasy actie-RPG ontwikkeld door FromSoftware en BANDAI NAMCO Entertainment, gesitueerd in een wereld gecreëerd door Hidetaka Miyazaki en George R.R. Martin.', '2022-02-25', 16),
(2, 'Stellar Blade', 'Een post-apocalyptische actiegame waarin spelers de mensheid moeten redden van uitsterving, ontwikkeld door de Koreaanse studio Shift Up, exclusief voor PlayStation 5.', '2024-04-26', 18),
(3, 'Marvel\'s Spider-Man 2', 'Peter Parker en Miles Morales keren terug voor een spannend nieuw avontuur in de Marvel’s Spider-Man-franchise voor PS5.', '2023-10-20', 16),
(4, 'God of War: Ragnarök', 'Het vervolg op God of War (2018), waarin Kratos en Atreus zich voorbereiden op de naderende Ragnarök.', '2022-11-09', 18),
(5, 'Star Wars Jedi: Survivor', 'Een actie-avonturenspel dat zich afspeelt in het Star Wars-universum, waarin spelers de rol aannemen van een Jedi die moet overleven te midden van de opkomst van het Keizerrijk.', '2023-04-28', 16),
(6, 'Horizon Forbidden West', 'Een actie-RPG waarin Aloy de geheimen van het Verre Westen ontdekt en nieuwe bedreigingen voor de planeet aanpakt.', '2022-02-18', 16),
(7, 'Gran Turismo 7', 'Een realistische racesimulator met een uitgebreide selectie auto\'s en circuits, en diverse spelmodi.', '2022-03-04', 3),
(8, 'Returnal', 'Een roguelike third-person shooter waarin een astronaut vastzit in een tijdlus op een buitenaardse planeet.', '2021-04-30', 16),
(9, 'Demon\'s Souls', 'Een remake van de klassieke action-RPG waarin spelers uitdagende gevechten aangaan in een duistere fantasiewereld.', '2020-11-12', 18),
(10, 'Sackboy: A Big Adventure', 'Een 3D-platformer waarin Sackboy een episch avontuur beleeft om Craftworld te redden.', '2020-11-12', 7),
(11, 'Ratchet & Clank: Rift Apart', 'Een actie-avonturenspel waarin Ratchet en Clank door verschillende dimensies reizen om de kwaadaardige keizer Nefarious te stoppen.', '2021-06-11', 12),
(12, 'Kena: Bridge of Spirits', 'Een actie-avonturenspel waarin Kena, een jonge spirituele gids, een verlaten dorp verkent op zoek naar verborgen geheimen.', '2021-09-21', 12),
(13, 'Deathloop', 'Een first-person shooter waarin twee rivaliserende huurmoordenaars vastzitten in een tijdlus op het eiland Blackreef.', '2021-09-14', 18),
(14, 'Ghostwire: Tokyo', 'Een actie-avonturenspel waarin spelers bovennatuurlijke krachten gebruiken om een mysterieus verdwenen bevolking van Tokio te onderzoeken.', '2022-03-25', 12),
(15, 'Resident Evil Village', 'Een survival horror game waarin Ethan Winters een mysterieus dorp verkent op zoek naar antwoorden.', '2021-05-07', 18),
(16, 'Final Fantasy XVI', 'Een actie-RPG die zich afspeelt in de wereld van Valisthea, waar zes naties strijden om macht.', '2023-06-22', 16),
(17, 'Forspoken', 'Een actie-RPG waarin een jonge vrouw uit New York wordt getransporteerd naar de gevaarlijke wereld van Athia.', '2023-01-24', 18),
(18, 'Stray', 'Een avonturenspel waarin je als een zwerfkat door een cyberpunk-stad navigeert om je familie te vinden.', '2022-07-19', 12),
(19, 'The Last of Us Part I', 'Een remake van de originele game waarin Joel en Ellie door een post-apocalyptisch Amerika reizen.', '2022-09-02', 18),
(36, 'forza horizon 4 ', 'tt', '2025-02-24', 12);

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `reviews` (`id`, `game_id`, `user_id`, `review`, `rating`) VALUES
(21, 7, 26, 'super goede game echt aan te raden.', 3),
(22, 12, 29, 'echt een goede game super mooie wereld en auto\'s echt een 10/10', 5),
(23, 3, 26, 'Top spel', 5);

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(25, 'henk', 'localhhost@gmail.com', '$2y$10$bmh5cazo2b4Aljr7HE4qaeMasX8c1od3oMzvWR0GfTv9EehwkJA5.'),
(26, 'tim', 'timkoops2006@icloud.com', '$2y$10$X0RFcMZBnICFrXIzur2XaezK5X2ZhIY1Jr9yJykU8cOUkfqdyfAUy'),
(29, 'milan', 'milan2006@gmail.com', '$2y$10$v.eX6uvK6ZAxdoeRi5J4ieeclsmdxzpGEbSfFith3jljMk.WqPhn2'),
(30, 'Koos', 'Koosvanderberg@gmail.com', '$2y$10$lTzGtNXTwjs2C///lkia2OphcbQkFinTAqO/vWoiFeqVnoKAz/LUG');


ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `games`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
