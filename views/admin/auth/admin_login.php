<?php
  session_start();
  ob_start();
  $error = "";
  $email = $number = "";
  $email_err = $password_err = "";
  if(isset($_POST['submit'])){
    if(empty($_POST['email'])){
      $email_err = "E-mail is required.";
    } else {
      $email = $_POST['email'];
    }
    if(empty($_POST['password'])){
      $password_err = "password is required.";
    } else {
      $password = $_POST['password'];
    }
    if(!empty($_POST['email']) && !empty($_POST['password'])){
      include '../../../db/connection.php';
      $check = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'");
      $row = mysqli_fetch_array($check);
      if($row['email'] == $email && $row['password'] == $password) {
        $_SESSION['userId'] = $row['id'];
        header('Location: ../admin_dashboard.php');
        ob_flush();
      } else {
        $error = true;
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
       <title>Bootstrap Registration</title>
	   <meta charset="utf-8">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	   	        <style type="text/css">
body{
	width: 100%;
	height: 100vh;
	background-image: url('../../../assets/reg.png');
	background-size: cover;
	background-repeat: no-repeat;
}

</style>
</head>
<body>
<div class="container pt-5 mt-lg-5">
	<div class="row">
		<div class="col-12 col-lg-5 m-auto">
			<div class="card">
				<div class="card-body pb-5">
					<div class="text-center"><h2>Login Account</h2>
					</div>		
					<?php
			          if($error){
			            echo "<div class='alert alert-danger' role='alert'>";
			            echo "Username or Password incorrect.";
			            echo "</div>";
			          }
			        ?>			
					<form method="POST">
						<div class="form-group">
							<input type="text" name="email" class="form-control" placeholder="Enter E-mail">
						</div>
						<div class="form-group">
							<input type="text" name="password" class="form-control" placeholder="Enter password">
						</div>
						<button type="submit" name="submit" class="btn btn-block btn-info">Login</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>


</html>