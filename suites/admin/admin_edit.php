<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

>


<div class="container-fluid">

<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Customer Profile 
      </h6>
    </div>

    <div class="card-body">
      <?php
      $connection = mysqli_connect("localhost","root","","hotel_admin");

      if(isset($_POST['edit_btn']))
      { 
        $id = $_POST['edit_id'];
        $query = "SELECT * from admin WHERE id = '$id' ";
        $query_run = mysqli_query($connection,$query);

        foreach($query_run as $row)
        {
          ?>   
            <form action="code.php" method="POST">

                  <input type = "hidden" name ="edit_id" value ="<?php echo $row['id'] ?>">
                  <div class="form-group">
                      <label> Username </label>
                    <input type="text" name="username" value ="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="password" value ="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter password">
                  </div>
               
                  <div class="form-group">
                    <button type="submit" name="update_adminbtn" class="btn btn-primary">Update</button>
                    <a href = "admin.php" class="btn btn-secondary" >Cancel</a>
                  </div>
          
            </form>
        <?php
        }
      }
      ?>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>