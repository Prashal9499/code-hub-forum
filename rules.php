<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Code Fork - Forums">
    <title>Code Fork - Forums</title>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4 py-3">Forum Rules</h1>

            <h4>1. No Spam / Advertising / Self-promote in the forums</h4>
            <p class="lead">These forums define spam as unsolicited advertisement for goods, services and/or other web
                sites, or posts with little, or completely unrelated content. Do not spam the forums with links to your
                site or product, or try to self-promote your website, business or forums etc.
                Spamming also includes sending private messages to a large number of different users.</p>

            <h4>2. Do not post copyright-infringing material</h4>
            <p class="lead">Providing or asking for information on how to illegally obtain copyrighted materials is
                forbidden.</p>

            <h4>3. Do not post “offensive” posts, links or images</h4>
            <p class="lead">Any material which constitutes defamation, harassment, or abuse is strictly prohibited.
                Material that is sexually or otherwise obscene, racist, or otherwise overly discriminatory is not
                permitted on these forums. This includes user pictures. Use common sense while posting.
                This is a web site for accountancy professionals.</p>

            <h4>4. Do not cross post questions</h4>
            <p class="lead">Please refrain from posting the same question in several forums. There is normally one forum
                which is most suitable in which to post your question.</p>

            <h4>5. Do not PM users asking for help</h4>
            <p class="lead">Do not send private messages to any users asking for help. If you need help, make a new
                thread in the appropriate forum then the whole community can help and benefit.</p>

            <h4>6. Remain respectful of other members at all times</h4>
            <p class="lead">All posts should be professional and courteous. You have every right to disagree with your
                fellow community members and explain your perspective.
                However, you are not free to attack, degrade, insult, or otherwise belittle them or the quality of this
                community. It does not matter what title or power you hold in these forums, you are expected to obey
                this rule.</p>

            <h4>7. Please use SEARCH first!</h4>
            <p class="lead">There is a pretty good chance that unless you have some really odd or unique problem that it
                has been addressed on our forum before, please use the forum’s search feature first to see if there are
                already some good threads on the subject. It’s easy to search – just click the “Search” button at the
                top right of the page.</p>

            <h4>8. Be DESCRIPTIVE and Don’t use “stupid” topic names</h4>
            <p class="lead">PLEASE post a descriptive topic name! Give a short summary of your problem IN THE SUBJECT.
                (Don’t use attention getting subjects, they don’t get attention and only annoy people).</p>

            <hr class="my-4">
            <p>Regards, Admin</p>
        </div>
    </div>

    <?php
    include 'assets/components/_footer.php';
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
    <script src="assets/typewrite.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>