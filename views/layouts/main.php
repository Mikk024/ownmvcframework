<?php

use App\Core\Application;



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="/">Home</a>
                    <a class="nav-link" href="/contact">Contact</a>
                </div>
                <?php if (Application::isGuest()): ?>
                <div class="ml-auto navbar-nav">
                    <a href="/login" class="nav-link">Login</a>
                    <a href="/register" class="nav-link">Register</a>
                </div>
                <?php else: ?>
                  <div class="ml-auto navbar-nav">
                    <a class="nav-link" href="/logout">
                      Welcome <?php echo Application::$app->user->getDisplayName() ?> (Logout)
                    </a>
                    <a href="/profile" class="nav-link">Profile</a>
                  </div>
                <?php endif ?>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php if (Application::$app->session->getFlash('success')): ?>
          <div class="alert alert-success">
            <?php echo Application::$app->session->getFlash('success')?>
          </div>
        <?php endif; ?>
        {{ content }}  
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>