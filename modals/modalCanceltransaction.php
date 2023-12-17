<div class="modal fade bs-example-modal-md" id="bd-example-modal-sm1<?php echo $row['transaction_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Reference: <?php echo $row['reference']; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid mb-3">
                                                <strong>Do you want to cancel this transaction?</strong>
                                            </div>
                                            
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form method="POST">
                                                <input type="submit" class="btn btn-danger" value="Delete" name="delete"> 
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
            <?php 

                    

                    if(isset($_POST['delete']))
                    {
                        $transaction_id = $row['transaction_id'];
                        $supplier_id = $row['supplier_id'];
                        $reference = $row['reference'];

                        $querys = mysqli_query($con, "SELECT * FROM `tblmaintransaction` INNER JOIN tblproducts ON tblproducts.product_id=tblmaintransaction.product_id INNER JOIN tblshippingrate ON tblshippingrate.shippingrate_id=tblmaintransaction.shippingrate_id INNER JOIN tblsupplier ON tblsupplier.supplier_id=tblshippingrate.supplier_id WHERE tblsupplier.supplier_id = '$supplier_id' and reference_id = '$reference'");
                                        while ($rows = mysqli_fetch_array($querys)){
                                            $transaction_id = $rows['transaction_id'];
                                            $updateQuery = mysqli_query($con, "UPDATE `tblmaintransaction` SET `supplier_id`='$supplier_id',`status_id`=3 WHERE transaction_id = '$transaction_id'");
                                        }
                                        echo "<script>window.location.replace('pendingtransaction.php')</script>";
                    }

             ?>