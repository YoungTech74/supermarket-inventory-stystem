<div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Unit ID</th>
                  <th>Unit Name</th> 
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

              <?php
                $sql = mysqli_query($db, "SELECT * FROM units");

                while($row = mysqli_fetch_assoc($sql)){
                    ?>
                        <tr >
                            <td><?php echo $row['id']; ?> </td>
                            <td><?php echo $row['unit']; ?> </td>
                            <td style='text-align: center;'><a   href="edit_unit.php?editId=<?php echo $row['id']; ?>" type="submit" class="btn btn-info">Edit</a> </td>
                            <td style='text-align: center;'><a  href="delete_unit.php?deleteId=<?php echo $row['id']; ?> " type="submit" class="btn btn-danger">Delete</a> </td>
                        </tr>

                    <?php
                }
              ?>
               
                
              </tbody>
            </table>
          </div>
        </div>