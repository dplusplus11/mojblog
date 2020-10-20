-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 11:04 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mojblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanci`
--

CREATE TABLE `clanci` (
  `id` int(11) NOT NULL,
  `slika` varchar(200) CHARACTER SET latin1 NOT NULL,
  `tekst` longtext CHARACTER SET latin1 NOT NULL,
  `naslov` varchar(100) CHARACTER SET latin1 NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `izvor` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clanci`
--

INSERT INTO `clanci` (`id`, `slika`, `tekst`, `naslov`, `datum`, `izvor`) VALUES
(1, '../pocetna_slike/elef1.png', 'A vi, kako ste?', 'Strip dana', '2018-05-18 07:36:13', 'KultiviÅ¡ise.rs'),
(2, '../pocetna_slike/twinpeaks.jpg', 'OboÅ¾avao sam Tvin Piks: Povratak, koji se okonÄao juÄe. OboÅ¾avao sam ga â€” viÅ¡e od bilo kog filma, TV serije, knjige ili video igre koje sam konzumirao ove godine, moÅ¾da Äak i Äitave decenije â€” a zbog Äinjenice da se primakao kraju oseÄ‡am se jebeno grozno.\r\n\r\nOboÅ¾avao sam tu nepouzdanost koja je dolazila sa svakom epizodom Tvin Piksa: Povratak â€” konstantne neredovnosti koja je bila tako redovna. IznenaÄ‘enja su definisala moju 2017. godinu, baÅ¡ kao i drugih ljudi, a nisu sva bila dobrodoÅ¡la. Bila je to godina u kojoj sam se zaticao, u odreÄ‘enim trenucima, kako Å¾udim za stabilnoÅ¡Ä‡u, i na velikom i na malom planu. Lako je tokom tih perioda vratiti se stvarima koje su uteÅ¡ne i pouzdane (pogledao sam proteklog meseca viÅ¡e epizoda Prijatelja nego Å¡to lekari obiÄno preporuÄuju da je zdravo), ali Äudna i nemilosrdna divljina Tvin Piksa: Povratak bila je neophodni Å¡ok za moj sistem , baÅ¡ kao kad je Dagi nabio viljuÅ¡ku u Å¡teker. Postao je deo mog Å¾ivota, a sad ga viÅ¡e neÄ‡e biti i iako sam zahvalan Å¡to u doba beskrajnih rimejkova i nastavaka LinÄ ima Å¾elju da okonÄa stvari â€” oseÄ‡aÄ‡u se grozno sad kad ga viÅ¡e ne bude bilo.', 'Å ta Ä‡emo da radimo bez \"Tvin Piksa\"?', '2018-05-17 10:55:08', 'Vice.com'),
(3, '../pocetna_slike/yoga4.png', 'U drevna vremena maÄke su bile oboÅ¾avane kao boÅ¾anstva, i nisu to zaboravile.  Teri PraÄet \r\n\r\n\r\n', 'MaÄji kutak', '2018-05-17 11:01:24', 'KultiviÅ¡ise.rs'),
(4, '../pocetna_slike/story.jpg', ' â€žThe universe is made of stories, not atomsâ€, rekla je pesnikinja Mjuriel Rukejser, feministkinja i druÅ¡tvena aktivistkinja. PriÄe koje priÄamo sebi i drugima postaju ne samo naÅ¡ pogled na svet veÄ‡ naÅ¡a realnost. PriÄe nam nisu neophodne samo za razumevanje sveta â€“ one jesu naÅ¡e razumevanje sveta. Bukvalno u svakom aspektu Å¾ivota, ljudi se trude da ispriÄaju ili pronaÄ‘u priÄu, od crteÅ¾a peÄ‡inskih ljudi do koncepta kulturne hegemonije, u kojoj dominantna priÄa jedne kulture odreÄ‘uje veÄ‡inske stavove ljudi (kao religija i sujeverje u Srednjem veku, ili ekonomske vrednosti u naÅ¡e doba).\r\n\r\nNeurolog Oliver Saks postavio je hipotezu da narativna istina nasuprot istorijskoj istini, oblikuje naÅ¡ pogled na svet, istovremeno naglaÅ¡avajuÄ‡i da su priÄe ono Å¡to nas Äini ljudima. PriÄe nam pomaÅ¾u da oblikujemo svoja svakodnevna raznolika iskustva, da u sadaÅ¡njosti â€žspojimoâ€™â€™ proÅ¡lost, buduÄ‡nost i strukturu u dostizanju ciljeva. Daju nam oseÄ‡aj identiteta i integriÅ¡u naÅ¡a oseÄ‡anja sa naÅ¡im mislima. Jedan deo borbe za preÅ¾ivljavanje bio je i sluÅ¡anje predaÄkih iskustava koja su prenosila priÄe i mudrost prethodnih generacija. Kako starimo, najpre slabi kratkoroÄna pa dugoroÄna memorija. MoÅ¾da je evolutivna svrha toga bila da moÅ¾emo reÄ‡i narednim generacijama o priÄama i iskustvima koja su nas oblikovala i koja mogu biti od koristi za napredak.\r\nOvaj pristup nastavlja se na rad Kurta Levina i zasnovan je na trima psiholoÅ¡kim intervencijama: story editing, preoblikovanje narativa koje ljudi imaju o sebi i okolini, Å¡to uzrokuje bitnu i trajnu promenu u ponaÅ¡anju, story-prompting â€” usmeravanje ljudi ka novim narativima i to uz sugestije kako bi mogli da interpretiraju svoju situaciju, i do good, be good â€” princip koji korene vuÄe joÅ¡ od Aristotela, a Äija je premisa da je potrebno prvo promeniti ponaÅ¡anje, Å¡to u povratnoj sprezi utiÄe na promenu viÄ‘enja sebe. To kako vidimo sebe zavisi od toga kako se ponaÅ¡amo. Prema psihologu Timotiju Vilsonu, story editing je znaÄajan i daje bolje rezultate od na primer, bihejvioralnih tehnika, jer postavlja pitanje Å¡ta promena u ponaÅ¡anju znaÄi za â€“ naÅ¡e priÄe. Ovaj autor recimo, navodi da je najbolji vid prevencije tinejdÅ¾erskih trudnoÄ‡a da se tinejdÅ¾eri aktivno ukljuÄe u druÅ¡tveno koristan rad u zajednici; ovo ih transformiÅ¡e iz otuÄ‘ene i sebiÄne dece u mlade ljude kojima je zaista stalo. TakoÄ‘e navodi da roditelji imaju znaÄajne uloge u oblikovanju narativa kod svoje dece.\r\n\r\nOvo su odavno prepoznali i narativni terapeuti, Äija se filozofija zasniva na pretpostavci da je potrebno da razumemo Å¾ivotne priÄe ljudi i nanovo ih kreiramo u saradnji sa svojim klijentima. Recimo, u narativnoj terapiji se psihoza posmatra kao slom jednog koherentnog pozitivnog narativa, i â€žpopravkaâ€™â€™ Å¾ivotne priÄe obolelog igra znaÄajnu ulogu u njegovom oporavku.', 'ZaÅ¡to ne moÅ¾emo da Å¾ivimo bez priÄa?', '2018-05-17 11:38:36', 'Kulturkokoska.rs'),
(5, '../pocetna_slike/music.jpg', 'Otkrijte Å¡ta je sinestezija, kako nekome duvanje nosa moÅ¾e da zvuÄi kao visoko G i zaÅ¡to neki ljudi doÅ¾ivljavaju epileptiÄne napade kada Äuju odreÄ‘enu vrstu muzike.\r\n\r\n\r\nZanimljivo je to da se pogledom na mozak ne moÅ¾e utvrditi da li je pripadao matematiÄaru, knjiÅ¾evniku ili slikaru, ali se sa velikom verovatnoÄ‡om moÅ¾e pogoditi ukoliko je u pitanju bio muziÄar.\r\nJedna od nesumnjivo najzanimljivijih pojava ljudskog uma je sinestezija â€“ neuroloÅ¡ko stanje u kom se dva ili viÅ¡e Äula ujedinjavaju. Pod sinestezijom se ne misli na asocijacije koje ljudi prave izmeÄ‘u zvukova i boja, ma koliko bile Ävrste. Sinestezija podrazumeva da se stimulacijom jednog Äula automatski i fiziÄki aktivira centar u mozgu za drugo Äulo u isto vreme, stvarajuÄ‡i gotovo neopisiv doÅ¾ivljaj stapanja. Pre nego Å¡to je njeno postojanje nauÄno potvrÄ‘eno najnovijim tehnologijama oslikavanja mozga, sinestezija se dugo smatrala pukim stilskim sredstvom pesnika.\r\nNiz novijih istraÅ¾ivanja pokazuje da je sinestezija popriliÄno Äesta kod dece, a uglavnom se izgubi do adolescencije. TakoÄ‘e, sinestezija verovatno ima genetsku komponentu, buduÄ‡i da se uglavnom pronalazi unutar porodice. Ipak, ona se vrlo individualno manifestuje kod razliÄitih ljudi: neki oseÄ‡aju da svaka boja ima sopstveni miris, neki da muziÄki intervali imaju poseban ukus. Neki pojedinim slovima, brojevima ili danima u nedelji pripisuju sasvim specifiÄne boje.\r\n\r\nSvako je nekada upoznao bar jednu osobu gluvu za ton, s kojom po cenu Å¾ivota izbegava da ide na karaoke. Ali to nije niÅ¡ta u poreÄ‘enju sa potpunom amuzijom s kojom Å¾ive neki ljudi.\r\n\r\nAmuzija podrazumeva da osoba tonove ne opaÅ¾a kao tonove, i jednostavno muziku uopÅ¡te ne prepoznaje kao â€“ muziku. Ne uoÄava odnose izmeÄ‘u nota, niti uopÅ¡te moÅ¾e da shvati Å¡ta je to â€žnotaâ€.\r\n\r\nLjudi sa amuzijom mogu imati oseÄ‡aj za ritam, ali bilo Å¡ta Å¡to ukljuÄuje melodiju im zvuÄi kao â€žÅ¡kripa kolaâ€ ili â€žkao da neko udara ÄekiÄ‡em po metalnoj ploÄiâ€. Ovo se deÅ¡ava zato Å¡to se opaÅ¾anje melodije povezuje sa desnom hemisferom mozga, dok je predstava ritma mnogo rasprostranjenija i jaÄa (u levoj hemisferi, pa kroz supkortikalne strukture, pa u malom mozgu, itd.) zbog Äega se i reÄ‘e gubi.\r\n\r\nJedan amuziÄar opisuje kako je morao da izleti sa koncerta, usled neobjaÅ¡njive muÄnine, jer bi radije bio na buÄnoj ulici zakrÄenoj automobilima nego da izdrÅ¾ava â€žono nepodnoÅ¡ljivo tandrkanje.â€ Å to Ä‡e reÄ‡i, osobama sa amuzijom muzika koju vi oboÅ¾avate zvuÄi kao da neko manijakalno baca lonce i Å¡erpe po kuhinji.', 'Bizarne priÄe o muzici i mozgu', '2018-05-17 11:39:44', 'Kulturkokoska.rs');

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `putanja` varchar(200) NOT NULL,
  `format` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`id`, `ime`, `putanja`, `format`) VALUES
