<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($article['nom_article']) ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/article_unique.css">

</head>

<body>

    <div class="article-page">
        <?php

        $chemin = $article['url_image'];

        ?>
        <h1><?= ($article['nom_article']) ?></h1>
        <div class="zoom-container">
             <img src="<?= htmlspecialchars($article['url_image']) ?>" alt="Image de l'article" class="zoomable-img">
        </div>
         
        <p class="price">Prix : <strong><?= $article['prix_article'] ?> €</strong></p>
        
        <p>
        <h4>Description article: </h4>
        </p>
        <p class="article-description"><?= $article['description_article'] ?></p>

        <form method="post">
            <div>
                <label for="quantite">Quantité :</label>
                <select name="quantite" id="quantite">
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <button type="submit" name="AjouterA" class="back-btn">Ajouter au panier</button>
        </form>
        <a href="index.php?page=9" class="back-btn">Retour au catalogue</a>
    </div>




    <script src="assets/js/article.js"></script>
</body>

</html>