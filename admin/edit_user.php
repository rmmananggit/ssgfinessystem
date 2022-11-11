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
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Student I.D</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            users.*, 
                            user_status.user_status, 
                            user_role.role_name
                          FROM
                            users
                            INNER JOIN
                            user_status
                            ON 
                              users.user_status_id = user_status.user_status_id
                            INNER JOIN
                            user_role
                            ON 
                              users.user_role_id = user_role.user_role_id
                          WHERE
                            users.user_role_id = 2";
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
                                        <td><?= $row['role_name']; ?></td>
                                        <td><?= $row['user_status']; ?></td>
                                        <td><button type="button" class="btn btn-danger btn-sm">  <i class="fa-sharp fa-solid fa-box-archive"></i></button>
                                        <a href="edit_user1.php?id=<?=$row['user_id'];?>" class="btn btn-warning btn-sm"><i class="fa-sharp fa-solid fa-pen"></i></a></td>
                                        
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






<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>