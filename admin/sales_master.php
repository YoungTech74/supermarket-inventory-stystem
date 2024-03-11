<?php
session_start();
include "header.php";
include_once '../connection.php';

//------------------- code to generate bill id ------------------
$bill_id = 0;
$getId = mysqli_query($db, "SELECT * FROM billing_header ORDER BY id DESC limit 1");
while($row = mysqli_fetch_array($getId)){
    $bill_id = $row['id'];
    $_SESSION['bill_id'] = $bill_id;
}

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
         <form name="form1" action="" method="POST" class="form-horizontal nopadding">

            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
                    Sale a products</a></div>
        </div>

        <div class="container-fluid">
                
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Sale a Products</h5>
                            </div>

                            <div class="widget-content nopadding">


                                <div class=" span4">
                                    <br>

                                    <div>
                                        <label>Full Name</label>
                                        <input type="text" id="full_name" class="span12" name="full_name" required>
                                    </div>
                                </div>

                                <div class="span3">
                                    <br>

                                    <div>
                                        <label>Bill Type</label>
                                        <select class="span12" id="bill_type_header" name="bill_type_header">
                                            <option>Cash</option>
                                            <option>Debit</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="span2">
                                    <br>

                                    <div>
                                        <label>Date</label>
                                        <input type="text" id="bill_date" class="span12" name="bill_date"
                                               value="<?php echo date("Y-m-d") ?>"
                                               readonly>
                                    </div>
                                </div>

                                <div class="span2">
                                    <br>

                                    <div>
                                        <label>Bill No</label>
                                        <input type="text" id="bill_no" class="span12" name="bill_no"
                                               value="<?php echo generate_bill($bill_id)?>"
                                               readonly>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- new row-->
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">


                        <center><h4>Select A Product</h4></center>


                        <div class="span2">
                            <div>
                                <label>Product Company</label>
                                    <select name="company_name" id="company_name" class="span11" onchange="select_company(this.value)">
                                    <option>Select</option>
                                    <?php
                                        $sqli = mysqli_query($db, "SELECT * FROM company");
                                        while($row = mysqli_fetch_assoc($sqli)){
                                            ?>
                                                <option><?php echo $row['company_name']; ?> </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="span2">
                            <div>
                                <label>Product Name</label>
                                <div class="contols" id="product_name_div" name="product_name">
                                    <select class="span11" id="product_name" name="product_name">
                                        <option value="">Select</option>
                                    </select>
                            </div>
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>Unit</label>
                                <div class="conrols" id="unit_div">
                                    <select name="unit" id="unit"  class="span11">
                                    <option >Select</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="span2">
                            <div>
                                <label>Packing Size</label>
                                <div class="conrols" id="packing_size_div">
                                    <select name="packing_size" id="packing_size" class="span11">
                                    <option value="packing_size">Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="span1">
                            <div>
                                <label>Price</label>
                                <input type="text" class="span11" name="price" id="price" readonly value="0">
                            </div>
                        </div>

                        <div class="span2">
                            <div>
                                <label>Enter Qty</label>
                                <input type="text" class="span11" name="quantity" id="quantity" autocomplete="off" onkeyup="generate_total(this.value)">
                            </div>
                        </div>



                        <div class="span1">
                            <div>
                                <label>Total</label>
                                <input type="text" class="span11" name="total" id="total" value="0" readonly>
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>&nbsp</label>
                                <input type="button" class="span11 btn btn-success" name="addBtn" value="Add" onclick="add_session()">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- end new row-->





            <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                <div class="span12">
                    <center><h4>Taken Products</h4></center>

                  <div id="bill_products"></div>

                    <h4>
                        <div style="float: right"><span style="float:left;" >Total:</span><span style="float: left" id="totalbill">0</span></div>
                    </h4>


                    <br><br><br><br>

                    <center>
                        <input type="submit" name="generate_bill_bt" onclick="generate_bill_record()" value="generate bill" class="btn btn-success">
                    </center>

                </div>
            </div>
        </div>

        </form>
    </div>



<script>
      function select_company(company_name){
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("product_name_div").innerHTML = xmlhttp.responseText;
                }
            };

            xmlhttp.open("GET", "forajax/load_product_using_company.php?company_name="+company_name, true);
            xmlhttp.send();
        }

        
        // function to get product unit based on company name and product name 
        function select_product (product_name, company_name){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("unit_div").innerHTML = xmlhttp.responseText;
                }
            };

            xmlhttp.open("GET", "forajax/load_unit_using_product.php?product_name="+product_name+"&company_name="+company_name, true);
            xmlhttp.send();
        }

        //------------------- function to get packing size using unit value -------------
        function select_unit(unit, product_name, company_name){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("packing_size_div").innerHTML = xmlhttp.responseText;

                    //------------------------- function to get price on unit select -------------------
                    $("#packing_size").on('change', function(){
                        load_price(document.getElementById("packing_size").value);
                    })
                }
            };

            xmlhttp.open("GET", "forajax/load_packing_size_using_unit.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name, true);
            xmlhttp.send();
        
        }

        function load_price(packing_size){
            var  company_name = document.getElementById("company_name").value;
            var  product_name = document.getElementById("product_name").value;
            var  unit = document.getElementById("unit").value;


            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("price").value = xmlhttp.responseText;

                }
            };

            xmlhttp.open("GET", "forajax/load_price.php?company_name="+company_name+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size, true);
            xmlhttp.send();

        }



        //------------------------- function to get total sales -------------------------
        function generate_total(quantity){
            document.getElementById('total').value = eval(document.getElementById('price').value) * eval(document.getElementById('quantity').value);
        }



        //-------------------------------- function to save record --------------------
        function add_session(){
            
            var company_name = document.getElementById('company_name').value;
            var product_name = document.getElementById('product_name').value;
            var product_unit = document.getElementById('unit').value;
            var packing_size = document.getElementById('packing_size').value;
            var quantity = document.getElementById('quantity').value;
            var price = document.getElementById('price').value;
            var total = document.getElementById('total').value;
           
            

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    // document.getElementById("price").value = xmlhttp.responseText;

                    if(xmlhttp.responseText == ""){
                        load_billing_products()
                        alert("Product Added Successfully.");
                    }else {
                        load_billing_products()
                        alert(xmlhttp.responseText);
                    }
                    
                }
            };

            xmlhttp.open("GET", "forajax/save_in_session.php?company_name="+company_name+"&product_name="+product_name+"&unit="+product_unit+"&packing_size="+packing_size+"&quantity="+quantity+"&price="+price+"&total="+total, true);
            xmlhttp.send();
            
        }


        //-------------------------------- function to load bill in table format ----------------
        function load_billing_products(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                   result = document.getElementById("bill_products").innerHTML = xmlhttp.responseText;
                    // alert(result);
                    load_total_bill();
                }
            };

            xmlhttp.open("GET", "forajax/load_billing_products.php", true);
            xmlhttp.send();

        }

        //-------------------------- function to load total bill ---------------
        function load_total_bill(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                   document.getElementById("totalbill").innerHTML = xmlhttp.responseText;
                    // alert(result);
                }
            };

            xmlhttp.open("GET", "forajax/load_billing_amount.php", true);
            xmlhttp.send();
        }

        //------------------------------- function to edit quantity ----------------
        function edit_qty(qty1, company_name1, product_name1, unit1, packing_size1, price1){

 
            var company_name = company_name1;
            var product_name = product_name1;
            var product_unit = unit1;
            var packing_size = packing_size1;
            var quantity = qty1;
            var price = price1;
            var total = eval(price) * eval(quantity);

           
            

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    // document.getElementById("price").value = xmlhttp.responseText;

                    if(xmlhttp.responseText == ""){
                        load_billing_products()
                        alert("Product Added Successfully.");
                    }else {
                        load_billing_products()
                        alert(xmlhttp.responseText);
                    }
                    
                }
            };

            xmlhttp.open("GET", "forajax/update_in_session.php?company_name="+company_name+"&product_name="+product_name+"&unit="+product_unit+"&packing_size="+packing_size+"&quantity="+quantity+"&price="+price+"&total="+total, true);
            xmlhttp.send(); 
        }

        //------------------------- functon to delete quantity-----------------
        function delete_qty(product_id){
            alert(product_id.value);
        }
       
        //-------------------- autoLoad billing function ------------------
        load_billing_products();
        load_total_bill()



        function generate_bill_record(){
            
            var full_name = document.getElementById('full_name').value;
            var bill_type_header = document.getElementById('bill_type_header').value;
            var bill_date = document.getElementById('bill_date').value;
            var bill_no = document.getElementById('bill_no').value;
            var company_name = document.getElementById('company_name').value;
            var product_name = document.getElementById('product_name').value;
            var product_unit = document.getElementById('unit').value;
            var packing_size = document.getElementById('packing_size').value;
            var quantity = document.getElementById('quantity').value;
            var price = document.getElementById('price').value;
            var total = document.getElementById('total').value;
           
            // alert(full_name+"="+bill_type_header+"="+bill_date+"="+bill_no+"="+company_name+"="+product_name+"="+product_unit+"="+packing_size+"="+quantity+"="+price+"="+total);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    // document.getElementById("price").value = xmlhttp.responseText;

                    if(xmlhttp.responseText == ""){
                        load_billing_products()
                        alert("Bill Generated Successfully.");
                    }else {
                        load_billing_products()
                        alert(xmlhttp.responseText);
                    }
                    
                }
            };

            xmlhttp.open("GET", "forajax/generate_bill.php?full_name="+full_name+"&bill_type_header="+bill_type_header+"&bill_date="+bill_date+"&bill_no="+bill_no+"&company_name="+company_name+"&product_name="+product_name+"&unit="+product_unit+"&packing_size="+packing_size+"&quantity="+quantity+"&price="+price+"&total="+total, true);
            xmlhttp.send();
            
        }
