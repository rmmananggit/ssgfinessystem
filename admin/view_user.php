<?php 
include('authentication.php');
include('includes/header.php');
?>

<!-- MODAL -->
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
        <h4 class="mt-4">Students</h4>
        <ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Students</li>
            <li class="breadcrumb-item">View Student</li>
            
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Personal Information
                            <a href="user.php" class="btn btn-danger float-end"><i class="fa-sharp fa-solid fa-left-long"></i></a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM users WHERE user_id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>
                        <form action="code.php" method="POST">
                            <input type="hidden" name="user_id" value="<?=$user['user_id'];?>">

                            <div class="container-fluid">
                            <div class="row">

                            <div class="col-md-12 mb-3">
                                    <label for=""><strong>School I.D</strong></label>
                                    <p class="form-control"><?=$user['school-id'];?></p>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for=""><strong>First Name</strong></label>
                                    <p class="form-control"><?=$user['first_name'];?></p>
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for=""><strong>Middle Name</strong></label>
                                    <p class="form-control"><?=$user['middle_name'];?></p>
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for=""><strong>Last Name</strong></label>
                                    <p class="form-control"><?=$user['last_name'];?></p>
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for=""><strong>Username</strong></label>
                                    <p class="form-control"><?=$user['username'];?></p>
                                </div>
                                
                                <div class="col-md-8 mb-3">
                                <label for=""><strong>Email</strong></label>
                                    <p class="form-control"><?=$user['email'];?></p>
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for=""><strong>Mobile Number</strong></label>
                                    <p class="form-control"><?=$user['mobile_number'];?></p>
                                </div>

                                <hr class="mt-2 mb-3"/>

                                <h5>Payment History</h5>
                                <div class="container">       
                                <table class="table table-bordered">
                                <thead>
                                <tr>
                                <th>Date</th>
                                <th>Payment</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                            $query = "SELECT
                            fines.fines_fee, 
                            fines.date
                        FROM
                            fines
                        WHERE fines_id = '$id'";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['date']; ?></td>
                                        <td><?= $row['fines_fee']; ?></td>
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

                                <hr class="mt-2 mb-3"/>
                                <h2></h2>
                                <div class="col-md-12 mb-3">
                                <label for=""><strong>Fines:</strong></label>
                                <i class="fa-sharp fa-solid fa-peso-sign"></i><?=$user['fines'];?>
                                </div>
                                <div class="col-md-12 mb-3">
                                <div class="col-md-12 mb-3">
                                <label for=""><strong>Balance:</strong></label>
                               <i class="fa-sharp fa-solid fa-peso-sign"></i><?=$user['balance'];?>
                                </div>
                            </div>
                            </div>
                        </form>
                        <?php
                                }
                            }
                            else
                            {
                                ?>
                                <h4>No Record Found!</h4>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    






<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>