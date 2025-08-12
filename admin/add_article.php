<?php 
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category_id = intval($_POST['category_id']);
    $image = '';
    
    // Xử lý upload ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['image']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed)) {
            $newname = uniqid() . '.' . $ext;
            $upload_path = '../assets/images/' . $newname;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                $image = $newname;
            }
        }
    }
    
    if (!empty($title) && !empty($content)) {
        $stmt = $conn->prepare("INSERT INTO articles (title, content, image, category_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $title, $content, $image, $category_id);
        
        if ($stmt->execute()) {
            header("Location: index.php?success=1");
            exit;
        } else {
            $error = "Lỗi khi thêm bài viết: " . $conn->error;
        }
    } else {
        $error = "Vui lòng điền đầy đủ thông tin.";
    }
}

// Lấy danh sách danh mục
$categories = $conn->query("SELECT * FROM categories ORDER BY name");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài viết - Quản trị</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1>Thêm bài viết mới</h1>
            <nav class="admin-nav">
                <a href="index.php">← Về quản trị</a>
            </nav>
        </header>

        <div class="admin-content">
            <?php if (isset($error)): ?>
                <div class="alert alert-error"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" class="admin-form">
                <div class="form-group">
                    <label for="title">Tiêu đề:</label>
                    <input type="text" id="title" name="title" required 
                           value="<?= isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '' ?>">
                </div>

                <div class="form-group">
                    <label for="category_id">Danh mục:</label>
                    <select id="category_id" name="category_id">
                        <option value="">Chọn danh mục</option>
                        <?php while ($cat = $categories->fetch_assoc()): ?>
                            <option value="<?= $cat['id'] ?>" 
                                    <?= (isset($_POST['category_id']) && $_POST['category_id'] == $cat['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['name']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Ảnh (tùy chọn):</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>

                <div class="form-group">
                    <label for="content">Nội dung:</label>
                    <textarea id="content" name="content" rows="15" required><?= isset($_POST['content']) ? htmlspecialchars($_POST['content']) : '' ?></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Thêm bài viết</button>
                    <a href="index.php" class="btn">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 