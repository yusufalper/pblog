<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PBLOG</title>
</head>
<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">PBLOG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li>
          <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home</a>
        </li>
        <li>
          <a class="nav-link" href="<?php echo ROOT_URL; ?>posts">Posts</a>
        </li>
        <li>
          <a class="nav-link" href="<?php echo ROOT_URL; ?>categories">Categories</a>
        </li>
        <?php if (isset($_SESSION['is_logged_in'])): ?>
          <li>
            <a class="nav-link" href="<?php echo ROOT_URL; ?>posts/myposts">My Posts</a>
          </li>
        <?php endif;?>

      </ul>
      <div class="navbar-addpost">
        <?php if (isset($_SESSION['is_logged_in'])): ?>
          <a class="btn btn-warning" href="<?php echo ROOT_PATH; ?>posts/add">New Post</a>
        <?php endif;?>
      </div>
      <form class="form-inline my-2 my-lg-0 div-search">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <ul class="navbar-nav navbar-right">
        <?php if (isset($_SESSION['is_logged_in'])): ?>
          <li>
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/profile"> <?php echo 'Welcome, ' . $_SESSION['user_data']['name']; ?></a>
          </li>
          <li> <!-- SETTİNGS -->
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/settings"><i class="fas fa-cog"></i></a>
          </li>
          <li> <!-- LOG OUT -->
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/logout"><i class="fas fa-sign-out-alt"></i></a>
          </li>
          <?php else: ?>
            <li style="margin-right:1%;">
              <a href="<?php echo ROOT_URL; ?>users/login" class="btn btn-success" role="button">Login</a>
            </li>
            <li>
              <a href="<?php echo ROOT_URL; ?>users/register" class="btn btn-primary" role="button">Register</a>
            </li>
          <?php endif;?>
        </ul>

      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template" style="padding-top:80px;">
        <?php Messages::display(); ?>
        <?php require $view;?>
      </div>

    </main>
  </body>
  </html>
  