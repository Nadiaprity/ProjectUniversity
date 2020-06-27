<?php
session_start();
  $doctorId = $_SESSION['doctor_session_id'];
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title>Doctor contact</title>
    <style type="text/css">
    body {
        background: url('../../assets/image.png');
        background-size: cover;
    }

    form {
        position: relative;
    }

    .suggest-menu {
        position: absolute;
        top: 70px;
        left: 0;
        width: 100%;
        height: auto;
        z-index: 9;
    }

    .suggest-menu .icon {
        font-size: 30px;
        cursor: pointer;
    }

    .suggest-menu .content p {
        border-bottom: 1px
         solid #5555;
    }

    .img-box {
        width: 150px;
        height: 150px;
        margin: auto;
        overflow: hidden;
    }

    .img-box img {
        width: 150px;
        height: 150px;
    }

    ul li {
        list-style: none;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="#">Health help Line</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../../index.php"> Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="doctor_contact.php">Doctor Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>

            </ul>
        </div>
    </nav>


    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-6 ">
                <div class="card bg-info mb-5">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <div class="input-group mb-2">

                                    <input type="text" class="form-control rounded-0 shadow-none"
                                        placeholder="Search for ..." onfocus="openMenu()">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text p-0 m-0">
                                            <button type="submit"
                                                class="btn btn-info rounded-0 shadow-none border-0">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="suggest-menu bg-info" id="suggestMenu">
                            <div class="px-2 text-right">
                                <div class="icon" onclick="closeMenu()">&times;</div>
                            </div>
                            <div class="content p-2">
                                <?php
                          $conn = new mysqli("localhost","root","","health");
                          $sql = "SELECT * FROM searchbar";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {                             
                             ?>
                                <a href="result.php?id=<?php echo $row['id']; ?>">
                                    <p class="text-capitalize text-white mb-0 py-1 pl-2"><?php echo $row["doctor"]; ?>
                                    </p>
                                </a>

                                <?php
                            }
                          } else {
                            ?>
                                <p class="text-capitalize mb-0 py-1 pl-2"><?php echo "0 Results"; ?></p>
                                <?php 
                          }
                        ?>


                            </div>
                        </div>
                        <script type="text/javascript">
                        document.getElementById("suggestMenu").style.display = "none";

                        function openMenu() {
                            document.getElementById("suggestMenu").style.display = "block";
                        }

                        function closeMenu() {
                            document.getElementById("suggestMenu").style.display = "none";
                        }
                        </script>
                    </div>
                </div>
                <!-- profile card -->
                <div class="card bg-success">
                    <div class="card-body text-center">
                        <div class="py-4">
                            <div class="img-box rounded-circle">
                                <img src="../../assets/help.jpg" class="img-fluid rounded-circle">
                            </div>
                        </div>
                        <div class="content">
                            <?php
                  include '../../db/connection.php';
                  $select_patient = "SELECT * FROM doctor_info WHERE id='$doctorId'";
                  $result = mysqli_query($conn, $select_patient);
                    while ($row = mysqli_fetch_array($result)){  
                ?>


                            <h5 class="text-capitalize">Name: <?php echo  $name = $row['name']; ?></h5>
                            <ul>
                                <li>
                                    <p class="mb-2">Specialist: <?php echo  $name = $row['specialist']; ?></p>
                                </li>
                                <li>
                                    <p class="mb-2">Number: <?php echo  $name = $row['number']; ?></p>
                                </li>
                                <li>
                                    <p class="mb-2">E-mail: <?php echo  $name = $row['email']; ?></p>
                                </li>
                            </ul>
                            <?php
                  }
                ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 py-5">
                <div class="text-center py-4 bg-warning">
                    <b>
                        <h3>Patient Feedback</h3>
                    </b>
                    <h3>****************</h3>
                </div>
                <div class="p-3 bg-warning">

                  <?php
                    if(isset($_POST['submit'])){
                      include '../../db/connection.php';
                      $name = $_POST['username'];
                      $email = $_POST['email'];
                      $contact = $_POST['contact'];
                      $behavior = $_POST['behavior'];
                      $rating = $_POST['rating'];
                      $commercial = $_POST['commercial'];
                      $visit = $_POST['visit'];
                      $suggestion = $_POST['suggestion'];

                      $insert = "INSERT INTO feedback (doctor_id, name, email, mobile, Behaviour, Commercial, visit, suggestion, rating) VALUES ('$doctorId','$name','$email','$contact','$behavior', '$commercial','$visit','$suggestion','$rating')";
                      if($conn->query($insert))
                      {
                        echo "Data Inserted";	
                      }else {
                        echo "Data not inserted";
                      }

                    }

                  ?>

                    <form method="post">
                        <div class="form-group mb-4">
                            <label> User Name :</label>
                            <input type="text" name="username" class="form-control rounded-0 shadow-none"
                                placeholder="Enter Your name:">
                        </div>

                        <div class="form-group mb-4">
                            <label> email :</label>
                            <input type="blood" name="email" class="form-control text" id="suger"
                                placeholder="Enter your email ">

                        </div>

                        <div class="form-group mb-4">
                            <label> Mobile Number :</label>
                            <input type="text" name="contact" class="form-control rounded-0 shadow-none"
                                placeholder="Enter your mobile number">
                        </div>

                        <div class="form-group">

                            <label>Doctor Behaviour :</label>
                            <textarea name="behavior" class="form-control" rows="4" id="specialist"
                                placeholder="Enter your review"></textarea>

                            <div class="form-group mb-4">
                                <small>Select Rating</small>
                                <select class="form-control" name="rating" id="exampleFormControlSelect1">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label> Comercial?</label>

                                <select name="commercial" id="Commercial" class="form-control text">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>

                                </select>

                            </div>

                            <div class="form-group">
                                <label> Report Visit:</label>

                                <select name="report" id="report" class="form-control text">
                                    <option value="expensive">Expensive</option>
                                    <option value="bearable">Bearable</option>

                                </select>

                            </div>

                            <div class="form-group">
                                <label> Doctor Visit</label>

                                <select name="visit" id="visit" class="form-control text">
                                    <option value="expensive">Expensive</option>
                                    <option value="bearable">Bearable</option>

                                </select>

                            </div>
                            <div class="form-group">

                                <label> Any Suggestion?:</label>
                                <textarea name="suggestion" class="form-control" rows="4" id="specialist"
                                    placeholder="Suggestion"></textarea>

                            </div>
                            <button type="submit" name="submit"
                                class="btn btn-primary rounded-0 shadow-none btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>