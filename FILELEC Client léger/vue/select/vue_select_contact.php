<head>
    <link rel="stylesheet" href="assets/css/contact.css">
</head>
<body>
    <div class="background-3d"></div>

    <div class="contact-wrapper">
        <div class="contact-container">
            <h2>Contactez-nous</h2>
            <form id="contact-form" action="vue/insert/vue_insert_contact.php" method="POST">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Numéro de téléphone</label>
                    <input type="tel" id="telephone" name="telephone" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</body>
