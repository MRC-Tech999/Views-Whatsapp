<?php
session_start();

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
  <meta charset="UTF-8">
  <title>Téléchargement sécurisé</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Mot de passe requis</h1>
    <form method="POST">
      <input type="password" name="code" placeholder="Entrer le mot de passe" required>
      <button type="submit">Télécharger</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
  </div>
</body>
</html>
