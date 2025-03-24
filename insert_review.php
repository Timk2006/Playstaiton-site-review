<?php require 'check_login.php' ?>
<?php
require 'header.php';
require 'db.php';

function getGames($conn)
{
    $sql = "SELECT id, title FROM games ORDER by released_at DESC";
    $results = $conn->query($sql);
    $games = $results->fetchAll();

    return $games;
}

?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['loggedInUser'];
    $review = $_POST['review'];
    $game_id = $_POST['game_id'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO reviews (user_id, review, game_id, rating) 
            VALUES (:user_id, :review, :game_id, :rating)";

    try {
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':review', $review);
        $stmt->bindParam(':game_id', $game_id);
        $stmt->bindParam(':rating', $rating);

        $stmt->execute();

        echo "Game succesvol toegevoegd!";
    } catch (PDOException $e) {
        echo "Fout bij het toevoegen van de game: " . $e->getMessage();
    }
}
?>

<div class="container">
    <h2>Nieuwe review</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label" for="review">Omschrijving:</label>
            <textarea id="review" class="form-control" name="review" rows="10"></textarea>
        </div>

        <div class="mb-3">
            <label for="game_id">Game:</label>
            <select class="form-label" name="game_id" id="game_id">
                <?php foreach (getGames($conn) as $games) : ?>
                    <option value="<?= $games['id'] ?>"><?= $games['title'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        
        <div class="mb-3">
            <label for="rating">Rating:</label>
            <div class="rating-stars-wrapper">
                <input type="radio" name="rating" value="1" id="id-5" required>
                <label for="id-5" class="fas fa-star"></label>

                <input type="radio" name="rating" value="2" id="id-4">
                <label for="id-4" class="fas fa-star"></label>

                <input type="radio" name="rating" value="3" id="id-3">
                <label for="id-3" class="fas fa-star"></label>

                <input type="radio" name="rating" value="4" id="id-2">
                <label for="id-2" class="fas fa-star"></label>

                <input type="radio" name="rating" value="5" id="id-1">
                <label for="id-1" class="fas fa-star"></label>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Toevoegen</button><br><br>
    </form>
</div>
<?php require 'footer.php' ?>