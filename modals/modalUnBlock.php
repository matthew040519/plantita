<div class="modal fade bs-example-modal-md" id="bd-example-modal-sm<?php echo $row['customer_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <h4 class="modal-title" id="myLargeModalLabel">Add Supplier</h4> -->
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                          <form class="form-material" method="POST">
                                                            <input type="hidden" value="<?php echo $row['customer_id']; ?>" name="id">
                                                            <h3>Do you want to unblock this customer?</h3>
                                          <!-- </form> -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            <input type="submit" class="btn btn-primary" value="Yes" name="update">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                    if(isset($_POST['update']))
                                    {
                                        $id = $_POST['id'];

                                        $query = mysqli_query($con, "UPDATE `tblcustomer` SET `active`= 1 WHERE customer_id = '$id'");

                                        echo "<script>window.location.replace('blockcustomerlist.php')</script>";
                                    }
                             ?>
            </div>