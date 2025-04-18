<?php
$name = trim($_POST['name']);
$number = trim($_POST['number']);

if (!$name || !$number) {
    die("Nom ou numéro invalide.");
}

if (!preg_match('/^\+\d{6,15}$/', $number)) {
    die("Numéro invalide. Format requis : +codepays...");
}

$file = 'contacts.csv';
$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    list(, $existingNumber) = explode(',', $line);
    if ($number === $existingNumber) {
        die("Ce numéro existe déjà.");
    }
}

file_put_contents($file, "$name,$number\n", FILE_APPEND);

header("Location: confirmation.php");
exit;
?>
