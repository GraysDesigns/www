<?php //setUpUsers.php
require_once 'login.php';

try
{
    $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (\PDOException $e)
{
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$query =    "CREATE TABLE IF NOT EXISTS users(
                username VARCHAR(32) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL
            )";

$result = $pdo->query($query);


$username   = 'janedoe';
$password   = 'janedoe';
$hash       = password_hash($password, PASSWORD_DEFAULT); 

add_user($pdo, $username, $hash);

function add_user($pdo, $un, $pw)
{
    $stmt = $pdo->prepare('INSERT INTO users VALUES(?,?)');

    $stmt->bindParam(1, $un, PDO::PARAM_STR, 32);
    $stmt->bindParam(1, $pw, PDO::PARAM_STR, 255);

    $stmt->execute([$un, $pw]);
}
?>