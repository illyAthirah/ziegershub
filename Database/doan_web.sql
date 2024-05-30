-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 31, 2022 lúc 05:14 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(40, 'SHIRT'),
(41, 'COAT'),
(42, 'PANTS & JUMPSUIT'),
(43, 'SKIRTS'),
(44, 'DRESSES'),
(45, 'UNDERWEAR');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'QuỳnhLinh', 'dd@gmail.com', 'linh22', '202cb962ac59075b964b07152d234b70', ''),
(5, 'My Tom', 'linh@gmail.com', 'tom2105', 'c56d0e9a7ccec67b4ea131655038d604', '12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(15, 'IVY moda'),
(16, 'Chanel'),
(17, 'Hermès'),
(18, 'Gucci'),
(19, 'Louis Vuitton'),
(20, 'Prada'),
(21, 'Dior'),
(22, 'Burberry'),
(23, 'Dolce &amp; Gabbana'),
(24, 'Ralph Lauren'),
(25, 'Versace'),
(26, 'Armani'),
(27, 'Givenchy'),
(30, 'Bottega Veneta'),
(31, 'MESSI');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `namebl` varchar(30) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `dateComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `namebl`, `comment`, `productId`, `dateComment`) VALUES
(41, 'manhne', 'very nice', 71, ''),
(42, 'manhne', 'hi', 71, ''),
(43, 'manhne', 'awesome', 71, ''),
(44, 'thuy122', 'okebyby', 71, ''),
(45, 'thuy122', 'hihihi', 71, ''),
(46, 'thuy122', 'hh', 71, ''),
(47, 'thuy122', 'amazing product', 70, ''),
(48, 'thuy122', 'Product looks great', 71, ''),
(49, 'thuy122', 'so beautiful, dear', 58, ''),
(50, 'thuy122', 'okay baby', 58, ''),
(51, 'thuy122', 'abc', 56, ''),
(52, 'thuy122', 'rock', 71, ''),
(53, 'thuy122', 'adasd', 71, ''),
(54, 'thuy122', 'Very nice sandals', 55, '31/05/2022'),
(55, 'thuy122', 'scratch', 55, '31/05/2022'),
(56, 'khanhlinh', 'beautiful product', 81, '31/05/2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `recieve_time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`orderId`, `productId`, `size`, `price`, `image`, `quantity`, `total`, `userId`, `order_time`, `recieve_time`, `status`) VALUES
(56, 74, 'M', '6000000', '936e95c02b.jpg', 2, 12000000, 5, '2022-05-30 11:04:55', '2022-05-30 11:12:50', 4),
(57, 74, 'M', '6000000', '936e95c02b.jpg', 1, 6000000, 5, '2022-05-30 11:23:16', '2022-05-30 11:23:32', 4),
(58, 74, 'M', '6000000', '936e95c02b.jpg', 1, 6000000, 5, '2022-05-30 11:26:18', '0000-00-00 00:00:00', -1),
(59, 81, 'M', '1190000', 'f29695aac5.jfif', 19, 22610000, 5, '2022-05-31 00:51:26', '2022-05-31 00:52:29', 2),
(60, 77, 'L', '750000', '3a92fe9b64.jfif', 7, 5250000, 5, '2022-05-31 00:51:26', '2022-05-31 00:52:29', 2),
(61, 96, 'XL', '990000', 'f5a062b608.jfif', 2, 1980000, 5, '2022-05-31 00:51:26', '2022-05-31 00:52:29', 2),
(62, 88, 'M', '1690000', 'c6e718b57c.jfif', 3, 5070000, 5, '2022-05-31 00:51:26', '2022-05-31 00:52:29', 2),
(63, 79, 'S', '1369000', '428bb42f4d.jfif', 3, 4107000, 5, '2022-05-31 00:51:26', '2022-05-31 00:52:29', 2),
(64, 82, 'M', '1490000', 'a5f20177f0.jfif', 5, 7450000, 5, '2022-05-31 00:51:26', '2022-05-31 00:52:29', 2),
(65, 92, 'L', '1190000', 'ce32e86223.jfif', 6, 7140000, 5, '2022-05-31 00:51:26', '2022-05-31 00:52:29', 2),
(66, 91, 'M', '1090000', 'bd9400c2f4.jpg', 4, 4360000, 5, '2022-05-31 00:51:26', '2022-05-31 00:52:29', 2),
(67, 93, 'M', '1745000', '2b18d3adeb.jfif', 1, 1745000, 5, '2022-05-31 00:51:26', '2022-05-31 00:52:29', 2),
(68, 98, 'M', '548000', '59848e5c59.jfif', 10, 5480000, 5, '2022-05-31 00:57:50', '2022-05-31 00:58:35', 2),
(69, 95, 'M', '790000', '63afc5eb72.jfif', 5, 3950000, 5, '2022-05-31 00:57:50', '2022-05-31 00:58:35', 2),
(70, 103, 'M', '390000', '3e372328c0.jfif', 7, 2730000, 5, '2022-05-31 00:57:50', '2022-05-31 00:58:35', 2),
(71, 100, 'XL', '598000', '5a320bc109.jfif', 13, 7774000, 5, '2022-05-31 00:57:50', '2022-05-31 00:58:35', 2),
(72, 88, 'L', '1690000', 'c6e718b57c.jfif', 13, 21970000, 5, '2022-05-31 00:57:50', '2022-05-31 00:58:35', 2),
(73, 84, 'M', '950000', '7c81aa945b.jfif', 7, 6650000, 5, '2022-05-31 00:57:50', '2022-05-31 00:58:35', 2),
(74, 89, 'M', '1790000', '8ec266b465.jfif', 1, 1790000, 5, '2022-05-31 00:57:50', '2022-05-31 00:58:35', 2),
(75, 102, 'L', '698000', '5567c155a3.jfif', 1, 698000, 5, '2022-05-31 00:57:50', '2022-05-31 00:58:35', 2),
(76, 92, 'XL', '1190000', 'ce32e86223.jfif', 3, 3570000, 5, '2022-05-31 00:57:50', '2022-05-31 00:58:35', 2),
(77, 103, 'S', '390000', '3e372328c0.jfif', 4, 1560000, 8, '2022-05-31 07:59:05', '0000-00-00 00:00:00', 1),
(78, 77, 'M', '750000', '3a92fe9b64.jfif', 3, 2250000, 8, '2022-05-31 07:59:16', '0000-00-00 00:00:00', 0),
(79, 81, 'S', '1190000', 'f29695aac5.jfif', 6, 7140000, 10, '2022-05-31 09:40:40', '2022-05-31 09:41:17', 3),
(80, 88, 'S', '1690000', 'c6e718b57c.jfif', 11, 18590000, 10, '2022-05-31 09:40:40', '2022-05-31 09:41:17', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pro`
--

CREATE TABLE `pro` (
  `ID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `pro`
--

INSERT INTO `pro` (`ID`, `productName`) VALUES
(1, 'name'),
(2, 'tuấn'),
(3, 'tuấn'),
(4, 'tuấn'),
(5, 'tuấn'),
(6, 'tuấn'),
(7, 'ava'),
(8, 'ava'),
(9, 'cấcc'),
(10, 'cấcc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productId` int(100) NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(110) NOT NULL,
  `brandId` int(110) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` bigint(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `typeProductId` int(100) NOT NULL,
  `quantity` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`, `typeProductId`, `quantity`) VALUES
(55, 'Gucci Logo-Patch Polo Shirt Green Color', 40, 18, 'Gucci Logo-Patch Polo Shirt Green Color is a fashionable shirt for men from the famous brand Gucci. With a modern design and intricate pattern, the Gucci Logo-Patch Shirt is sought after by many fashion enthusiasts.', 0, 11000000, 'a5ce1e5572.jpg', 28, 0),
(56, 'Gucci Bomber Jacket Navy Blue Size ', 41, 18, 'Gucci Bomber Jacket Navy Blue Size 44', 0, 5000000, '860d19c990.jpg', 34, 0),
(57, 'Gucci Bomber Jacket Black Size', 41, 18, 'Gucci Bomber Jacket Black is a fashionable jacket for men from the famous brand Gucci. With a modern design and high-quality material, the Gucci Black Bomber Jacket is sought after by many fashion enthusiasts.', 0, 6000000, '48babe3b85.jpg', 34, 0),
(58, 'Gucci White Cotton Snake Embroidered Collar Duke Shirt', 40, 18, 'Gucci White Cotton Snake Embroidered Collar Duke Shirt Size 38 is a fashionable shirt for men from the famous brand Gucci. With a modern design and intricate pattern, the Gucci White Cotton Snake Embroidered Collar Duke Shirt is sought after by many fashion enthusiasts.', 0, 11500000, 'a84d252252.jpg', 29, 0),
(59, 'Gucci Sweater 595514 XKA0Z 4206 Navy Blue Color', 41, 18, 'Gucci Sweater 595514 XKA0Z 4206 Navy Blue Color is a fashionable sweater for men from the famous brand Gucci. With a modern design and high-quality material, the Gucci Sweater 595514 XKA0Z 4206 Navy Blue Color is sought after by many fashion enthusiasts.', 0, 300000, '3dec240203.jpg', 34, 5),
(60, 'Gucci Web Stripe-Detail Polo Shirt Black Color', 40, 18, 'Gucci Web Stripe-Detail Polo Shirt Black Color is a fashionable shirt for men from the famous brand Gucci. With a modern design and high-quality material, the Gucci Web Stripe-Detail Polo Shirt is sought after by many fashion enthusiasts.', 0, 1125600, '1b792b54ed.jpg', 29, 7),
(61, 'Gucci Reversible Nylon GG Bomber Jacket Orange', 41, 18, 'Gucci Reversible Nylon GG Bomber Jacket Orange is a fashionable jacket for men from the famous brand Gucci. With a modern design and high-quality material, the Gucci Reversible Nylon GG Bomber Jacket Orange is sought after by many fashion enthusiasts.', 0, 2560000, '3354fdf70d.jpg', 34, 0),
(62, 'Gucci Cotton Shirt With Symbols White Color ', 40, 18, 'Gucci Cotton Shirt With Symbols White Color is a fashionable shirt for men from the famous brand Gucci. With a modern design and intricate pattern, the Gucci Cotton Shirt With Symbols is sought after by many fashion enthusiasts.', 0, 25600000, '0bedfbdb7f.jpg', 29, 0),
(63, 'Gucci Bee-Embroidered Slim-Fit Stretch-Cotton Polo Shirt New SS2019 Black Color', 40, 18, 'Gucci Bee-Embroidered Slim-Fit Stretch-Cotton Polo Shirt New SS2019 Black Color features a button-down collar, short sleeves, and the distinctive Gucci bee motif, creating a dynamic, youthful look that is also elegant and sophisticated.', 0, 25600000, 'c0f99931c5.jpg', 28, 0),
(64, 'Gucci Polo Shirt Blue with Red Trim', 40, 18, 'Gucci Polo Shirt Blue with Red Trim features a button-down collar, short sleeves, creating a dynamic, youthful look that is also elegant and sophisticated. Made of 100% cotton, the shirt is soft, smooth, and breathable, providing a comfortable feel for the wearer.', 0, 9000000, 'd9c66c0f90.jpg', 28, 0),
(65, 'PARKA', 41, 30, 'Parka jacket with hood made of linen and linen\r\n\r\n• Layered triangular wave-stitched hand-sewn lining is removable\r\n\r\n• Concealed zipper and button closure\r\n\r\n• Oversized fit\r\n\r\n Material: 60% cotton, 40% canvas\r\n• Color: Blush\r\n Made in: Italy', 0, 30000000, '5681815b98.jpg', 34, 0),
(66, 'T-SHIRT', 40, 30, 'Dyed T-shirt\r\n\r\n• Embroidered multicolor "Bottega" logo on the back\r\n\r\n• Slim fit\r\n\r\n Material: 100% cotton\r\n• Color: Kiwi\r\n Made in: Italy', 0, 560000, 'bee7eedaa2.jpg', 29, 101),
(67, 'COAT', 41, 30, '• Layered intarsia triangle wave-stitched hand-sewn coat\r\n\r\n• Fabric belt\r\n\r\n• No trim • Regular fit\r\n\r\n Material: 100% wool\r\n• Color: Parakeet / Kiwi\r\n Made in: Italy\r\n\r\nStyle: 647708V1KV07072', 0, 9600000, '0c5a4419ed.jpg', 34, 10),
(68, 'SHORTS', 42, 30, 'Straight denim shorts made of soft denim fabric with a button fly closure\r\n\r\n• Button closure\r\n\r\n Material: 100% cotton\r\n• Color: Indigo\r\n Made in: Italy', 0, 890000, 'b416b41575.jpg', 38, 10),
(69, 'JACKET', 41, 30, 'Knitted denim jacket with long button fly closure\r\n\r\n• Button closure •\r\n\r\nNo trim\r\n\r\n• Regular fit\r\n\r\n Material: 92% Cotton, 8% Polyester\r\n• Color: Navy blue\r\n Made in: Italy', 0, 7000000, '159cf726ce.jpg', 34, 0),
(70, 'DRESS', 44, 30, 'Cross-knitted translucent dress with viscose ottoman blend\n\n• Zip closure • No trim • Regular fit\n\n Material: 63% Polyester, 37% Viscose\n• Colors: White / Black\n Manufactured in: Italy', 1, 852000, 'bf3ee98a96.jpg', 45, 5),
(71, 'Women Dress', 43, 30, 'Soft cross-knitted dress with chintz finish\n\n• Tassel trim around neckline\n\n• Comfortable regular fit\n\n Material: 100% Polyester\n• Color: Black\n Manufactured in: Italy', 1, 890000, '45b2b29d11.jpg', 42, 5),
(72, 'Knit Sweater', 41, 30, 'Intreccio pattern knit sweater with cotton blend\n\n• Button closure\n\n• Regular fit\n\n Material: 61% Polyamide, 39% Cotton\n• Color: Parakeet\n Manufactured in: Italy', 1, 589000, '6facb4dc25.jpg', 34, 70),
(73, 'Womens Shorts', 42, 30, 'Cotton-blend lined shorts\n\n• Elastic waistband with embroidered logo\n\n Material: 100% cotton\n• Color: White\n Manufactured in: Italy', 1, 4560000, '7ae82fe310.jpg', 39, 0),
(74, 'Shirt', 40, 30, 'Stretch poplin shirt\n\n• Button closure\n\n• Regular fit\n\n Material: 96% Cotton, 4% Elastane\n• Color: Parakeet\n Manufactured in: Italy', 1, 6000000, '936e95c02b.jpg', 29, 698),
(75, 'CROPTOP SHIRT WITH FRONT POCKET', 40, 15, 'German-collar cropped shirt with mid-length and short sleeves. Along the shirts body are concealed buttons. There are 2 square pockets with fake buttons on the front.', 1, 1090000, '7f4f581ada.jfif', 29, 100),
(76, 'LOOSE PANTS WITH EMBROIDERED EDGE POCKETS', 42, 16, 'The embroidered edge will come in random colors (pink, red, black, white). Loose-fitting pants, ankle-length. The main material is thick Tuysi. There are concealed buttons on the waistband. There are 2 box pockets on the front, and the edge is embroidered with raised stitching.', 1, 800000, 'b65d52f15c.jfif', 39, 100),
(77, 'MONGTOGHI TSHIRT', 40, 16, 'Croptop-style V-neck T-shirt, short sleeves, Mongtoghi style. The shirt is fitted, with mini wavy buttons on the front.', 1, 750000, '3a92fe9b64.jfif', 28, 93),
(78, 'HEART COLLAR DRESS WITH WAIST BOW', 44, 15, 'Long heart collar dress. The dress body is created from 2 crossed flaps and the waist is secured by an adjustable bow. Sleeveless dress, the belt extends to cover the wearers shoulders.', 1, 1590000, 'dc7d439423.jfif', 46, 100),
(79, 'ALINE DRESS WITH METAL CHAIN STRAPS', 44, 21, 'A-line dress, V-neck. Sleeveless dress design. The front chest area is twisted and combined with small gold metal chains. The dress silhouette has a fitted waist and flows freely.', 1, 1369000, '428bb42f4d.jfif', 46, 997),
(80, 'Silk Shirt', 40, 21, 'Straight-cut silk shirt. German collar, long sleeves. Plain color combination.', 1, 1090000, '62e5238c9d.jfif', 29, 123),
(81, 'Shirt with Large Bow', 40, 19, 'Shirt made of lightweight voile material. Loose-fit shirt, wide sleeves are cuffed at the ends. Metal buttons with golden hue along the shirt body. The shirt collar is adorned with a large bow tie. The set includes an inner shirt with 2 straps.', 1, 1190000, 'f29695aac5.jfif', 29, 138),
(82, 'Embroidered Silk Shirt', 40, 22, 'Straight-cut silk shirt, round collar. Sleeves gradually tapered at the cuffs. The shirt body features raised embroidered grass motifs.', 1, 1490000, 'a5f20177f0.jfif', 29, 1232),
(83, 'Silk Shirt with Ruffle', 40, 19, 'Classic German-collar shirt style. Sleeveless design, loose fit. Large ruffles along the button border. Made of high-quality silk and soft voile.', 1, 850000, '98d199e397.jfif', 29, 769),
(84, 'Pearl Bow Shirt', 40, 16, 'German-collar shirt. Voile material. Short, slightly puffy sleeves, cuffed at the ends. Metal snap buttons on the front. Adorned with pearl bow tie on the collar. The collar, sleeve edges, and button borders are coordinated in the same color.', 1, 950000, '7c81aa945b.jfif', 29, 73),
(85, 'Silk Shirt with Heart Embellishment', 40, 15, 'Loose-fit shirt design, boat neckline, long sleeves. The collar is adorned with small ruffles. Both sleeves are designed with large ruffle layers and embellished with delicate heart accessories. The back of the collar has a', 1, 1590000, '35105a5e9a.jfif', 29, 964),
(86, '4-Button Velvet Blazer', 41, 19, 'Blazer jacket, velvet fabric, double lapel collar with K-shaped notches, long sleeves with belts. 2 diagonal pockets on both sides. 4 buttons on the front. Through meticulous details such as sharp shoulder curves, button rows, and precise centimeter measurements, it brings', 1, 1953000, '0f80304c03.jfif', 35, 14),
(87, 'Velvet Blazer', 41, 20, 'Blazer jacket, velvet fabric, double lapel collar with K-shaped notches, long sleeves with belts. 2 diagonal pockets on both sides. 4 buttons on the front. Through meticulous details such as sharp shoulder curves, button rows, and precise centimeter measurements, it brings', 1, 1953000, '694bc64b29.jfif', 35, 324),
(88, 'Smooth Silk Jumpsuit', 42, 16, 'Plain straight-cut jumpsuit. Sleeveless top, draped from front to back. Straight, wide-legged pants, ankle-length. 2 diagonal pockets on both sides. Made of silk.', 1, 1690000, 'c6e718b57c.jfif', 41, 11),
(89, 'Vest Jumpsuit with Belt', 42, 22, 'Designed with a loose-fit jumpsuit, cinched at the waist with a belt. The top features a vest-style collar, short sleeves with rolled cuffs. Straight-legged pants, ankle-length. Made of soft, slightly glossy silk.', 1, 1790000, '8ec266b465.jfif', 41, 40),
(90, 'ÁO SƠ MI KẺ CHẤT LỤA', 40, 15, 'Áo sơ mi dáng ôm, thân áo có độ đứng. Thiết kế cổ đức. Phía trước có 2 túi hộp phối cùng khuy kim loại. Tại phần khủy tay có khuy để cài cố định khi gập ống tay. Tà áo dáng đuôi tôm xẻ ở 2 bên.\r\n\r\n\r\n\r\n\r\n', 1, 1490000, '15177fd3b3.jpg', 29, 4234),
(91, 'MENS KHAKI TROUSERS WITH DRAWSTRING', 42, 19, 'Khaki trousers with elasticated cuffs and drawstring waistband. Featuring front pockets and 2 flap pockets at the back.', 0, 1090000, 'bd9400c2f4.jpg', 39, 70),
(92, 'JEANS', 42, 15, 'Long jeans with a slim fit design, comfortable and easy to move in. Features include a youthful and dynamic design with box pockets at the back and 2 slanted pockets on the sides. Highly versatile for wearers.', 0, 1190000, 'ce32e86223.jfif', 38, 49),
(93, 'STRIPED SUIT JACKET', 41, 21, 'Double-breasted striped suit jacket. Long sleeves with 4 buttons. Includes 1 chest pocket, 2 square flap pockets on each side, and 3 interior pockets. Features 2 front buttons for closure. Split hem at the back.', 0, 1745000, '2b18d3adeb.jfif', 36, 4563),
(94, 'MENS LONG COAT', 41, 23, 'Long coat with a double K-shaped collar. Long sleeves with 3 decorative buttons. 2 square pockets with flaps on each side. Loose-fitting silhouette. Button closure at the front. Made with premium pressed wool material, soft, warm, dust-free, fashionable design, elegant style.', 0, 3690000, 'befc208b26.jfif', 34, 48),
(95, 'GERMAN COLLAR POLO SHIRT', 40, 19, 'Made with cotton fabric and a short-sleeved design, providing comfort and coolness for the wearer.', 0, 790000, '63afc5eb72.jfif', 28, 68),
(96, 'MENS JEANS SHORTS', 42, 27, 'Regular fit black denim shorts. Features 5 pockets. Waistband with zipper and metal button, with a stylish front rip. Modern black color, suitable for street fashion.', 0, 990000, 'f5a062b608.jfif', 38, 4),
(98, 'MATCHING T-SHIRT AND SHORTS SET', 40, 19, 'A set comprising a short-sleeved shirt and shorts of the same color. The color of the set will be randomly assigned.', 2, 548000, '59848e5c59.jfif', 28, 42),
(99, 'BOW SHORTS', 42, 18, 'Stretchy shorts, thigh length. Slightly slim fit. Adorable bow tie at the front. Made of breathable, lightweight fabric.', 2, 450000, 'c1a7aa790d.jfif', 40, 73),
(100, 'COOL GIRL HAVE FUN T-SHIRT AND SHORTS SET', 40, 16, 'Set includes a short-sleeved shirt and shorts. Loose-fitting shirt with short sleeves, featuring a cute print on the front. Short shorts with elastic waistband, slant pockets on the front, matching print with the shirt.', 2, 598000, '5a320bc109.jfif', 40, 597987),
(101, 'TIE DYE T-SHIRT AND SHORTS SET', 43, 18, 'Set includes a short-sleeved shirt and shorts. Tie dye pattern. The front of the shirt has quotes printed with raised material. Shorts have box pockets on both sides.', 2, 739000, 'cbb5f00d61.jfif', 50, 346),
(102, 'CROSSBODY BAG PRINT T-SHIRT AND SHORTS SET', 40, 15, 'A spacious and breathable t-shirt set for boys. Unique crossbody bag print making the outfit more eye-catching. Suitable for school or family outings.', 2, 698000, '5567c155a3.jfif', 28, 11),
(103, 'DINO PRINT KHAKI SHORTS FOR KIDS', 40, 16, 'Khaki shorts featuring cute dino prints. Light, loose-fitting design for comfort. Elastic waistband with faux zipper lock, cute and suitable for everyday wear.', 2, 390000, '3e372328c0.jfif', 41, 64);


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `repcomment`
--

CREATE TABLE `repcomment` (
  `id` int(11) NOT NULL,
  `nameId` int(11) NOT NULL,
  `rep` varchar(255) NOT NULL,
  `namerep` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `repcomment`
--

INSERT INTO `repcomment` (`id`, `nameId`, `rep`, `namerep`) VALUES
(1, 43, 'hay quas chij', ' thuy122'),
(2, 43, 'oichi', ' thuy122'),
(3, 43, 'oichi', ' thuy122'),
(4, 46, 'hhh', ' thuy122'),
(5, 47, 'hihi', ' thuy122'),
(6, 46, 'hihimNH', ' thuy122'),
(7, 45, 'anh manh rat deptrai', ' thuy122'),
(8, 41, 'an com ddi', ' thuy122'),
(9, 48, 'droi', ' thuy122'),
(10, 48, 'cc', ' thuy122'),
(11, 48, 'cc', ' thuy122'),
(12, 48, 'cc', ' thuy122'),
(13, 48, 'cc', ' thuy122'),
(14, 48, 'cc', ' thuy122'),
(15, 46, 'oke', ' thuy122'),
(16, 49, 'thank', ' thuy122'),
(17, 50, 'tim', ' thuy122'),
(18, 53, 'dkfjskdjf', ' thuy122'),
(19, 53, 'lkifpkakfpas', ' thuy122');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_product`
--

CREATE TABLE `type_product` (
  `typeProductID` int(100) NOT NULL,
  `typeProductName` varchar(255) NOT NULL,
  `catID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `type_product`
--

INSERT INTO `type_product` (`typeProductID`, `typeProductName`, `catID`) VALUES
(28, 'T-shirt', 40),
(29, 'Shirt', 40),
(30, 'Peplum top', 40),
(31, 'Blouse', 40),
(32, 'Crop top', 40),
(33, 'Sweater', 40),
(34, 'Jacket', 41),
(35, 'Blazer', 41),
(36, 'Vest', 41),
(37, 'Trench coat', 41),
(38, 'Jeans', 42),
(39, 'Trousers', 42),
(40, 'Shorts', 42),
(41, 'Jumpsuit', 42),
(42, 'Skirt', 43),
(43, 'Pleated skirt', 43),
(44, 'A-line skirt', 43),
(45, 'Dress', 44),
(46, 'Maxi dress', 44),
(47, 'T-shirt dress', 44),
(48, 'Evening gown', 44),
(49, 'Underwear', 45),
(50, 'Bra', 45),
(51, 'Panties', 45),
(52, 'Pyjamas', 45),
(53, 'Bikini', 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNum` int(11) NOT NULL,
  `dateOfBirth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `secQuestion` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userId`, `name`, `username`, `userPassword`, `email`, `gender`, `phoneNum`, `dateOfBirth`, `address`, `secQuestion`) VALUES
(5, 'Nguyễn Thanh Name', 'thuy122', '202cb962ac59075b964b07152d234b70', 'linh2106@gmail.com', 'Female', 981984623, '2002-06-21', 'Hồ Chí Minh', 'Thanh'),
(7, 'Quan Văn Mạnh', 'manhne', '202cb962ac59075b964b07152d234b70', 'quanmanh901@gmail.com', 'nam', 899391826, '18-04-2002', '309/1/4 Lê Đức Thọ', '0909'),
(8, 'Quan Văn Mạnh', 'manh22', '202cb962ac59075b964b07152d234b70', 'manh2106@gmail.com', 'Nam', 981984623, '2002-21-06', 'Hồ Chí Minh', 'Thanh'),
(10, 'Phạm Khánh Linh', 'khanhlinh', '202cb962ac59075b964b07152d234b70', 'nguyenthanhquynhlinh@gmail.com', 'Nam', 981984623, '2002-21-06', 'Hồ Chí Minh', 'Thanh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `productId` (`productId`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `pro`
--
ALTER TABLE `pro`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `catId` (`catId`),
  ADD KEY `typeProductId` (`typeProductId`);

--
-- Chỉ mục cho bảng `repcomment`
--
ALTER TABLE `repcomment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nameId` (`nameId`);

--
-- Chỉ mục cho bảng `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`typeProductID`),
  ADD KEY `type_product_ibfk_1` (`catID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `pro`
--
ALTER TABLE `pro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `repcomment`
--
ALTER TABLE `repcomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `type_product`
--
ALTER TABLE `type_product`
  MODIFY `typeProductID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`catId`) REFERENCES `category` (`catId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`typeProductId`) REFERENCES `type_product` (`typeProductID`);

--
-- Các ràng buộc cho bảng `repcomment`
--
ALTER TABLE `repcomment`
  ADD CONSTRAINT `repcomment_ibfk_1` FOREIGN KEY (`nameId`) REFERENCES `comment` (`id`);

--
-- Các ràng buộc cho bảng `type_product`
--
ALTER TABLE `type_product`
  ADD CONSTRAINT `type_product_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `category` (`catId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
