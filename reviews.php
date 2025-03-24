<?php
require 'db.php';
session_start();

function getGame($conn, $id)
{
    $sql = "SELECT title FROM games WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();;

    $game = $stmt->fetch();

    return $game['title'];
}

function getName($conn, $id)
{
    $sql = "SELECT full_name FROM users WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();;

    $game = $stmt->fetch();

    return $game['full_name'];
}

try {
    $sql = "SELECT user_id, review, game_id, rating  FROM reviews";
    $results = $conn->query($sql);
    $reviews = $results->fetchAll();
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
?>
<?php require 'header.php' ?>
<div class="container">
    <h2>Playstation 5 reviews</h2>
    <?php foreach ($reviews as $review) : ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars(getGame($conn, $review['game_id']) ?? ""); ?></h5>
                <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo htmlspecialchars(getName($conn, $review['user_id']) ?? ""); ?></h6>
                <p class="card-text"><?php echo htmlspecialchars($review['review'] ?? ""); ?></p>
                <?php 
                for($i = 1; $i <= $review['rating']; $i++) {
                    echo "*";
                }
                ?>
            </div>
        </div>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>
<?php require 'footer.php' ?>