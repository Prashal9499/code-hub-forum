<?php
  session_start();
  echo '
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
     <a class="navbar-brand text-decoration-none" href="index.php">CodeZilla</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul> ';

      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '
        <a href="assets/components/_logout.php" class="btn btn-outline-success">
          Logout - ' . $_SESSION['useremail'] . '
        </a> ';
      }
      else{
        echo '
        <div>
          <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
          <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupmodal">Sign Up</button>
        </div> ';
      }
      echo '
      </div>
    </div>
  </nav>

  <header class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown d-flex">
            <a class="nav-link dropdown-toggle btn btn-outline-success px-5 text-decoration-none" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Forums
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item text-decoration-none" href="#">Action</a></li>
              <li><a class="dropdown-item text-decoration-none" href="#">Another action</a></li>
              <li><hr class="dropdown-divider text-decoration-none"></li>
              <li><a class="dropdown-item text-decoration-none" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" action="search.php" method="get">
          <input class="form-control me-2 px-3" type="search" placeholder="Search" name="search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </header>';

  include 'assets/components/_loginmodal.php';
  include 'assets/components/_signupmodal.php';
    
  if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
    echo '
    <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong>Sign Up Success!</strong> You can now log in.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
  }
?>