<?php 
include('authentication.php');
include('includes/header.php');
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        </button>
      </div>
      <div class="modal-body"> Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="code.php" method="POST">
          <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid px-4">
                        <h1 class="mt-4">Student</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Students
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Student I.D</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>TOTAL BALANCE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Student I.D</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>TOTAL BALANCE</th>
                                        <th>ACTION</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            users.user_id, 
                            users.`school-id`, 
                            users.`password`, 
                            users.first_name, 
                            users.middle_name, 
                            users.last_name,
                            users.balance
                          FROM
                            users
                          WHERE
                            users.user_role_id = 2 AND
                            users.user_position_id = 5 AND
                            users.user_status_id = 1";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['school-id']; ?></td>
                                        <td><?= $row['first_name']; ?></td>
                                        <td><?= $row['middle_name']; ?></td>
                                        <td><?= $row['last_name']; ?></td>
                                        <td><i class="fa-sharp fa-solid fa-peso-sign"></i><?= $row['balance']; ?></td>
                                        <td> <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#fines"><i class="fa-sharp fa-solid fa-hand-holding-dollar"></i></a></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                            ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="container">


  <!-- The Modal -->
  <div class="modal fade" id="fines">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5>Take Fee</h5>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>


<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>