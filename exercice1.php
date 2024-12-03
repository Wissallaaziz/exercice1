<?php
$employees = [
    ['nom' => 'Alice', 'poste' => 'Développeur', 'salaire' => 3000],
    ['nom' => 'Bob', 'poste' => 'Manager', 'salaire' => 4500],
    ['nom' => 'Charlie', 'poste' => 'Designer', 'salaire' => 2800],
    ['nom' => 'David', 'poste' => 'Chef de projet', 'salaire' => 5000],
    ['nom' => 'Eva', 'poste' => 'Développeur', 'salaire' => 3500]
];
function calculerSalaireMoyen($employees) {
    $totalSalaire = 0;
    foreach ($employees as $employee) {
        $totalSalaire += $employee['salaire'];
    }
    return $totalSalaire / count($employees);
}
$salaireMoyen = calculerSalaireMoyen($employees);
$searchResult = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['recherche_nom'])) {
    $rechercheNom = htmlspecialchars($_POST['recherche_nom']);
    $found = false;
    foreach ($employees as $employee) {
        if (strtolower($employee['nom']) == strtolower($rechercheNom)) {
            $searchResult = "Nom: " . $employee['nom'] . "<br>Poste: " . $employee['poste'] . "<br>Salaire: " . $employee['salaire'] . "€";
            $found = true;
            break;
        }
    }
    if (!$found) {
        $searchResult = "Employé non trouvé.";
    }
}
$users = [
    'user@example.com' => 'password123',
    'admin@example.com' => 'adminpass'
];
$loginResult = '';
if (isset($_POST['login_email']) && isset($_POST['login_password'])) {
    $email = htmlspecialchars($_POST['login_email']);
    $password = htmlspecialchars($_POST['login_password']);
    
    if (isset($users[$email]) && $users[$email] == $password) {
        $loginResult = "Connexion réussie!";
    } else {
        $loginResult = "Identifiants incorrects.";
    }
}
$cart = [];
if (isset($_POST['ajouter_panier'])) {
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productQuantity = $_POST['product_quantity'];
    
    $cart[] = [
        'name' => $productName,
        'price' => $productPrice,
        'quantity' => $productQuantity
    ];
}

$totalPanier = 0;
foreach ($cart as $item) {
    $totalPanier += $item['price'] * $item['quantity'];
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices PHP</title>
</head>
<body>

<h2>1. Calcul du salaire moyen</h2>
<p>Le salaire moyen des employés est : <?php echo number_format($salaireMoyen, 2); ?>€</p>

<h2>2. Recherche d'un employé</h2>
<form method="POST">
    <label for="recherche_nom">Entrez le nom d'un employé :</label>
    <input type="text" name="recherche_nom" id="recherche_nom" required>
    <button type="submit">Rechercher</button>
</form>
<p><?php echo $searchResult; ?></p>

<h2>3. Formulaire de connexion</h2>
<form method="POST">
    <label for="login_email">Email :</label>
    <input type="email" name="login_email" id="login_email" required><br>
    <label for="login_password">Mot de passe :</label>
    <input type="password" name="login_password" id="login_password" required><br>
    <button type="submit">Se connecter</button>
</form>
<p><?php echo $loginResult; ?></p>

<h2>4. Panier</h2>
<form method="POST">
    <label for="product_name">Nom du produit :</label>
    <input type="text" name="product_name" id="product_name" required><br>
    <label for="product_price">Prix :</label>
    <input type="number" name="product_price" id="product_price" required><br>
    <label for="product_quantity">Quantité :</label>
    <input type="number" name="product_quantity" id="product_quantity" required><br>
    <button type="submit" name="ajouter_panier">Ajouter au panier</button>
</form>

<h3>Contenu du panier :</h3>
<ul>
    <?php
    if (!empty($cart)) {
        foreach ($cart as $item) {
            echo "<li>" . $item['name'] . " - " . $item['quantity'] . " x " . $item['price'] . "€</li>";
        }
    } else {
        echo "<li>Votre panier est vide.</li>";
    }
    ?>
</ul>

<h3>Total du panier :</h3>
<p><?php echo number_format($totalPanier, 2); ?>€</p>

</body>
</html>
