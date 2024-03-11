<?php
    include_once '../connection.php';
    include './header.php';
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            View Bills</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>View Bill Details</h5>
            </div><br>

            <table class="table table-bordered">
                <tr>
                    <th>Bill No</th>
                    <th>Full Name</th>
                    <th>Bill Type</th>
                    <th>Bill Date</th>
                    <th>Bill Total</th>
                    <th>View Details</th>
                </tr>

                <?php
                    $query = mysqli_query($db, "SELECT * FROM billing_header ORDER BY id DESC");
                    while($row = mysqli_fetch_array($query)){?>
                            <tr>
                                <td><?php echo $row['bill_no']; ?></td>
                                <td><?php echo $row['full_name']; ?></td>
                                <td><?php echo $row['bill_type']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo getTotal($row['id'], $db);?> </td>
                                <td><a href="view_bill_details.php?bill_id=<?php echo $row['id']; ?>">View Details</a></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>

    </div>
</div>

<?php
//--------------------- function to generate total --------------------------
    function getTotal($bill_id, $db){
        $total = 0;
        $fetchTotal = mysqli_query($db, "SELECT * FROM billing_details WHERE bill_id = '$bill_id'");
        while($row2 = mysqli_fetch_array($fetchTotal)){
            $total = $total + ($row2['price']*$row2['quantity']);
        }

        return $total;
    }
?>

<!------------------------------- footer section  ------------------------------->
<?php include_once 'footer.php'; ?>
