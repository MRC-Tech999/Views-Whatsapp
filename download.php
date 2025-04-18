<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    if ($code === '2025') {
        include 'generate_vcf.php';
        header('Content-Type: text/vcard');
        header('Content-Disposition: attachment; filename="contacts.vcf"');
        readfile('contacts.vcf');
        exit;
    } else {
        $error = "Mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Téléchargement sécurisé</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <h1>Télécharger les contacts</h1>
    <form method="POST">
      <input type="password" name="code" placeholder="Mot de passe" required />
      <button type="submit">Télécharger</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <a href="index.html" class="btn">Retour</a>
  </div>

  <a href="#" class="top-link">Retour en haut</a>
</body>
</html>
