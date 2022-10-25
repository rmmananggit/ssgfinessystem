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
        <h4 class="mt-4">Users</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> Dashboard</li>
            <li class="breadcrumb-item active"> User</li>
            <li class="breadcrumb-item"> Edit User</li>
            
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Edit User
                            <a href="penalty.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $user_id = $_GET['id'];
                            $users = "SELECT * FROM users WHERE id='$user_id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>
                        <form action="code.php" method="POST">
                            <input type="hidden" name="user_id" value="<?=$user['id'];?>">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">First Name</label>
                                    <input type="text" name="fname" value="<?= $user['fname']; ?>" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lname"  value="<?= $user['lname']; ?>" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="text" name="email"  value="<?= $user['email']; ?>" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Fine</label>
                                    <input type="text" name="fines"  value="<?= $user['fines']; ?>" class="form-control">
                                </div>


                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
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