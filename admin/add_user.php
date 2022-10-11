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
        <h4 class="mt-4">Users</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> Dashboard</li>
            <li class="breadcrumb-item active"> User</li>
            <li class="breadcrumb-item"> Add User</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add User
                            <a href="view_register.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                  <div class="card-body">
                  <?php include('message.php'); ?>
                    <form action="code.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">First Name</label>
                                    <input required type="text" name="fname" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Last Name</label>
                                    <input required type="text" name="lname" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input required type="text" name="email" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input required type="password" name="password" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Confirm Password</label>
                                    <input required type="password" name="cpassword" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Role</label>
                                    <select name="role_as" required class="form-control">
                                        <option value="">--Select Role--</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Student</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" width="70px" height="70x">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    






<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>