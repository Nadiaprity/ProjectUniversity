
<?php
    session_start();
    ob_start();
    if($_SESSION['userId']){
        $sessionId = $_SESSION['userId'];
    }else{
        header('location: ../index.php');
    }

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
       <title>Bootstrap Registration</title>
	   <meta charset="utf-8">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">

	 

		.chat-box{
			width: 100%;
			height: auto;
			background: #2F4F4F;

		}

		.chat-box .patient-box{
      position: fixed;
      top: 0;
      left: 0;
      width: 300px;
      height: 1000vh;
      background: #ffffff;
      z-index: 3;
      border-right: 1px solid #555;
      padding-top: 80px;
    }
    
    .chat-box .patient-health{
      position: fixed;
      top: 0;
      right: 0;
      width: 300px;
      height: 1000vh;
      background: #ffffff;
      z-index: 5;
      border-left: 1px solid #555;
      padding-top: 50px;
    }


.chat{
			width: 100%;
			height: 100vh;
			background: #e76166;

    
		}

  
		.card{
			position: relative;
			top: 0;
			width: 600px;
			margin: auto;
			height: 100vh;

		}
		.card .card-body{
			height: 80vh;
			overflow-y: scroll;


		}

    
    .card .card-body .message{
      background: #c0c0c0;
      
    }

  
		.card .card-body p{
			font-size: 15px;
			line-height: 1.5rem;

		}
	.navbar{
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: red;
      z-index: 99999;
    }
    
    
    


		
	</style>
</head>
<body>

	
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Health help Line</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php"> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      
    </ul>
  </div>
</nav>




<div class="chat-box">
   <div class="patient-box p-3">
     <div class="text-center mb-4">
       <h5>Patient Information</h5>
     </div>
     <div class="content">
       <ul>
        <?php 
          $patientId = $_GET['id'];
          include '../db/connection.php';
          $select_patient = "SELECT * FROM patient_info WHERE id='$patientId'";
          $result = mysqli_query($conn, $select_patient);
            while ($row = mysqli_fetch_array($result)){  
              $name = $row['name'];
            ?>
            <h5>Patient Information</h5>
         <li><p class="mb-0 text-capitalize">Name: <?php echo $row['name']; ?></p></li>
         <li><p class="mb-0">Age: <?php echo $row['age']; ?></p></li>
         <li><p class="mb-0">Gender: <?php echo $row['gender']; ?></p></li>

         
         <?php
          }
          ?>
          <?php
          $patientId = $_GET['id'];
          include '../db/connection.php';
          $select_patient = "SELECT * FROM health_info WHERE user_id='$patientId' LIMIT 1";
          $result = mysqli_query($conn, $select_patient);
            while ($row = mysqli_fetch_array($result)){  
          ?>
          
                <li><p class="mb-0">Weight: <?php echo $row['weight']; ?></p></li>
                <li><p class="mb-0">Height: <?php echo $row['height']; ?></p></li>
        
          <?php
            }
          ?>
       </ul>
     </div>
     </div>
     <div class="patient-health">
      
       <ul>
        <?php 
          $patientId = $_GET['id'];
          include '../db/connection.php';
          $sql = "SELECT * FROM health_info WHERE user_id='$patientId' ORDER BY user_id DESC LIMIT 1";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
          ?></ul>

              <ul><h5>Health Condition</h5></ul>
          <ul>
            <li><p class="mb-0">Blood Pressure: <?php echo $row['pressure']; ?></p></li>
            <li><p class="mb-0">Blood Suger: <?php echo $row['suger']; ?></p></li>
            <li><p class="mb-0">Temperature: <?php echo $row['temperature']; ?></p></li>
         </ul>
        <?php
          }
        }
        ?>
       </ul>
     </div>
   </div>


	 <div class="chat">
		<div class="card pt-3">
		<div class="card-body p-0 mt-5">
			<?php
		      include '../db/connection.php';
		      $doctorId = $_SESSION['userId'];
		        $patientId = $_GET['id'];
		        $select_message = "SELECT messages FROM chat WHERE patient_id='$patientId' AND doctor_id='$doctorId'";
		          $result = mysqli_query($conn, $select_message);
		            while ($row = mysqli_fetch_array($result)){
      		?>
		   
          <?php 
            // $split = str_split($row['messages'], 6);
            // echo gettype($row['messages'])
           $pieces = explode(" ", $row['messages']);
          if($pieces[0] == 'doctor'){
            ?>
            <div class="message p-2 rounded mb-2 bg-primary" style="width: 250px; margin-left: auto;">
               <p class="mb-0 font-weight-bold text-white">
                  <b><big>
                    <?php echo substr($row['messages'], 6);?>
                 </big></b>
                </p>
            </div>
            <?php
              }elseif($pieces[0]=='patient'){
            ?>

             <div class="message p-2 rounded mb-2" style="width: 250px;">
               <p class="mb-0 font-weight-bold text-danger">
                <b><big>
                  <?php echo substr($row['messages'], 7);?>
                </big></b></p>
              </div>

          <?php
            }
          ?>
            
          
			
			<?php
				}
			?>
		</div>
		<div class="card-footer p-0">
			<?php
		      if(isset($_POST['submit'])){
		        include '../db/connection.php';
		        $patientId = $_GET['id'];
		        $doctorId = $_SESSION['userId'];
		        $message = 'doctor '.$_POST['message'];
		        $q1 ="INSERT INTO chat (doctor_id,patient_id,messages) VALUES('$doctorId','$patientId','$message')";
            $conn->query($q1);
            header("Refresh:0");
		      }
		    ?>
			<form method="post">
				<div class="input-group">
				    <input type="text" class="form-control rounded-0 shadow-none" name="message" placeholder="Write message">
				    <div class="input-group-prepend p-0">
				      <div class="input-group-text p-0"><button type="submit" name="submit" class="btn btn-primary shadow-none">Send</button></div>
				    </div>
				 </div>
			</form>
		</div>
	</div>

	</div>			



	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>


</html>