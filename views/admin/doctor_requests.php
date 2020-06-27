
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
      .d-flex{
        border-bottom: 1px solid #000;
        transition: 0.3s;
        cursor: pointer;
      }
      .d-flex:hover{
        background: #000;
      }
      .d-flex:hover p{
        color: white;
      }

       #prity{
      background-color: #66CDAA;
  }
      #back{
        background-color: #C0C0C0;
      }

    </style>
</head>
<body>
     <?php
      include 'navbar.php';
     ?>

     <div class="container py-3" id="back">
       <div class="row">
         <div class="col-12 mb-3" id="prity">
           <h5>Doctor Requests</h5>
         </div>
         <div class="col-12">


          <?php
            include ('../../db/connection.php');
            $sql = "SELECT * FROM doctor_info  WHERE user_status='false'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    
            ?>

           <div class="d-flex">
             <div class="p-2"><p class="mb-0 text-capitalize"><?php echo $row['name']; ?></p></div>
             <div class="ml-auto p-2">
              <form method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="submit" class="btn btn-danger mr-2 py-1 px-4 shadow-none mb-1" name="delete" value="Delete">
              </form>

              <form method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="submit" class="btn btn-warning py-1 px-4 shadow-none" name="approve" value="Approve">
              </form>
             </div>
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


     <?php
      if(isset($_POST['approve'])){
        include ('../../db/connection.php');
        $id = $_POST['id'];
        $sql = "UPDATE doctor_info SET user_status='true' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
     ?>


      
    












<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</head>
</html>

