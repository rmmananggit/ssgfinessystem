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
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['cpassword'];
    $role_as = '0';
    $status = $_POST['status'] == true ? '1':'0';

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

    if($password == $confirm_password){
        //check email
        $checkemail = "SELECT email FROM users WHERE email='$email'";
        $checkemail_run = mysqli_query($con,$checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            $_SESSION['message'] = "Email already exists";
            header("Location: add_student.php");
            exit(0);
        }
        else{
            $query = "INSERT INTO users (fname,lname,email,password,role_as,status) VALUES ('$fname','$lname','$email','$password','$role_as','$status')";
            $query_run = mysqli_query($con, $query);

            if($query_run)
            {
                $_SESSION['message'] = "User Added Successfully";
                header("Location: view_student.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "ERROR! SOMETHING WENT WRONG!";
                header("Location: view_student.php");
                exit(0);
            }
        }

    }
    else
    {
        $_SESSION['message'] = "Password and Confirm Password does not match";
        header("Location: add_student.php");
        exit(0);
    }
    
}
else
{
    header("Location: view_student.php");
    exit(0);
}




?>