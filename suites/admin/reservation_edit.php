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
        $query = "SELECT * from reservation WHERE id = '$id' ";
        $query_run = mysqli_query($connection,$query);

        foreach($query_run as $row)
        {
          ?>   
            <form action="code.php" method="POST">

                  <input type = "hidden" name ="edit_id" value ="<?php echo $row['id'] ?>">
                  <div class="form-group">
                      <label> AdminID </label>
                    <input type="text" name="admin_id" value ="<?php echo $row['admin_id'] ?>" class="form-control" >
                  </div>
                   <div class="form-group">
                      <label> Status </label>
                    <input type="text" name="status" value ="<?php echo $row['status'] ?>" class="form-control" >
                  </div>  

                  <div class="form-group">
                    <button type="submit" name="update_reservationbtn" class="btn btn-primary">Update</button>
                    <a href = "reservation.php" class="btn btn-secondary" >Cancel</a>
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