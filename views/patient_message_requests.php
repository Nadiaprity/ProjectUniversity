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
      #back{
         background-color: #1E90FF;
      }

      

    </style>

</head>
<body>

  <div class="container"  >
    <div class="row" >
      <div class="col-12 col-lg-8 m-auto py-5" id="back">
        <div class="pb-3"><h5>Message Requests</h5></div>
        <ul class="list-group">
          <?php
          include '../db/connection.php';
            $doctorid = $_SESSION['userId'];
            $select_patient = "SELECT patient_id, patient_name FROM chat WHERE doctor_id='$doctorid'";
              $result = mysqli_query($conn, $select_patient);
                while ($row = mysqli_fetch_array($result)){
           ?>
          <li class="list-group-item py-1">
            <a href="doctor_chat.php?id=<?php echo $row['patient_id']; ?>" class="text-capitalize d-block"><?php echo $row['patient_name']; ?></a>
          </li>
          <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </div>


	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

