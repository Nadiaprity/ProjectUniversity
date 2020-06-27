<!DOCTYPE html>
<html>
<head>
       <title>Bootstrap Registration</title>
	   <meta charset="utf-8">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
			<style type="text/css">
			
	body{		
		width: auto;
		height: 70vh;
		background-image: url(./assets/sm.jpg);
		background-size: cover;
		background-repeat: no-repeat;
	}
	.buttons .btn{
	  	 border: 1px solid #fff;
		  padding: 10px 30px;
		  color: #fff;
		  text-decoration: none;
		  transition: 0.6s ease;
	  }
	.buttons .btn:hover{
		  background-color: #fff;
		  color: #000;
	  }
	.flex-center {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  height: 100%;
}
.flex-column {
  -ms-flex-direction: column !important;
  -webkit-box-orient: vertical !important;
  -webkit-box-direction: normal !important;
  flex-direction: column !important;
}

	.logo{
		display:flex;
		justify-content: center;
		align-items: center;
	}	  		
	</style>
	
			
		
	   <body>

	   	<header>
	   	<div class="mainheader">
		<div class="logo">
		<img src="./assets/logo.png">
	</div>
</div>
       </header>
          <div class="flex-center flex-column">
          	<h1 class="text-white font-weight-bold mb-4">Pleace Do Your Registration</h1>
          	<div class="buttons">
          	  <a href="./views/patient/auth/reg.php" class="btn">Patient Registration / Login</a>
			  <a href="./views/doctor/auth/doctor_reg.php" class="btn">Doctor Registration / Login</a>
			  <a href="./views/admin/auth/admin.php" class="btn">Admin Registration / Login</a>
          	</div>
          </div>				
			  
			  
	   
	   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	   </body>
	   </head>
	   </html>