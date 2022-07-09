<?php
$dsn = "mysql:host=localhost;dbname=itexLab1Ded"; // В конце имя БД
$user = 'root';
$pass = '';
$options = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
try {
    $dbh = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $ex) {
}
 ?>
