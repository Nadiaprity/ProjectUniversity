<?php
     $conn = new mysqli("localhost","root","","health");
     $postId = $_GET['id'];
     $sql = "SELECT * FROM searchbar WHERE id=$postId";
     $result = $conn->query($sql);

        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
         ?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
   
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="stylec.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet"  href="css/all.min.css">
  <link rel="stylesheet"  href="css/fontawesome.min.css">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<style type="text/css">




 .card-body{

    
 	background-color: #40E0D0;
 }

</style>








<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>



	
	<div class="container py-5">
		<div class="row">
			<div class="col-12 col-lg-10 m-auto">
				<div class="card">
					<div class="card-body">
						<h5><?php echo $row['name'] ?></h5>
						<p class="mb-2">E-mail: <?php echo $row["email"] ?></p>
						<p class="mb-0">Contact: <?php echo $row["number"] ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
           	
	
</body>
</html>	
<?php
    }
    }
?>

