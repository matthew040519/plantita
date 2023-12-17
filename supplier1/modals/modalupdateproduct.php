<div class="modal fade bs-example-modal-md" id="bd-example-modal-sm<?php echo $row['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Update Product</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <?php 

                                                $id = $row['product_id'];

                                                $queryProduct = mysqli_query($con, "SELECT * FROM tblproducts WHERE product_id = '$id'");
                                                $rowProduct = mysqli_fetch_array($queryProduct);


                                             ?>
                                          <form class="form-material" method="POST">
                                                            <input type="hidden" value="<?php echo $rowProduct['product_id']; ?>" name="product_id">
                                                            <div class="form-group form-default">
                                                                <input value="<?php echo $rowProduct['product_desc'] ?>" name="product_name" type="text" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Product Name</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input name="price" value="<?php echo $rowProduct['price'] ?>" type="number" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Price</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <textarea class="form-control" name="product_details" rows="4"><?php echo $rowProduct['product_details']; ?></textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Product Details</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <select class="form-control" name="active">
                                                                    <option <?php if($rowProduct['active'] == 1) { echo "selected"; } ?> value="1">Active</option>
                                                                    <option <?php if($rowProduct['active'] == 0) { echo "selected"; } ?> value="0">InActive</option>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Status</label>
                                                            </div>
                                          <!-- </form> -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            <input type="submit" class="btn btn-primary" value="Save Changes" name="update">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                    if(isset($_POST['update']))
                                    {
                                        $product_name = $_POST['product_name'];
                                        $price = $_POST['price'];
                                        $product_details = $_POST['product_details'];
                                        $product_id = $_POST['product_id'];
                                        $active = $_POST['active'];

                                        $insertProduct = mysqli_query($con, "UPDATE `tblproducts` SET `product_desc`='$product_name',`price`='$price',`product_details`='$product_details',`active`='$active' WHERE product_id = '$product_id'");

                                         echo "<script>window.location.replace('product.php')</script>";
                                    }
                             ?>
            </div>