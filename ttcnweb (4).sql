-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2019 lúc 10:54 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ttcnweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `faculity`
--

CREATE TABLE `faculity` (
  `id` int(10) NOT NULL,
  `faculity_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `faculity`
--

INSERT INTO `faculity` (`id`, `faculity_name`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Hóa'),
(3, 'Điện'),
(4, 'Điện tử viễn thông'),
(5, 'Xây dựng dân dụng'),
(6, 'Xây dựng cầu đường'),
(7, 'Xây dựng thủy lợi - thủy điện'),
(8, 'Kỹ thuật tàu thủy'),
(9, 'Cơ khí'),
(10, 'Cơ khí giao thông');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title_news` text COLLATE utf8_unicode_ci NOT NULL,
  `title_content` text COLLATE utf8_unicode_ci NOT NULL,
  `content_news` text COLLATE utf8_unicode_ci NOT NULL,
  `date_news` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_news`, `title_news`, `title_content`, `content_news`, `date_news`) VALUES
(1, 'Quỹ tài trợ VinTech Fund chắp thêm đôi cánh cho các dự án khoa học công nghệ của Giảng viên Trường Đại học Bách khoa, ĐHĐN', 'Sáng ngày 01/11/2019, Ban quản lý Quỹ tài trợ nghiên cứu ứng dụng VinTech Fund phối hợp với Trường Đại học Bách khoa, ĐHĐN tổ chức Hội thảo hướng dẫn làm hồ sơ đề xuất đề tài Đợt 2 của Quỹ và trao đổi về các hồ sơ, thủ tục tài trợ, thủ tục bản quyền liên ', 'Sáng ngày 01/11/2019, Ban quản lý Quỹ tài trợ nghiên cứu ứng dụng VinTech Fund phối hợp với Trường Đại học Bách khoa, ĐHĐN tổ chức Hội thảo hướng dẫn làm hồ sơ đề xuất đề tài Đợt 2 của Quỹ và trao đổi về các hồ sơ, thủ tục tài trợ, thủ tục bản quyền liên quan.\r\nQuỹ tài trợ nghiên cứu ứng dụng VinTech Fund thuộc VinTech City, Tập đoàn Vingroup được hình thành với mục tiêu tài trợ và hỗ trợ nguồn lực cho các dự án khoa học công nghệ có tính ứng dụng cao vào thực tế cuộc sống.\r\n\r\nCụ thể, tiêu chí lựa chọn của Quỹ tài trợ nghiên cứu ứng dụng VinTech Fund là các dự án có triển vọng tạo ra công nghệ với hàm lượng nghiên cứu, tính sáng tạo; có khả năng thương mại hóa; uy tín, năng lực thực thi của nhóm nghiên cứu. Các đề tài, dự án đã có sản phẩm mẫu sẽ được ưu tiên.\r\nMức tài trợ cho mỗi đề tài nghiên cứu nếu được duyệt sẽ được cấp số tiền lên đến 10 tỷ đồng (500.000 USD). Ngoài các đề tài nghiên cứu tại Việt Nam, VinTech Fund cũng khuyến khích các nhà khoa học, nhà sáng chế, chuyên gia công nghệ, startup công nghệ người Việt trên toàn cầu cùng tham gia. Hội đồng chuyên gia VinTech Fund sẽ theo xuyên suốt quá trình tuyển chọn, xét duyệt, demo tại hiện trường và cả quá trình kết nối thử nghiệm.\r\n\r\nMới đây vào 08/2019, Quỹ Đổi mới sáng tạo Vingroup (VINIF), thuộc Tập đoàn Vingroup đã tổ chức lễ ký kết tài trợ gần 10 tỷ đồng cho 2 dự án của 2 Giảng viên Trường Đại học Bách khoa, đó là TS. Ngô Ngọc Tri với đề tài “Ứng dụng trí tuệ nhân tạo để dự báo sớm năng lượng tiêu thụ của các toà nhà hướng đến phát triển bền vững” và TS. Nguyễn Tấn Hưng với đề tài “Thông tin quang thông minh cho mạng dữ liệu cực lớn”.\r\nPGS.TS. Lê Thị Kim Oanh – Phó Hiệu trưởng Nhà trường gửi lời cảm ơn đến Ban Quản lý Quỹ VinTech Fund đã tài trợ cho các dự án Khoa học Công nghệ của Giảng viên Trường Đại học Bách khoa, ĐHĐN nói riêng cũng như các cơ sở giáo dục Đại học công lập nói chung. Nguồn quỹ đã giải quyết rất nhiều vấn đề khó khăn mà các Giảng viên gặp phải trong quá trình nghiên cứu. Cô hy vọng rằng giảng viên Nhà trường sẽ có những đề tài nghiên cứu mới đáp ứng được các tiêu chí của Quỹ và được xét duyệt tài trợ để phát triển dự án.\r\n', '2019-11-03'),
(2, 'Đoàn cán bộ, giảng viên trường Đại học Bách khoa và Trường ĐH SPKT, ĐHĐN tham gia khóa đào tạo giảng viên giảng dạy về khởi nghiệp sáng tạo “Train-The-Trainers” do Vintech City tổ chức', 'Trong các ngày từ 27 đến 29/9/2019, VinTech City (thành viên của Tập đoàn Vingroup) phối hợp với Trường Đại học Công nghệ Thành phố Hồ Chí Minh (HUTECH) và Trung tâm Hỗ trợ Thanh niên Khởi nghiệp (BSSC) tổ chức khóa đào tạo giảng viên giảng dạy về khởi ng', 'Trong các ngày từ 27 đến 29/9/2019, VinTech City (thành viên của Tập đoàn Vingroup) phối hợp với Trường Đại học Công nghệ Thành phố Hồ Chí Minh (HUTECH) và Trung tâm Hỗ trợ Thanh niên Khởi nghiệp (BSSC) tổ chức khóa đào tạo giảng viên giảng dạy về khởi nghiệp “Train-The-Trainers” tại HUTECH. Tham giá khóa học có hơn 60 giảng viên đến từ 26 trường đại học thuộc miền Trung, TP HCM và miền Tây Nam Bộ. Đoàn giảng viên của Đại học Đà Nẵng gồm 5 người được trường Đại học Bách khoa và trường Đại học Sư phạm Kỹ thuật cử tham gia khóa đào tạo. Trong năm 2019, Vintech City đã tài trợ, hỗ trợ cho các Câu lạc bộ khởi nghiệp và Không gian sáng chế của 2 trường đại học thành viên này của Đại học Đà Nẵng.\r\nBà Trương Lý Hoàng Phi – Tổng Giám đốc VinTech City cho biết “Train-The-Trainers” là không gian trao đổi, chia sẻ kinh nghiệm giữa người đứng lớp là những nhà tư vấn, những chuyên gia, những người đã có kinh nghiệm trong khởi nghiệp, đã khởi nghiệp thành công với các học viên là những thầy cô giáo đến từ các trường đại học. Mục tiêu của khóa đào tạo là xây dựng lực lượng giảng dạy khởi nghiệp tại các cơ sở giáo dục đại học. Trở về trường, đội ngũ giảng viên này sẽ triển khai tập huấn lại cho sinh viên và tổ chức các hoạt động về khởi nghiệp trong sinh viên tại trường mình, hỗ trợ hiệu quả cho việc khởi nghiệp của các em.\r\n\r\nNgoại trừ buổi học đầu tiên được dành cho phần lý luận tổng quan với chuyên đề “Vai trò của trường đại học trong phát triển hệ sinh thái khởi nghiệp”, trong tất cả các buổi học còn lại, “Train-The-Trainers” tập trung vào phần thực hành và chia sẻ kinh nghiệm với các nội dung gồm: Xây dựng mô hình kinh doanh - Business Model Canvas; Thực hành đánh giá cơ hội - Ý tưởng -Thị trường; Các yếu tố cần quan tâm khi đánh giá một dự án khởi nghiệp đổi mới sáng tạo và thực hành kỹ năng thuyết trình về dự án; Chia sẻ kinh nghiệm thực tế khởi nghiệp công nghệ với 02 dự án đại diện cho platform công nghệ và phần cứng công nghệ.\r\nHọc viên được tổ chức làm việc theo nhóm, thực hành các kỹ năng giới thiệu ý tưởng kinh doanh, phân tích chân dung khách hàng, xây dựng mô hình kinh doanh, lập các bảng điều tra, xây dựng nội dung phỏng vấn, tiến hành khảo sát thị trường (điều tra, phỏng vấn),... Các học viên cũng được thị phạm các phương pháp giảng dạy về khởi nghiệp từ các giảng viên và chuyên gia. “Train-The-Trainers” đã tạo cơ hội tốt cho việc giao lưu, học hỏi, chia sẻ kinh nghiệm về hoạt động và giảng dạy khởi nghiệp tại các trường đại học giữa các giảng viên đến từ nhiều trường ở các vùng, miền khác nhau trong nước.\r\n\r\nKết thúc khóa học, trước khi nhận giấy chứng nhận hoàn thành khóa học, từng nhóm thực hành kỹ thuật “pitching” là kỹ thuật thuyết phục khách hàng hoặc nhà đầu tư rót vốn cho ý tưởng kinh doanh. Các nhóm phải trình bày một cách rõ ràng, cụ thể, với đầy đủ thông tin cơ bản về dự án khởi nghiệp của nhóm trước các nhà đầu tư thật sự chỉ trong khoảng thời gian tối đa là 2 phút và tiếp đó trả lời câu hỏi của các nhà đầu tư trong 5 phút. Nhóm đạt giải Nhất gồm 6 học viên trong đó có 3 giảng viên của Đại học Đà Nẵng, 2 giảng viên của HUTECH và 1 nhân viên của BSSC.\r\nNhận xét về khóa học, TS. Hoàng Dũng, Phó Hiệu trưởng trường Đại học Sư phạm Kỹ thuật chia sẻ suy nghĩ : “Tôi đánh giá cao khóa học, hầu hết thời gian được dành cho việc các chuyên gia hướng dẫn nhanh và học viên thực hành ngay các nội dung và kỹ năng cơ bản, thiết yếu. Qua khóa học, chúng tôi đã thực sự có cảm hứng với hoạt động khởi nghiệp, cảm nhận được tầm quan trọng và tính hấp dẫn của hoạt động này. Trở về trường, chúng tôi sẽ làm đúng mục đích của khóa đào tạo, đơn vị chính trong việc tổ chức khóa đào tạo là truyền cảm hứng khởi nghiệp đến sinh viên, giúp cho các em khám phá mạnh hơn môi trường khởi nghiệp, hiểu được và thực hành được các kỹ năng thiết yếu, biết cách khởi nghiệp, hỗ trợ cho việc khởi nghiệp của các em, tạo ra sự lan tỏa của không khí khởi nghiệp trong giảng viên và sinh viên của trường. Trong quá trình thực hiện ý tưởng này, chúng tôi rất cần sự đồng hành và sự hỗ trợ tiếp tục của Vintech City, BSSC cùng sự cộng tác, chia sẻ kinh nghiệm của các trường đại học khác”.\r\n\r\nTS. Nguyễn Quang Như Quỳnh, giảng viên Khoa Khoa học Công nghệ Tiên tiến (FAST),Trường Đại học Bách khoa, điều phối viên của dự án nhận được tài trợ của Vintech City năm 2019 chia sẻ : “Với vai trò từng là chuyên gia khởi nghiệp, điều phối dự án IPP hợp tác giữa Việt Nam-Phần Lan tại trường Đại học Bách khoa thuộc Đại học Đà Nẵng, tôi đánh giá rất tốt các hoạt động của “Train-The-Trainers” vì 3 lý do sau : khóa học đã cung cấp bài giảng và nền tảng kiến thức căn bản về khởi nghiệp; kết nối các trường và các giảng viên trong nước với nhau trong khởi nghiệp; kết nối các chuyên gia khởi nghiệp, đổi mới sáng tạo hàng đầu tại Thành phố Hồ Chí Minh với học viên. Nhóm giảng viên chúng tôi đã chia sẻ và sẽ sớm tổ chức chương trình đào tạo tốt tương tự như vậy cho tập thể giảng viên và sinh viên tại Đại học Đà Nẵng”.\r\n\r\nVới những kiến thức quý báu thu nhận từ khóa đào tạo “Train-The-Trainers” của Vintech City, các giảng viên của Đại học Đà Nẵng được cử đi tập huấn sẽ trở về trường mình lan tỏa, tổ chức các hoạt động khởi nghiệp trong nhà trường, từ đó góp phần thúc đẩy khởi nghiệp sáng tạo trong cộng đồng sinh viên. Bên cạnh đó các hoạt động khởi nghiệp không chỉ bó hẹp trong khởi nghiệp mà sẽ còn được lồng ghép trong các hoạt động giảng dạy đào tạo, phát triển nghề nghiệp, hướng nghiệp cho các em.', '2019-11-12'),
(3, 'Trường THPT Nguyễn Trãi tham quan CLB Sinh viên Nghiên cứu khoa học BK – Maker của trường Đại học Bách khoa', 'Ngày 27/09 vừa qua, khoa Điện đã kết hợp với CLB Sinh viên Nghiên cứu khoa học BK – Maker trường Đại học Bách khoa Đà Nẵng tổ chức một buổi tham quan, giao lưu và giới thiệu các sản phẩm công nghệ của sinh viên nhà trường đến các học sinh trường Trung học', 'Ngày 27/09 vừa qua, khoa Điện đã kết hợp với CLB Sinh viên Nghiên cứu khoa học BK – Maker trường Đại học Bách khoa Đà Nẵng tổ chức một buổi tham quan, giao lưu và giới thiệu các sản phẩm công nghệ của sinh viên nhà trường đến các học sinh trường Trung học phổ thông Nguyễn Trãi.\r\n\r\nTham dự của buổi tham quan này có TS. Lê Đình Dương – Phó Trưởng khoa Điện, trường Đại học Bách khoa Đà Nẵng, TS. Ngô Đình Thanh – Chủ nhiệm CLB BK – Maker, thầy Phan Đình Hùng, thầy Nguyễn Hồng Lĩnh – giáo viên trường THPT Nguyễn Trãi, chủ nhiệm CLB Sáng tạo trẻ cùng với đông đảo học sinh trường THPT Nguyễn Trãi và các sinh viên của Nhà trường.\r\nCác sinh viên là thành viên của câu lạc bộ BK – Maker đã giới thiệu các sản phẩm nghiên cứu khoa học đến các bạn học sinh. Những sản phẩm được giới thiệu tại buổi tham quan đều là các sản phẩm nghiên cứu khoa học của các thành viên trong CLB, trong đó có nhiều sản phẩm đạt giải cao trong các cuộc thi khoa học kỹ thuật các cấp.\r\nBên cạnh tham quan tại CLB, thầy và trò trường THPT Nguyễn Trãi cùng với BCN khoa Điện cũng đã có buổi chia sẻ tại văn phòng khoa Điện. Hoạt động này đã làm cho giáo dục STEM đến gần hơn với các học sinh và chắc chắn rằng học sinh trường THPT Nguyễn Trãi sẽ có thêm nhiều trải nghiệm, nhiều ý tưởng và nhiều đam mê hơn với khoa học công nghệ.', '2019-11-12'),
(4, 'Khóa học thực nghiệm do các Giáo sư Trường Đại học Quốc gia Yokohama, Nhật Bản giảng dạy\r\n', 'Sáng ngày 16/09/2019, tại Trường Đại học Bách khoa, ĐHĐN đã diễn ra buổi lễ khai giảng Khóa học thực nghiệm lần 3 do Trường Đại học Quốc gia Yokohama, Văn phòng đại diện Đại học Quốc gia Yokohama và Trường Đại học Bách khoa, ĐHĐN hợp tác tổ chức dành cho ', 'Sáng ngày 16/09/2019, tại Trường Đại học Bách khoa, ĐHĐN đã diễn ra buổi lễ khai giảng Khóa học thực nghiệm lần 3 do Trường Đại học Quốc gia Yokohama, Văn phòng đại diện Đại học Quốc gia Yokohama và Trường Đại học Bách khoa, ĐHĐN hợp tác tổ chức dành cho sinh viên 5 Khoa (Cơ Khí, Cơ khí Giao Thông, Điện, Điện Tử Viễn Thông và Khoa Fast) của Nhà trường.\r\nKhóa học lần này có 80 sinh viên tham gia. Nội dung của khóa học là tập trung nhấn mạnh và hướng đến việc giảng dạy phương pháp nghiên cứu khoa học cho sinh viên, thông qua các mô hình nghiên cứu, mô phỏng và thực nghiệm cùng những trang thiết bị được các Giáo sư Trường Đại học Quốc gia Yokohama, Nhật Bản cung cấp. Trong suốt Khóa học, các Giáo sư sẽ sử dụng ngôn ngữ tiếng Anh để giảng dạy và được chia thành 3 lớp với các mô hình nghiên cứu khác nhau:  Lớp thực nghiệm về Nhiệt học do GS. Araki Takuto phụ trách; Lớp thực nghiệm trên bộ dụng cụ Cơ khí do GS. Kazumi Matsui phụ trách; Lớp thực nghiệm về Robot do GS. Tomoyuki Shimono phụ trách, các bạn sinh viên sẽ được thực hành, trau dồi kỹ năng ngoại ngữ và nâng cao khả năng học tập, làm việc theo mô hình nhóm.  Hơn nữa, khi tham gia khóa học các bạn sinh viên còn có cơ hội được lựa chọn để tham dự chương trình Sakura Science năm 2020 tại Nhật Bản.\r\nNgoài ra, khóa học còn có sự tham gia hỗ trợ của 7 bạn sinh viên Trường Đại học Quốc gia Yokohama, Nhật Bản và 10 bạn sinh viên sẽ tham gia chương trình Sakura Science năm 2019 tại Nhật Bản, được tuyển chọn từ 4 khoa (Cơ khí, Cơ khí Giao thông, Điện tử - Viễn thông và Điện) của Nhà trường.\r\n\r\n\r\n', '2019-11-25'),
(5, 'Học gắn với thực hành qua thiết bị Demo KIT Tự động hoá\r\n', 'Đây là những thiết bị mới nhất hiện đang được sử dụng tại các doanh nghiệp lớn được hãng Rockwell tài trợ để tổ chức cuộc thi “Automation Project-Based Learning Competition”. Để vận hành tốt được thiết bị này đòi hỏi sinh viên không chỉ nắm vững các kiến ', 'Sáng ngày 23/08/2019 tại Trường Đại học Bách khoa, ĐHĐN đã diễn ra buổi chung kết cuộc thi “Automation Project-Based Learning Competition”. Đây là Cuộc thi nằm trong khuôn khổ dự án BUILD-IT do trường Đại học Bang Arizona phối hợp các Trường Đại học tại Việt Nam và đối tác doanh nghiệp là Rockwell Automation và Tập đoàn Polyco cùng phối hợp triển khai thực hiện nhằm giúp cho sinh viên được tiếp cận sớm các thiết bị mới nhất đang được áp dụng để sản xuất tại các doanh nghiệp lớn.\r\nCuộc thi được phát động từ tháng 5/2019 với sự tham gia của 89 sinh viên đến từ 4 Khoa Cơ khí, Điện, Điện tử viễn thông, Khoa học công nghệ tiên tiến (FAST). Đầu tháng 6/2019 Dự án BUILD-IT đã gửi 30 bộ KIT tự động hóa Rockwell Automation đến Trường ĐH Bách Khoa – ĐHĐN và sau đó trong khoảng thời gian hơn 2 tháng các đơn vị tài trợ thiết bị là công ty Rockwell Automation và Tập đoàn Polyco đến hỗ trợ, hướng dẫn kỹ thuật cho giảng viên. Sau đó, giảng viên tập huấn lại và hướng dẫn sinh viên thực hành trực tiếp trên các bộ KIT. Trải qua các đợt tập huấn bởi các chuyên gia đến từ doanh nghiệp và giảng viên, các nhóm sinh viên đã có quá trình học và thực hành trên các thiết bị thực và cuối cùng đã lựa chọn ra 7 đội gồm 14 sinh viên thuộc các ngành Cơ điện tử (Khoa Cơ khí) và Kỹ thuật điều khiển và Tự động hoá (Khoa Điện) tham dự vòng thi chung kết cấp Trường.\r\nÔng Bùi Thái Luân, đại diện công ty Rockwell cho biết: Sinh viên hiện nay đa số chỉ được tiếp cận các thiết bị cũ hoặc những thiết bị chưa được cập nhật, áp dụng hiện tại ở các doanh nghiệp. Thông qua cuộc thi này, sinh viên được tiếp xúc với bản Demo KIT được làm từ những thiết bị mà hiện nay công ty Rockwell đang bán trên thị trường và được các doanh nghiệp lớn đang áp dụng. Sinh viên sẽ học được cách truyền thông qua Ethernet giữa bộ điều khiển PLC và biến tần, PLC với HMI,... Đây là những công việc cơ bản của một kỹ sư tự động làm sau khi ra trường.”\r\n\r\n“Sinh viên Bách khoa Đà Nẵng thực hành các thiết bị này tốt hơn nhiều so với mong đợi của ban tổ chức nhưng cũng cần cố gắng luyện tập nhiều hơn nữa để có thành tích tốt hơn tại vòng chung kết các trường trong thời gian tới”, Ông Luân nhận xét.\r\nĐánh giá về khả năng sử dụng các thiết bị mới này của sinh viên, TS Lê Quốc Huy- Giảng viên Khoa Khoa học công nghệ tiên tiến, điều khối và phụ trách kỹ thuật của cuộc thi, cho biết: Mặc dù với đa số sinh viên thì đây là những thiết bị mới còn mới lạ và sinh viên chưa có điều kiện tiếp xúc trong quá trình học, hơn nữa bộ KIT phối hợp nhiều thiết bị đòi hỏi kiến thức của sinh viên ở nhiều lĩnh vực khác nhau, tuy nhiên thông qua tập huấn và thực hành thực tế thì các sinh viên Nhà trường đã tiếp thu nhanh, áp dụng kiến thức chuyên môn và thực hành rất tốt.\r\nBạn Nguyễn Đức Hợp, Lớp 16CDT2 chia sẻ: Tham gia cuộc thi này em có cơ hội tiếp xúc trực tiếp với bộ Demo KIT do hãng Rockwell tài trợ để thực hành các nội dung lý thuyết em đã được học trên lớp và biết thêm về kết nối Ethernet, lập trình PLC, xử lý các lỗi khi lập trình. Các kiến thức này thật sự rất hữu ích giúp cho em học tốt hơn trong các môn chuyên ngành, làm đồ án và có thể áp dụng được cho công việc sau khi tốt nghiệp.\r\nVòng thi Chung kết cấp trường đã tổ chức thành công, Ban tổ chức đã lựa chọn 3 đội chiến thắng để tham dự vòng cuộc thi chung kết tổ chức tại TP. Hồ Chí Minh trong tháng 10 tới cùng với sự tham gia tranh tài của sinh viên 4 trường kỹ thuật phía Nam gồm Đại học Sư phạm Kỹ thuật TP HCM, Đại học Công nghiệp, Đại học Lạc Hồng và Đại học Bách khoa TP HCM.\r\n\r\n\r\n\r\n\r\n\r\n', '0000-00-00'),
(6, 'Gần 100 nhà khoa học tham gia Hội nghị Động lực học và Điều khiển', 'Ngày 19/07/2019, tại Toà nhà Smart Building, Trường Đại học Bách khoa, Đại học Đà Nẵng đã diễn ra Hội nghị Khoa học toàn quốc lần thứ nhất về ĐỘNG LỰC HỌC VÀ ĐIỀU KHIỂN. Đây là một Hội nghị chuyên ngành đã thu hút được gần 70 báo cáo của các giáo sư và các nhà khoa học từ mọi miền của đất nước về tham dự.\r\n\r\n', 'Ngày 19/07/2019, tại Toà nhà Smart Building, Trường Đại học Bách khoa, Đại học Đà Nẵng đã diễn ra Hội nghị Khoa học toàn quốc lần thứ nhất về ĐỘNG LỰC HỌC VÀ ĐIỀU KHIỂN. Đây là một Hội nghị chuyên ngành đã thu hút được gần 70 báo cáo của các giáo sư và các nhà khoa học từ mọi miền của đất nước về tham dự.\r\n\r\nHội nghị được Hội Động lực học và Điều khiển Việt Nam (VADC) phối hợp với Trường Đại học Bách khoa, ĐHĐN (DUT) và Viện nghiên cứu Cơ khí (NARIME) tổ chức nhằm mục đích trao đổi các kết quả nghiên cứu và ứng dụng mới, thông tin về những phát triển mới lĩnh vực Động lực học, Tự động hoá và Điều khiển, trao đổi sự hợp tác nghiên cứu ứng dụng giữa các lĩnh vực khoa học.\r\n\r\nHội nghị thu hút gần 100 giáo sư, các nhà khoa học ở trong và ngoài nước tham gia với các chủ đề về: Dao động tuyến tính và phi tuyến; Động lực học và điều khiển hệ nhiều vật; Điều khiển tuyến tính và phi tuyến; Điều khiến các quá trình; Mô hình hoá và mô phỏng số; Robot và Cơ điện tử, Động lực học và điều khiển máy; Động lực học và điều khiển công trình; Phương pháp thực nghiệm trong cơ học; Phương pháp số trong động lực học; Khí động lực học và điều khiển gió; Cơ học Micro và Nano; Chuẩn đoán máy và công trình; Âm học và dao động.\r\n\r\nTại Hội nghị, các nhà khoa học đã tham gia báo cáo, trao đổi và thảo luận về các kết quả nghiên cứu. Các kết quả nghiên cứu này sẽ được Ban khoa học và các nhà khoa học phản biện lần 2. Các báo cáo đạt yêu cầu sẽ được đăng trên kỷ yếu của Hội nghị có chỉ số ISBN của Nhà xuất bản Xây dựng và được tính điểm công trình theo quy định của hội đồng Giáo sư Nhà nước.\r\n\r\nHội nghị đã diễn ra thành công tốt đẹp, tạo cầu nối giúp các nhà khoa học trên cả nước gặp gỡ, giao lưu và chia sẻ các kết quả nghiên cứu mới nhất về động lực học và điều khiển, tiếp cận công nghệ 4.0.\r\n\r\n', '0000-00-00'),
(7, 'Trường Đại học Bách khoa, ĐHĐN trở thành nhà tài trợ chính cho cuộc thi ROBODNIC 2019 của thành phố Đà Nẵng', 'Chiều ngày 5/6/2019, PGS.TS Đoàn Quang Vinh – Bí thư Đảng ủy, Hiệu trưởng Nhà trường đã có buổi làm việc với Liên hiệp các hội Khoa học Kỹ thuật Thành phố Đà Nẵng và đi đến thống nhất thỏa thuận trở thành đơn vị tài trợ Kim cương và Bảo trợ kỹ thuật của cuộc thi ROBODNIC 2019.', 'PGS.TS Đoàn Quang Vinh – Bí thư Đảng ủy, Hiệu trưởng Nhà trường cho biết, Trường Đại học Bách khoa, ĐHĐN là trường đại học đào tạo kỹ thuật công nghệ hàng đầu khu vực miền Trung – Tây Nguyên với bề dày lịch sử gần 45 năm xây dựng và phát triển luôn chú trọng đến việc thực hiện trách nhiệm xã hội của mình cũng như việc tìm kiếm, bồi dưỡng những học sinh có niềm đam mê nhiệt huyết với nghiên cứu khoa học. Thông qua việc tài trợ chính và bảo trợ kỹ thuật cho cuộc thi, Thầy hy vọng có thể phát hiện ra các bạn trẻ có tài năng nghiên cứu khoa học công nghệ để từ đó có thể ươm mầm, bồi dưỡng trở thành những nhà khoa học trong tương lai cho Nhà trường và cho Thành phố Đà Nẵng.\r\nĐại diện Ban tổ chức cuộc thi, ông Huỳnh Phước - Phó chủ tịch Liên hiệp các hội Khoa học Kỹ thuật Thành phố Đà Nẵng đánh giá cao về khả năng nghiên cứu khoa học, sáng tạo và các sản phẩm công nghệ hữu ích của đội ngũ sinh viên và giảng viên Trường ĐH Bách khoa, ĐHĐN và bày tỏ mong muốn Trường Đại học Bách khoa, ĐHĐN sẽ tiếp tục mở rộng các sân chơi bổ ích nhằm khơi dậy ý tưởng sáng tạo trong học sinh, sinh viên. Đồng thời, đối với những cuộc thi Khoa học kỹ thuật tại TP Đà Nẵng nói riêng và toàn quốc nói chung, Trường ĐH Bách khoa, ĐHĐN sẽ tham gia hỗ trợ về kỹ thuật cho các đội thi.\r\nViệc trở thành đơn vị tài trợ Kim cương và Bảo trợ kỹ thuật của cuộc thi ROBODNIC 2019 một lần nữa khẳng định sự tin tưởng của xã hội đối với uy tín “học hiệu”  của Trường Đại học Bách khoa, góp phần tạo dựng hình ảnh, sự chuyên nghiệp của Nhà trường trong các hoạt động Khoa học kỹ thuật lớn của Thành phố Đà Nẵng nói riêng và cả nước nói chung.\r\n\r\n\r\n\r\n', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(10) NOT NULL,
  `name_role` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name_role`) VALUES
