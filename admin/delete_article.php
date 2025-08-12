<?php 
include '../includes/config.php';

$id = intval($_GET['id']);

if ($id > 0) {
    // Lấy thông tin ảnh trước khi xóa
    $stmt = $conn->prepare("SELECT image FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $article = $result->fetch_assoc();
    
    // Xóa bài viết
    $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Xóa file ảnh nếu có
        if ($article && $article['image'] && file_exists('../assets/images/' . $article['image'])) {
            unlink('../assets/images/' . $article['image']);
        }
        header("Location: index.php?deleted=1");
    } else {
        header("Location: index.php?error=1");
    }
} else {
    header("Location: index.php");
}

exit;
?> 