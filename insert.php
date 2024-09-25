<?php
    include_once("function.php");

    //  cehck for the request is generate or not
    if($_SERVER['REQUEST_METHOD']== 'POST')
    {   
        if(isset($_POST["submit"])){

            $studentName = $_POST['studentname'];
            $courseid = $_POST['cidv'];
            $dob = $_POST['dob'];
            $email = $_POST['semail'];
            $img = $_FILES['profilepic']['name'];

            $uploadOK = false;
            $targrtDir = "pics/";
            $targetFile = $targrtDir . $_FILES["profilepic"]["name"]; // extension me error ke wajh se nahi ho raha tha s
           $imgext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

            if($imgext == "png")
            {
                $uploadOK = true;
                move_uploaded_file($_FILES['profilepic']['tmp_name'], $targetFile);
               $result = insert_student($courseid,$studentName,$dob,$email,$img);

            }else
            {
                $uploadOK = false;
            }

            if($result)
            {
                echo "<script> alert('successfully inserted') </script>";
            }
            else{
                echo "<script> alert('somethng went wrong') </script>";
            }
            

        }
    }
    

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Records</title>
</head>
<body>
        <form action="" method="post" enctype="multipart/form-data">
        Enter the Name of student : <input name="studentname" required> <br>
        Select The Course : <?php fillCombo(); ?>    <br>
        DOB : <input type="date" name="dob" required><br>
        email : <input type="email" name="semail" required> <br>
        Select Profile Pic : <input type="file" name="profilepic" required> <br>
        <button name="submit"> Insert </button>
        
    </form>

    <hr>
    <a href="admin.php"><Button > GO to Admin Dashboard</Button></a>
</body>
</html>