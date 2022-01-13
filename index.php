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

  <div class="sec_bg image" style="background-color: #000000;">
    <div class="top_text">
      <h1>
        <!-- top image text -->
        <p class="typewrite" style="font-size: 8rem;" data-period="2000" data-type='["Code hub"]'>
          <span class="wrap"></span>
        </p>
        <p style="font-size: 1.6rem;">Coding, Questions, Solutions</p>
      </h1>
      <form class="d-flex justify-content-center" action="search.php" method="get">
          <input class="form-control me-2 px-3 w-25" type="search" placeholder="Search" name="search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
  </div>

  <div class="container my-4">
    <h1 class="text-center">Featured Forums</h1>
    <div class="row ">

      <?php 
        $sql = "SELECT * FROM `catogaries`"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          $id = $row['id'];
          $name = $row['name'];
          $description = $row['description'];
          echo '
          <div  class="col-md-4 my-2 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <img src="assets/images/forum-' . $id . '.png" class="card-img-top" alt="Forum Image">
              <div class="card-body">
                <h5 class="card-title">
                  <a class="text-light text-decoration-none" href="threadlist.php?id=' . $id .'">' . $name .'</a>
                </h5>
                <p class="card-text">' .substr($description, 0, 150) .'...</p>
                <a href="threadlist.php?id=' . $id .'" class="btn btn-outline-success">View Thread</a>
              </div>
            </div>
          </div> ';
        }
      ?>

    </div>
  </div>

  <?php
    include 'assets/components/_footer.php';
  ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="assets/typewrite.js"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>