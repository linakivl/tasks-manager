<?php

use Itrust\Messages;
// use Itrust\Session;

require_once 'vendor/autoload.php';
include_once 'includes/header.php';
    
    
    if(isset($_POST['submit'])){
        
        $email =  $_POST['email'];
        $pass = $_POST['password'];
        $resultUser = \Itrust\Validation::login($email, $pass);

        if($resultUser){

            foreach($resultUser as $prop){
                $session = new \Itrust\Session();
                $_SESSION['fname'] = $prop['firstName'];
                $_SESSION['id'] = $prop['id'];
            }
            header("Location: tasks.php");
        }
     
    }
?>
    <div class="form__box">    
        <div class="form__container">
        <h2 class="form__text">Login to your account</h2>
            <form action="#" method="POST">
                <input type="email" name="email" placeholder="Email" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <span><?php Messages::displayMessage();?></span>
                <input type="submit" name ="submit" value="Submit"/>
            </form>
            <p>if you are not a user <a href="register-form.php">Register Here</a></p>
        </div>
    </div>
</body>
</html>

<?php include_once 'includes/footer.php' ?>