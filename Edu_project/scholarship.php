<?php
session_start();

include("link.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   

    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $number = $_POST['phonenumber'];
    $dob = date('Y-m-d', strtotime($_POST['birthdate']));
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $edulevel = $_POST['edulevel'];
    $graduateyear = date('Y', strtotime($_POST['graduateyear']));
    $gpa = $_POST['gpa'];
    $annual_income = $_POST['annualincome'];

    
    if (empty($name) || empty($gmail) || empty($number) || empty($dob) || empty($address) || empty($edulevel) || empty($graduateyear) || empty($gpa) || empty($annual_income) || empty($gender)) {
        echo "<script>alert('Please fill in all fields')</script>";
    } elseif (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format')</script>";
    } else {
        
        $query = "INSERT INTO form (name, gmail, number, dob, gender, address, edulevel, graduateyear, gpa, annual_income) 
                  VALUES ('$name', '$gmail', '$number', '$dob', '$gender', '$address', '$edulevel', '$graduateyear', '$gpa', '$annual_income')";
        
        
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Thankyou for Apply')</script>";
            header("location: alert2.php");
            die;
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="scholarship.css">
</head>
<body>
    <section class="container">
        <header>Educational Scholarship Form</header>
        <form action="#" method="POST" class="form">
        <div class="input-box">
        <label>Full Name</label>
        <input type="text" placeholder="Enter full name" name="name" required />
        </div>
        <div class="input-box">
        <label>Email Address</label>
        <input type="text" placeholder="Enter email address" name="gmail" required />
        </div>
        <div class="column">
        <div class="input-box">
        <label>Phone Number</label>
        <input type="number" placeholder="Enter phone number" name="phonenumber" required />
        </div>
        <div class="input-box">
        <label>Birth Date</label> 
        <input type="date" placeholder="Enter birth date" name="birthdate" required />
        </div>
        </div>
        <div class="gender-box">
        <h3>Gender</h3>
        <div class="gender-option">
        <div class="gender">
        <input type="radio" id="check-male" name="gender" value="m"  />
        <label for="check-male">Male</label>
        </div>
        <div class="gender">
        <input type="radio" id="check-female" name="gender" value="f" />
        <label for="check-female">Female</label>
        </div>
        <div class="gender">
        <input type="radio" id="check-other" name="gender" value="o" />
        <label for="check-other">Others</label>
        </div>
        </div>
        </div>
        <div class="input-box address">
        <label>Address</label>
        <input class="address" type="text" placeholder="Enter street address" name="address" required
       />
       <label>Education level</label>
        <input class="edulevel" type="text" placeholder="Education level" name="edulevel"
       required />
        <div class="column">
            <div class="input-box">
                <label>Graduation Year</label> 
                <input type="date" placeholder="Graduation Year" name="graduateyear" required="">
                </div>
        <!-- <input  type="text" placeholder="Enter your city" name="city" required /> -->
        </div>
        <div class="column">
        <label class="gpa">GPA</label>

        <input type="number" placeholder="Enter GPA" name="gpa"
       required />
        </div>
        <div class="input-box ">
            <label>Annual Income</label>
            <input type="number" placeholder="Enter Annual Income" name="annualincome" required="">
            </div>
        </div>
        <input class="button" type="submit" name="" value="Apply for Scholarship" >
        </form>
        </section>
</body>
</html>