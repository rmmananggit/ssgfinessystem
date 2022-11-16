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
            <li class="breadcrumb-item active">Officer</li>
            <li class="breadcrumb-item">Edit Officer</li>
            
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Personal Information
                            <a href="edit_user.php" class="btn btn-danger float-end"><i class="fa-sharp fa-solid fa-left-long"></i></a>
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
                                <div class="col-md-4 mb-3">
                                    <label for=""><strong>First Name</strong></label>
                                    <input type="text" name="fname" value="<?= $user['first_name']; ?>" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for=""><strong>Middle Name</strong></label>
                                    <input type="text" name="mname" value="<?= $user['middle_name']; ?>" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for=""><strong>Last Name</strong></label>
                                    <input type="text" name="lname" value="<?= $user['last_name']; ?>" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for=""><strong>Username</strong></label>
                                    <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control">
                                </div>
                                
                                <div class="col-md-8 mb-3">
                                <label for=""><strong>Email</strong></label>
                                    <input type="text" name="email" value="<?= $user['email']; ?>" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for=""><strong>Mobile Number</strong></label>
                                    <input type="text" name="mobile_number" value="<?= $user['mobile_number']; ?>" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for=""><strong>Status</strong></label>
                                    <select name="status" required class="form-control">
                                        <option value="">--Status--</option>
                                        <option value="1" <?= $user['user_status_id'] == '1' ? 'selected' :'' ?> >Active</option>
                                        <option value="2" <?= $user['user_status_id'] == '2' ? 'selected' :'' ?> >Inactive</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for=""><strong>User Role</strong></label>
                                    <select name="role_as" required class="form-control">
                                        <option value="">--User Role--</option>
                                        <option value="1" <?= $user['user_role_id'] == '1' ? 'selected' :'' ?> >Admin</option>
                                        <option value="2" <?= $user['user_role_id'] == '2' ? 'selected' :'' ?> >Student</option>
                                        <option value="3" <?= $user['user_role_id'] == '3' ? 'selected' :'' ?> >Secretary</option>
                                        <option value="4" <?= $user['user_role_id'] == '4' ? 'selected' :'' ?> >Treasurer</option>
                                        <option value="5" <?= $user['user_role_id'] == '5' ? 'selected' :'' ?> >Parent</option>
                                    </select>
                                </div>

                                <hr class="mt-2 mb-3"/>

                                <h2></h2>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="update_btn" class="btn btn-primary float-end">Submit</button>
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