<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT name FROM categories WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($cat_name);
$stmt->fetch();
$stmt->close();

if (!$cat_name) {
    echo "<p>Danh mục không tồn tại.</p>";
    include 'includes/footer.php';
    exit;
}
?>

<div class="container">
    <h2>Danh mục: <?= htmlspecialchars($cat_name) ?></h2>
    
    <?php
    $stmt = $conn->prepare("SELECT * FROM articles WHERE category_id = ? ORDER BY created_at DESC");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0):
        while($row = $result->fetch_assoc()):
    ?>
        <article class="article-preview">
            <h3><a href="article.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?></a></h3>
            <?php if ($row['image']): ?>
                <img src="assets/images/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="article-image">
            <?php endif; ?>
            <p class="article-excerpt"><?= mb_substr(strip_tags($row['content']), 0, 150) ?>...</p>
            <div class="article-meta">
                <span class="date"><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></span>
            </div>
        </article>
    <?php 
        endwhile;
    else:
    ?>
        <p>Chưa có bài viết nào trong danh mục này.</p>
    <?php endif; ?>
    
    <div class="navigation">
        <a href="index.php" class="btn">← Về trang chủ</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?> 