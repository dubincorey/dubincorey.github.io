<?php
$path = 'C:\Users\Corey\Desktop\MAMP\webdev\Final_Project\data';

$filename = $path . '/like.txt';
$data = file_get_contents($filename);
$data = trim($data);
$first_split = explode("\n", $data);

$alive = intval($first_split[0]);
$vera = intval($first_split[1]);

if ($_POST['stuff'] == "alive") {
    $alive++;
}
if ($_POST['stuff'] == "vera") {
    $vera++;
}

file_put_contents($path . '/likes.txt', $alive);
file_put_contents($path . '/likes.txt', "\n" . $vera, FILE_APPEND);

exit();
