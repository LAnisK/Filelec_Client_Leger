<?php
class ModeleCommande
{
    private $unPdo; //PDO : PHP DATA Object c'est une classe PHP librairie qui permet la connexion sécurisée à la base de données.

    public function __construct()
    {
        try {
            $serveur = "localhost";
            $bdd = "filelec";
            $user = "root";
            $mdp = "root";
            //instanciation de la classe PDO
            $this->unPdo = new PDO("mysql:host=" . $serveur . ";dbname=" . $bdd, $user, $mdp);
        } catch (PDOException $exp) {
            echo "Erreur de connexion à la base de données.";
            echo $exp->getMessage(); //message officiel de l'erreur

        }

    }
    public function insertCommande($idclient)
    {
        $requete = "call insertcommande ('".$idclient."');";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
    }

    public function selectWhereCommande($idclient)
    {
        $requete = "select * from commande where id_client = ".$idclient." and date_commande = curdate() and id_commande >= (select max(id_commande) from commande where id_client = ".$idclient.");";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetch();
    }

    public function selectAllCommandes($idclient)
    {
        $requete = "select * from commande where id_client = ".$idclient;
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }


}



?>


