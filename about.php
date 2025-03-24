<?php
require 'db.php';
session_start();


try {
  $sql = "SELECT id, title, summary FROM games ORDER by released_at DESC LIMIT 3";
  $results = $conn->query($sql);
  $games = $results->fetchAll();
} catch (Exception $e) {
  echo 'Message: ' . $e->getMessage();
}
?>

<?php require 'header.php' ?>
<div class="container">
  <h1>Welkom bij de PlayStation Review-website!</h1>

  <p>Ben je op zoek naar betrouwbare beoordelingen van PlayStation-games? Op onze website kun je ontdekken wat andere gamers van een spel vinden en uitgebreide reviews lezen. We helpen je graag bij het maken van een weloverwogen keuze voordat je een game aanschaft.

    Aangezien games tegenwoordig een flinke investering kunnen zijn, is het belangrijk om te weten of een titel echt de moeite waard is. Daarom bieden wij een platform waar je niet alleen recensies kunt lezen, maar ook je eigen ervaringen kunt delen.

    Of je nu fan bent van actievolle shooters, meeslepende RPG’s of competitieve sportgames, je vindt hier een breed scala aan beoordelingen. Dankzij onze handige filters kun je reviews sorteren op genre, populariteit en beoordelingen van andere gebruikers, zodat je snel de juiste informatie vindt.

    Onze community van gamers zorgt voor eerlijke en betrouwbare meningen over de nieuwste en populairste PlayStation-games. Wil je zelf bijdragen? Plaats je eigen review en help anderen bij het maken van de juiste keuze.

    Word vandaag nog lid en ontdek de kracht van gedeelde ervaringen in de gamingwereld!</p>

  <h3>Bekijk hieronder voorbeelden van games die je kunt reviewen</h3>
  <table class="table table-success table-striped">
    <thead>
      <tr>
        <th>Game</th>
        <th>Omschrijving</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($games as $game) : ?>
        <tr>
          <td><?php echo htmlspecialchars($game['title'] ?? ""); ?></td>
          <td><?php echo htmlspecialchars($game['summary'] ?? ""); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
<?php require 'footer.php' ?>