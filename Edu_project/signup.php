 <?php
 session_start();
 
 include("db.php");

 if($_SERVER['REQUEST_METHOD'] == "POST")
 
 {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $gmail = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
    {

        $query = "insert into form (username,name,email,password) values ('$username','$name','$gmail','$password')";

        mysqli_query($con,$query);

        echo "<script type='text/javascript'> alert('Successfully Register')</script>";
    }

    else
    {
        echo "<script type='text/javascript'> alert('Please Enter Some Valid Information')</script>";

    }
}

?> 

<!DOCTYPE html>
<html lang="en">
<head><script type="text/javascript" src="/___vscode_livepreview_injected_script"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>singup</title>
    <link rel="stylesheet" href="signup1.css">
</head>
<body>
    <div class="wrapper">
        <h1>Sign Up</h1>
        <form action="#" method="POST">
            <input type="text" placeholder="Username" name="username">
            <input type="text" placeholder="Name" name="name">
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <input class="button" type="submit" name="" value="Sign Up" >
        </form>
        <div class="member">
            Already a member? <a href="./login.php"> Login Here</a>
        </div>
    </div>
</body>
</html>