<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3307', 'root', '');
    $pdo->exec('CREATE DATABASE IF NOT EXISTS islamicwebsite');
    echo 'Database created/exists.';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
