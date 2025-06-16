<?php
require_once("modele/modele.commande.php");
class ControleurCommande
{
    /*le controleur realise les controles des données avan leur injections dans la BDD
    ou aprè leur extraction de la BDD. Il appelle le modèle pour réaliser les requetes. */
    private $unModele; //instance de la classe Modele

    public function __construct()
    {
        //instanciation du Modele
        $this->unModele = new ModeleCommande();
    }



    public function insertCommande($id_client)
    {

         $this->unModele->insertCommande($id_client);


    }

    public function selectWhereCommande($id_client)
    {

         return $this->unModele->selectWhereCommande($id_client);


    }

    public function selectAllCommandes($id_client)
    {

         return $this->unModele->selectAllCommandes($id_client);


    }
}