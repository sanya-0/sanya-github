<?php
//starts the session
session_start();
include("db.php");
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">

<title>login signup page</title>
</head>
    <body>
    <?php
$errI="";
$errN="";
$errE="";
$errP="";
$errp="";
//variables are set if it has the value other than Null
if(isset($_POST["signup"]) && isset($_POST["id"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["Password"]) && isset($_POST["Password2"]))
{
    $id = $_POST["id"];
    $name = $_POST["username"];
    $email = $_POST["email"];
    $pw = $_POST["Password"];
    $pw2 = $_POST["Password2"];
   
        if($name=="") 
        {
            $errN= "please fill the details";
        }
        if ($id=="")
        {
            $errI = "please fill the details";
        }
        if ($email=="")
        {
            $errE = "please fill the details";
        }
        if ($pw=="")
        {
            $errp = "please fill the details";
        }
        if ($pw2=="")
        {
            $errP = "please fill the details";
        }
        if($errN=="" && $errI=="" && $errE=="" && $errp=="" && $errP=="")
        {
    if($pw==$pw2)
    {
        echo"working";
        $sql="INSERT INTO users1 (id,username, email, Password) VALUES ('" .$id."','" .$name."','".$email."','".$pw."')";
        if(mysqli_query($conn ,$sql))
        {
        $_SESSION["users1"] = $name;
        header("Location: welcome.php");
        }
        else{
        echo "Error :". $sql . "<br>" .mysqli_error($conn);
        }
    }
    else
    {
        echo "password dont match";
    }
    
}

}



?>
        <div class="container">
        <h1>SIGNUP PAGE</h1><br>
        <form  class= "form " method="post">
            <label for="id"><b>Id: *</b></label>
            <input type="text" class="form-control" name= "id" > <?php echo $errI ?>
            <br>
            <label for="username"><b>UserName: *</b></label>
            <input type="text" class="form-control" name= "username" ><?php echo $errN ?>
            <br>
            <label for="email"><b>Email: *</b></label>
            <input type="email" class="form-control" name= "email" ><?php echo $errE ?>
            <br>
            <label for="password"><b>Password: *</b></label>
            <input type="password" class="form-control" name= "Password" ><?php echo $errp ?>
            <br> 
            <label for="password2"><b>Password again: *</b></label>
            <input type="password" class="form-control" name= "Password2" ><?php echo $errP ?>
            <br> 
            <a href="login.php">ARE YOU ALREADY A MEMBER?</a><br>
            <button name ="signup" class="form-control" type="submit" class="btn btn-primary">
            signup</button> 

        </form>
        </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>


