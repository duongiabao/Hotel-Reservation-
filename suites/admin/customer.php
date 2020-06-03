<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Name </label>
              <input type="text" name="name" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Enter number">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter address">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="submit" name="add_customerbtn" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Customer Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Customer Profile 
            </button>
    </h6>
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

      $query = "SELECT * from customer";
      $query_run = mysqli_query($connection,$query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th>Phone </th>
            <th>Email</th>
            <th>Address</th>
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
            <td><?php echo $row['name']; ?> </td>
            <td><?php echo $row['phone']; ?> </td>
            <td><?php echo $row['email']; ?> </td>
            <td><?php echo $row['address']; ?> </td>
            <td>
                <form action="code.php" method="post">  
                  <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                  <button type="submit" name="delete_customerbtn" class="btn btn-danger"> DELETE</button>
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