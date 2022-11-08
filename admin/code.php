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



if(isset($_POST['update_btn']))
{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE users SET fname='$fname',lname='$lname',email='$email',password='$password', role_as='$role_as',status='$status' WHERE id='$user_id' ";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        header('Location: view_register.php');
        exit(0);
    }


}



if(isset($_POST['add_student']))
{
    $schoolid = $_POST['schoolid'];
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobilenumber'];
    $fines = "0";
    $balance = "0";
    $user_role_id = "2";
    $user_position_id = "5";
    $user_status_id= "1";
    $password = "Password@123";


    // $query = "INSERT INTO users (fname,lname,email,password,role_as,status) VALUES ('$fname','$lname','$email','$password','$role_as','$status')";
    // $query_run = mysqli_query($con, $query);

    // if($query_run)
    // {
    //     $_SESSION['message'] = "User Added Successfully";
    //     header('Location: view_register.php');
    //     exit(0);
    // }
    // else
    // {
    //     $_SESSION['message'] = "Something went wrong!";
    //     header('Location: view_register.php');
    //     exit(0);
    // }

 //check email
        $checkemail = "SELECT email FROM users WHERE email='$email'";
        $checkemail_run = mysqli_query($con,$checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            $_SESSION['message'] = "Email already exists";
            header("Location: student.php");
            exit(0);
        }
        else{
            $query = "INSERT INTO `users`(`school-id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `mobile_number`, `fines`, `balance`, `user_role_id`, `user_position_id`, `user_status_id`) VALUES ('$schoolid','$username','$password','$fname','$mname','$lname','$email','$mobile','$fines','$balance','$user_role_id','$user_position_id','$user_status_id')";
            $query_run = mysqli_query($con, $query);

            if($query_run)
            {
                $_SESSION['message'] = "Student Added Successfully";
                header("Location: student.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "ERROR! SOMETHING WENT WRONG!";
                header("Location: student.php");
                exit(0);
            }
        }

    
    
}
else
{
    header("Location: student.php");
    exit(0);
}




?>