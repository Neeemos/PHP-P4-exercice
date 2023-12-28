<?php

function connexion() {
   return new PDO('mysql:dbname=artBox;host=localhost','root','');
}