<?php
require 'db.php';
require 'header.php'; 

session_start();
$error = "";


if (!$conn) {
    die("Database connection not established. Controleer db.php.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_email = $_POST['email'] ?? '';
    $input_password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = :email");
    $stmt->bindParam(':email', $input_email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();
        $stored_password = $user['password'];
        if (password_verify($input_password, $stored_password)) {
            $_SESSION['loggedInUser'] = $user['id'];
            header("Location: index.php");
            exit;
        } else {
            $error = "ongeldig password";
        }
    } else {
        $error = "user niet gevonden";
    }
}

?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .error {
            color: red;
        }
    </style>
</head>
<div class="login-container">
        <h2 class="text-center">Inloggen</h2>
        <p class="text-center">Om een review te kunnen plaatsen moet je inloggen</p>
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">E-mailadres</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Voer je e-mailadres in" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Wachtwoord</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Voer je wachtwoord in" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="text-center mt-3"><a href="registratie.php">Nieuwe gebruiker? Registreer hier</a></p>
    </div>
    <?php require 'footer.php'; ?>
</html>