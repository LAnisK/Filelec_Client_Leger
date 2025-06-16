<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Profil</title>
    <link rel="stylesheet" href="assets\css\profil.css">
</head>
<body>
    <div class="profile-container">
        <h1>Mon Profil</h1>
        <!-- Section des informations utilisateur -->
        <form method="POST" action="index.php?page=8&action=updateProfil" onsubmit="return confirm('Êtes-vous sûr de vouloir enregistrer les modifications ?');">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($_SESSION['nom']) ?>" required>
            </div>
 
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars($_SESSION['prenom']) ?>" required>
            </div>
 
            <div class="form-group">
                <label for="telephone">Téléphone :</label>
                <input type="tel" name="telephone" id="telephone" value="<?= htmlspecialchars($_SESSION['tel']) ?>" required>
            </div>
 
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" id="adresse" value="<?= htmlspecialchars($_SESSION['adresse']) ?>" required>
            </div>
 
            <div class="form-group">
                <label for="password">Email :</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($_SESSION['email']) ?>" required>
            </div>
 
        </form>
 
        <!-- Boutons de déconnexion et suppression -->
        <div class="action-buttons">
            <a href="index.php?page=6" class="logout-button">Se déconnecter</a>
            <a href="index.php?page=8&action=supProfil" class="delete-button" action="sup" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?')">Supprimer mon compte</a>
        </div>
    </div>
</body>
</html>
 