(0, 'Admin'),
(1, 'Giảng viên'),
(2, 'Sinh Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(10) NOT NULL,
  `topic_name` text COLLATE utf8_unicode_ci NOT NULL,
  `topic_type` int(10) DEFAULT 1,
  `topic_description` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `topic_teacher` int(10) NOT NULL DEFAULT 2,
  `topic_datecreate` date NOT NULL DEFAULT current_timestamp(),
  `topic_status` int(10) NOT NULL DEFAULT 1,
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  `topic_abstract` text COLLATE utf8_unicode_ci DEFAULT '',
  `topic_intro` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `topic_content` text COLLATE utf8_unicode_ci DEFAULT '',
  `topic_conclude` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name`, `topic_type`, `topic_description`, `topic_teacher`, `topic_datecreate`, `topic_status`, `deleted`, `topic_abstract`, `topic_intro`, `topic_content`, `topic_conclude`) VALUES
(1, 'Sửa Đề tài số 1', 11, '', 2, '2019-11-25', 2, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic_details`
--

CREATE TABLE `topic_details` (
  `topic_id` int(10) NOT NULL,
  `abstract_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro` text COLLATE utf8_unicode_ci NOT NULL,
  `content_topic` text COLLATE utf8_unicode_ci NOT NULL,
  `conclude` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic_status`
--

CREATE TABLE `topic_status` (
  `id` int(10) NOT NULL,
  `name_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topic_status`
--

INSERT INTO `topic_status` (`id`, `name_status`) VALUES
(1, 'Đang chờ phê duyệt'),
(2, 'Đang chờ đăng ký'),
(3, 'Đang thực hiện'),
(4, 'Đã hoàn thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic_type`
--

CREATE TABLE `topic_type` (
  `id` int(10) NOT NULL,
  `topic_type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `topic_type_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topic_type`
--

INSERT INTO `topic_type` (`id`, `topic_type_name`, `topic_type_description`) VALUES
(11, 'Hệ thống nhúng', 'Đề tài khoa học Hệ thống nhúng'),
(13, 'Hệ thống thông tin', 'Đề tài khoa học Hệ thống thông tin'),
(14, 'An toàn thông tin', 'Đề tài khoa học An toàn thông tin'),
(15, 'Nền và móng', 'Đề tài khoa học Nền và móng'),
(16, 'Trí tuệ nhân tạo', 'Đề tài khoa học trí tuệ nhân tạo'),
(17, 'Học máy', 'Đề tài khoa học Học máy'),
(18, 'Công nghệ di dộng', 'Đề tài khoa học công nghệ di động'),
(19, 'Công nghệ web', 'Đề tài khoa học công nghệ web'),
(20, 'Công nghệ phần mềm', 'Các đề tài khoa học mảng công nghệ phần mềm'),
(101, 'Xử lý chống thấm cho tường và mái', 'Mô tả xử lý chống thấm cho tường và mái');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) NOT NULL,
  `create_at` date NOT NULL,
  `create_by` int(10) NOT NULL,
  `update_at` date NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`, `create_at`, `create_by`, `update_at`, `deleted`) VALUES
(1, 'user1', '123', 0, '2019-11-25', 1, '2019-11-25', 0),
(2, 'user2', '123', 1, '2019-11-25', 1, '2019-11-25', 0),
(3, 'user3', '123', 2, '2019-11-25', 1, '2019-11-25', 0),
(4, 'user4', '123', 2, '2019-11-25', 1, '2019-11-25', 0),
(5, 'user5', '123', 2, '2019-11-25', 1, '2019-11-25', 0),
(6, 'user6', '123', 2, '2019-11-25', 1, '2019-11-25', 0),
(7, 'user7', '123', 2, '2019-11-25', 1, '2019-11-25', 0),
(8, 'user8', '123', 2, '2019-11-25', 1, '2019-11-25', 0),
(9, 'user9', '123', 2, '2019-11-25', 1, '2019-11-25', 1),
(10, 'quachnam', '123', 1, '2019-11-26', 1, '2019-11-26', 0),
(11, '1111', '11', 2, '2019-11-26', 1, '2019-11-26', 0),
(12, 'anh nam', '', 0, '2019-11-26', 1, '2019-11-26', 0),
(13, 'anh nam 222', '', 1, '2019-11-26', 1, '2019-11-26', 1),
(14, 'admin', '123456', 1, '2019-11-26', 1, '2019-11-26', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_infor`
--

CREATE TABLE `user_infor` (
  `full_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT 0,
  `faculity` int(10) NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_infor`
--

INSERT INTO `user_infor` (`full_name`, `gender`, `faculity`, `birthday`, `address`, `phone_number`, `email`, `user_id`) VALUES
('Admin', 1, 1, '2000-11-25', 'Liên Chiểu - Đà Nẵng', '0123456789', 'quachhungnam@gmail.com', 1),
('Nguyen Van G', 0, 2, '2019-11-25', 'Liên Chiểu - Đà Nẵng', '0123456789', 'quachhungnam@gmail.com', 2),
('Nguyen Van A', 0, 1, '2019-11-25', 'Liên Chiểu - Đà Nẵng', '0123456789', 'quachhungnam@gmail.com', 3),
('Nguyen Van A', 0, 1, '2019-11-25', 'Liên Chiểu - Đà Nẵng', '0123456789', 'quachhungnam@gmail.com', 4),
('Nguyen Van A', 0, 1, '2019-11-25', 'Liên Chiểu - Đà Nẵng', '0123456789', 'quachhungnam@gmail.com', 5),
('Nguyen Van A', 0, 1, '2019-11-25', 'Liên Chiểu - Đà Nẵng', '0123456789', 'quachhungnam@gmail.com', 6),
('Nguyen Van A', 0, 1, '2019-11-25', 'Liên Chiểu - Đà Nẵng', '0123456789', 'quachhungnam@gmail.com', 7),
('Nguyen Van A', 0, 1, '2019-11-25', 'Liên Chiểu - Đà Nẵng', '0123456789', 'quachhungnam@gmail.com', 8),
('Nguyen Van A', 0, 1, '2019-11-25', 'Liên Chiểu - Đà Nẵng', '0123456789', 'quachhungnam@gmail.com', 9),
('nguyen van nam', 1, 1, '2019-11-07', 'adsd', 'asda', 'asda', 10),
('11', 1, 1, '2019-11-06', '11fsdf', '11fsd', '11fsdf', 11),
('', 1, 1, '0000-00-00', '', '', '', 12),
('dfgdfg', 1, 1, '2019-11-05', 'dfgdfg', 'hdgd', 'dfgdfg', 13),
('Quach Nam', 1, 1, '0000-00-00', '906, Âu Cơ, Phường 14, Quận Tân Bình, Hồ Chí Minh', 'gẻ', 'wefwf', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_register_topic`
--

CREATE TABLE `user_register_topic` (
  `user_id` int(10) NOT NULL,
  `topic_id` int(10) NOT NULL,
  `date_register` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_register_topic`
--

INSERT INTO `user_register_topic` (`user_id`, `topic_id`, `date_register`) VALUES
(4, 1, '2019-11-25');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `faculity`
--
ALTER TABLE `faculity`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_teacher` (`topic_teacher`),
  ADD KEY `topic_status` (`topic_status`),
  ADD KEY `topic_type` (`topic_type`);

--
-- Chỉ mục cho bảng `topic_details`
--
ALTER TABLE `topic_details`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `id` (`topic_id`);

--
-- Chỉ mục cho bảng `topic_status`
--
ALTER TABLE `topic_status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `topic_type`
--
ALTER TABLE `topic_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `create_by` (`create_by`);

--
-- Chỉ mục cho bảng `user_infor`
--
ALTER TABLE `user_infor`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_infor_ibfk_2` (`faculity`);

--
-- Chỉ mục cho bảng `user_register_topic`
--
ALTER TABLE `user_register_topic`
  ADD PRIMARY KEY (`user_id`,`topic_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `faculity`
--
ALTER TABLE `faculity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `topic_type`
--
ALTER TABLE `topic_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`topic_teacher`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`topic_status`) REFERENCES `topic_status` (`id`),
  ADD CONSTRAINT `topic_ibfk_3` FOREIGN KEY (`topic_type`) REFERENCES `topic_type` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`create_by`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `user_infor`
--
ALTER TABLE `user_infor`
  ADD CONSTRAINT `user_infor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_infor_ibfk_2` FOREIGN KEY (`faculity`) REFERENCES `faculity` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_register_topic`
--
ALTER TABLE `user_register_topic`
  ADD CONSTRAINT `user_register_topic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_register_topic_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
