<?php
require 'db.php';
session_start();


try {
    $sql = "SELECT id, title, summary, released_at, age FROM games ORDER by released_at DESC";
    $results = $conn->query($sql);
    $games = $results->fetchAll();
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
?>
<?php require 'header.php' ?>
<div class="container">
    <h2>Playstation 5 games</h2>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Summary</th>
                <th>Age</th>
                <th>Datum van uitkomst</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($game['title'] ?? ""); ?></td>
                    <td><?php echo htmlspecialchars($game['summary'] ?? ""); ?></td>
                    <td><?php echo htmlspecialchars($game['age'] ?? ""); ?></td>
                    <td><?php echo htmlspecialchars($game['released_at'] ?? ""); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require 'footer.php' ?>