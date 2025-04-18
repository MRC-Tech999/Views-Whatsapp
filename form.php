<?php
$vcf_file = 'contacts.vcf';
$password = '2025';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $numero = htmlspecialchars($_POST['numero']);
    $pass = $_POST['password'];

    if ($pass !== $password) {
        $message = "Mot de passe incorrect.";
    } else {
        $contact = "BEGIN:VCARD\nVERSION:3.0\nFN:$nom\nTEL:$numero\nEND:VCARD\n";
        file_put_contents($vcf_file, $contact, FILE_APPEND);
        $message = "Numéro ajouté dans le fichier.";
    }
}

$contact_count = file_exists($vcf_file) ? substr_count(file_get_contents($vcf_file), "BEGIN:VCARD") : 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un contact - WhatsApp Views</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Ajouter vos informations</h2>
    <form method="POST">
        <input type="text" name="nom" placeholder="Nom complet" required><br>
        <input type="tel" name="numero" placeholder="Numéro WhatsApp" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <button type="submit">Submit</button>
    </form>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>

    <p>Nombre de contacts dans le fichier : <strong><?= $contact_count ?></strong></p>

    <?php if (isset($message) && $message === "Numéro ajouté dans le fichier.") : ?>
        <a href="download.php?pw=2025" class="btn">Télécharger le fichier</a>
    <?php endif; ?>

    <p><a href="index.html" class="btn">Retour à l’accueil</a></p>
</div>
</body>
</html>
