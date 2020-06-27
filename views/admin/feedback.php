
<?php
    session_start();
    ob_start();
    if($_SESSION['userId']){
        $sessionId = $_SESSION['userId'];
    }else{
        header('location: ../../../index.php');
    }
  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Registration</title>
	   <meta charset="utf-8">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style type="text/css">
    
    body{
                
                background-image: url('../../assets/');
                 background-size: cover;
                 background:#1E90FF;
                 
            }
 
        #back{
            background:#C0C0C0;
        }
  

  #prity{
            
        
        top: 0px;
        left: 0;
         width: 100%;
         height: auto;
         background: #F08080;
          
      }
      
      


  }

        </style>
  
</head>
<body>
     <?php
      include 'navbar.php';
     ?>



     <!-- Write feedback code here -->

     <div class="container py-3" id="back">
       <div class="row">
         <div class="col-12 mb-3" id="prity">
           <h5>Feedback</h5>
         </div>
         <div class="col-12">


          <?php
            include ('../../db/connection.php');
            $sql = "SELECT * FROM feedback";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    
            ?>
            <div class="py-2 border mb-3">
            <p class="mb-1 text-capitalize">Name: <?php echo $row['name']; ?></p>
            <p class="mb-1">E-mail: <?php echo $row['email']; ?></p>
            <p class="mb-1">Contact: <?php echo $row['mobile']; ?></p>
            <p class="mb-1">Behavior: <?php echo $row['Behaviour']; ?></p>
            <p class="mb-1">Commercial: <?php echo $row['Commercial']; ?></p>
            <p class="mb-1">Visit: <?php echo $row['visit']; ?></p>
            <p class="mb-1">Suggestion: <?php echo $row['suggestion']; ?></p>
            <p class="mb-1">Rating: <?php echo $row['rating']; ?></p>
            </div>
           <?php
            }
            } else {
                echo "0 results";
            }
            $conn->close();
          ?>
         </div>
       </div>
     </div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</head>
</html>