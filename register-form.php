<?php

use Itrust\Messages;
use Itrust\Validation;

require_once 'vendor/autoload.php';
include_once 'includes/header.php';

    if(isset($_POST['registerButton'])){

        $fname = ucfirst($_POST['registerFname']);
        $lname = ucfirst($_POST['registerLname']);
        $username = $_POST['registerUsername'];
        $userEmail = $_POST['registerEmail'];
        $userPassword = $_POST['registerPass'];
    
        $validationForm = Validation::validationRegister($fname,$lname,$username,$userEmail,$userPassword);
        
    }
?>

<div class="wrapper register-bg-color">
        <div class="wrapper__container register-bg-container">
            <div class="wrapper__container__box">
                <div class="wrapper-svg-heading">
                    <svg id="color"  class="wrapper-svg-heading--registersvg" enable-background="new 0 0 24 24" height="512" 
                    viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg">
                        <path d="m15.25 24h-12.5c-1.517 0-2.75-1.233-2.75-2.75v-15.5c0-1.517 
                        1.233-2.75 2.75-2.75h12.5c1.517 0 2.75 1.233 2.75 2.75v15.5c0 1.517-1.233 
                        2.75-2.75 2.75z" fill="#5746f2"/>
                        <path d="m12.25 6h-6.5c-.965 0-1.75-.785-1.75-1.75v-1.5c0-.414.336-.75.75-.75h1.603c.329-1.153
                        1.39-2 2.647-2s2.318.847 2.646 2h1.604c.414 0 .75.336.75.75v1.5c0 .965-.785 1.75-1.75 1.75z" 
                        fill="#f24168"/>
                        <path d="m4 3h-1.25c-1.517 0-2.75 1.233-2.75 2.75v15.5c0 1.517 1.233 2.75 2.75 2.75h6.25v-18h-3.25c-.965
                        0-1.75-.785-1.75-1.75z" fill="#2f1dd4"/>
                        <path d="m9 0c-1.257 0-2.318.847-2.646 2h-1.604c-.414 0-.75.336-.75.75v.25 1.25c0 .965.785 1.75 1.75 1.75h3.25z" 
                        fill="#e62952"/><g fill="#fff">
                        <path d="m14.25 10.5h-10.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h10.5c.414 0 .75.336.75.75s-.336.75-.75.75z"/>
                        <path d="m14.25 13.5h-10.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h10.5c.414 0 .75.336.75.75s-.336.75-.75.75z"/>
                        <path d="m14.25 16.5h-10.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h10.5c.414 0 .75.336.75.75s-.336.75-.75.75z"/>
                        <path d="m14.25 19.5h-10.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h10.5c.414 0 .75.336.75.75s-.336.75-.75.75z"/>
                        </g>
                        <path d="m9 9h-5.25c-.414 0-.75.336-.75.75s.336.75.75.75h5.25z" fill="#dedede"/>
                        <path d="m9 12h-5.25c-.414 0-.75.336-.75.75s.336.75.75.75h5.25z" fill="#dedede"/>
                        <path d="m9 15h-5.25c-.414 0-.75.336-.75.75s.336.75.75.75h5.25z" fill="#dedede"/>
                        <path d="m9 18h-5.25c-.414 0-.75.336-.75.75s.336.75.75.75h5.25z" fill="#dedede"/>
                        <path id="movement1" d="m22 21c-.189 0-.362-.107-.447-.276l-1.289-2.578c-.173-.346-.264-.732-.264-1.118v-9.028c0-1.103.897-2 
                        2-2s2 .897 2 2v9.028c0 .386-.091.772-.264 1.118v.001l-1.289 2.578c-.085.168-.258.275-.447.275zm1.289-3.078h.01z" 
                        fill="#f5ce42"/>
                        <path id="movement2"  d="m22 6c-1.103 0-2 .897-2 2v9.028c0 .386.091.772.264 1.118l1.289 2.578c.085.169.258.276.447.276z" fill="#dea806"/>
                    </svg>
                    <h2 class="forms-heading register-heading-color">Register</h2>
                </div> 
                
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form__styles register_btn-color-style">
                    <input type="text" name="registerFname" placeholder="First Name" required>
                    <input type="text" name="registerLname" placeholder="Last Name" required>
                    <input type="text" name="registerUsername" placeholder="Username" required>
                    <input type="email" name="registerEmail" placeholder="Email" required>
                    <input type="password" name="registerPass" placeholder="Password" required>
                    <div class="checkbox__box">
                    <input type="checkbox" name="registerCheckbox" id="registerCheck">
                    <label for="registerButton" required>Check if you agree with the Terms</label>
                    </div>
                    <span class="display-span" ><?php Messages::displayMessage()?> </span>
                    <input type="submit" class="register_btn-color-style" name="registerButton" value="Resigter">
                </form>
                <p>if you are a user <a href="index.php">Sign In</a></p>
            </div>
        </div>
    </div>
<?php include_once 'includes/footer.php'; ?>