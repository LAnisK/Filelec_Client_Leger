<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'controleur/controleur.panier.php';


// Instanciation du contrôleur
$controleur = new ControleurPanier();

$panier = $controleur->getPanierClient($_SESSION['id_client']);

if (isset($_GET['action']) && $_GET['action'] == "supPanier") {
    $id_article = $_GET['id_article'];
    $controleur->deletePanierClient($id_article, $panier[0]['id_panier']);
    header("Location: index.php?page=10");
}

require_once('vue/vue_panier.php');
?>