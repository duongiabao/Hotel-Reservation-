<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Reservation List</h6>
  </div>

  <div class="card-body">
    <?php
    if(isset($_SESSION['success']) && $_SESSION['success'] != '')
    {
      echo '<h2> '. $_SESSION['success']. '</h2>';
      unset($_SESSION['success']);
    }

    if(isset($_SESSION['status']) && $_SESSION['status'] != '')
    {
      echo '<h2 class = "bg-info"> '. $_SESSION['status']. '</h2>';
      unset($_SESSION['status']);
    }    
    
    ?>

    <div class="table-responsive">
    <?php
      $connection = mysqli_connect("localhost","root","","hotel_admin");

      $query = "SELECT * from reservation";
      $query_run = mysqli_query($connection,$query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Customer ID </th>
            <th> Admin ID </th>
            <th> Room</th>
            <th>Checkin</th>
            <th>Checkout</th>
            <th>Status</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_assoc($query_run))
        {
          ?>
          <tr>
            <td><?php echo $row['id']; ?> </td>
            <td><?php echo $row['customer_id']; ?> </td>
            <td><?php echo $row['admin_id']; ?> </td>
            <td><?php echo $row['room_id']; ?> </td>
            <td><?php echo $row['checkin']; ?> </td>
            <td><?php echo $row['checkout']; ?> </td>
            <td><?php echo $row['status']; ?> </td>
            <td>
                <form action="reservation_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">  
                  <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                  <button type="submit" name="delete_reservationbtn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          <?php
        }
          ?>
          </tr>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>