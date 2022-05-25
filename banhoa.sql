-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 04:04 PM
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
-- Database: `banhoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `billname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(10) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `billname`, `address`, `tel`, `email`, `total`) VALUES
(1, 'ff', 'gg', 0, 'lethiminhhieu2106@gmail.com', 500000),
(2, 'ff', 'gg', 0, 'lethiminhhieu2106@gmail.com', 0),
(3, 'ff', 'gg', 0, 'lethiminhhieu2106@gmail.com', 0),
(4, 'ff', 'gg', 0, 'lethiminhhieu2106@gmail.com', 500000),
(5, 'ff', 'gg', 0, 'lethiminhhieu2106@gmail.com', 3000000),
(6, 'ff', 'gg', 0, 'hieule.31191025549@st.ueh.edu.vn', 400000),
(7, 'ff', 'gg', 0, 'lethiminhhieu2106@gmail.com', 3000000),
(8, 'ff', 'gg', 0, 'hieule.31191025549@st.ueh.edu.vn', 2000000),
(9, 'ff', 'gg', 0, 'hieule.31191025549@st.ueh.edu.vn', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `OrderID` int(50) NOT NULL,
  `tensp` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `hinhsp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `donggia` int(20) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL DEFAULT 0,
  `thanhtien` int(12) NOT NULL DEFAULT 0,
  `idbill` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`OrderID`, `tensp`, `hinhsp`, `donggia`, `soluong`, `thanhtien`, `idbill`) VALUES
(1, '2', '0', 0, 0, 0, 0),
(3, 'Cùng nhau', 'https://hoatuoi360.vn/uploads/file/Hoa%20c%E1%BA%A7m%20tay%20c%C3%B4%20d%C3%A2u/hoatuoi360-%20Ta%20l', 500000, 1, 500000, 0),
(4, 'Cùng nhau', 'https://hoatuoi360.vn/uploads/file/Hoa%20c%E1%BA%A7m%20tay%20c%C3%B4%20d%C3%A2u/hoatuoi360-%20Ta%20l', 500000, 1, 500000, 0),
(5, 'Phát lộc', 'https://hoatuoi360.vn/uploads/file/hoa%20chuc%20mung%20khai%20truong/hoa-khai-truong-hoatuoi360-02(1', 3000000, 1, 3000000, 0),
(6, 'Sức khỏe', 'https://hoatuoi360.vn/uploads/file/hoatuoi360-hoa%20hop%20go%20chuc%20mung%20102.jpg', 400000, 1, 400000, 0),
(7, 'Phát lộc', 'https://hoatuoi360.vn/uploads/file/hoa%20chuc%20mung%20khai%20truong/hoa-khai-truong-hoatuoi360-02(1', 3000000, 1, 3000000, 0),
(8, 'Hạnh phúc', 'https://hoatuoi360.vn/uploads/file/hoatuoi360-%20bo%20hoa%20co%20dau%202.jpg', 2000000, 1, 2000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categogy`
--

CREATE TABLE `categogy` (
  `CateID` int(20) NOT NULL,
  `CateName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Picture` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categogy`
--

INSERT INTO `categogy` (`CateID`, `CateName`, `Picture`) VALUES
(1, 'Hoa cưới', 'https://hoatuoiletan.com/uploads/LargeImages/b01f1949-ae14-404e-b026-a2eaab5c9f1a.jpg'),
(2, 'Hoa khai trương', 'http://hoatuoi9x.com/wp-content/uploads/2021/06/kt2.jpg'),
(3, 'Chúc mừng', 'https://hoahanoi.com.vn/wp-content/uploads/2020/02/gi%E1%BB%8F-hoa-ch%C3%BAc-m%E1%BB%ABng-%C4%91%E1%BA%B9p-nh%E1%BA%A5t.jpeg'),
(4, 'Chia buồn', 'https://happyflower.vn/tin-tuc/app/uploads/hoa-tang-le-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `prID` int(20) NOT NULL,
  `PrName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PrPrice` int(100) NOT NULL,
  `PrSaleoff` int(10) DEFAULT NULL,
  `PrContent` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `PrDecription` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `CateID` int(20) NOT NULL,
  `Picture` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Note` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`prID`, `PrName`, `PrPrice`, `PrSaleoff`, `PrContent`, `PrDecription`, `CateID`, `Picture`, `Note`) VALUES
(1, 'Hạnh phúc', 2000000, NULL, 'Hoa là một phần cực kỳ quan trọng trong lễ cưới, đặc biệt là bó hoa cưới cầm tay cô dâu. Hoa trong ngày cưới không chỉ là để trang trí mà bó hoa cưới cũng như màu sắc của hoa trang trí trong buổi tiệc cưới còn thể hiện tính cách của cô dâu, giúp cô dâu chú rể bộc lộ tính cách, cũng như niềm tin vào cuộc sống hôn nhân. Mỗi loại hoa đều có ngôn ngữ riêng và mang những ý nghĩa nhất định, rất dễ thương.', 'Hoa cưới hạnh phúc với những bông hoa hồng tượng trưng cho tình yêu và hạnh phúc vĩnh cửu mang ý nghĩa chúc các cặp đôi trăm năm hạnh phúc. Hoa cưới hạnh phúc với những bông hoa hồng tượng trưng cho tình yêu và hạnh phúc vĩnh cửu mang ý nghĩa chúc các cặp đôi trăm năm hạnh phúc.Hoa là một phần cực kỳ quan trọng trong lễ cưới, đặc biệt là bó hoa cưới cầm tay cô dâu. Hoa trong ngày cưới không chỉ là để trang trí mà bó hoa cưới cũng như màu sắc của hoa trang trí trong buổi tiệc cưới còn thể hiện tính cách của cô dâu, giúp cô dâu chú rể bộc lộ tính cách, cũng như niềm tin vào cuộc sống hôn nhân. Mỗi loại hoa đều có ngôn ngữ riêng và mang những ý nghĩa nhất định, rất dễ thương.', 1, 'https://hoatuoi360.vn/uploads/file/hoatuoi360-%20bo%20hoa%20co%20dau%202.jpg', 'BC'),
(2, 'Cùng nhau', 500000, NULL, 'Do đó, việc chọn được một loại hoa cưới phù hợp không chỉ giúp cô dâu trở nên xinh đẹp, lộng lẫy hơn mà còn góp phần giúp cho ngày trọng đại trở nên trọn vẹn và ý nghĩa. Đối với các cô nàng yêu thích màu trắng và sự tinh khôi thì bó hoa này tạo ra dành cho bạn. Tông trắng chủ đạo và sắc xanh điểm xuyến thích hợp cho mọi cô gái trong ngày cưới của mình. ', 'Đối với các cô nàng yêu thích màu trắng và sự tinh khôi thì bó hoa này tạo ra dành cho bạn. Tông trắng chủ đạo và sắc xanh điểm xuyến thích hợp cho mọi cô gái trong ngày cưới của mình.Đối với người con gái, khoảnh khắc hạnh phúc nhất trong đời chính là được mặc váy cưới, cầm đóa hoa trên tay và cùng người đàn ông của đời mình bước vào lễ đường. Do đó, việc chọn được một loại hoa cưới phù hợp không chỉ giúp cô dâu trở nên xinh đẹp, lộng lẫy hơn mà còn góp phần giúp cho ngày trọng đại trở nên trọn vẹn và ý nghĩa. Đối với các cô nàng yêu thích màu trắng và sự tinh khôi thì bó hoa này tạo ra dành cho bạn. Tông trắng chủ đạo và sắc xanh điểm xuyến thích hợp cho mọi cô gái trong ngày cưới của mình. ', 1, 'https://hoatuoi360.vn/uploads/file/Hoa%20c%E1%BA%A7m%20tay%20c%C3%B4%20d%C3%A2u/hoatuoi360-%20Ta%20la%20cua%20nhau%202.jpg', ''),
(3, 'Forever', 1000000, NULL, 'Sự quyến rũ Foverer của hoa hồng da điểm xuyến thêm lá bạc nhập khẩu mang đến cảm giác vừa quyến rũ vừa ngây ngô là điểm nhấn của “foverer”.Ngày cưới là ngày quan trọng nhất trong cuộc đời của mỗi người. Vì thế, ai cũng muốn lễ cưới của mình phải diễn ra thật hoàn hảo, ngay từ những chi tiết nhỏ nhất như bó hoa cầm tay cô dâu. ', 'Sự quyến rũ Foverer của hoa hồng da điểm xuyến thêm lá bạc nhập khẩu mang đến cảm giác vừa quyến rũ vừa ngây ngô là điểm nhấn của “foverer”.Những bó hoa cưới cầm tay tại EcoHouse được thiết kế từ những bông hoa tươi được lựa chọn kỹ lưỡng và có sự kết hợp hài hòa về màu sắc, để tạo nên một bó hoa cưới đẹp tinh tế sẽ giúp cô dâu thêm phần yêu kiều, nổi bật và ngày cưới thêm phần trọn vẹn, khó quên.', 1, 'https://hoatuoi360.vn/uploads/file/hoatuoi360-%20bo%20hoa%20co%20dau%202(1).jpg', ''),
(4, 'Sánh đôi', 200000, NULL, 'Hoa cưới sánh đôi là sự hòa quyện của nhiều loại hoa mang đến sự tươi mới, tinh khôi giúp cô dâu tỏa sáng trong ngày cưới của mình. Sắc trắng tinh tế kiêu sa tượng trưng cho điều vĩnh cửu , trường tồn theo năm tháng. Với Ý nghĩa về một hạnh phúc dài lâu cùng vẻ nhã nhặn tinh tế của Lan, Loài hoa này từ lâu đã được ưa chuộng trong trang trí tiệc cưới, hoa cưới.', 'Hoa cưới sánh đôi là sự hòa quyện của nhiều loại hoa mang đến sự tươi mới, tinh khôi giúp cô dâu tỏa sáng trong ngày cưới của mình. Sắc trắng tinh tế kiêu sa tượng trưng cho điều vĩnh cửu , trường tồn theo năm tháng. Với Ý nghĩa về một hạnh phúc dài lâu cùng vẻ nhã nhặn tinh tế của Lan, Loài hoa này từ lâu đã được ưa chuộng trong trang trí tiệc cưới, hoa cưới.', 1, 'https://hoatuoi360.vn/upload/hinhanh/thumb/bo-hong-ohara-hong-diu-dang279.jpg', ''),
(5, 'Thành công', 3000000, NULL, 'Kệ hoa khai trương thành công là kệ hoa 3 tầng, gồm có hoa hồng đỏ, hồng vàng, hướng dương, hồng môn, hoa lan và các phụ liệu khác. Vàng là 1 trong 2 màu cơ bản rất được ưa dừng khi bài trí theo phong thủy, tượng trưng cho năng lượng Hỏa và sức mạnh…Hoa thạch thảo trắng mang tông màu xanh trắng hiện đại như đôi tình nhân cùng nhau khiêu vũ giữa vườn hoa rực rỡ dưới ánh mặt trời. ', 'Kệ hoa khai trương thành công là kệ hoa 3 tầng, gồm có hoa hồng đỏ, hồng vàng, hướng dương, hồng môn, hoa lan và các phụ liệu khác. Vàng là 1 trong 2 màu cơ bản rất được ưa dừng khi bài trí theo phong thủy, tượng trưng cho năng lượng Hỏa và sức mạnh…Kệ hoa khai trương thành công là kệ hoa 3 tầng, gồm có hoa hồng đỏ, hồng vàng, hướng dương, hồng môn, hoa lan và các phụ liệu khác. Vàng là 1 trong 2 màu cơ bản rất được ưa dừng khi bài trí theo phong thủy, tượng trưng cho năng lượng Hỏa và sức mạnh…', 2, 'https://hoatuoi360.vn/upload/hinhanh/thumb/chau-lan-ho-diep-trang-3-tang-quy-phai628.jpg', ''),
(6, 'Phát lộc', 3000000, NULL, 'Được thiết kế từ những loài hoa mang ý nghĩa may mắn, tài lộc, lẵng hoa chúc mừng khai trương Phát Lộc phù hợp để làm quà tặng đố tác trong dịp khai trương cửa hàng, công ty. Quà chúc mừng sinh nhật cấp trên. Việc trang trí hoa để bàn đang ngày càng trở nên phổ biển, không chỉ để làm đẹp mà còn mang lại những ý nghĩa đặc biệt phù hợp với từng không gian. ', 'Được thiết kế từ những loài hoa mang ý nghĩa may mắn, tài lộc, lẵng hoa chúc mừng khai trương Phát Lộc phù hợp để làm quà tặng đố tác trong dịp khai trương cửa hàng, công ty. Quà chúc mừng sinh nhật cấp trên.  Việc trang trí hoa để bàn đang ngày càng trở nên phổ biển, không chỉ để làm đẹp mà còn mang lại những ý nghĩa đặc biệt phù hợp với từng không gian. Hoa để bàn họp, hoa để bàn hội nghị hay hoa để bàn sự kiện đều cần những bí quyết riêng khi lựa chọn. Vậy bạn đã có bộ sưu tập...', 2, 'https://hoatuoi360.vn/upload/hinhanh/thumb/chau-hoa-lan-ho-diep-trang-su-phon-hoa504.jpg', 'BC'),
(7, 'Hưng thịnh', 3500000, NULL, 'Lẵng hoa chúc mừng Hưng Thịnh được tạo nên từ hoa hồng, tú cầu và hướng dương với màu sắc rực rỡ tượng trưng cho một lời chúc hướng đến tương lai đầu thành công và tươi sáng đấy.Kệ hoa chúc mừng - Xu hướng mới 1 bao gồm :\n- Hoa hồng da\n- Hoa hồng dâu\n- Hoa hồng trắng/ cát tường trắng\n- Chân kệ Hàn Quốc\n- Phong cách Hàn Quốc', 'Trên con đường sự nghiệp thành công của mỗi người luôn có sự chung tay, giúp đỡ từ phía những người bạn, những người đối tác hay doanh nghiệp. Vì vậy đôi lúc một lời cảm ơn hay một lời chúc mừng sẽ thắt chặt tình cảm giữa mọi người hơn đấy. Lẵng hoa chúc mừng Hưng Thịnh được tạo nên từ hoa hồng, tú cầu và hướng dương với màu sắc rực rỡ tượng trưng cho một lời chúc hướng đến tương lai đầu thành công và tươi sáng đấy.Kệ hoa chúc mừng - Xu hướng mới 1 bao gồm :\n- Hoa hồng da\n- Hoa hồng dâu\n- Hoa hồng trắng/ cát tường trắng\n- Chân kệ Hàn Quốc\n- Phong cách Hàn Quốc', 2, 'https://hoatuoi360.vn/upload/hinhanh/thumb/ke-hoa-chuc-mung-xu-huong-moi-1994.jpg', ''),
(8, 'Sức khỏe', 400000, NULL, 'Với kiểu cắm vươn cao và thẳng đứng như những sự vươn lên mạnh mẽ tạo nên một nhịp điệu lúc cao lúc thấp cũng như cuộc sống lúc sung sướng lúc cực khổ nhưng ta cứ cố gắng thì sự thành công sẽ đến với ta vào ngày gần nhất. Lẵng hoa được điểm thêm những cành lan hồ điệp sang trọng, Thích hợp tặng dịp khai trương, sinh nhật sếp, kỷ niệm...', 'Được thiết kế từ những loài hoa mang ý nghĩa may mắn, tài lộc, lẵng hoa chúc mừng khai trương Phát Lộc phù hợp để làm quà tặng đố tác trong dịp khai trương cửa hàng, công ty. Quà chúc mừng sinh nhật cấp trên.Với kiểu cắm vươn cao và thẳng đứng như những sự vươn lên mạnh mẽ tạo nên một nhịp điệu lúc cao lúc thấp cũng như cuộc sống lúc sung sướng lúc cực khổ nhưng ta cứ cố gắng thì sự thành công sẽ đến với ta vào ngày gần nhất. Lẵng hoa được điểm thêm những cành lan hồ điệp sang trọng, Thích hợp tặng dịp khai trương, sinh nhật sếp, kỷ niệm...', 3, 'https://hoatuoi360.vn/upload/hinhanh/thumb/binh-hoa-hong-dep-hanh-phuc-nhe-em814.jpg', 'BC'),
(9, 'Rực rỡ', 400000, NULL, 'Hộp hoa Rực rỡ được thiết kế tinh tế trong chiếc hộp gỗ xinh xắn với tông vàng chủ đạo. Mang hộp hoa vào không gian như chính bạn đang mang ánh nắng, mang sức sống tràn trề nhựa sống vào. Hãy tặng hộp hoa Ngày rực rỡ cho bạn bè, người thân, gia đình để chúc họ có một ngày làm việc tốt lành, một ngày với đầy đủ ước mơ, hy vọng và tràn ngập niềm vui. Có thể chọn hộp hoa Ngày rực rỡ làm hoa sinh nhật, hoa chúc mừng, hoa khai trương, hoa tân gia, hoa chúc Tết...', 'Hộp hoa Ngày rực rõ bao gồm:\n- Mõm sói vàng\n- Hồng vàng ( Có thể thay thế hồng trứng gà vào các dịp lễ 20.10, 8/3...)\n- Hướng dương\"            Hộp hoa Rực rỡ được thiết kế tinh tế trong chiếc hộp gỗ xinh xắn với tông vàng chủ đạo. Trong tất cả các gam màu, màu vàng là màu đại diện cho sự sống, cho những điều rực rỡ và ấm áp. Mang hộp hoa vào không gian như chính bạn đang mang ánh nắng, mang sức sống tràn trề nhựa sống vào. Hãy tặng hộp hoa Ngày rực rỡ cho bạn bè, người thân, gia đình để chúc họ có một ngày làm việc tốt lành, một ngày với đầy đủ ước mơ, hy vọng và tràn ngập niềm vui. Có thể chọn hộp hoa Ngày rực rỡ làm hoa sinh nhật, hoa chúc mừng, hoa khai trương, hoa tân gia, hoa chúc Tết...', 3, 'https://hoatuoi360.vn/upload/hinhanh/thumb/hop-hoa-tong-vang862.jpg', 'BC'),
(10, 'Ngọt ngào', 500000, NULL, 'Hoa chúc mừng - Ngọt ngào gồm: Hoa hồng, Hoa mõm sói, Cùng một số loại hoa lá, trang trí khác', 'Hoa chúc mừng - Ngọt ngào gồm: \n- Hoa hồng \n- Hoa mõm sói \n- Cùng một số loại hoa lá, trang trí khác\"\nHoa chúc mừng - Điều ngọt ngào giỏ hoa nhẹ nhàng tươi tắn, với tông màu hồng đầy ngọt ngào và lãng mãn. Đây sẽ là gợi ý cho một món quà đặc biệt của bạn gửi tặng cho người ấy.', 3, 'https://hoatuoi360.vn/uploads/file/hoatuoi360-%20hoa%20chuc%20mung%2012002(2).jpg', ''),
(11, 'Ly biệt', 5000000, NULL, 'Việc gửi vòng hoa chia buồn đám tang bày tỏ được lòng thành kính với người đã mất và mang lại niềm hy vọng, an ủi cho người còn sống. Mỗi loài hoa đều có một ý nghĩa riêng nên nó thường gắn liền với các sự kiện, các nghi thức lễ trong cuộc sống. Trong đó có một số loại hoa thể hiện giữa sự sống và cái chết tạo nên quy luật của cuộc sống, tiếc nuối trong nghi thức đám tang.', 'Kệ hoa chia buồn Ly biệt bao gồm: Hoa lan hồ điệp trắng, Hoa cúc trắng, Hoa hồng phấn, Hoa, lá trang trí đi kèm, Kệ hoa phong cách hiện đại\nViệc gửi vòng hoa chia buồn đám tang bày tỏ được lòng thành kính với người đã mất và mang lại niềm hy vọng, an ủi cho người còn sống. Mỗi loài hoa đều có một ý nghĩa riêng nên nó thường gắn liền với các sự kiện, các nghi thức lễ trong cuộc sống. ', 4, 'https://hoatuoi360.vn/upload/hinhanh/thumb/ke-hoa-chia-buon-nguyen-cau189.jpg', 'BC'),
(12, 'Chia buồn', 400000, NULL, 'Vòng hoa tang - Ngày buồn: Vòng hoa màu trắng tinh khiết như lời tiết thương đối với người đã mất và đồng thời như một lời chia buồn chân thành đối với gia chủ.Hoa Chia Buồn – Từ Biệt là loại hoa tang lễ mà hoa tươi Sunny thiết kế giúp bạn thể hiện hết nỗi niềm của mình, nỗi niềm sâu thẳm tiếc nuối, thương cảm của người ở lại trước sự ra đi của một kiếp người. Đây còn là vòng hoa được chuẩn bị, thiết kế chu đáo để thể hiện sự tôn trọng đối với người đã khuất. ', 'Vòng hoa chia buồn-Ngày buồn bao gồm: Hoa lily, Hoa cúc trắng, Cùng một số hoa lá trang trí khác\nVòng hoa tang - Ngày buồn: Vòng hoa màu trắng tinh khiết như lời tiết thương đối với người đã mất và đồng thời như một lời chia buồn chân thành đối với gia chủ.', 4, 'https://hoatuoi360.vn/upload/hinhanh/thumb/vong-hoa-tang-ngay-buon643.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(20) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Password`, `Email`, `Address`, `Phone`) VALUES
(1, 'Minh Hiếu', '001122', 'minhhieu@gmail.com', 'Sư Vạn Hạnh, phường 10, quận 10, TP Hồ Chí Minh', 1258544552),
(2, 'Chí Bảo', '22334455', 'chibao@gmail.com', 'Lê Văn Sĩ, Tân Bình, TP Hồ Chí Minh', 2147483647),
(3, 'Thu Hằng', '556677', NULL, 'Nguyễn Tri Phương, quận 10, tp Hồ Chí Minh', 1427483647),
(4, 'Thái Hiền', '556677', NULL, 'Gò Vấp', 2147483642),
(5, 'mh', '867925', 'lethiminhhieu2106@gmail.com', '', 358679250),
(7, 'mh', '867925', 'lethiminhhieu2106@gmail.com', '', 134567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `categogy`
--
ALTER TABLE `categogy`
  ADD PRIMARY KEY (`CateID`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`prID`),
  ADD UNIQUE KEY `PrName` (`PrName`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `UserID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `OrderID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categogy`
--
ALTER TABLE `categogy`
  MODIFY `CateID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `prID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
