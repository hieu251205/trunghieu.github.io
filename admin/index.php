<?php include '../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị - Trang Tin Tức</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1>Quản trị Trang Tin Tức</h1>
            <nav class="admin-nav">
                <a href="../index.php">← Về trang chủ</a>
                <a href="add_article.php" class="btn-primary">+ Thêm bài viết</a>
            </nav>
        </header>

        <div class="admin-content">
            <h2>Danh sách bài viết</h2>
            
            <?php
            $result = $conn->query("SELECT a.*, c.name as category_name 
                                   FROM articles a 
                                   LEFT JOIN categories c ON a.category_id = c.id 
                                   ORDER BY a.created_at DESC");
            
            if ($result->num_rows > 0):
            ?>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Danh mục</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td><?= htmlspecialchars($row['category_name']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></td>
                            <td>
                                <a href="edit_article.php?id=<?= $row['id'] ?>" class="btn-small">Sửa</a>
                                <a href="delete_article.php?id=<?= $row['id'] ?>" 
                                   class="btn-small btn-danger" 
                                   onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')">Xóa</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Chưa có bài viết nào.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html> 