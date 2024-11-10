<?php
// config.php

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'auth');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    // Initialize PDO connection
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "DB Connected successfully";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Start session for authentication handling
session_start();

// Autoload function for classes
// spl_autoload_register(function ($class) {
//     $class = str_replace('\\', '/', $class);
//     require_once __DIR__ . '/' . $class . '.php';
// });
