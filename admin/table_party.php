<div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Business Name</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

              <?php
                $sql = mysqli_query($db, "SELECT * FROM party_info");

                while($row = mysqli_fetch_assoc($sql)){
                    ?>
                        <tr >
                            <td><?php echo $row['firstname']; ?> </td>
                            <td><?php echo $row['lastname']; ?> </td>
                            <td><?php echo $row['businessname']; ?> </td>
                            <td><?php echo $row['contact']; ?> </td>
                            <td><?php echo $row['address']; ?> </td>
                            <td><?php echo $row['city']; ?> </td>
                            <td style="text-align: center;"><a   href="edit_party.php?editId=<?php echo $row['id']; ?>" type="submit" class="btn btn-info">Edit</a> </td>
                            <td style="text-align: center;"><a  href="delete_party.php?deleteId=<?php echo $row['id']; ?> " type="submit" class="btn btn-danger">Delete</a> </td>
                        </tr>

                    <?php
                }
              ?>
               
              </tbody>
            </table>
          </div>
        </div>