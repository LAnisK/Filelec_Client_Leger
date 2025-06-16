<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'controleur/controleur.commande.php';

$id_client = $_SESSION['id_client']; 

// Instanciation du contrôleur
$controleur = new ControleurCommande();

require_once('vue/vue_commande.php');
?>