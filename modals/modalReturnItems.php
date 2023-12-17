<div class="modal fade bs-example-modal-md" id="bd-example-modal-sm1<?php echo $row['transaction_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Reference: <?php echo $row['reference']; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-material" method="POST">
                                                         <input type="hidden" name="transaction_id" value="<?php echo $row['transaction_id']; ?>">
                                                         <div class="row">
                                                     <div class="col col-sm-12">
                                                      <div class="form-group form-default">
                                                        <label>Reason for Return:</label>
                                                               <select class="form-control" name="return_desc">
                                                                   <?php $queryReturn = mysqli_query($con, "SELECT * FROM tblreturnstatus");
                                                                   while($rowReturn = mysqli_fetch_array($queryReturn)){ ?>
                                                                    <option value="<?php echo $rowReturn['return_id']; ?>"><?php echo $rowReturn['return_desc']; ?></option>
                                                                   <?php } ?>
                                                               </select>
                                                                <span class="form-bar"></span>
                                                                <!-- <label class="float-label">Supplier Name</label> -->
                                                            </div>
                                            </div>
                                            </div>
                                                           
                                          <!-- </form> -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            <input type="submit" class="btn btn-primary" value="Save Changes" name="return">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
            </div>

            <?php 

                    if(isset($_POST['return']))
                                    {
                                        $return_desc = $_POST['return_desc'];
                                        $transaction_id = $_POST['transaction_id'];

                                        // echo $transaction_id;

                                        $query = mysqli_query($con, "UPDATE `tbldeliverytransaction` SET `return_id`= '$return_desc' WHERE deliverytransaction_id = '$transaction_id'");

                                        echo "<script>window.location.replace('delivertoday.php')</script>";
                                    }

             ?>

