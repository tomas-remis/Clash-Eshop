-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 01:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clash`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards` (
  `CAID` int(11) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `card_cost` int(11) NOT NULL,
  `CardRarity` varchar(20) NOT NULL,
  `CardType` varchar(20) NOT NULL,
  `card_stock` int(11) NOT NULL,
  `card_description` text NOT NULL,
  `card_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`CAID`, `card_name`, `card_cost`, `CardRarity`, `CardType`, `card_stock`, `card_description`, `card_image`) VALUES
(1, 'Skeletons', 1, 'Common', 'Troop', 2, '“Three fast, very weak melee fighters. Surround your enemies with this pile of bones!”', 'hog.png'),
(2, 'Ice spirit', 1, 'Common', 'Troop', 2, '“Spawns one lively little Ice Spirit to freeze a group of enemies. Stay frosty.”', 'hog.png'),
(3, 'Fire Spirit', 1, 'Common', 'Troop', 2, '“Spawns one lively little Ice Spirit to freeze a group of enemies. Stay frosty.”', 'hog.png'),
(4, 'Electro Spirit', 1, 'Common', 'Troop', 2, '“Jumps on enemies, dealing Area Damage and stunning up to 9 enemy Troops. Locked in an eternal battle with Knight for the best mustache.”', 'hog.png'),
(5, 'Goblins', 2, 'Common', 'Troop', 2, '“Four fast, unarmored melee attackers. Small, fast, green and mean!”', 'hog.png'),
(6, 'Bomber', 2, 'Common', 'Troop', 2, '“Small, lightly protected skeleton who throws bombs. Deals area damage that can wipe out a swarm of enemies.”', 'hog.png'),
(7, 'Spear Goblins', 2, 'Common', 'Troop', 2, '“Three unarmored ranged attackers. Who the heck taught these guys to throw spears!? Who thought that was a good idea?!”', 'hog.png'),
(8, 'Bats', 2, 'Common', 'Troop', 2, '“Spawns a handful of tiny flying creatures. Think of them as sweet, purple... balls of DESTRUCTION!”', 'hog.png'),
(9, 'Zap', 2, 'Common', 'Spell', 2, '“Zaps enemies, briefly stunning them and dealing damage inside a small radius. Reduced damage to Crown Towers.”', 'hog.png'),
(10, 'Giant Snowball', 2, 'Common', 'Spell', 2, '“It’s HUGE! Once it began rolling down Frozen Peak, there was no stopping it. Enemies hit are knocked back and slowed down. Reduced damage to Crown Towers.”', 'hog.png'),
(11, 'Knight', 3, 'Common', 'Troop', 2, '“A tough melee fighter. The Barbarian\'s handsome, cultured cousin. Rumor has it that he was knighted based on the sheer awesomeness of his mustache alone.”', 'hog.png'),
(12, 'Archers', 3, 'Common', 'Troop', 2, '“A pair of lightly armored ranged attackers. They\'ll help you take down ground and air units, but you\'re on your own with hair coloring advice.”', 'hog.png'),
(13, 'Minions', 3, 'Common', 'Troop', 2, '“Three fast, unarmored flying attackers. Roses are red, minions are blue, they can fly, and will crush you!”', 'hog.png'),
(14, 'Goblin Gang', 3, 'Common', 'Troop', 2, '“Spawns Six Goblins - three with knives, three with spears - at a discounted Elixir cost. It\'s like a Goblin Value Pack!”', ''),
(15, 'Skeleton Barrel', 3, 'Common', 'Troop', 2, '“It\'s a Skeleton party in the sky, until all the balloons pop... then it\'s a Skeleton party on the ground!”', ''),
(16, 'Firecracker', 3, 'Common', 'Troop', 2, '“Shoots a firework that explodes on impact, damaging the target and showering anything behind it with sparks. This is what happens when Archers get bored!”', ''),
(17, 'Cannon', 3, 'Common', 'Building', 2, '“Defensive building. Shoots cannonballs with deadly effect, but cannot target flying troops.”', ''),
(18, 'Arrows', 3, 'Common', 'Spell', 2, '“Arrows pepper a large area, damaging all enemies hit. Reduced damage to Crown Towers.”', ''),
(19, 'Royal Delivery', 3, 'Common', 'Troop', 2, '“No need to sign for this package! Dropped from the sky, it deals Area Damage to enemy Troops before delivering a Royal Recruit. The empty box is also handy for espionage.”', ''),
(20, 'Seleton Dragons', 4, 'Common', 'Troop', 2, '“This pair of skeletal scorchers deal Area Damage and fly above the Arena. They also play a mean rib cage xylophone duet.”', ''),
(21, 'Mortar', 4, 'Common', 'Building', 2, '“Defensive building with a long range. Shoots big boulders that deal area damage, but cannot hit targets that get very close!”', ''),
(22, 'Tesla', 4, 'Common', 'Building', 2, '“Defensive building. Whenever it\'s not zapping the enemy, the power of Electrickery is best kept grounded.”', ''),
(23, 'Barbarians', 5, 'Common', 'Troop', 2, '“A horde of melee attackers with mean mustaches and even meaner tempers.”', ''),
(24, 'Minion Horde', 5, 'Common', 'Troop', 2, '“Six fast, unarmored flying attackers. Three\'s a crowd, six is a horde!”', ''),
(25, 'Rascals', 5, 'Common', 'Troop', 2, '“Spawns a mischievous trio of Rascals! The boy takes the lead, while the girls pelt enemies from behind... with slingshots full of Double Trouble Gum!”', ''),
(26, 'Royal Giant', 6, 'Common', 'Troop', 2, '“Destroying enemy buildings with his massive cannon is his job; making a raggedy blond beard look good is his passion.”', ''),
(27, 'Elite Barbarians', 6, 'Common', 'Troop', 2, '“Spawns a pair of leveled up Barbarians. They\'re like regular Barbarians, only harder, better, faster and stronger.”', ''),
(28, 'Royal Recruits', 6, 'Common', 'Troop', 2, '“Deploys a line of recruits armed with spears, shields and wooden buckets. They dream of ponies and one day wearing metal buckets.”', ''),
(30, 'Heal Spirit', 1, 'Rare', 'Troop', 2, '“A mischevious Spirit that leaps at enemies, dealing Damage and leaving behind a powerful healing effect that restores Hitpoints to friendly Troops!”', ''),
(31, 'Ice Golem', 2, 'Rare', 'Troop', 2, '“He\'s tough, targets buildings and explodes when destroyed, slowing nearby enemies. Made entirely out of ice... or is he?! Yes.”', ''),
(32, 'Mega Minion', 3, 'Rare', 'Troop', 2, '“Flying, armored and powerful. What could be its weakness?! Cupcakes.”', ''),
(33, 'Dart Goblin', 3, 'Rare', 'Troop', 2, '“Runs fast, shoots far and chews gum. How does he blow darts with a mouth full of Double Trouble gum? Years of didgeridoo lessons.”', ''),
(34, 'Elixir Golem', 3, 'Rare', 'Troop', 2, '“Splits into two Elixir Golemites when destroyed, which split into two sentient Blobs when defeated. Each part of the Elixir Golem gives your opponent some Elixir when destroyed!”', ''),
(35, 'Tombstone', 3, 'Rare', 'Building', 2, '“Building that periodically spawns Skeletons to fight the enemy... and when destroyed, spawns 4 more Skeletons! Creepy.”', ''),
(36, 'Earthquake', 3, 'Rare', 'Spell', 2, '“Deals Damage per second to Troops and Crown Towers. Deals huge Building Damage! Does not affect flying units (it is an EARTHquake, after all).”', ''),
(37, 'Valkyrie', 4, 'Rare', 'Troop', 2, '“Tough melee fighter, deals area damage around her. Swarm or horde, no problem! She can take them all out with a few spins.”', ''),
(38, 'Musketeer', 4, 'Rare', 'Troop', 2, '“Don\'t be fooled by her delicately coiffed hair, the Musketeer is a mean shot with her trusty boomstick.”', ''),
(39, 'Mini P.E.K.K.A', 4, 'Rare', 'Troop', 2, '“The Arena is a certified butterfly-free zone. No distractions for P.E.K.K.A, only destruction.”', ''),
(40, 'Hog Rider', 4, 'Rare', 'Troop', 2, '“Fast melee troop that targets buildings and can jump over the river. He followed the echoing call of \"Hog Riderrrrr\" all the way through the Arena doors.”', ''),
(41, 'Battle Ram', 4, 'Rare', 'Troop', 2, '“Two Barbarians holding a big log charge at the nearest building, dealing significant damage if they connect; then they go to town with their swords!”', ''),
(42, 'Zappies', 4, 'Rare', 'Troop', 2, '“Spawns a pack of miniature Zap machines. Who controls them...? Only the Master Builder knows.”', ''),
(43, 'Flying Machine', 4, 'Rare', 'Troop', 2, '“The Master Builder has sent his first contraption to the Arena! It\'s a fast and fun flying machine, but fragile!”', ''),
(44, 'Battle Healer', 4, 'Rare', 'Troop', 2, '“With each attack, she unleashes a powerful healing aura that restores Hitpoints to herself and friendly Troops. When she isn\'t attacking, she passively heals herself!”', ''),
(45, 'Bomb Tower', 4, 'Rare', 'Building', 2, '“Defensive building that houses a Bomber. Deals area damage to anything dumb enough to stand near it.”', ''),
(46, 'Furnace', 4, 'Rare', 'Building', 2, '“The Furnace spawns one Fire Spirit at a time. It also makes great brick-oven pancakes.”', ''),
(47, 'Goblin Cage', 4, 'Rare', 'Building', 2, '“When the Goblin Cage is destroyed, a Goblin Brawler is unleashed into the Arena! Goblin Brawler always skips leg day.”', ''),
(48, 'Fireball', 4, 'Rare', 'Spell', 2, '“Annnnnd... Fireball. Incinerates a small area, dealing high damage. Reduced damage to Crown Towers.”', ''),
(49, 'Giant', 5, 'Rare', 'Troop', 2, '“Slow but durable, only attacks buildings. A real one-man wrecking crew!”', ''),
(50, 'Wizard', 5, 'Rare', 'Troop', 2, '“The most awesome man to ever set foot in the Arena, the Wizard will blow you away with his handsomeness... and/or fireballs.”', ''),
(51, 'Royal Hogs', 5, 'Rare', 'Troop', 2, '“The King’s personal pets are loose! They love to chomp on apples and towers alike - who let the hogs out?!”', ''),
(52, 'Goblin Hut', 5, 'Rare', 'Building', 2, '“Building that spawns Spear Goblins. Don\'t look inside... You don\'t want to see how they\'re made.”', ''),
(53, 'Inferno Tower', 5, 'Rare', 'Building', 2, '“Defensive building, roasts targets for damage that increases over time. Burns through even the biggest and toughest enemies!”', ''),
(54, 'Barbarian Hut', 6, 'Rare', 'Building', 2, '“Building that periodically spawns Barbarians to fight the enemy. Time to make the Barbarians!”', ''),
(55, 'Elixir Collector', 6, 'Rare', 'Building', 2, '“You gotta spend Elixir to make Elixir! This building makes 8 Elixir over its Lifetime. Does not appear in your starting hand.”', ''),
(56, 'Rocket', 6, 'Rare', 'Spell', 2, '“Deals high damage to a small area. Looks really awesome doing it. Reduced damage to Crown Towers.”', ''),
(57, 'Three Musketeers', 9, 'Rare', 'Troop', 2, '“Trio of powerful, independent markswomen, fighting for justice and honor. Disrespecting them would not be just a mistake, it would be a cardinal sin!”', ''),
(58, 'Wall Breakers', 2, 'Epic', 'Troop', 2, '“A daring duo of dangerous dive bombers. Nothing warms a Wall Breaker\'s cold and undead heart like blowing up buildings.”', ''),
(59, 'Rage', 2, 'Epic', 'Spell', 2, '“Increases troop movement and attack speed. Buildings attack faster and summon troops quicker, too. Chaaaarge!”', ''),
(60, 'Barbarian Barrel', 2, 'Epic', 'Spell', 2, '“It rolls over and damages anything in its path, then breaks open and out pops a Barbarian! How did he get inside?!”', ''),
(61, 'Skeleton Army', 3, 'Epic', 'Troop', 2, '“Spawns an army of Skeletons. Meet Larry and his friends Harry, Terry, Gerry, Mary, etc.”', ''),
(62, 'Guards', 3, 'Epic', 'Troop', 2, '“Three ruthless bone brothers with shields. Knock off their shields and all that\'s left are three ruthless bone brothers.”', ''),
(63, 'Goblin Barrel', 3, 'Epic', 'Spell', 2, '“Spawns three Goblins anywhere in the Arena. It\'s going to be a thrilling ride, boys!”', ''),
(64, 'Tornado', 3, 'Epic', 'Spell', 2, '“Drags enemy troops to its center while dealing damage over time, just like a magnet. A big, swirling, Tornado-y magnet.”', ''),
(65, 'Clone', 3, 'Epic', 'Spell', 2, '“Duplicates all friendly troops in the target area. Cloned troops are fragile, but pack the same punch as the original! Doesn\'t affect buildings.”', ''),
(66, 'Baby Dragon', 4, 'Epic', 'Troop', 2, '“Burps fireballs from the sky that deal area damage. Baby dragons hatch cute, hungry and ready for a barbeque.”', ''),
(67, 'Dark Prince', 4, 'Epic', 'Troop', 2, '“The Dark Prince deals area damage and lets his spiked club do the talking for him - because when he does talk, it sounds like he has a bucket on his head.”', ''),
(68, 'Hunter', 4, 'Epic', 'Troop', 2, '“He deals BIG damage up close - not so much at range. What he lacks in accuracy, he makes up for with his impressively bushy eyebrows.”', ''),
(69, 'Goblin Drill', 4, 'Epic', 'Building', 2, '“Building capable of burrowing underground and appearing anywhere in the Arena. Spawns Goblins one at a time until destroyed. Then spawns a few more, to make sure everything nearby has been properly stabbed.”', ''),
(70, 'Poison', 4, 'Epic', 'Spell', 2, '“Covers the area in a deadly toxin, damaging enemy troops and buildings over time. Yet somehow leaves the grass green and healthy. Go figure! Reduced damage to Crown Towers.”', ''),
(71, 'Baloon', 5, 'Epic', 'Troop', 2, '“As pretty as they are, you won\'t want a parade of THESE balloons showing up on the horizon. Drops powerful bombs and when shot down, crashes dealing area damage.”', ''),
(72, 'Witch', 5, 'Epic', 'Troop', 2, '“Summons Skeletons, shoots destructo beams, has glowing pink eyes that unfortunately don\'t shoot lasers.”', ''),
(73, 'Prince', 5, 'Epic', 'Troop', 2, '“Don\'t let the little pony fool you. Once the Prince gets a running start, you WILL be trampled. Deals double damage once he gets charging.”', ''),
(74, 'Bowler', 5, 'Epic', 'Troop', 2, '“This big blue dude digs the simple things in life - Dark Elixir drinks and throwing rocks. His massive boulders roll through their target, hitting everything behind for a strike!”', ''),
(75, 'Executioner', 5, 'Epic', 'Troop', 2, '“He throws his axe like a boomerang, striking all enemies on the way out AND back. It\'s a miracle he doesn\'t lose an arm.”', ''),
(76, 'Cannon Cart', 5, 'Epic', 'Troop', 2, '“A Cannon on wheels?! Bet they won\'t see that coming! Once you break its shield, it becomes a Cannon not on wheels.”', ''),
(77, 'Electro Dragon', 5, 'Epic', 'Troop', 2, '“Spits out bolts of electricity hitting up to three targets. Suffers from middle child syndrome to boot.”', ''),
(78, 'Giant Skeleton', 6, 'Epic', 'Troop', 2, '“The bigger the skeleton, the bigger the bomb. Carries a bomb that blows up when the Giant Skeleton dies.”', ''),
(79, 'Goblin Giant', 6, 'Epic', 'Troop', 2, '“This jolly green Goblin Giant stomps towards enemy buildings. He carries two Spear Goblins everywhere he goes. It\'s a weird but functional arrangement.”', ''),
(80, 'Lightning', 6, 'Epic', 'Spell', 2, '“Bolts of lightning damage and stun up to three enemy troops or buildings with the most hitpoints in the target area. Reduced damage to Crown Towers.”', ''),
(81, 'P.E.K.K.A', 7, 'Epic', 'Troop', 2, '“A heavily armored, slow melee fighter. Swings from the hip, but packs a huge punch.”', ''),
(82, 'Electro Giant', 7, 'Epic', 'Troop', 2, '“He channels electricity through his Zap Pack, a unique device that stuns and damages any troop attacking him within its range. Don\'t tell him that his finger guns aren\'t real! He\'ll zap you.”', ''),
(83, 'Golem', 8, 'Epic', 'Troop', 2, '“Slow but durable, only attacks buildings. When destroyed, explosively splits into two Golemites and deals area damage!”', ''),
(84, 'Freeze', 4, 'Epic', 'Spell', 2, '“Freezes and damages enemy troops and buildings, making them unable to move or attack. Everybody chill. Reduced damage to Crown Towers.”\r\n', ''),
(85, 'The Log', 2, 'Legendary', 'Spell', 2, '“A spilt bottle of Rage turned an innocent tree trunk into \"The Log\". Now, it seeks revenge by crushing anything in its path! Reduced damage to Crown Towers.”', ''),
(86, 'Princess', 3, 'Legendary', 'Troop', 2, '“This stunning Princess shoots flaming arrows from long range. If you\'re feeling warm feelings towards her, it\'s probably because you\'re on fire.”', ''),
(87, 'Ice Wizard', 3, 'Legendary', 'Troop', 2, '“This chill caster throws ice shards that slow down enemies\' movement and attack speed. Despite being freezing cold, he has a handlebar mustache that\'s too hot for TV.”', ''),
(88, 'Miner', 3, 'Legendary', 'Troop', 2, '“The Miner can burrow his way underground and appear anywhere in the Arena. It\'s not magic, it\'s a shovel. A shovel that deals reduced damage to Crown Towers.”', ''),
(89, 'Bandit', 3, 'Legendary', 'Troop', 2, '“The Bandit dashes to her target and delivers an extra big hit! While dashing, she can\'t be touched. The mask keeps her identity safe, and gives her bonus cool points!”', ''),
(90, 'Royal Ghost', 3, 'Legendary', 'Troop', 2, '“He drifts invisibly through the Arena until he\'s startled by an enemy... then he attacks! Then he\'s invisible again! Zzzz.”', ''),
(91, 'Fisherman', 3, 'Legendary', 'Troop', 2, '“His Ranged Attack can pull enemies towards him, and pull himself to enemy buildings. He\'s also mastered the ancient art of \'Fish Slapping\'.”', ''),
(92, 'Lumberjack', 4, 'Legendary', 'Troop', 2, '“He chops trees by day and hunts The Log by night. His bottle of Rage spills everywhere when he\'s defeated.”', ''),
(93, 'Inferno Dragon', 4, 'Legendary', 'Troop', 2, '“Shoots a focused beam of fire that increases in damage over time. Wears a helmet because flying can be dangerous.”', ''),
(94, 'Electro Wizard', 4, 'Legendary', 'Troop', 2, '“He lands with a \"POW!\", stuns nearby enemies and shoots lightning with both hands! What a show off.”', ''),
(95, 'Mother Witch', 4, 'Legendary', 'Troop', 2, '“Places a curse on enemy troops with each attack. When a cursed troop is destroyed, it turns into a building-targeting Hog that fights alongside the Mother Witch. She also bakes great cookies.”', ''),
(96, 'Magic Archer', 4, 'Legendary', 'Troop', 2, '“Not quite a Wizard, nor an Archer - he shoots a magic arrow that passes through and damages all enemies in its path. It\'s not a trick, it\'s magic!”', ''),
(97, 'Mother Witch', 4, 'Legendary', 'Troop', 2, '“Places a curse on enemy troops with each attack. When a cursed troop is destroyed, it turns into a building-targeting Hog that fights alongside the Mother Witch. She also bakes great cookies.”', ''),
(98, 'Ram Rider', 5, 'Legendary', 'Troop', 2, '“Together they charge through the Arena; snaring enemies, knocking down towers... and chewing grass!?”', ''),
(99, 'Graveyard', 5, 'Legendary', 'Spell', 2, '“Surprise! It\'s a party. A Skeleton party, anywhere in the Arena. Yay!”', ''),
(100, 'Sparky', 6, 'Legendary', 'Troop', 2, '“Sparky slowly charges up, then unloads MASSIVE area damage. Overkill isn\'t in her vocabulary.”', ''),
(101, 'Lava Hound', 7, 'Legendary', 'Troop', 2, '“The Lava Hound is a majestic flying beast that attacks buildings. The Lava Pups are less majestic angry babies that attack anything.”', ''),
(102, 'Mega Knight', 7, 'Legendary', 'Troop', 2, '“He lands with the force of 1,000 mustaches, then jumps from one foe to the next dealing huge area damage. Stand aside!”', ''),
(103, 'Mighty Miner', 4, 'Champion', 'Troop', 2, '“Walk softly... and carry a big drill! This Champion deals increasing Damage to his target and can switch lanes to escape combat or change attack plans. This makes him not only the mightiest, but also the sneakiest Miner in the Arena.”', ''),
(104, 'Skeleton King', 4, 'Champion', 'Troop', 2, '“The King of the undead himself. He sometimes feels lonely (could be due to his non flattering features) and will summon friends to join him in the battle even after death. Tough guys have feelings too!”', ''),
(105, 'Golden Knight', 4, 'Champion', 'Troop', 2, '“A warrior with luxurious hair and outstanding flexibility. Demonstrates his aerobics skills on demand.”', ''),
(106, 'Archer Queen', 5, 'Champion', 'Troop', 2, '“She is fast, deadly and hard to catch. Beware of her crossbow bolts and try not to blink - you might miss her!”', ''),
(107, 'Monk', 5, 'Champion', 'Troop', 2, '“Monk has spent many isolated years perfecting a new style of combat. He fires off a 3-hit combo, with the last blow dealing extra Damage and pushing enemies back!”', ''),
(108, 'Phoenix', 4, 'Legendary', 'Troop', 2, '“This mystical creature will be reborn as an egg when destroyed. If it hatches, it returns to the fight! What an egg-cellent ability. Phoenix also has a fiery personality! Just kidding, it\'s a very serious bird. It would disapprove of all these puns.”', '');

-- --------------------------------------------------------

--
-- Table structure for table `card_quality`
--

DROP TABLE IF EXISTS `card_quality`;
CREATE TABLE `card_quality` (
  `customer_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `quality` enum('0','1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `COID` int(11) NOT NULL,
  `contents` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment_list`
--

DROP TABLE IF EXISTS `comment_list`;
CREATE TABLE `comment_list` (
  `comment_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `CID` int(11) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CID`, `Login`, `Password`, `Email`) VALUES
(2, 'bob', '123', 'bob@bob.com'),
(4, 'john', '123', 'john@john.com'),
(5, 'john_doe', '123', 'johndoe@john.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `OID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `finalized_purchase` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

DROP TABLE IF EXISTS `order_list`;
CREATE TABLE `order_list` (
  `order_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`CAID`);

--
-- Indexes for table `card_quality`
--
ALTER TABLE `card_quality`
  ADD PRIMARY KEY (`customer_id`,`card_id`),
  ADD KEY `Card` (`card_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`COID`);

--
-- Indexes for table `comment_list`
--
ALTER TABLE `comment_list`
  ADD PRIMARY KEY (`comment_id`,`card_id`,`customer_id`),
  ADD KEY `CustomerComment` (`customer_id`),
  ADD KEY `CardComment` (`card_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CID`),
  ADD UNIQUE KEY `Login` (`Login`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`,`card_id`,`customer_id`),
  ADD KEY `CustomerOrder` (`customer_id`),
  ADD KEY `CardOrder` (`card_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `CAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `COID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card_quality`
--
ALTER TABLE `card_quality`
  ADD CONSTRAINT `Card` FOREIGN KEY (`card_id`) REFERENCES `cards` (`CAID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CustomerQuality` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_list`
--
ALTER TABLE `comment_list`
  ADD CONSTRAINT `CardComment` FOREIGN KEY (`card_id`) REFERENCES `cards` (`CAID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Comment` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`COID`),
  ADD CONSTRAINT `CustomerComment` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `CardOrder` FOREIGN KEY (`card_id`) REFERENCES `cards` (`CAID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CustomerOrder` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`OID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
