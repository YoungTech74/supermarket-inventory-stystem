<div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Product Name</th>
                  <th>Unit Name</th>
                  <th>Packing Size</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

              <?php
                $sql = mysqli_query($db, "SELECT * FROM products");

                while($row = mysqli_fetch_assoc($sql)){
                    ?>
                        <tr >
                            <td><?php echo $row['company_name']; ?> </td>
                            <td><?php echo $row['product_name']; ?> </td>
                            <td><?php echo $row['unit']; ?> </td>
                            <td><?php echo $row['packing_size']; ?> </td>
                            <td style="text-align: center;"><a   href="edit_product.php?editId=<?php echo $row['id']; ?>" type="submit" class="btn btn-info">Edit</a> </td>
                            <td style="text-align: center;"><a  href="delete_product.php?deleteId=<?php echo $row['id']; ?> " type="submit" class="btn btn-danger">Delete</a> </td>
                        </tr>

                    <?php
                }
              ?>
               
              </tbody>
            </table>
          </div>
        </div>