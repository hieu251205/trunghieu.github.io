<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT a.*, c.name as category_name 
                       FROM articles a 
                       LEFT JOIN categories c ON a.category_id = c.id 
                       WHERE a.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

if (!$article) {
    echo "<p>Bài viết không tồn tại.</p>";
    include 'includes/footer.php';
    exit;
}
?>

<div class="container">
    <article class="article-detail">
        <h1><?= htmlspecialchars($article['title']) ?></h1>
        
        <div class="article-meta">
            <span class="category"><?= htmlspecialchars($article['category_name']) ?></span>
            <span class="date"><?= date('d/m/Y H:i', strtotime($article['created_at'])) ?></span>
        </div>
        
        <?php if ($article['image']): ?>
            <img src="assets/images/<?= htmlspecialchars($article['image']) ?>" 
                 alt="<?= htmlspecialchars($article['title']) ?>" 
                 class="article-main-image">
        <?php endif; ?>
        
        <div class="article-content">
            <?= nl2br(htmlspecialchars($article['content'])) ?>
        </div>
        
        <div class="article-navigation">
            <a href="index.php" class="btn">← Về trang chủ</a>
            <?php if ($article['category_id']): ?>
                <a href="category.php?id=<?= $article['category_id'] ?>" class="btn">← Về danh mục</a>
            <?php endif; ?>
        </div>
    </article>
</div>

<?php include 'includes/footer.php'; ?> 