<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Traveler</title>

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/ariel.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</head>
<body>
	<!-- Navbar -->
	<?php include 'templates/header.php' ?>

	<!-- Subheader -->
	<?php include 'templates/subheader.php' ?>

  <?php
  include_once("models/connect.php");
  $date = date("Y-m-d H:i:s");
  $query = "SELECT * FROM `packages` WHERE `PkgEndDate` > '$date'";
  $results = mysqli_query($connect, $query) or die("database error:". mysqli_error($connect));
  ?>

  <div class="row card-deck cardpadding">

  <?php
  while($record = mysqli_fetch_assoc($results) ) {
  ?>
    <div class="col-lg-4 col-sm-6 mb-4">
      <div class="card">
        <a href="#"><img class="card-img-top" src="<?php echo $record['PkgImgUrl']; ?>" alt=""></a>
        <div class="card-body">
          <h5 class="card-title"><?php echo $record['PkgName']; ?></h5>
          <p class="card-text"><?php echo $record['PkgDesc']; ?></p>
        </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php echo $record['PkgStartDate']; ?></li>
            <li id="myelement" class="list-group-item"><?php echo $record['PkgEndDate']; ?></li>
            <li class="list-group-item"><?php echo $record['PkgBasePrice']; ?></li>
          </ul>
          <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
    
  <?php 
  } 
  ?>
  </div>
  <?php
  $record['PkgEndDate'] = strtotime('PkgEndDate');
  ?>

  <script>
    var now = new Date($record['PkgEndDate'] * 1000);
  </script>

  	<!-- FOOTER -->
    <?php include 'templates/footer.php' ?>
  
  <!-- Bootstrap JS -->
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+990DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
