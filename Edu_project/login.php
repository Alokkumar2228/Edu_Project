 <?php
 session_start();
 
 include("db.php");

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password) && !is_numeric($username))
    {
        $query = "select * from form where username = '$username' limit 1  ";
        $result = mysqli_query($con,$query);

        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] == $password)
                {
                    header("location: index.php");
                    die;

                }

            }
        }
        echo "<script type='text/javascript'> alert('wrong username or password')</script>";
    }
    else{
        echo "<script type='text/javascript'> alert('wrong username or password')</script>";
    }
 }




?> 




<!DOCTYPE html>
<html lang="en">
<head><script type="text/javascript" src="/___vscode_livepreview_injected_script"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>singup</title>
    <link rel="stylesheet" href="login1.css">
</head>
<body>
    <div class="wrapper">
        <h1>Login</h1>
        <form action="#" method="POST"  >
            <input type="text" placeholder="Username" name="username">
            
            <input type="password" placeholder="Password" name="password">
             <div class="recover">
                <a href="#">Forget Password?</a>
            </div> 
            <input class="button" type="submit" name="" value="Login"  >
        </form>
        
        
        <div class="member">
            Not a member? <a href="./signup.php"> Signup</a>
        </div>
    </div>
</body>
</html>