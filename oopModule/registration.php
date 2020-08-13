<?php
    include_once 'classUser.php';

    $user = new User();
    // Checking for user logged in or not
    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $register = $user->regUser($name, $age, $sex, $email, $password);

        if ($register) {
            // Registration Success
            echo 'Registration successful
            <a href="login.php">Click here</a> to login';
        } else {
            // Registration Failed
            echo 'Registration failed. Email or Username already exist please try again';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OOP Register Module</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <!-- jQuery library -->
    <script src="bootstrap/js/jquery.min.js"> </script>
    <script src="bootstrap/js/bootstrap.js"> </script>

    <!-- Latest compiled JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"> </script>
</head>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<style><!--  #container{width:400px; margin: 0 auto;} --></style>

<script type="text/javascript" language="javascript">
    function submitreg() {
        var form = document.reg;
        if(form.name.value == ""){
            alert( "Enter name." );
            return false;
        }
        else if(form.age.value == ""){
            alert( "Enter age." );
            return false;
        }
        else if(form.sex.value == ""){
            alert( "Enter sex." );
            return false;
        }
        else if(form.email.value == ""){
            alert( "Enter email." );
            return false;
        }
        else if(form.password.value == ""){
            alert( "Enter password." );
            return false;
        }
    }
</script>

<div id="container">
    <h1>Registration Here</h1>
    <form action="" method="post" name="reg">
        <table>
            <tbody>
                <tr>
                    <th>Name:</th>
                    <td><input type="text" name="name" required="" /></td>
                </tr>

                <tr>
                    <th>Age:</th>
                    <td><input type="text" name="age" required="" /></td>
                </tr>

                <tr>
                    <th>Sex:</th>
                    <td><input type="text" name="sex" required="" /></td>
                </tr>

                <tr>
                    <th>Email:</th>
                    <td><input type="email" name="email" required="" /></td>
                </tr>

                <tr>
                    <th>Password:</th>
                    <td><input type="password" name="password" required="" /></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input onclick="return(submitreg());" type="submit" name="submit" value="Register" /></td>
                </tr>

                <tr>
                    <td></td>
                    <td><a href="login.php">Already registered! Click Here!</a></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>