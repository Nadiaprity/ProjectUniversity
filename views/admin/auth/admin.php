<!DOCTYPE html>
<html lang="en">
<head>
       <title>Bootstrap Registration</title>
	   <meta charset="utf-8">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
			<style type="text/css">
			body{
				
				background-image: url('../../../assets/help.jpg');
			     background-size: cover;
			     
			}
  #form{

	position: relative;
	top: 0;
	left: 0;
	box-sizing: border-box;
	padding: 5px 40px 40px 40px;
	margin: 5% auto;
	height: auto;
	width: 600px;
	background: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.6);
	background-color: #708090;
  
  }
	  .registration{
		  font-size: 55px;
		  font-family: Agency FB;
		  font-weighht: 700;
		  border-bottom-style: ridge; 
	  }
	  .text{
		  height: 40px;
		  
		  
		  
	  }
	  label{
		  font-size: 18px;
	  }
	  .btn-primary{
		  border-radius: 0px;padding: 10px;
		  width: 48%;
	  }
	  .btn-danger{
		  border-radius: 0px;padding: 10px;
		  width: 48%;
	  }
	  .text-center{
	  	
        top: 130px;
        left: 0;
         width: 100%;
         height: auto;
         background: #000000;
          
 	  }
	  
	  
	   
   </style>    
</head>
<body>

<div class="container">
    <div class="row">
	    <div class="col-md-6 col-md-offset-3" id="form">
		     <center><b  class="registration">Admin Registration Form</b></center>
		     
			 <form method="POST">
			 
			     <div class="form-group">
				    <label> Username :</label>
				<input type="text" name="name" class="form-control text" id="name" placeholder="Enter Username"> 
			
            </div>
			
			<div class="form-group">
				    <label> Mobile No:</label>
				<input type="mobile" name="number" class="form-control text" id="number"  placeholder="Enter Mobile Number"> 
			
            </div>



			<div class="form-group">
				    <label> Email:</label>
				<input type="email" name="email" class="form-control text" id="email" placeholder="Enter Email"> 
			
            </div>	
			
			

                <div class="form-group">
				
				<label>Address :</label>
				<textarea name="address" class="form-control" id="address" rows="4"
				placeholder="Enter Full Address"></textarea>
				
				
				
				</div> 

				<div class="form-group">
				    <label>Password</label>
				<input type="password" name="password" class="form-control text" id="password" placeholder="Enter your password"> 
			
            </div>	
			
                <div class="form-group">
                	
				
                     <input type="submit" class="btn btn-primary" name="submit" value="submit" >
                     

                <input type="reset" class="btn btn-danger" value="Reset">
                </div>				
         
				 
				 
				   </form>
				   <a href="admin_login.php" class="text-center">Go to login</a>
		
            </div>	

    </div> 
	
</div>	
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>


</html>


           <?php
			   
			   
			   include '../../../db/connection.php';
				
				if(isset($_POST["submit"])){
					$Name=$_POST["name"];
					$Number=$_POST["number"];
					$Email=$_POST["email"];
					$Address=$_POST["address"];
					$Password=$_POST["password"];
			
					$sql="INSERT INTO admin (name,number,email,address,password) VALUES('$Name','$Number','$Email','$Address','$Password')";
				
				if($conn->query($sql))
				{
					echo "Data inserted";
				}
				else
				{
					echo "Data not Inserted";
				}
				}
				
				
				
				
				
			?>


