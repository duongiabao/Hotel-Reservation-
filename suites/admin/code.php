<?php
session_start();
$connection = mysqli_connect("localhost","root","","hotel_admin");



#Book room
if(isset($_POST['book_roombtn']))
{
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $roomtypeID = $_POST['RoomtypeID'];

   
    $query = "INSERT INTO customer(name,phone,email,address) VALUES ('$name','$phone','$email','$address')";
    $query_run = mysqli_query($connection, $query);

    $last_id = mysqli_insert_id($connection);
    
    $querys = "INSERT INTO reservation(customer_id,room_id,checkin,checkout) VALUES ('$last_id',$roomtypeID,'$checkin','$checkout')";
    $query_runs = mysqli_query($connection, $querys);

    if($query_runs)
     {   
    
        $_SESSION['success'] =  '<script type="text/javascript">alert("Reservation addded");</script>';
        header('Location: ../index.php');
     }
     else
     {     
        $_SESSION['status'] =  $checkin;
        header('Location: ../index.php');
     }


}


# Add admin
if(isset($_POST['add_adminbtn']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];

    if($password === $confirm_password)
    {

        $result = mysqli_query($connection, "SELECT * FROM admin WHERE username = '$username'");
        $username_exits = mysqli_num_rows($result);

        if($username_exits > 0)
        {
            $_SESSION['notice']  = '<script type="text/javascript">alert("Username of Email exists!");</script>';
            header('Location: admin.php');
        }
       else
        {
          
            $query = "INSERT INTO admin(username,password) VALUES ('$username','$password')";
            $query_run = mysqli_query($connection, $query);

            if($query_run)
            {
                //echo "done";
                $_SESSION['success'] =  "Admin is Added Successfully";
                header('Location: admin.php');
            }
            else
            {
                //echo "not done";
                $_SESSION['status'] =  "Admin is Not Added";
                header('Location: admin.php');
            }
        }

       
    }
    else
    {
        //echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
        header('Location: admin.php');
    }

}


#update admin
if(isset($_POST['update_adminbtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "UPDATE admin SET username = '$username', password = '$password' WHERE id = '$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
     {   
        $_SESSION['success'] =  "Update Successfully";
        header('Location: admin.php');
     }
     else
     {
        $_SESSION['status'] =  "Failed to Update";
        header('Location: admin.php');
     }

}


#delete admin
if(isset($_POST['delete_adminbtn']))
{

    $id = $_POST['delete_id'];

    $query = "DELETE from admin WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
     {   
        $_SESSION['success'] =  "Delete Successfully";
        header('Location: admin.php');
     }
     else
     {
           
        $_SESSION['status'] =  "Failed to Delete";
        header('Location: admin.php');
     }
}


#Add customer
if(isset($_POST['add_customerbtn']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    #Insert to database
    $query = "INSERT INTO customer(name,phone,email,address) VALUES ('$name','$phone','$email','$address')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        //echo "done";
        $_SESSION['success'] =  "Customer is Added Successfully";
        header('Location: customer.php');
    }
    else
    {
        //echo "not done";
        $_SESSION['status'] =  "customer is Not Added";
        header('Location: customer.php');
    }

}

#delete customer
if(isset($_POST['delete_customerbtn']))
{

    $id = $_POST['delete_id'];

    $query = "DELETE from customer WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
     {   
        $_SESSION['success'] =  "Delete Successfully";
        header('Location: customer.php');
     }
     else
     {
           
        $_SESSION['status'] =  "Failed to Delete";
        header('Location: customer.php');
     }
}

if(isset($_POST['update_reservationbtn']))
{
    $id = $_POST['edit_id'];
    $admin_id = $_POST['admin_id'];
    $status = $_POST['status'];

    $query = "UPDATE reservation SET status = '$status',admin_id = '$admin_id' WHERE id = '$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
     {   
        $_SESSION['success'] =  "Update Successfully";
        header('Location: reservation.php');
     }
     else
     {
        $_SESSION['status'] =  "Failed to Update";
        header('Location: reservation.php');
     }

}


#delete reservation
if(isset($_POST['delete_reservationbtn']))
{

    $id = $_POST['delete_id'];

    $query = "DELETE from reservation WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
     {   
        $_SESSION['success'] =  "Delete Successfully";
        header('Location: reservation.php');
     }
     else
     {
           
        $_SESSION['status'] =  "Failed to Delete";
        header('Location: reservation.php');
     }
}

#Login to hotel management

if(isset($_POST['login_btn']))
{

    $username_login = $_POST['username'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username = '$username_login' AND password = '$password_login' ";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run))
    {

        $_SESSION['username'] = $username_login;
        header('location:../admin/index.php');
    }
    else
    {
        $_SESSION['status'] = "Username or Password incorrect. Try again.";
        header('location:../login/login.php');
    }

}

mysqli_close($connection);
?>

