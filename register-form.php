<?php

use Itrust\Messages;
use Itrust\Validation;

require_once 'vendor/autoload.php';
include_once 'includes/header.php';

    if(isset($_POST['registerSubmit'])){

        $fname = ucfirst($_POST['registerFname']);
        $lname = ucfirst($_POST['registerFname']);
        $username = $_POST['registerUsername'];
        $userEmail = $_POST['registerEmail'];
        $userPassword = $_POST['registerPassword'];
    
        $validationForm = Validation::validationRegister($fname,$lname,$username,$userEmail,$userPassword);

    }
?>

<div class="form__box">    
        <div class="form__container">
        <h2 class="form__reg">Register</h2>
            <form action="register-form.php" method="POST">
                <input type="text" name="registerFname" placeholder="First Name" required/>
                <input type="text" name="registerLname" placeholder="Last Name" required/>
                <input type="text" name="registerUsername" placeholder="Username" required/>
                <input type="email" name="registerEmail" placeholder="Email" required/>
                <input type="password" name="registerPassword" placeholder="Password" required/>
                <span class="display-span" ><?php Messages::displayMessage()?> </span>
                <input type="submit" name ="registerSubmit" value="Submit"/>
            </form>
            <p>if you are a user <a href="index.php">Sign In</a></p>
           
        </div>
    </div>