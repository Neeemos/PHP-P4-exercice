<?php
require('bdd.php');

$titre = htmlspecialchars($_POST['titre']);
$artiste = htmlspecialchars($_POST['artiste']); 
$url = filter_var($_POST['image'], FILTER_VALIDATE_URL) ? htmlspecialchars($_POST['image']) : '';
$description = htmlspecialchars($_POST['description']);
$errorMessage = '';

if (empty($titre) || empty($artiste) || empty($url) || strlen($description) < 3) {
    $errorMessage = 'Veuillez vérifier vos champs.';
} else {
    $bdd = connexion();
    $requete = $bdd->prepare('INSERT INTO `oeuvres` (`titre`, `description`, `artiste`, `image`) VALUES (?, ?, ?, ?)');
    $requete->execute([$titre, $description, $artiste, $url]);
    $id = $bdd->lastInsertId();

    if (empty($id) || !$id) {
        $errorMessage = 'Une erreur est survenue. merci de réessayer.';
    } else {
        header('location: ajouter.php?success=1');
        exit();
    }
}

// Redirect to ajouter.php with error message
header('location: ajouter.php?error=' . urlencode($errorMessage));
exit();
?>
