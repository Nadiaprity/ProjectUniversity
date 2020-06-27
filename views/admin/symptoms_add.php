<!DOCTYPE html>
<html lang="en">

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

    #pr {
        background-color: #C0C0C0;
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
    </style>
</head>

<body>
    <?php
include 'navbar.php';
?>


    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-8 m-auto" id="form">
                <div class="card">
                    <div class="card-body" id="pr">
                        <center><b class="registration">Add Symptoms</b></center>
                        <form method="post">
                            <div class="form-group">
                                <label> Disease Name :</label>
                                <input class="form-control" name="deases" placeholder="Disease Name">
                            </div>

                            <div class="form-group">
                                <label>Vomiting</label>
                                <select name="vomiting" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Gastrointestinal</label>
                                <select name="gastrointestinal" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Yellow discoloration</label>
                                <select name="yellow_discoloration" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Specialist:</label>
                                <select class="form-control" name="specialist" id="exampleFormControlSelect1">
                                    <option value="medicine">Medicine</option>
                                    <option value="cardiologist">Cardiologist</option>
                                    <option value="anatomy">Anatomy</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Body symptoms:</label>
                                <div>
                                    <input type="radio" value="fever" name="fever" class="mt-2">
                                    <div class="ml-3">
                                        <h5> Fever </h5>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" name="submit"
                                class="btn btn-info btn-block shadow-none py-1">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>


<?php
	if(isset($_POST['submit'])){
		include ('../../db/connection.php');
		$deases = $_POST['deases'];
		$vomiting = $_POST['vomiting'];
		$gastrointestinal = $_POST['gastrointestinal'];
		$yellow_discoloration = $_POST['yellow_discoloration'];
		$specialidze = $_POST['specialist'];
		$fever = $_POST['fever'];

		$sql="INSERT INTO symptoms (deases_name, vomiting, gastrointestinal, yellow_discoloration, specialidze,fever) VALUES('$deases', '$vomiting', '$gastrointestinal', '$yellow_discoloration','$specialidze','$fever')";
				
				if($conn->query($sql))
				{
					echo "Data Inserted";
				}
				else
				{
					echo "Data not Inserted";
				}


	}
?>