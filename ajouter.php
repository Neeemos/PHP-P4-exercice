<?php require 'header.php'; ?>

<?php if (isset($_GET['success']) && $_GET['success'] == 1) : ?>
    <div class="resultat__ajout--success">
    <p class="success">Oeuvre added successfully!</p>
    </div>
<?php endif; ?>

<?php if (isset($_GET['error'])) : ?>
    <div class="resultat__ajout--error">
    <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
    </div>
<?php endif; ?>

<form action="traitement.php" method="POST">
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre</label>
        <input type="text" name="titre" id="titre">
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input type="text" name="artiste" id="artiste">
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image">
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php require 'footer.php'; ?>
