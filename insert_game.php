<?php require 'check_login.php' ?>
<?php
require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $released_at = $_POST['released_at'];
    $age = $_POST['age'];

    $sql = "INSERT INTO games (title, summary, released_at, age) 
            VALUES (:title, :summary, :released_at, :age)";

    try {
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':summary', $summary);
        $stmt->bindParam(':released_at', $released_at);
        $stmt->bindParam(':age', $age);

        $stmt->execute();

        $message = "Game succesvol toegevoegd!";
    } catch (PDOException $e) {
        echo "Fout bij het toevoegen van de game: " . $e->getMessage();
    }
}
?>

<?php require 'header.php' ?>

<div class="container">
    <h2>Nieuwe game</h2>
    <p><?= $message ?></p>
    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label" for="title">Titel:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($games['title'] ?? ''); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label" for="summary">Leeftijd:</label>
            <input type="age" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($games['age'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="summary">Omschrijving:</label>
            <textarea id="summary" class="form-control" name="summary" rows="10"><?php echo htmlspecialchars($games['age'] ?? ''); ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="released_at">Datum:</label>
            <input type="date" class="form-control" id="released_at" name="released_at" value="<?php echo htmlspecialchars($games['released_at'] ?? ''); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Toevoegen</button><br><br>
    </form>
</div>
<?php require 'footer.php' ?>