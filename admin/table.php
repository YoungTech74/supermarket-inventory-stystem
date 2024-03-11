<div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>User</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

              <?php
                $sql = mysqli_query($db, "SELECT * FROM user_registration");

                while($row = mysqli_fetch_assoc($sql)){
                    ?>
                        <tr >
                            <td><?php echo $row['firstname']; ?> </td>
                            <td><?php echo $row['lastname']; ?> </td>
                            <td><?php echo $row['username']; ?> </td>
                            <td><?php echo $row['role']; ?> </td>
                            <td><?php echo $row['status']; ?> </td>
                            <td><a   href="edit.php?editId=<?php echo $row['id']; ?>" type="submit" class="btn btn-info">Edit</a> </td>
                            <td><a  href="delete.php?deleteId=<?php echo $row['id']; ?> " type="submit" class="btn btn-danger">Delete</a> </td>
                        </tr>

                    <?php
                }
              ?>
               
                
              </tbody>
            </table>
          </div>
        </div>