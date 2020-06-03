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

      $query = "SELECT * from room";
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
          </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_assoc($query_run))
        {
          ?>
          <tr>
            <td><?php echo $row['id']; ?> </td>
            <td><?php echo $row['name']; ?> </td>
            <td><?php echo $row['capacity']; ?> </td>
            <td><?php echo $row['remark']; ?> </td>
            <td><?php echo $row['price']; ?> </td>
            <td><?php echo $row['image']; ?> </td>
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