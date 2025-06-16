<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/catalogue.css">
    <title>Catalogue</title>
</head>

<body>
    <br>


    <!-- Barre de navigation latérale -->


    <!-- Contenu principal -->
    <div class="content">
        <h1>Catalogue des articles</h1>

        <?php if (empty($articles)): ?>
            <p>Aucun article disponible pour le moment.</p>
        <?php else: ?>
            <div class="articles">
                <?php foreach ($articles as $article): ?>

                    <div class="article">
                        <h2>
                            <?= htmlspecialchars($article['nom_article']) ?>
                            <span>(<?= htmlspecialchars($article['nom_cat']) ?>)</span>
                        </h2>
                        <img src='<?= $article['url_image'] ?>' alt='Non fournie' class='article-img'>
                        <p><?= htmlspecialchars($article['description_article']) ?></p>
                        <p class="price">Prix : <strong><?= number_format($article['prix_article'], 2, ',', ' ') ?> €</strong>
                        </p>


                        <a href="index.php?page=art&id=<?= urlencode($article['id_article']) ?>" class="view-button">
                            Voir l'article
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>