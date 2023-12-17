

<?php 
include('include/connection.php');
        $id = $_GET['id'];
                                                $query = mysqli_query($con, "SELECT * FROM tblproducts INNER JOIN tblsupplier on tblsupplier.supplier_id=tblproducts.supplier_id WHERE tblproducts.active = 1 AND tblproducts.supplier_id = '$id'");
                                            while($row = mysqli_fetch_array($query)){
                                         ?>
                                   
                                        <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_desc']; ?></option>
                                    <?php } ?>
 