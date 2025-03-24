<?php
session_start();

if (!isset($_SESSION['loggedInUser'])) {
    header('Location: login.php');
    exit;
}

try {
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
?>