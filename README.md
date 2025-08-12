# Website Tin Tức PHP

Một website tin tức đơn giản được xây dựng bằng PHP thuần với MySQL, có đầy đủ chức năng quản trị.

## Tính năng

### Frontend
- ✅ Trang chủ hiển thị tin tức mới nhất
- ✅ Trang chi tiết bài viết
- ✅ Trang danh mục tin tức
- ✅ Giao diện responsive, đẹp mắt
- ✅ Hiển thị ảnh bài viết

### Backend (Admin)
- ✅ Quản lý bài viết (thêm, sửa, xóa)
- ✅ Upload ảnh cho bài viết
- ✅ Phân loại bài viết theo danh mục
- ✅ Giao diện quản trị thân thiện

## Cài đặt

### Yêu cầu hệ thống
- PHP 7.4 trở lên
- MySQL 5.7 trở lên
- Web server (Apache/Nginx) hoặc XAMPP/Laragon

### Bước 1: Cài đặt XAMPP
1. Tải và cài đặt [XAMPP](https://www.apachefriends.org/)
2. Khởi động Apache và MySQL

### Bước 2: Tạo database
1. Mở phpMyAdmin: `http://localhost/phpmyadmin`
2. Tạo database mới tên `news_db`
3. Import file `database.sql` để tạo bảng và dữ liệu mẫu

### Bước 3: Cấu hình
1. Copy thư mục `news-website` vào `htdocs` của XAMPP
2. Kiểm tra file `includes/config.php` và điều chỉnh thông tin kết nối database nếu cần

### Bước 4: Tạo thư mục upload
```bash
mkdir assets/images
chmod 755 assets/images  # Trên Linux/Mac
```

## Sử dụng

### Truy cập website
- Trang chủ: `http://localhost/news-website/`
- Quản trị: `http://localhost/news-website/admin/`

### Quản lý bài viết
1. Truy cập trang quản trị
2. Click "Thêm bài viết" để tạo bài viết mới
3. Điền thông tin: tiêu đề, nội dung, chọn danh mục
4. Upload ảnh (tùy chọn)
5. Click "Thêm bài viết" để lưu

### Chỉnh sửa bài viết
1. Trong trang quản trị, click "Sửa" bên cạnh bài viết
2. Thay đổi thông tin cần thiết
3. Click "Cập nhật bài viết"

### Xóa bài viết
1. Trong trang quản trị, click "Xóa" bên cạnh bài viết
2. Xác nhận xóa

## Cấu trúc thư mục

```
news-website/
│
├── index.php                # Trang chủ
├── category.php             # Trang danh mục
├── article.php              # Trang chi tiết bài viết
├── database.sql             # File SQL tạo database
├── README.md               # Hướng dẫn sử dụng
│
├── admin/                   # Thư mục quản trị
│   ├── index.php           # Trang quản trị chính
│   ├── add_article.php     # Thêm bài viết
│   ├── edit_article.php    # Sửa bài viết
│   └── delete_article.php  # Xóa bài viết
│
├── includes/               # Thư mục chứa file include
│   ├── config.php         # Cấu hình database
│   ├── header.php         # Header HTML
│   └── footer.php         # Footer HTML
│
└── assets/                # Thư mục tài nguyên
    ├── css/
    │   ├── style.css      # CSS chính
    │   └── admin.css      # CSS quản trị
    └── images/            # Thư mục chứa ảnh upload
```

## Tùy chỉnh

### Thêm danh mục mới
1. Vào phpMyAdmin
2. Thêm dòng mới vào bảng `categories`
3. Cập nhật menu trong `includes/header.php`

### Thay đổi giao diện
- Chỉnh sửa file `assets/css/style.css` cho frontend
- Chỉnh sửa file `assets/css/admin.css` cho backend

### Bảo mật
- Thêm xác thực đăng nhập cho trang admin
- Sử dụng HTTPS trong môi trường production
- Validate và sanitize input từ người dùng

## Hỗ trợ

Nếu gặp vấn đề, hãy kiểm tra:
1. Kết nối database trong `includes/config.php`
2. Quyền ghi thư mục `assets/images/`
3. Phiên bản PHP và MySQL

## License

Dự án này được phát hành dưới giấy phép MIT. 