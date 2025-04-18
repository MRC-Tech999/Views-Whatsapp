<?php
$csv = 'contacts.csv';
$vcf = 'contacts.vcf';

if (!file_exists($csv)) die();

$lines = file($csv, FILE_IGNORE_NEW_LINES);
$vcards = "";

foreach ($lines as $line) {
    list($name, $number) = explode(',', $line);
    $vcards .= "BEGIN:VCARD\r\n";
    $vcards .= "VERSION:3.0\r\n";
    $vcards .= "FN:$name\r\n";
    $vcards .= "TEL;TYPE=CELL:$number\r\n";
    $vcards .= "END:VCARD\r\n";
}

file_put_contents($vcf, $vcards);
?>
