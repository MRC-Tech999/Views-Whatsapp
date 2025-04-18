<?php
$vcf_file = 'contacts.vcf';
$password = '2025';

if (!isset($_GET['pw']) || $_GET['pw'] !== $password) {
    die("Accès refusé.");
}

if (!file_exists($vcf_file)) {
    die("Fichier introuvable.");
}

header('Content-Description: File Transfer');
header('Content-Type: text/x-vcard');
header('Content-Disposition: attachment; filename="contacts.vcf"');
readfile($vcf_file);
exit;
