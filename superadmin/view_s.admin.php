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
        <form action="code_s.admin.php" method="POST">
          <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <div class="container-fluid px-4">
        <h4 class="mt-4">Admin</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> Dashboard</li>
            <li class="breadcrumb-item"> Admin</li>
        </ol>
    <div class="row">

        <div class="col-md-12">

            <?php include('message.php'); ?>
            
            <div class="card">
                <div class="card-header">
                    <h4>Registered Admin Account/s
                        <a href="add_s.admin.php" class="btn btn-primary float-end"> Add Admin Account</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT
                            users.id, 
                            users.fname, 
                            users.lname, 
                            users.email, 
                            users.`password`, 
                            users.user_type, 
                            `status`.`status`
                        FROM
                            users
                            INNER JOIN
                            `status`
                            ON 
                                users.`status` = `status`.status_id
                        WHERE
                            users.user_type = 1";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['fname']; ?></td>
                                        <td><?= $row['lname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['password']; ?></td>
                                        <td>
                                            <?php
                                            if($row['user_type'] == '1'){
                                                echo 'Admin';
                                            }
                                            ?>
                                        </td>
                                        <td><?=$row['status']; ?></td>
                                        <td> <a href="edit_s.admin.php?id=<?=$row['id'];?>" class="btn btn-success">Edit</a></td>
                                        <td>
                                            <form action="code_s.admin.php" method="POST">
                                                <button type="submit" name="user_delete" value="<?=$row['id']; ?>" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
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
    </div>
</div>





<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>