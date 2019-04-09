<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Agents Page</title>

	<!-- Custom CSS -->

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/ariel.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <link rel="stylesheet" type="text/css" href="css/styleliam.css">
    
	

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<body>
	 <Header>
    	<?php include 'templates/header.php' ?>
		<?php include 'templates/subheader.php' ?>
        
      <div>
			<?php
 	 		include_once("models/connect.php");
 	 		$query = "SELECT * FROM agents, Agencies";
 	 		$results = mysqli_query($connect, $query) or die("database error:". mysqli_error($connect));
  			?> 
		</div>

						
			<?php
			while( $record = mysqli_fetch_assoc($results) ) {
			?>  
	
<main>



<!-- <div style="overflow-x:auto;"> -->
<div class="table">
  <table>
    <tr>
      <th>Agent Id</th>
      <th>FirstName</th>
      <th>LastName</th>
      <th>Agency Location</th>
      <th>Agent Position</th>
      <th>Business Phone</th>
      <th><a href="#" class="btn btn-primary">Email Agent</a></th>
    </tr>
    <tr>
      <td><?php echo $record['AgentId']; ?></td>
      <td><?php echo $record['AgtFirstName']; ?></td>
      <td><?php echo $record['AgtLastName']; ?></td>
      <td><?php echo $record['AgncyCity']; ?></td>
      <td><?php echo $record['AgtPosition']; ?></td>
      <td><?php echo $record['AgtBusPhone']; ?></td>
      <td><?php echo $record['AgtEmail']; ?></td>
    </tr>
  </table>
</div>

</body>
</html>


</div>
</div>
</div>

<?php 
} 
?> 


</div>
</div>
</div>
<!-- FOOTER -->
<?php include 'templates/footer.php' ?>
			
			
</main>
  
<!-- Bootstrap JS -->
	<script src="js/app.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
