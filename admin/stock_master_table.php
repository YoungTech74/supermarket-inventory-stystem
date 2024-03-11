<div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Company</th>
                  <th>Product Name</th>
                  <th>Product Unit</th>
                  <th>Product Quantity</th>
                  <th>Product Selling Price</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>

              <?php
              $count = 0;
                $sql = mysqli_query($db, "SELECT * FROM stocks");

                while($row = mysqli_fetch_assoc($sql)){
                  $count = $count+1;
                    ?>
                        <tr>
                            <td><?php echo $count; ?> </td>
                            <td><?php echo $row['product_company']; ?> </td>
                            <td><?php echo $row['product_name']; ?> </td>
                            <td><?php echo $row['product_unit']; ?> </td>
                            <td><?php echo $row['product_quantity']; ?> </td>
                            <td><?php echo $row['product_selling_price']; ?> </td>
                            <td style="text-align: center;"><a   href="edit_stock_master.php?editId=<?php echo $row['id']; ?>" type="submit" class="btn btn-info">Edit</a> </td>
                        </tr>

                    <?php
                }
              ?>
               
              </tbody>
            </table>
          </div>
        </div>