(3, 'a-cat-and-dog-play-scramble-in-a-kitchen-grrr-shannon-wheeler.jpg', '../galerija_slike/a-cat-and-dog-play-scramble-in-a-kitchen-grrr-shannon-wheeler.jpg', 'image/jpeg'),
(4, 'elef1.png', '../galerija_slike/elef1.png', 'image/png'),
(5, 'lav5.jpg', '../galerija_slike/lav5.jpg', 'image/jpeg'),
(6, 'yoga4.png', '../galerija_slike/yoga4.png', 'image/png'),
(7, 'fam6.png', '../galerija_slike/fam6.png', 'image/png'),
(8, 'its-always-sit-peter-steine.jpg', '../galerija_slike/its-always-sit-peter-steine.jpg', 'image/jpeg'),
(10, 'pol7.png', '../galerija_slike/pol7.png', 'image/png'),
(11, 'betmen.jpg', '../galerija_slike/betmen.jpg', 'image/jpeg'),
(12, '051518.jpg', '../galerija_slike/051518.jpg', 'image/jpeg'),
(13, 'music-brain.jpg', '../galerija_slike/Music-Brain.jpg', 'image/jpeg'),
(14, 'kiss.jpg', '../galerija_slike/kiss.jpg', 'image/jpeg'),
(15, 'tree.jpg', '../galerija_slike/tree.jpg', 'image/jpeg'),
(16, 'sunrise.jpg', '../galerija_slike/sunrise.jpg', 'image/jpeg'),
(17, 'monet.jpg', '../galerija_slike/monet.jpg', 'image/jpeg'),
(19, 'tears.jpg', '../galerija_slike/tears.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `g_lajkovi`
--

CREATE TABLE `g_lajkovi` (
  `id` int(11) NOT NULL,
  `slika_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lajk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_lajkovi`
--

INSERT INTO `g_lajkovi` (`id`, `slika_id`, `user_id`, `lajk`) VALUES
(100, 12, 4, 'like'),
(107, 15, 4, 'like'),
(109, 4, 4, 'like'),
(110, 2, 4, 'like'),
(113, 11, 4, 'like'),
(115, 6, 4, 'like'),
(116, 7, 4, 'like'),
(117, 3, 4, 'like'),
(120, 14, 1, 'like'),
(121, 15, 1, 'like'),
(122, 12, 1, 'like'),
(123, 11, 1, 'like'),
(144, 5, 1, 'like'),
(148, 10, 1, 'dislike'),
(227, 7, 1, 'like'),
(387, 0, 4, 'like'),
(398, 14, 4, 'like'),
(399, 10, 4, 'like'),
(400, 5, 4, 'like'),
(401, 9, 4, 'dislike'),
(403, 18, 4, 'like'),
(405, 13, 2, 'dislike'),
(406, 18, 2, 'like'),
(412, 15, 2, 'like'),
(453, 16, 2, 'like'),
(454, 12, 2, 'like'),
(455, 11, 2, 'like'),
(457, 14, 2, 'like'),
(458, 9, 2, 'like'),
(459, 8, 2, 'like'),
(460, 6, 2, 'like'),
(461, 4, 2, 'like'),
(477, 16, 4, 'like'),
(479, 8, 4, 'like'),
(480, 17, 3, 'like'),
(481, 19, 3, 'like'),
(482, 16, 3, 'like'),
(483, 17, 4, 'like'),
(484, 19, 4, 'like'),
(486, 13, 4, 'like'),
(487, 17, 1, 'like'),
(488, 19, 1, 'like'),
(489, 13, 1, 'like'),
(490, 8, 1, 'like'),
(491, 6, 1, 'like'),
(492, 19, 6, 'like'),
(493, 17, 6, 'like'),
(494, 16, 6, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `komentari_id` int(11) NOT NULL,
  `komentar` varchar(500) NOT NULL,
  `postovi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`komentari_id`, `komentar`, `postovi_id`, `user_id`, `datum`) VALUES
(1, ' Brt neveruem! 0.0', 2, 3, '2018-05-19 20:16:00'),
(2, ' UUU, jeee', 12, 3, '2018-05-19 20:16:19'),
(3, ' Nema bre ljubavi, alo!!!!!!!!!!!!!!', 13, 3, '2018-05-19 20:16:39'),
(4, ' Sjajno! <3', 1, 1, '2018-05-19 20:17:28'),
(5, ' Genije!', 2, 1, '2018-05-19 20:17:43'),
(6, ' Google je bog!', 12, 1, '2018-05-19 20:18:11'),
(7, ' <3', 8, 1, '2018-05-19 20:18:33'),
(8, ' Omiljeni pisac!', 3, 1, '2018-05-19 20:19:15'),
(9, ' Dakle, nema je :D', 1, 4, '2018-05-19 20:24:03'),
(10, ' Hm, da li da verujemo svemu sto procitamo?', 2, 4, '2018-05-19 20:24:30'),
(11, 'Moj prijatelj drvo, moj drug Å¾ivotinja, i priroda kao mreÅ¾a koja nas s njima spaja.  \r\nLIKE!', 8, 4, '2018-05-19 20:25:09'),
(12, ' Impresivno.', 12, 4, '2018-05-19 20:25:28'),
(13, 'Ako jezike ÄoveÄije i anÄ‘elske govorim...', 13, 4, '2018-05-19 20:27:56'),
(14, 'Disksvet <3', 3, 4, '2018-05-19 20:29:02'),
(15, ' Cool :)', 1, 5, '2018-05-19 20:29:32'),
(16, ' Covek je van svog vremena.', 2, 5, '2018-05-19 20:30:12'),
(17, 'Nasi zivoti vise nikada nece biti isti!', 12, 5, '2018-05-19 20:30:43'),
(18, ' Mnjauuuu mnjau. ', 1, 6, '2018-05-19 20:31:40'),
(19, ' Mnjau mjaau majaaaaaaaaau <3', 3, 6, '2018-05-19 20:32:10'),
(20, ' Mnjau!', 12, 6, '2018-05-19 20:32:28'),
(21, ' Mnjauuuuuuuuuuuu grrrrrrrrrrrr.', 13, 6, '2018-05-19 20:32:44'),
(22, ' Obozavam knjige!', 1, 2, '2018-05-19 20:35:28'),
(23, ' Not impressed...', 2, 2, '2018-05-19 20:35:48'),
(24, ' Sve ih volim!', 3, 2, '2018-05-19 20:36:10'),
(25, ' Divno.', 8, 2, '2018-05-19 20:36:29'),
(26, ' Da li verujete?', 12, 2, '2018-05-19 20:36:56'),
(27, ' Google je najbolji!', 12, 2, '2018-05-19 20:37:10'),
(28, ' ...', 13, 2, '2018-05-19 20:37:23'),
(29, ' Google je uvek prvi!', 12, 7, '2018-05-19 21:19:39'),
(30, ' Obozavam Paklenu pomorandzu!', 16, 7, '2018-05-19 21:20:03'),
(31, ' Moj omiljeni glumac!', 17, 7, '2018-05-19 21:20:22'),
(32, ' Sjajno!', 8, 7, '2018-05-19 21:20:43'),
(33, ' Super', 2, 7, '2018-05-19 21:20:56'),
(34, ' Diva. ', 15, 7, '2018-05-19 21:21:14'),
(35, ' Ma, predobro!', 3, 7, '2018-05-19 21:22:50'),
(36, ' Fino.', 13, 7, '2018-05-19 21:23:34'),
(37, ' Bipbipbii\r\n', 1, 8, '2018-05-19 21:39:22'),
(38, ' Zanimljivo', 2, 8, '2018-05-19 21:40:29'),
(39, 'Genijalan covek! ', 3, 8, '2018-05-19 21:41:21'),
(40, 'Ljubav je svuda oko nas', 13, 8, '2018-05-19 21:44:24'),
(41, ' A da li voli macke?', 16, 6, '2018-05-20 08:29:04'),
(42, ' Nema odbrane!', 18, 4, '2018-05-24 08:39:46'),
(43, ' Ja nisam snob.', 18, 4, '2018-05-25 14:05:04'),
(87, ' TakoÄ‘e.', 17, 4, '2018-05-25 16:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `ime` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `naslov` varchar(40) NOT NULL,
  `tekst` text NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`id`, `ime`, `email`, `naslov`, `tekst`, `vreme`) VALUES
(1, 'Dragana', 'gaga@gmail.rs', 'Hej cao', 'Kako si? Sta se radi?', '2018-05-19 22:13:15'),
(2, 'Milica', 'milica@gmail.com', 'Pohvale :)', 'Stvarno ti je super sajt! \r\nSvaka cast.', '2018-05-19 22:14:30'),
(3, 'Pipin', 'pipilica@gmail.com', 'Gladan sam', 'Ja sam gladan, nahrani me, mnjauuuuuuuuu', '2018-05-20 08:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `email` varchar(20) NOT NULL,
  `grad` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `omeni` text NOT NULL,
  `avatar` text NOT NULL,
  `rodjendan` date NOT NULL,
  `citat` text NOT NULL,
  `skola` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `pass`, `email`, `grad`, `tel`, `user`, `reg_date`, `omeni`, `avatar`, `rodjendan`, `citat`, `skola`) VALUES
(1, 'Marko Maric', 'c28aa76990994587b0e907683792297c', 'marko@mare.rs', 'Novi Sad', '069 111- 222', 'markoni', '2018-05-22 07:56:00', '   Cao, ja sam Marko.', '../images/matthew.jpg', '1990-04-17', '', 'Fakultet tehnickih nauka,  Novi Sad'),
(2, 'Minja Roganovic', 'dad6f2b46a34c7a893c3e527e790ecf4', 'minja@minja.rs', 'Trebinje', '069 111- 222', 'minja', '2018-05-19 20:34:49', '  ', '../images/helen.jpg', '1998-08-22', 'Ko se na mleko opeÄe, taj i u jogurt duva.', ''),
(3, 'Aleksandar M.', 'f45731e3d39a1b2330bbf93e9b3de59e', 'sasa@sasa.rs', 'Zemun', '065 342- 231', 'sasa', '2018-05-19 20:14:13', ' Samo Zvezda!!!!!!!!!!!!!!!!!!!!!!', '../images/elyse.jpg', '2000-11-08', 'Napred Zvezda eeeeeeeeeeee', ''),
(4, 'Dragana Grujicic', '21232f297a57a5a743894a0e4a801fc3', 'gaga@maga.com', 'Pancevo', '069 117 - 887', 'admin', '2018-05-22 07:54:50', '   Ja se zovem Dragana, a mama me zove Zlato.                                           ', '../images/gaga.jpg', '0000-00-00', 'Aut viam inveniam aut faciam.', 'RAF'),
(5, 'Ana Ivanovic', '81dc9bdb52d04dc20036dbd8313ed055', 'ana@ana.com', '', '', 'ana', '2018-05-19 20:08:21', ' Cao, ja sam Ana! ', '../images/stevie.jpg', '1992-10-01', '', 'Fakultet likovnih umetnosti'),
(6, 'Pipin Grujicic', '3e764fc41d7bb6fb0a6f21e264f84b89', 'pipin@sirijus.com', 'Pancevo', '', 'pipin', '2018-05-19 18:47:49', '  ', '../images/pipin.jpg', '2017-05-20', 'Cats gravitate to kitchens like rocks gravitate to gravity.', ''),
(7, 'Petar Petrovic', 'd8795f0d07280328f80e59b1e8414c49', 'pera@gmail.com', 'Nis', '', 'pera', '2018-05-19 21:21:49', ' Ja sam Pera. Volim programiranje i kosarku.  ', '../images/elliot.jpg', '1989-06-07', '', 'Tehnicki fakultet'),
(8, 'R2D2', '0dd4e53a27fad7ba4ff3ff7cbf403797', 'biscuitssss@gmail.co', '', '', 'R2D2', '2018-05-19 21:47:37', '  ', '../images/LL.jpg', '2002-04-15', 'May the force be with you!', '');

-- --------------------------------------------------------

--
-- Table structure for table `omeni`
--

CREATE TABLE `omeni` (
  `id` int(11) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `informacije` text NOT NULL,
  `zanimljivosti` text NOT NULL,
  `filmovi` text NOT NULL,
  `knjige` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `omeni`
--

INSERT INTO `omeni` (`id`, `avatar`, `informacije`, `zanimljivosti`, `filmovi`, `knjige`) VALUES
(1, '../omeni/avatar.jpg', 'Cao, ja sam Dragana.', 'Veb dizajn, strani jezici, kuvanje, fotografija, citanje knjiga i naucnih casopisa, filmovi, skriptni jezici, voznja rolera, plivanje.', 'El Laberinto del fauno, El secreto en sus ojos,  Relatos salvajes, Smultronstallet, La piel que habito, Amour, La la land, La vita e bella, Grave of the fireflies, Amelie, Rear window, Prisoners, The prestige, Memento, La vie d\'Adele, A Clockwork Orange, Todo sobre mi madre...', 'Rat i mir, Budenbrokovi, Carobni breg, Dervis i smrt, Portret umetnika u mladosti, Serijal o Disksvetu, Papagejeva teorema, Evgenije Onjegin, Braca Karamazovi, Crveno i crno, Hari Poter, Hobit, Never Let Me Go, Parfem, Zlocin i kazna...');

-- --------------------------------------------------------

--
-- Table structure for table `postovi`
--

CREATE TABLE `postovi` (
  `postovi_id` int(11) NOT NULL,
  `naslov` varchar(100) NOT NULL,
  `tekst` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slika` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postovi`
--

INSERT INTO `postovi` (`postovi_id`, `naslov`, `tekst`, `reg_date`, `slika`) VALUES
(1, 'Najbolja knjiga je ona koje se ne seÄ‡ate', 'Ponovno Äitanje neke knjige posle puno vremena, moÅ¾e dati razliÄite rezultate. MoÅ¾emo se prepustiti priseÄ‡anju na proÅ¡lost, ili u njoj naÄ‡i neke ranije neprimeÄ‡ene dragocenosti ili se, sasvim moguÄ‡e, blago razoÄarati. Kada sam bio mrÅ¡aviji, mlaÄ‘i i donekle temperamentniji, u to vreme je knjiga sa kojom je trebalo paradirati bila â€žNepodnoÅ¡ljiva lakoÄ‡a postojanjaâ€œ od Milana Kundere. SeÄ‡am se kako sam se, krajem osamdesetih godina 20. veka, starao da njene crvene korice vire iz mog dÅ¾epa. Mislio sam da u njoj volim narativno krivudanje i autorski peÄat, filozofsko ispitivanje, ozbiljne reference, politiÄku teÅ¾inu, glamurozni ambijent Praga, refleksije o moguÄ‡nostima i sudbini. (I da, u mom pamÄ‡enju roman se pomeÅ¡ao sa filmom za koji nisam ni siguran da sam ga ikada odgledao do kraja.)', '2018-05-19 20:52:34', 'book.jpg'),
(2, '30 Äinjenica o Ilonu Masku koje Ä‡e vas zapanjiti', 'DÅ¾on Favro, reditelj serijala â€žIron Manâ€œ, priznao je da je njegova verzija Tonija Starka inspirisana Ilonom Maskom. Mask je Äak imao kratko pojavljivanje u drugom delu serijala, i neki delovi filma snimani su u sediÅ¡tu komanije â€žSpaceXâ€œ.', '2018-05-19 20:52:42', 'space.jpg'),
(3, 'Prikaz knjige â€žBoja magijeâ€œ Terija PraÄeta', 'Snaga ove knjige je u tome Å¡to Äitalac umire od nestrpljenja, dok ujedno briÅ¡e suze od smeha. To je odraz velikih pisaca. Poetika spoja nespojivog. Odnosno, meÅ¡anje tihih i glasnih elemenata u knjiÅ¾evnost. Milan Kundera, iako ', '2018-05-19 20:52:50', 'boja.jpg'),
(8, 'Peter Voleben: Nijedna mreÅ¾a nije druÅ¡tvenija od Å¡ume', 'â€žHajde da se zajedno Äudimo.â€œ Å½dralovima koji se sele preko Å panije i tamo svinjama pojedu sav Å¾ir, pa tako ugroÅ¾avaju proizvodnju Å¡unke. Divljim svinjama koje se toliko mnoÅ¾e da se preko glista koje pojedu zaraze smrtonosnim parazitima i tako reguliÅ¡u sopstvenu brojnost. O vukovima koji brinu o Å¡umama i poljima, jer jedu srne i jelene, neprijatelje mladog drveÄ‡a koji stvaraju goleti. O â€žÅ¡umskoj policijiâ€œ, mravima i â€žprestupnicimaâ€œ, kao Å¡to su mikrobi svih vrsta. Moj prijatelj drvo, moj drug Å¾ivotinja, i priroda kao mreÅ¾a koja nas s njima spaja.', '2018-05-19 20:53:05', 'tajni.jpg'),
(12, 'Guglov novi zapanjujuÄ‡i pretraÅ¾ivaÄ Äita na hiljade knjiga i odgovara na sva vaÅ¡a pitanja', 'Zamislite da moÅ¾ete da okupite na hiljade pisaca da raspravljaju o odreÄ‘enoj temi. \r\nGugl je pronaÅ¡ao naÄin da organizuje takvu vrstu foruma â€“ i to u deliÄ‡u sekunde. \r\n\r\nLegendarni futurista, Rej Kurcvel, nedavno je predstavio â€žTalk to Booksâ€œ (â€žPriÄaj sa knjigamaâ€œ) â€“ nov naÄin za pronalaÅ¾enje odgovora na internetu, koji Ä‡e doneti posebno zadovoljstvo istraÅ¾ivaÄima, knjiÅ¡kim moljcima i svakome ko ima potrebu da proÅ¡iri svoja znanja o velikom broju tema.  Ukucajte pitanje u pretraÅ¾ivaÄ â€žTalk to booksâ€œ, i alatka zasnovana na veÅ¡taÄkoj inteligenciji Ä‡e skenirati svaku reÄenicu iz 100.000 tomova koji su sadrÅ¾ani u â€žGoogle booksâ€œ servisu i izdvojiti spisak najprikladnijih odgovora, sa podvuÄenim najznaÄajnijim delovima.', '2018-05-19 20:53:16', 'google.jpg'),
(13, 'Sta je to ljubav?', ' â€ž...onih ljudi koji su sreÄ‡no zaljubljeni ili odbaÄeni. Nakon mukotrpnog istraÅ¾ivanja i ispitivanja njene osnovne hipoteze, FiÅ¡er je zakljuÄila da je ljubav duboko ukorenjena u strukturu ljudskog mozga i u hemijske procese koji se u njemu odvijaju, Å¡to je Äini delom ljudske prirode i univerzalnim ljudskim iskustvom (FiÅ¡er, 2004)â€œ â€“ Iz knjige â€žSexuality and Its Disorders: Development, Cases, and Treatmentsâ€œ (Seksualnost i poremeÄ‡aji seksualnosti: Razvoj, primeri i leÄenjeâ€œ), autora Majka Abramsa...', '2018-05-19 21:01:08', 'ljubav.jpg'),
(14, 'Erih From: UmeÄ‡e ljubavi', 'NemaÄki psihoanalitiÄar, filozof i socijalni psiholog Erih From, tvrdio je u svom remekâ€“delu â€žUmeÄ‡e ljubaviâ€œ da je ljubav aktivnost za koju je potrebno dosta znanja i truda, da se ne dogaÄ‘a sluÄajno, veÄ‡ je za nju potrebno izvesno umeÄ‡e koje se stiÄe dugim i upornim delovanjem.\r\n\r\nFrom piÅ¡e:\r\n\r\nâ€žOva knjiga Å¾eli da pokaÅ¾e da ljubav nije oseÄ‡aj u koji olako moÅ¾e biti bilo ko upuÅ¡ten, bez obzira na to koliki je stepen zrelosti dosegnuo.\r\n\r\nOna Å¾eli da ubedi Äitaoca da su svi njegovi pokuÅ¡aji na ljubav osuÄ‘eni na neuspeh sem ako ne pokuÅ¡a najaktivnije da razvije svoju celokupnu liÄnost, tako da postigne produktivnu orijentaciju; to zadovoljenje individualne ljubavi ne moÅ¾e biti postignuto bez kapaciteta da se voli svoj bliÅ¾nji, bez prave poniznosti, hrabrosti, vere i discipline. U kulturi u kojoj su ovi kvaliteti retki, postizanje sposobnosti da se voli mora ostati retko dostignuÄ‡e. â€œ', '2018-05-19 20:41:54', 'love.jpg'),
(15, 'Bili Holidej: ptica koja je pevala iz svog kaveza', ' Njena tragiÄna sudbina je sluÅ¾ila svima samo ne njoj; bila je inspiracija, nadahnuÄ‡e, predmet Å¾aljenja ili prekora. Mnogi su hteli da budu kao ona, drugi su pak teÅ¾ili da budu sve ostalo Å¡to ona nije, ali istina o slavnoj Bili Holidej, bluz divi, krije se ispod prefinjenih haljina i scenske Å¡minke, ispod slojeva diskriminacije i rasizma, gde mala Lejdi Dej daje svoju poslednju paru ne bi li Äula joÅ¡ koji ton.', '2018-05-19 20:43:42', 'bili.jpg'),
(16, 'Stenli Kjubrik â€“ filmovi bez roka trajanja', 'Kjubrikovi su filmovi veÄ‡inom knjiÅ¾evne adaptacije, karakteristiÄni po svojoj tehniÄkoj savrÅ¡enosti, inventivnom pristupu filmskom scenariju i okrutnoj, ciniÄnoj dosetljivosti. Njegova najpoznatija dela su: Dr. StrendÅ¾lav, 2001: Odiseja u svemiru, Paklena pomorandÅ¾a i Isijavanje.', '2018-05-19 20:45:10', 'stenli.jpg'),
(17, 'NajnagraÄ‘ivaniji glumac svih vremena: Danijel Dej Luis', ' Kako bi prevaziÅ¡ao nivo mimikrije svoju imaginaciju i empatiju usmerio je na razgledanje fotografija iz perioda AmeriÄkog graÄ‘anskog rata. Za Nju Jork Tajms je izjavio da ih je posmatrao kao svoj odraz u ogledalu i tako je pokuÅ¡avao da pogodi ko je ta osoba koja mu uzvraÄ‡a pogled. Tokom snimanja kolege su mu se obraÄ‡ale sa Gospodine PredsedniÄe, dok je on slao pisma koja je potpisivao Linkolnovim inicijalima.', '2018-05-19 20:46:17', 'dan.jpg'),
(18, 'Snobizam â€“ kako se odbraniti od snoba?', 'Snob koristi sve oko sebe kao svoje gedÅ¾ete, svoje partnere, svoju decu, svoje pse. RazmeÄ‡e se reprezentativnim poznanicima i roÄ‘acima kao i svojim poreklom, ukoliko je i ono reprezentativno. Ukoliko nije, zaboravlja ga, kao i one nereprezentativne roÄ‘ake, svoju nereprezentativnu provinciju, palanku, varoÅ¡icu, zaselak, akcenat, srednje ime, prezime, ime, prvog komÅ¡iju, razliku izmeÄ‘u kokoÅ¡ke i prepelice, miris stajskog Ä‘ubriva u vrelo letnje popodne, diskoteku u kojoj se svi meÄ‘usobno poznaju.\r\n\r\nVrlo Äesto snob napuÅ¡ta svoje mesto roÄ‘enja da bi se otisnuo putem uspeha u beli svet gde Ä‡e ga ljudi ceniti po onome Å¡to on zaista jeste. GuÅ¡i ga rodna gruda i zna da niko nije prorok u svom selu. NaÅ¾alost, preÄesto se vraÄ‡a nazad sa malim zaveÅ¾ljajem neispunjenih snova i pravom da do kraja svog snobovskog Å¾ivota sve oko sebe gleda sa visine.', '2018-05-24 08:38:27', 'snobovi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projekti`
--

CREATE TABLE `projekti` (
  `id` int(11) NOT NULL,
  `naslov` varchar(100) NOT NULL,
  `slika` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `opis` mediumtext NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projekti`
--

INSERT INTO `projekti` (`id`, `naslov`, `slika`, `link`, `opis`, `datum`) VALUES
(1, 'Sajt kuÄ‡e Äaja TEA CUP', '../pocetna_slike/projekat-tea.png', '', 'Lorem ipsum dolor sit amet, at est alienum partiendo. Dissentias efficiantur cu sit, nec no impedit verterem voluptatum. Vel ne summo laoreet albucius, ne wisi reque cum. Quo cu doctus invenire, brute dicant meliore usu an. Nec nihil ignota recteque eu, te mei error accusata.\r\n\r\nHas ullum tamquam suavitate no. Sit ei tritani delectus, mnesarchum neglegentur te pro, no diam ponderum his. Sed id labores necessitatibus, eos quis voluptaria ei, ius eu dico feugiat epicuri. Per postea semper luptatum an. Ei qui quas insolens deseruisse.\r\n', '2018-05-17 08:57:39'),
(2, 'Sajt knjiÅ¾are Boja magije', '../pocetna_slike/projekat-magija.png', 'https://magizoologistsnotes.000webhostapp.com/', 'Lorem ipsum dolor sit amet, at est alienum partiendo. Dissentias efficiantur cu sit, nec no impedit verterem voluptatum. Vel ne summo laoreet albucius, ne wisi reque cum. Quo cu doctus invenire, brute dicant meliore usu an. Nec nihil ignota recteque eu, te mei error accusata.\r\n\r\nHas ullum tamquam suavitate no. Sit ei tritani delectus, mnesarchum neglegentur te pro, no diam ponderum his. Sed id labores necessitatibus, eos quis voluptaria ei, ius eu dico feugiat epicuri. Per postea semper luptatum an. Ei qui quas insolens deseruisse.', '2018-05-17 09:29:54'),
(3, 'To-do  or not to-do (lista)', '../pocetna_slike/projekat-todo.png', 'https://codepen.io/__dd__/full/rGrzXx', 'Lorem ipsum dolor sit amet, at est alienum partiendo. Dissentias efficiantur cu sit, nec no impedit verterem voluptatum. Vel ne summo laoreet albucius, ne wisi reque cum. Quo cu doctus invenire, brute dicant meliore usu an. Nec nihil ignota recteque eu, te mei error accusata.\r\n\r\nHas ullum tamquam suavitate no. Sit ei tritani delectus, mnesarchum neglegentur te pro, no diam ponderum his. Sed id labores necessitatibus, eos quis voluptaria ei, ius eu dico feugiat epicuri. Per postea semper luptatum an. Ei qui quas insolens deseruisse.', '2018-05-17 09:53:27'),
(4, 'Projekat Random Quotes', '../pocetna_slike/projekat-randomq.png', 'https://codepen.io/__dd__/full/YxRPRd', 'Lorem ipsum dolor sit amet, at est alienum partiendo. Dissentias efficiantur cu sit, nec no impedit verterem voluptatum. Vel ne summo laoreet albucius, ne wisi reque cum. Quo cu doctus invenire, brute dicant meliore usu an. Nec nihil ignota recteque eu, te mei error accusata.\r\n\r\nHas ullum tamquam suavitate no. Sit ei tritani delectus, mnesarchum neglegentur te pro, no diam ponderum his. Sed id labores necessitatibus, eos quis voluptaria ei, ius eu dico feugiat epicuri. Per postea semper luptatum an. Ei qui quas insolens deseruisse.', '2018-05-17 09:53:20'),
(5, 'Projekat hamburger', '../pocetna_slike/projekat-ham.png', 'https://codepen.io/__dd__/full/mBOmMP/', 'Lorem ipsum dolor sit amet, at est alienum partiendo. Dissentias efficiantur cu sit, nec no impedit verterem voluptatum. Vel ne summo laoreet albucius, ne wisi reque cum. Quo cu doctus invenire, brute dicant meliore usu an. Nec nihil ignota recteque eu, te mei error accusata.\r\n\r\nHas ullum tamquam suavitate no. Sit ei tritani delectus, mnesarchum neglegentur te pro, no diam ponderum his. Sed id labores necessitatibus, eos quis voluptaria ei, ius eu dico feugiat epicuri. Per postea semper luptatum an. Ei qui quas insolens deseruiss', '2018-05-19 21:34:23'),
(6, 'Projekat Gmail app (the concept)', '../pocetna_slike/projekat-gmail.png', '', 'Lorem ipsum dolor sit amet, at est alienum partiendo. Dissentias efficiantur cu sit, nec no impedit verterem voluptatum. Vel ne summo laoreet albucius, ne wisi reque cum. Quo cu doctus invenire, brute dicant meliore usu an. Nec nihil ignota recteque eu, te mei error accusata.\r\n\r\nHas ullum tamquam suavitate no. Sit ei tritani delectus, mnesarchum neglegentur te pro, no diam ponderum his. Sed id labores necessitatibus, eos quis voluptaria ei, ius eu dico feugiat epicuri. Per postea semper luptatum an. Ei qui quas insolens deseruisse.', '2018-05-17 09:05:49'),
(7, 'Projekat Tic-Tac-Toe', '../pocetna_slike/projekat-tik.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum int', '2018-05-17 11:20:35'),
(8, 'Projekat PaintD', '../pocetna_slike/projekat-paint.png', '', 'Lorem ipsum dolor sit amet, ut mediocrem gloriatur philosophia qui, eu graece copiosae vis, aeterno gloriatur consetetur ea duo. Laboramus aliquando est ex. Rebum consul ornatus cum no. Sit hinc dicam in. Ea mei natum fugit vocibus. Quando sensibus forensibus duo cu, ne nibh eruditi nam, pri in malis epicuri.\r\n\r\nEros bonorum in per, an eum brute vituperata, usu ludus vivendo ad. Scripta eruditi patrioque qui te, ei consul tacimates principes mei. Eu per vero quas instructior, ex quo debitis conclusionemque, sea vocent regione meliore te. Eos ex fugit voluptua, graeco laoreet commune ne has. Et ferri ullum everti nec. Est in alii homero labitur, libris comprehensam ut pro, iusto argumentum assueverit sit no.', '2018-05-18 07:53:04'),
(9, 'Projekat Å toperica', '../pocetna_slike/projekat-stop.png', '', ' Lorem ipsum dolor sit amet, ut mediocrem gloriatur philosophia qui, eu graece copiosae vis, aeterno gloriatur consetetur ea duo. Laboramus aliquando est ex. Rebum consul ornatus cum no. Sit hinc dicam in. Ea mei natum fugit vocibus. Quando sensibus forensibus duo cu, ne nibh eruditi nam, pri in malis epicuri.\r\n\r\nEros bonorum in per, an eum brute vituperata, usu ludus vivendo ad. Scripta eruditi patrioque qui te, ei consul tacimates principes mei. Eu per vero quas instructior, ex quo debitis conclusionemque, sea vocent regione meliore te. Eos ex fugit voluptua, graeco laoreet commune ne has. Et ferri ullum everti nec. Est in alii homero labitur, libris comprehensam ut pro, iusto argumentum assueverit sit no.', '2018-05-18 07:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `p_lajkovi`
--

CREATE TABLE `p_lajkovi` (
  `postovi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lajk` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_lajkovi`
--

INSERT INTO `p_lajkovi` (`postovi_id`, `user_id`, `lajk`, `id`) VALUES
(1, 3, 'like', 9),
(1, 4, 'like', 14),
(13, 4, 'like', 15),
(16, 4, 'like', 16),
(18, 4, 'like', 17),
(17, 4, 'like', 18),
(3, 4, 'like', 19),
(2, 4, 'like', 20),
(1, 1, 'like', 21),
(2, 1, 'like', 22),
(8, 1, 'like', 23),
(12, 1, 'like', 24),
(1, 6, 'like', 25),
(8, 6, 'like', 26),
(14, 6, 'like', 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanci`
--
ALTER TABLE `clanci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_lajkovi`
--
ALTER TABLE `g_lajkovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`komentari_id`),
  ADD KEY `postovi_id` (`postovi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `omeni`
--
ALTER TABLE `omeni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postovi`
--
ALTER TABLE `postovi`
  ADD PRIMARY KEY (`postovi_id`);

--
-- Indexes for table `projekti`
--
ALTER TABLE `projekti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_lajkovi`
--
ALTER TABLE `p_lajkovi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanci`
--
ALTER TABLE `clanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `g_lajkovi`
--
ALTER TABLE `g_lajkovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `komentari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `omeni`
--
ALTER TABLE `omeni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `postovi`
--
ALTER TABLE `postovi`
  MODIFY `postovi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `projekti`
--
ALTER TABLE `projekti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `p_lajkovi`
--
ALTER TABLE `p_lajkovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
