<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="CodeZilla - Forums">
  <title>CodeZilla - Forums</title>
  <!-- favicon -->
  <link rel="icon" type="image/png" href="assets/images/favicon.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- css -->
  <link rel="stylesheet" href="assets/index.css">
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
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
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $threadtitle = $row['thread_title'];
      $threaddesc = $row['thread_description'];
      $threaduser = $row['thread_user_id'];
      $sql2 = "SELECT user_email FROM `users` WHERE sno='$threaduser'";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      $posted_by = $row2['user_email'];
    }  
  ?>

  <div class="container my-4">
    <div class="jumbotron">
      <h1 class="display-4">
        <?php echo $threadtitle; ?>
      </h1>
      <p class="lead">
        <?php echo $threaddesc; ?>
      </p>
      <hr class="my-4">
      <p class="lead">
        <span class="badge bg-secondary">
          <i class="bi bi-person"></i> 
          <i class="bi bi-dash"></i>
          <?php echo $posted_by; ?>
        </span>
      </p>
    </div>
  </div>

  <?php
    $showToast = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
      //insert into db
      $comment = $_POST['comment'];
      $comment = str_replace("<", "&lt;", $comment);
      $comment = str_replace(">", "&gt;", $comment);
      $sno = $_POST['sno'];
      $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_user`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())"; 
      $result = mysqli_query($conn, $sql);
      $showToast = true;
      if($showToast){
        echo '
        <div class="container alert alert-success alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle"></i>
          <strong>Success ! </strong> Your comment has been added.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    }
  ?>

  <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo '
      <div class="container">
        <h1 class="py-3">Post a comment
          <i class="bi bi-reply"></i>
        </h1>
        <form class="my-3" action="' . $_SERVER['REQUEST_URI'] . '" method="post">
          <div class="mb-3">
            <textarea class="form-control" id="description" name="comment" rows="3" placeholder="Type your comment here -" required></textarea>
            <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
          </div>
          <button type="submit" class="btn btn-outline-success">Comment</button>
        </form>
      </div> ';
    } 
    else{
      echo '
      <div class="container">
        <h1 class="py-3">Post a comment 
          <i class="bi bi-reply"></i>
        </h1>
        <div class="alert alert-warning" role="alert">
          <i class="bi bi-exclamation-triangle"></i>
          <strong> Log in </strong> to post a comment.
        </div>
      </div> ';
    }
  ?>

  <div class="container">
    <h1 class="py-3">Discussion</h1>

    <?php
      $id = $_GET['threadid'];
      $sql = "SELECT * FROM `comments` WHERE thread_id=$id"; 
      $result = mysqli_query($conn, $sql);
      $noResult = true;
      while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_content'];
        $comment_time = $row['comment_time'];
        $commentuser = $row['comment_user'];
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$commentuser'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        echo '
        <div class="alert alert-dark" role="comment">
          <p> ' . $content . ' </p>
          <hr>
          <i class="bi bi-person-circle text-light"></i>
          <p class="mb-0 "><i class="bi bi-reply"></i> ' . $row2 ['user_email'] . ' <i class="bi bi-dash"></i> ' . $comment_time . '</p>
        </div>';
      }
      if ($noResult){
        echo '
        <div class="jumbotron jumbotron-fluid">
          <p class="display-4">Its very empty here 
            <i class="bi bi-emoji-frown"></i>
          </p>
          <p class="lead">Be the first one to comment !</p>
        </div>';
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