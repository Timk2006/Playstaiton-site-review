<?php
require 'db.php';

session_start();
$error = "";

if (!$conn) {
    die("Database connection not established. Controleer db.php.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"] ?? '';
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';
    $passwordRepeat = $_POST["repeat_password"] ?? '';

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = [];

    if (empty($fullname) || empty($email) || empty($password) || empty($passwordRepeat)) {
        $errors[] = "Alle velden zijn verplicht.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Ongeldig e-mailadres.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Wachtwoord moet minimaal 8 tekens lang zijn.";
    }
    if ($password !== $passwordRepeat) {
        $errors[] = "Wachtwoorden komen niet overeen.";
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $errors[] = "E-mailadres is al in gebruik.";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO users (full_name, email, password) VALUES (:full_name, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':full_name', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordHash);

        if ($stmt->execute()) {
            header("Location: login.php?success=1");
            exit;
        } else {
            $error = "Er is iets misgegaan, probeer opnieuw.";
        }
    } else {
        $error = implode("<br>", $errors);
    }
}
?>

<?php require "header.php" ?>
<div class="container">
    <h2 class="text-center">Registreren</h2>
    <p class="text-center">Maak een account aan om verder te gaan.</p>

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="fullname" class="form-label">Volledige naam</label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Voer je volledige naam in" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mailadres</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Voer je e-mailadres in" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Voer je wachtwoord in" required>
        </div>
        <div class="mb-3">
            <label for="repeat_password" class="form-label">Herhaal wachtwoord</label>
            <input type="password" class="form-control" name="repeat_password" id="repeat_password" placeholder="Herhaal je wachtwoord" required>
        </div>
        <button type="submit" class="btn btn-primary">Registreren</button>
    </form>

    <p class="text-center mt-3"><a href="login.php">Al een account? Log in hier</a></p>
</div>

<?php require 'footer.php'; ?>