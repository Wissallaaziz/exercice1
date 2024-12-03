<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices PHP</title>
</head>
<body>
    <?php
    $etudiant = [
        'nom' => 'Alali',
        'prénom' => 'Mohammed',
        'matricule' => '12345'
    ];
    echo "<h3> Étudiant</h3>";
    echo "Nom : {$etudiant['nom']}, Prénom : {$etudiant['prénom']}, Matricule : {$etudiant['matricule']}<br>";
    $etudiant['note'] = 15; 
    $etudiant['note'] = 18;
    echo "<h3> Note mise à jour</h3>";
    echo "Note : {$etudiant['note']}<br>";
    $produits = [
        ['nom' => 'Téléphone', 'prix' => 1200],
        ['nom' => 'Ordinateur', 'prix' => 4500],
        ['nom' => 'Casque', 'prix' => 200]
    ];
    echo "<h3> Produits et prix</h3>";
    foreach ($produits as $produit) {
        echo "Produit : {$produit['nom']}, Prix : {$produit['prix']}<br>";
    }
    $scores = [
        'Ali' => 85,
        'Sara' => 90,
        'Khaled' => 75,
        'Nour' => 80,
        'Fatima' => 95
    ];
    $moyenne = array_sum($scores) / count($scores);
    echo "<h3> Moyenne des scores</h3>";
    echo "Moyenne : " . number_format($moyenne, 2) . "<br>";
    $pays = [
        'Maroc' => 37000000,
        'Algérie' => 44000000,
        'Tunisie' => 12000000
    ];
    arsort($pays);
    echo "<h3>Pays triés par population</h3>";
    foreach ($pays as $nom => $population) {
        echo "Pays : $nom, Population : $population<br>";
    }
    ?>
    <h3>Formulaire nom et âge</h3>
    <form method="POST" action="">
        Nom : <input type="text" name="nom" required><br>
        Âge : <input type="number" name="age" required><br>
        <button type="submit">Soumettre</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nom = htmlspecialchars($_POST['nom']);
        $age = (int)$_POST['age'];
        if ($age > 0) {
            echo "Bienvenue, $nom, vous avez $age ans !<br>";
        } else {
            echo "Erreur : Âge invalide.<br>";
        }
    }
    ?>
    <h3> Choix de couleur</h3>
    <form method="POST" action="">
        Choisissez une couleur préférée :
        <select name="couleur">
            <option value="Rouge">Rouge</option>
            <option value="Vert">Vert</option>
            <option value="Bleu">Bleu</option>
        </select>
        <button type="submit">Soumettre</button>
    </form>
    <?php
    if (isset($_POST['couleur'])) {
        $couleur = htmlspecialchars($_POST['couleur']);
        echo "Votre couleur préférée est : $couleur<br>";
    }
    ?>

    <h3>Somme de deux nombres</h3>
    <form method="GET" action="">
        Nombre 1 : <input type="number" name="nombre1" required><br>
        Nombre 2 : <input type="number" name="nombre2" required><br>
        <button type="submit">Calculer</button>
    </form>
    <?php
    if (isset($_GET['nombre1']) && isset($_GET['nombre2'])) {
        $nombre1 = (int)$_GET['nombre1'];
        $nombre2 = (int)$_GET['nombre2'];
        $somme = $nombre1 + $nombre2;
        echo "La somme est : $somme<br>";
    }
    ?>
    <h3>Sélection de type de compte</h3>
    <form method="POST" action="">
        Choisissez votre type de compte :
        <select name="type_compte">
            <option value="Administrateur">Administrateur</option>
            <option value="Utilisateur">Utilisateur</option>
        </select>
        <button type="submit">Soumettre</button>
    </form>
    <?php
    if (isset($_POST['type_compte'])) {
        $type_compte = htmlspecialchars($_POST['type_compte']);
        if ($type_compte == 'Administrateur') {
            echo "Bienvenue, administrateur !<br>";
        } else {
            echo "Bienvenue, utilisateur simple !<br>";
        }
    }
    ?>
</body>
</html>
