<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Code hub - Forums">
  <title>Code hub - Forums</title>
  <!-- favicon -->
  <link rel="icon" type="image/png" href="assets/images/favicon.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- css -->
  <link rel="stylesheet" href="assets/index.css">
  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
</head>

<body>

  <?php
    include 'assets/components/_header.php'; 
  ?>

  <?php
    include 'assets/components/_connectdb.php';
  ?>

  <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM `catogaries` WHERE id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $forumname = $row['name'];
      $forumdesc = $row['description'];
    }
  ?>

  <div class="container my-4">
    <div class="jumbotron">
      <h1 class="display-4">
        <?php 
          echo $forumname; 
        ?> - Code hub Forum
      </h1>
      <p class="lead">
        <?php
          echo $forumdesc; 
        ?>
      </p>
      <hr class="my-4">
      <p>
        <i class="bi bi-info-circle"></i> 
        Before starting a new discussion or commention in this
        <?php
          echo $forumname;
        ?> forum please read the forum rules.
      </p>
      <p class="lead">
        <a class="btn btn-outline-success" href="rules.php" role="button">Forum Rules</a>
      </p>
    </div>
  </div>

  <?php
    $showToast = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
      //insert into db
      $threadtitle = $_POST['title'];
      $threaddesc = $_POST['description'];
      $threadtitle = str_replace("<", "&lt;", $threadtitle);
      $threadtitle = str_replace(">", "&gt;", $threadtitle);
      $threaddesc = str_replace("<", "&lt;", $threaddesc);
      $threaddesc = str_replace(">", "&gt;", $threaddesc);
      $sno = $_POST['sno'];
      $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_forum_id`, `thread_user_id`, `timestamp`) VALUES ('$threadtitle', '$threaddesc', '$id', '$sno', current_timestamp())"; 
      $result = mysqli_query($conn, $sql);
      $showToast = true;
      if($showToast){
        echo '
        <div class="container alert alert-success alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle"></i>
          <strong>Success ! </strong> Your thread has been added please wait while someone responds.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    }
  ?>

  <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo '
      <div class="container">
        <h1 class="py-3">Start a discussion 
          <i class="bi bi-chat-text"></i>
        </h1>
        <form class="my-3" action="' . $_SERVER["REQUEST_URI"] . '" method="post">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="Help" required>
            <div id="Help" class="form-text">Keep the title specific.</div>
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>
          <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
          <button type="submit" class="btn btn-outline-success" id="liveToastBtn">Submit</button>
        </form>
      </div>';
    }
    else{
      echo '
      <div class="container">
        <h1 class="py-3">Start a discussion 
          <i class="bi bi-chat-text"></i>
        </h1>
        <div class="alert alert-warning" role="alert">
          <i class="bi bi-exclamation-triangle"></i>
          <strong> Log in </strong> to start a discussion.
        </div>
      </div> ';
    }
  ?>

  <div class="container">
    <h1 class="py-3">Forum Queries</h1>

    <?php
      $id = $_GET['id'];
      $sql = "SELECT * FROM `threads` WHERE thread_forum_id=$id"; 
      $result = mysqli_query($conn, $sql);
      $noResult = true;
      while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $titledesc = $row['thread_description'];
        $threadtime = $row['timestamp'];
        $threaduserid = $row['thread_user_id'];
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$threaduserid'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        echo '
        <div class="alert alert-dark" role="thread">
          <h4 class="alert-heading">
            <a class="text-light text-decoration-none" href="thread.php?threadid=' . $id . '">' . $title . '</a>
          </h4>
          <p>  ' . $titledesc . ' </p>
          <hr>
          <i class="bi bi-person-circle text-light"></i>
          <p class="mb-0 "><i class="bi bi-chat"></i> ' . $row2 ['user_email'] . ' <i class="bi bi-dash"></i> ' . $threadtime . '</p>
        </div>';
      }
      if($noResult){
        echo '
        <div class="jumbotron jumbotron-fluid">
          <p class="display-4">Its very empty here 
            <i class="bi bi-emoji-frown"></i>
          </p>
          <p class="lead">Be the first one to ask !</p>
        </div> ';
      }
    ?>

  </div>

  <?php
    include 'assets/components/_footer.php';
  ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>