<?php
include('oeuvres.php'); 
include('bdd.php'); 

$bdd = connexion();

foreach ($oeuvres as $oeuvre) {
    $titre = htmlspecialchars($oeuvre['titre']);
    $description = htmlspecialchars($oeuvre['description']);
    $artiste = htmlspecialchars($oeuvre['artiste']);
    $image = htmlspecialchars($oeuvre['image']);

    $sql = $bdd->prepare("INSERT INTO `oeuvres` (`titre`, `description`, `artiste`, `image`) VALUES (?, ?, ?, ?)");
    $sql->execute([$titre, $description, $artiste, $image]);

    try {
        $sql->execute([$titre, $description, $artiste, $image]);
        echo "Record inserted successfully for $titre </br>";
    } catch (PDOException $e) {
        echo "Error inserting record: " . $e->getMessage() . "</br>";
    }
}

$bdd = null; // Close the connection using null, not close()
?>
