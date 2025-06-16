
<center>
    <table border="1">
        <tr>
            <th>Clé</th>
            <th>Valeur</th>
        </tr>
        <tr><td>id_commande</td><td><?php echo $uneCommande['id_commande']; ?></td></tr>
        <tr><td>id_client</td><td><?php echo $uneCommande['id_client']; ?></td></tr>
        <tr><td>date_commande</td><td><?php echo $uneCommande['date_commande']; ?></td></tr>
        <tr><td>statut</td><td><?php echo $uneCommande['statut']; ?></td></tr>
        <tr><td>montant_total</td><td><?php echo $uneCommande['montant_total']; ?> €</td></tr>
        <tr><td>adresse_livraison</td><td><?php echo $uneCommande['adresse_livraison']; ?></td></tr>
        <tr><td>pdf_com</td><td><?php echo $uneCommande['pdf_com']; ?></td></tr>
    </table>
</center>
