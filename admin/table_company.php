<div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Company Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

              <?php
                $sql = mysqli_query($db, "SELECT * FROM company");

                while($row = mysqli_fetch_assoc($sql)){
                    ?>
                        <tr >
                            <td><?php echo $row['id']; ?> </td>
                            <td><?php echo $row['company_name']; ?> </td>
                            <td style="text-align: center;"><a   href="edit_company.php?editId=<?php echo $row['id']; ?>" type="submit" class="btn btn-info">Edit</a> </td>
                            <td style="text-align: center;"><a  href="delete_company.php?deleteId=<?php echo $row['id']; ?> " type="submit" class="btn btn-danger">Delete</a> </td>
                        </tr>

                    <?php
                }
              ?>
               
              </tbody>
            </table>
          </div>
        </div>