include "param.php";

// C'est la meilleur façon d'exécuter une requête SQL
// Pour plus d'exemples, voir mysql_real_escape_string()
// je veux faire un commit 


$query = "SELECT t.id_train, G1.nom_gare AS depart,G2.nom_gare AS arrivee,t.heure_depart,t.heure_arrivee,TIMEDIFF(t.heure_arrivee,t.heure_depart) AS duree\n"

. "FROM train t\n"

. "INNER JOIN gare G1 ON t.id_gare_depart=G1.id_gare\n"

. "INNER JOIN gare G2 ON t.id_gare_arrivee=G2.id_gare\n"

. "ORDER BY t.`heure_depart` ASC";


// Exécution de la requête
$result = mysql_query($query);

// Vérification du résultat
// Ceci montre la requête envoyée à MySQL ainsi que l'erreur. Utile pour déboguer.
if (!$result) {
    $message  = 'Requête invalide : ' . mysql_error() . "\n";
    $message .= 'Requête complète : ' . $query;
    die($message);
}

// Utilisation du résultat
// Tenter d'affichager $result ne vous donnera pas d'informations contenues dans la ressource
// Une des fonctions MySQL de résultat doit être utilisée
// Voir aussi mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.

echo "
<style>

table,
td {
    border: 1px solid #333;
}

thead,
tfoot {
    background-color: #333;
    color: #fff;
}

</style>";

echo "<table>
    <thead>
        <tr>
            <th colspan=\"5\">The table header</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> id train </id>
            <td>depart </td>
            <td>arrive</td>
            <td>ville depart </td>
            <td>ville arrivee</td>
        </tr>";

while ($row = mysql_fetch_assoc($result)) {
    echo "<tr>";

    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['Heure Dep']."</td>";
    echo "<td>".$row['Heure Arr']."</td>";
    echo "<td>".$row['Gare Dep']."</td>";
    echo "<td>".$row['Gare Arr']."</td>";

    echo "</tr>";

}


echo "</tbody>
</table>";

// Libération des ressources associées au jeu de résultats
// Ceci est effectué automatiquement à la fin du script
mysql_free_result($result);
?>