</script>

<!--------------------------- php function to generate billing id ------------------>
<?php
    function generate_bill($id){
        if($id == ""){
            $id1 = 0;
        }else {
            $id1 = $id;
        }
        $id1 = $id1 + 1;

        $len = strlen($id1);

        if($len == "1"){
            $id1 = "0000".$id1;
        }

        if($len == "2"){
            $id1 = "000".$id1;
        }

        if($len == "3"){
            $id1 = "00".$id1;
        }

        if($len == "4"){
            $id1 = "0".$id1;
        }

        if($len == "5"){
            $id1 = $id1;
        }
        
        return $id1;
    }

    if(isset($_POST['generate_bil_btn'])){
        // $lastbillno = 0;
        // mysqli_query($db, "INSERT INTO billing_header VALUES(0, '$_POST[full_name]', '$_POST[bill_type_header]', '$_POST[bill_date]', '$_POST[bill_no]')") or die(mysqli_error($db));

        // $res = mysqli_query($db, "SELECT * FROM billing_header ORDER BY id DESC limit 1");
        // while($row = mysqli_fetch_array($res)){
        //     $lastbillno = $row['id'];
        // }

        // $company_name = $_GET['company_name'];
        // $product_name = $_GET['product_name'];
        // $unit = $_SESSION['unit_session'];
        // $packing_size = $_POST['packing_size'];

        // echo $product_name;
        // echo $unit;
        // echo $packing_size;
        // $price = $_GET['price'];
        // $quantity = $_GET['quantity'];
        // $total = $_GET['total'];

        // $insertDetails = mysqli_query($db, "INSERT INTO billing_details VALUES(NULL, '$lastbillno', '$_POST[company_name]', '$product_name', '$unit', '$packing_size', '$_POST[price]', '$_POST[quantity]')");
        // if($insertDetails){
        //     ?>
        //         <script>
        //             alert('Bill Generated!');
        //         </script>
        //     <?php
        // }
    }
?>




<?php
include "footer.php";
?>