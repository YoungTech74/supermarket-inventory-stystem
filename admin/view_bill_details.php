<?php
    include_once '../connection.php';
    include './header.php';
    $id = $_GET['bill_id'];

    $full_name = "";
    $bill_type = "";
    $Bill_no = "";
    $bill_date = "";
    $full_name = "";

    $query = mysqli_query($db, "SELECT * FROM billing_header WHERE id = '$id';");
    while($row = mysqli_fetch_array($query)){
        $full_name = $row['full_name'];
        $bill_type = $row['bill_type'];
        $bill_date = $row['date'];
        $Bill_no = $row['bill_no'];
    }
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            View Bill Details</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
           <center>
                <h4>Details Bills</h4>
           </center>
           <table>
                <tr>
                    <td>Bill No: </td>
                    <td><?php echo $Bill_no;?> </td>
                </tr>
                <tr>
                    <td>Full Name: </td>
                    <td><?php echo $full_name;?> </td>
                </tr>

                <tr>
                    <td>Bill Type: </td>
                    <td><?php echo $bill_type;?> </td>
                </tr>

                <tr>
                    <td>Bill Date: </td>
                    <td><?php echo $bill_date;?> </td>
                </tr>

           </table>
           <br>

           <table class="table table-bordered">
                <tr>
                    <th>Product Company</th>
                    <th>Product Name</th>
                    <th>Product Unit</th>
                    <th>Packing Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Return</th>
                </tr>
                <?php
                    $total = 0;
                    $fetchDetails = mysqli_query($db, "SELECT * FROM billing_details WHERE bill_id = '$id'");
                    while($row = mysqli_fetch_array($fetchDetails)){?>
                            <tr>
                                <td><?php echo $row['product_company']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['product_unit']; ?></td>
                                <td><?php echo $row['packing_size']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['price'] * $row['quantity']; ?></td>
                                <td> <a style="color: red;" href="return.php?id=<?php echo $row['id']; ?>">Return</a> </td>

                            </tr>
                        <?php
                                $total = $total + ($row['price'] * $row['quantity']);
                    }
                ?>
           </table>

           <div align="right" style="font-weight: bold">
                Grand Total: <?php echo $total; ?>
           </div>
        </div>

    </div>
</div>

<!--end-main-container-part-->

<!------------------------------- footer section  ------------------------------->
<?php include_once 'footer.php'; ?>
