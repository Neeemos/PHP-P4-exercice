<?php

function connexion()
{
   try {
      return new PDO('mysql:dbname=artBox;host=localhost', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   } catch (PDOException $e) {
      die('Erreur :' . $e->getMessage());
   }
}