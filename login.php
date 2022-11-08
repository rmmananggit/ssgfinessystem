<?php
include('includes/header.php');

session_start();

if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['message'])){
        $_SESSION['message'] = "You are already logged in";
    }
    header("Location: index.php");
    exit(0);
}


?>

<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h1 class="text-center font-weight-light my-4">Login</h1></div>
                                    <div class="card-body">
                                    <form action="logincode.php" method="POST">

                                        <?php include('message.php'); ?>

                                            <div class="form-floating mb-3">
                                            <input required type="email" name="email" placeholder="Enter Email Address" class="form-control">
                                                <label>Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <input required type="password" name="password" placeholder="Enter Password" class="form-control">
                                                <label>Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="">Forgot Password?</a>
                                                <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<?php
include('includes/footer.php');
?>