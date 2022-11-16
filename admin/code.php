<?php
include('authentication.php');

if(isset($_POST['user_delete']))
{
    $user_id= $_POST['user_delete'];

    $query = "DELETE FROM users WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header('Location: view_register.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong!";
        header('Location: view_register.php');
        exit(0);
    }
}


if(isset($_POST['logout_btn']))
{
    // session_destroy();
    unset( $_SESSION['auth']);
    unset( $_SESSION['auth_role']);
    unset( $_SESSION['auth_user']);

    $_SESSION['message'] = "Logout Successfully";
    header("Location: ../login.php");
    exit(0);
}
?>

<?php
if(isset($_POST['update_btn']))
{
    $user_id = $_POST['user_id'];
    $schoolid = $_POST['schoolid'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile_number'];
    $status = $_POST['status'];
    $user_role_id = $_POST['role_as'];

    $query = "UPDATE `users` SET `school-id`='$schoolid',`username`='$uname', `first_name`='$fname',`middle_name`='$mname',`last_name`='$lname',`email`='$email',`mobile_number`='$mobile', `user_role_id`='$user_role_id',`user_status_id`='$status' WHERE  `user_id`='$user_id'";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        header('Location: user.php');
        exit(0);
    }
    else{
        $_SESSION['message'] = "Error! SOMETHING WENT WRONG!";
        header('Location: user.php');
        exit(0);
    }
}
?>

<?php
if(isset($_POST['add_student']))
{
    $schoolid = $_POST['schoolid'];
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobilenumber'];
    $fines = $_POST['fines'];
    $balance = $_POST['fines'];
    $user_role_id = $_POST['role_as'];
    $user_status_id= $_POST['status'];
    $password = "Password@123";

        $checkemail = "SELECT email FROM users WHERE email='$email'";
        $checkemail_run = mysqli_query($con,$checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            $_SESSION['message'] = "Email already exists";
            header("Location: user.php");
            exit(0);
        }
        else{
            $query = "INSERT INTO `users`(`school-id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `mobile_number`, `fines`, `balance`, `user_role_id`, `user_status_id`) VALUES ('$schoolid','$username','$password','$fname','$mname','$lname','$email','$mobile','$fines','$balance','$user_role_id','$user_status_id')";
            $query_run = mysqli_query($con, $query);

            if($query_run)
            {
                $_SESSION['message'] = "User Added Successfully";
                header("Location: user.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "ERROR! SOMETHING WENT WRONG!";
                header("Location: user.php");
                exit(0);
            }
        }   
}
?>


<?php
if(isset($_POST['payfines_btn']))
{
    $id = $_POST['user_id'];
    $payment = $_POST['pay'];
    $date = date('Y-m-d', strtotime($_POST['date']));


    $query= "SELECT `fines`, `balance` FROM users WHERE user_id = '$id' ";
    $query_run = $con->query($query);
    $data = $query_run->fetch_assoc();
    $fee = $data['fines'];

    if($fee['balance'] > 0)
    {
        $query2 = "INSERT INTO `fines`(`fines_id`, `fines_fee`, `date`) VALUES ('$id','$payment','$date')";
        $con->query($query2);
        
        $sq1 = "SELECT sum(fines_fee) as totalpaid FROM fines WHERE `fines_id` = '$id'";
        $sq1_run = $con->query($sq1);
        $row = $sq1_run->fetch_assoc();
        $balance = $row['totalpaid'];
        $newbal = ($fee - $balance);

        $sq3 = "UPDATE `users` SET `balance`='$newbal' WHERE user_id = '$id'";
        $con->query($sq3);

        if($con)
        {
            {
                $_SESSION['message'] = "Update Successfully!    ";
                header('Location: fines.php');
                exit(0);
            }
        }
        else
        {
            $_SESSION['message'] = "Error! Something went wrong!";
            header('Location: fines.php');
            exit(0);
        }
    
    }
}else{
    $_SESSION['message'] = "Error! Something went wrong!";
    header('Location: fines.php');
    exit(0);
}
?>





