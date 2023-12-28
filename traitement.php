<?php 



$titre = htmlspecialchars($_POST['titre']);
$artiste = htmlspecialchars($_POST['artiste']); 
$url = filter_var($_POST['image'], FILTER_VALIDATE_URL) ? htmlspecialchars($_POST['image']) : '';
$description = htmlspecialchars($_POST['description']);

if (empty($titre) || empty($description) || empty($artiste) || empty($url) || strlen($description) < 3) {
    header('location: ajouter.php');
    exit();
}

require('bdd.php');


$bdd = connexion();
$requete = $bdd->prepare('INSERT INTO `oeuvres` (`id`, `titre`, `description`, `artiste`, `image`) VALUES (NULL, ?, ?, ?, ?)');
$requete->execute([$titre, $description, $artiste, $url]);
$id = $bdd->LastInsertId();

if (empty($id) || !$id) {
    header('location: ajouter.php');
    exit();
} 

header('location: oeuvre.php?id=' . $id);
exit();


?>