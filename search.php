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

  <div class="container">
    <h1 class="my-4">
      Search results for "
      <?php 
        echo $_GET['search']
      ?> "
    </h1>

    <?php
      $noResult = true;
      $query = $_GET["search"];
      $sql = "SELECT * FROM `threads` WHERE MATCH (`thread_title`, `thread_description`) AGAINST ('$query')"; 
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_description'];
        $thread_id = $row['thread_id'];
        $url = "thread.php?threadid=" . $thread_id;
        $noResult = false;
        echo '
        <div class="jumbotron my-5">
          <h3>' . $title . '</h3>
          <p class="lead">' . $desc . '</p>
          <hr class="my-4">
          <a class="btn btn-outline-success" href="' . $url . '" role="button">Learn more</a>
        </div> ';
      }
      if($noResult){
        echo '
        <div class="jumbotron jumbotron-fluid py-2">
          <p class="display-4">No results found ! 
            <i class="bi bi-x-circle"></i>
          </p>
          <p class="lead">
          Sorry, we couldn’t find the term you’re looking for
          </p>
          <p class="lead">
            Suggestions:
            <ul class="lead">
              <li> Make sure that all words are spelled correctly. </li>
              <li> Try different keywords. </li>
              <li> Try more general keywords. </li>
              <li> Make sure to enter at least 4 characters </li>
            </ul>
          </p>
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