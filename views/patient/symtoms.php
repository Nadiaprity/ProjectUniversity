<?php
    session_start();
    ob_start();
    if($_SESSION['userId']){
        $sessionId = $_SESSION['userId'];
       
    }else{
        header('location: ../../../index.php');
    }
  ?>

<?php
  	if(isset($_POST['submit'])){
        include '../../db/connection.php';

       $vomi = $_POST["vomitting"];
       $gastrrict = $_POST["gastrrict"];
       $discoloration = $_POST["discoloration"];

       $select = mysqli_query($conn, "SELECT * FROM symptoms WHERE vomiting= '$vomi' OR gastrointestinal= '$gastrrict' OR yellow_discoloration= '$discoloration'");
       $row = mysqli_fetch_array($select);
       $doctor_type = $row['specialidze'];
       
       $select_doctor = mysqli_query($conn, "SELECT * FROM doctor_info WHERE specialist= '$doctor_type'");
       $doctor_row = mysqli_fetch_array($select_doctor);
       if(count($doctor_row) > 0){ 
           $_SESSION['id'] = $doctor_row['id'];
           $_SESSION['doctor_name'] = $doctor_row['name'];
           $_SESSION['doctor_specialist'] = $doctor_row['specialist'];
           $_SESSION['doctor_number'] = $doctor_row['number'];
           $_SESSION['doctor_email'] = $doctor_row['email'];
           $_SESSION['doctor_rating'] = $doctor_row['rating'];

            header('Location: ./suggested_doctor.php');
 
       }else{
           echo "doctor not available";
       }
  	}
  ?>
<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Registration</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style type="text/css">
    body {
        background: url('../../assets/lab.jpg');
        background-size: cover;
    }

    #form {

        position: relative;
        top: 0;
        left: 0;
        box-sizing: border-box;
        padding: 5px 40px 40px 40px;
        margin: 5% auto;
        height: auto;
        width: 600px;
        background: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.6);
        background-color: #BC8F8F;

    }

    .registration {
        font-size: 55px;
        font-family: Agency FB;
        font-weight: 700;
        border-bottom-style: ridge;
    }

    .text {
        height: 40px;
    }

    label {
        font-size: 18px;
    }

    .btn-primary {
        border-radius: 0px;
        padding: 10px;
        width: 48%;
    }

    .btn-danger {
        border-radius: 0px;
        padding: 10px;
        width: 48%;
    }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-6" id="form">
                <center><b class="registration">Add your Symptoms</b></center>
                <form method="post">
                    <div class="form-group">
                        <label> Blood Pressure :</label>
                        <input class="form-control" name="pressure" placeholder="Blood pressure">
                    </div>
                    <div class="form-group">
                        <label> Blood Suger :</label>
                        <input class="form-control" name="suger" placeholder="Suger">
                    </div>
                    <div class="form-group">
                        <label> Heart Rate :</label>
                        <input class="form-control" name="heart_rate" placeholder="heart rate">
                    </div>
                    <div class="form-group">
                        <label> Weight :</label>
                        <input class="form-control" name="weight" placeholder="Weight">
                    </div>
                    <div class="form-group">
                        <label> Height :</label>
                        <input class="form-control" name="height" placeholder="Height">
                    </div>
                    <div class="form-group">
                        <label> Body Temperature:</label>
                        <input class="form-control" name="temperature" placeholder="Temperature">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Body symptoms:</label>
                        <select class="form-control" name="body_symptoms" id="exampleFormControlSelect1">
                            <option value="fever">Fever</option>
                            <option value="jondis">jondis</option>
                        </select>
                    </div>

                    <!--  -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Vomiting?</label>
                        <select class="form-control" name="vomitting" id="exampleFormControlSelect1">
                            <option value="1">Yes</option>
                            <option value="0">NO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Weakness?</label>
                        <select class="form-control" name="weekness" id="exampleFormControlSelect1">
                            <option value="1">Yes</option>
                            <option value="0">NO</option>
                        </select>
                    </div>

                    <!--  -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Gastrointestinal problems?</label>
                        <select class="form-control" name="gastrrict" id="exampleFormControlSelect1">
                            <option value="1">Yes</option>
                            <option value="0">NO</option>
                        </select>
                    </div>

                    <!--  -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Yellow discoloration of skin?</label>
                        <select class="form-control" name="discoloration" id="exampleFormControlSelect1">
                            <option value="1">Yes</option>
                            <option value="0">NO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Dark urine?</label>
                        <select class="form-control" name="deases" id="exampleFormControlSelect1">
                            <option value="fever">Yes</option>
                            <option value="jondis">NO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">itchiness?</label>
                        <select class="form-control" name="itchiness" id="exampleFormControlSelect1">
                            <option value="fever">Yes</option>
                            <option value="jondis">NO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">chest pain?</label>
                        <select class="form-control" name="chest_pain" id="exampleFormControlSelect1">
                            <option value="fever">Yes</option>
                            <option value="jondis">NO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">coldness in your legs?</label>
                        <select class="form-control" name="coldness" id="exampleFormControlSelect1">
                            <option value="fever">Yes</option>
                            <option value="jondis">NO</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-info btn-block shadow-none py-1">Submit</button>
                </form>
            </div>

        </div>
    </div>





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



