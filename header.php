<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playstation Review Site</title>
    <!--<link rel="stylesheet" href="styles.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>

<body>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PS5 Reviews</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reviews
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="reviews.php">PS5 reviews</a></li>
            <li><a class="dropdown-item" href="insert_review.php">Toevoegen</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Games
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="games.php">PS5 games</a></li>
            <li><a class="dropdown-item" href="insert_game.php">Toevoegen</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">Over ons</a>
        </li>
       
      </ul>
      <form class="d-flex" role="search">
        <button class="btn btn-outline-success" type="submit"><a class="nav-link" href="login.php">Login</a></button>
        <a class="nav-link" href="login.php"></a>
      </form>

    </div>
  </div>
</nav>    
