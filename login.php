<?php

// grab the username & password
$username = $_POST['username'];
$password = $_POST['password'];

// open up the 'teacheraccounts.txt' file
include('config.php');
$data = file_get_contents($file_path . '/admin.txt');
$data = trim($data);
$first_split = explode(",", $data);

// see if the supplied info matches what's in the file
if ($username == $first_split[0] && $password == $first_split[1]) {
    // if everything is OK we will drop a cookie on their computer
    setcookie('loggedin', true);
    header('Location: home.php');
    exit();
}
// if not, send them back to 'admin.php'
header('Location: index.php?loginerror=yes');
exit();
