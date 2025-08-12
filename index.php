<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Tin mới nhất</h2>
    
    <?php
    $result = $conn->query("SELECT a.*, c.name as category_name 
                           FROM articles a 
                           LEFT JOIN categories c ON a.category_id = c.id 
                           ORDER BY a.created_at DESC LIMIT 10");
    
    if ($result->num_rows > 0):
        while($row = $result->fetch_assoc()):
    ?>
        <article class="article-preview">
            <h3><a href="article.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?></a></h3>
            <?php if ($row['image']): ?>
                <img src="assets/images/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="article-image">
            <?php endif; ?>
            <p class="article-excerpt"><?= mb_substr(strip_tags($row['content']), 0, 200) ?>...</p>
            <div class="article-meta">
                <span class="category"><?= htmlspecialchars($row['category_name']) ?></span>
                <span class="date"><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></span>
            </div>
        </article>
    <?php 
        endwhile;
    else:
    ?>
        <p>Chưa có bài viết nào.</p>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?> 