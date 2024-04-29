<?php
session_start();

include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $number = $_POST['phonenumber'];
    $dob = date('Y-m-d', strtotime($_POST['birthdate']));
    $gender = $_POST['gender']; 
    
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];

    
    if (empty($name) || empty($gmail) || empty($number) || empty($dob) || empty($address) || empty($country) || empty($city) || empty($state) || empty($pin) || empty($gender)) {
        echo "<script>alert('Please fill in all fields')</script>";
    } elseif (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format')</script>";
    } else {
        
        $query = "INSERT INTO form (name, gmail, number, dob, gender, address, address2, country, city, state, pin) 
                  VALUES ('$name', '$gmail', '$number', '$dob', '$gender', '$address', '$address2', '$country', '$city', '$state', '$pin')";
        
        
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Successfully Registered')</script>";
            header("location: alert.php");
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
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initialscale=1.0" />
 <meta http-equiv="X-UA-Compatible" content="ie=edge" />
 
 <link rel="stylesheet" href="register.css" />
 </head>
 <body>
 <section class="container">
 <header>Registration Form</header>
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
 <input type="text" placeholder="Enter street address" name="address" required
/>
 <input type="text" placeholder="Enter street address line 2" name="address2"
required />
 <div class="column">
 <div class="select-box">
    <input id="country" type="text" placeholder="Country" name="country" required
/>
</div>
 <input  type="text" placeholder="Enter your city" name="city" required />
 </div>
 <div class="column">
 <input type="text" placeholder="State" name="state" required 
/>
 <input type="number" placeholder="Enter postal code" name="pin"
required />
 </div>
 </div>
 <input class="button" type="submit" name="" value="Submit" >
 </form>
 </section>
 </body>
</html>
