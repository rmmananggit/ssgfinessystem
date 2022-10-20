<?php
session_start();
include('admin/config/dbcon.php');

if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password= '$password' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        foreach($login_query_run as $data){
            $user_id = $data['id'];
            $user_name = $data['fname'].' '.$data['lname'];
            $role_as = $data['user_type'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_user'] = [
            'user_id' =>$user_id,
            'user_name' =>$user_name,
            'user_email' =>$user_email,
        ];

        if( $_SESSION['auth_role'] == '1')
        {
            $_SESSION['message'] = "Welcome Super Admin";
            header("Location: superadmin/superadmin.php");
            exit(0);
        }
        elseif( $_SESSION['auth_role'] == '2')
        {
            $_SESSION['message'] = "Welcome Administrator!";
            header("Location: admin/index.php");
            exit(0);
        }
        elseif( $_SESSION['auth_role'] == '3')
        {
            $_SESSION['message'] = "Welcome Student!";
            header("Location: index.php");
            exit(0);
        }
        elseif( $_SESSION['auth_role'] == '4')
        {
            $_SESSION['message'] = "Welcome Secretary!";
            header("Location: secretary/index.php");
            exit(0);
        }
        elseif( $_SESSION['auth_role'] == '5')
        {
            $_SESSION['message'] = "Welcome!";
            header("Location: treasurer/index.php");
            exit(0);
        }
        elseif( $_SESSION['auth_role'] == '6')
        {
            $_SESSION['message'] = "Welcome!";
            header("Location: parent/index.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid Email or Password";
        header("Location: login.php");
        exit(0);
    }
}   
else
{
    $_SESSION['message'] = "You are not allowed to access this site";
    header("Location: login.php");
    exit(0);
}

?>