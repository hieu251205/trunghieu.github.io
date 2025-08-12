-- Tạo database
CREATE DATABASE IF NOT EXISTS news_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE news_db;

-- Tạo bảng categories
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Tạo bảng articles
CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- Thêm dữ liệu mẫu cho categories
INSERT INTO categories (name) VALUES 
('Thể thao'),
('Giải trí'),
('Công nghệ'),
('Kinh tế'),
('Giáo dục');

-- Thêm dữ liệu mẫu cho articles
INSERT INTO articles (title, content, category_id) VALUES 
('Việt Nam giành chiến thắng trong trận đấu quốc tế', 
'Đội tuyển Việt Nam đã có một trận đấu xuất sắc và giành chiến thắng với tỷ số 2-1 trước đối thủ mạnh. Các cầu thủ đã thể hiện tinh thần thi đấu quyết liệt và kỹ thuật điêu luyện, mang lại niềm vui cho người hâm mộ cả nước.

Trận đấu diễn ra trong không khí sôi động với sự cổ vũ nhiệt tình của hàng nghìn khán giả. Đội trưởng đã ghi bàn mở tỷ số ở phút thứ 25, và sau đó đội nhà tiếp tục ghi thêm bàn thắng thứ hai ở hiệp hai.

Huấn luyện viên trưởng đã bày tỏ sự hài lòng với màn trình diễn của các cầu thủ và tin tưởng vào khả năng của đội tuyển trong các trận đấu sắp tới.', 
1),

('Phim bom tấn mới thu hút hàng triệu khán giả', 
'Bộ phim bom tấn mới nhất đã thu hút sự chú ý của hàng triệu khán giả trong tuần đầu công chiếu. Với kinh phí đầu tư lớn và dàn diễn viên nổi tiếng, bộ phim đã tạo nên cơn sốt trong giới điện ảnh.

Cốt truyện hấp dẫn cùng với hiệu ứng hình ảnh đỉnh cao đã mang lại trải nghiệm xem phim tuyệt vời cho khán giả. Các nhà phê bình điện ảnh cũng đánh giá cao về chất lượng nghệ thuật và thông điệp ý nghĩa của bộ phim.

Dự kiến bộ phim sẽ tiếp tục thu hút đông đảo khán giả trong những tuần tới và có thể phá vỡ các kỷ lục doanh thu trước đó.', 
2),

('Công nghệ AI mới thay đổi cách chúng ta làm việc', 
'Công nghệ trí tuệ nhân tạo (AI) mới nhất đã được giới thiệu và được dự đoán sẽ thay đổi hoàn toàn cách chúng ta làm việc trong tương lai. Với khả năng tự động hóa cao và học hỏi liên tục, AI mới này có thể thực hiện các tác vụ phức tạp một cách hiệu quả.

Các chuyên gia công nghệ cho biết, AI mới này sẽ giúp tăng năng suất lao động lên đến 300% và giảm thiểu các lỗi do con người gây ra. Nhiều doanh nghiệp đã bắt đầu áp dụng công nghệ này vào quy trình sản xuất và quản lý.

Tuy nhiên, cũng có những lo ngại về việc AI có thể thay thế một số công việc của con người. Các chuyên gia khuyến nghị cần có các chính sách phù hợp để đảm bảo sự cân bằng giữa tự động hóa và việc làm.', 
3),

('Kinh tế Việt Nam tăng trưởng ổn định trong quý 4', 
'Nền kinh tế Việt Nam tiếp tục duy trì đà tăng trưởng ổn định trong quý 4 với mức tăng GDP đạt 7.2%. Đây là kết quả tích cực của các chính sách kinh tế vĩ mô hiệu quả và sự phục hồi mạnh mẽ của các ngành sản xuất.

Các chuyên gia kinh tế đánh giá cao sự linh hoạt và khả năng thích ứng của nền kinh tế Việt Nam trước những thách thức toàn cầu. Xuất khẩu tiếp tục là động lực tăng trưởng chính với nhiều mặt hàng đạt kỷ lục về kim ngạch.

Dự báo trong năm tới, kinh tế Việt Nam sẽ tiếp tục duy trì đà tăng trưởng tích cực với mức tăng GDP dự kiến đạt 6.5-7%.', 
4),

('Giáo dục trực tuyến trở thành xu hướng mới', 
'Giáo dục trực tuyến đang trở thành xu hướng mới trong ngành giáo dục với sự phát triển mạnh mẽ của công nghệ số. Nhiều trường học và tổ chức giáo dục đã chuyển đổi sang hình thức học tập trực tuyến để thích ứng với tình hình mới.

Các nền tảng học trực tuyến đã cung cấp đa dạng các khóa học từ cơ bản đến nâng cao, phù hợp với mọi lứa tuổi và nhu cầu học tập. Học sinh và sinh viên có thể tiếp cận kiến thức mọi lúc, mọi nơi với chi phí hợp lý.

Tuy nhiên, việc chuyển đổi sang giáo dục trực tuyến cũng đặt ra những thách thức về chất lượng giảng dạy và tương tác giữa giáo viên và học sinh. Các chuyên gia giáo dục đang nghiên cứu các phương pháp để nâng cao hiệu quả học tập trực tuyến.', 
5); 