<div class="modal fade bs-example-modal-lg" id="bd-example-modal-sm<?php echo $row['transaction_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Reference: <?php echo $row['mainRef']; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                        <div class="col-sm-3">
                                                            <label>Product</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label>Qty</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                             <label>Price</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                             <label>Total Price</label>
                                                        </div>
                                                    </div>
                                                <?php 
                                                $reference_id = $row['mainRef'];
                                                // echo $reference_id;
                                                // echo "<br>";
                                                $supplier_id = $row['id_supplier'];
                                                // echo $supplier_id;

                                                $querys = mysqli_query($con, "SELECT * FROM `tblmaintransaction` INNER JOIN tblproducts ON tblproducts.product_id=tblmaintransaction.product_id INNER JOIN tblshippingrate ON tblshippingrate.shippingrate_id=tblmaintransaction.shippingrate_id INNER JOIN tblsupplier ON tblsupplier.supplier_id=tblshippingrate.supplier_id WHERE tblmaintransaction.customer_id = '$customer_id' and tblmaintransaction.reference_id = '$reference_id' AND tblsupplier.supplier_id = '$supplier_id'");
                                                while ($rows = mysqli_fetch_array($querys)){
                                                 ?>
                                                 <div class="row">
                                                        <div class="col-sm-3">
                                                            <label><?php echo $rows['product_desc']; ?></label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label><?php echo $rows['qty']; ?></label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                             <label><?php echo number_format($rows['price'],2); ?></label>
                                                        </div>
                                                        <?php   
                                                                $totalprice = $rows['qty'] * $rows['price'];
                                                         ?>
                                                        <div class="col-sm-3">
                                                             <label><?php echo number_format($totalprice, 2) ; ?></label>
                                                        </div>
                                                    </div>

                                            <?php } ?>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            <input type="submit" class="btn btn-primary" value="Save Changes" name="submit"> -->
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
            </div>