<script type="text/javascript">
    function startCalc() {
        interval = setInterval("calc()", 1);
    }
    function calc() {
        send = document.myForm.send.value;
        received = document.myForm.received.value;
        deposit = document.myForm.deposit.value;
        transfer = document.myForm.transfer.value;
        cancelled = document.myForm.cancelled.value;
        MG_gave_in_cash = document.myForm.MG_gave_in_cash.value;
        paid_in_cash = document.myForm.paid_in_cash.value;
        multibank = document.myForm.multibank.value;
        <?php
            $b = $shop_info->balance;
            $c = $shop_info->due;
            $a = $b + $c;
        ?>
        balance = <?php echo $a;?>;
        document.myForm.balance.value = (balance * 1) + (send * 1) - (received * 1) - (deposit * 1) - (transfer * 1) - (cancelled * 1) + (MG_gave_in_cash * 1) - (paid_in_cash * 1) - (multibank * 1);
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="color:red;"><?php echo $this->session->userdata('name'); ?>  </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-euro fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php
                                    echo $shop_info->balance; 
                                ?>
                            </div>
                            <div>Your Current Balance</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>evis_shop/manage_transection">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-euro fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php
                                    echo $shop_info->due; 
                                ?> 
                            </div>
                            <div>Your Current Dues</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>evis_shop/manage_transection">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="huge">Transaction</div>
                            <div>Your All Transection</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>evis_shop/manage_transection">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Add Transection
        </div>
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg=$this->session->userdata('message');
                    if(isset($msg)){
                    echo $msg;
                    $this->session->unset_userdata('message');
                    }
                    ?>
                </h3>
                <form name="myForm" action="<?php echo base_url() ?>evis_shop/save_transection" method="POST" enctype="multipart/form-data">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Balance</label>
                            <input type="hidden" name="shop_id" class="form-control" value="<?php echo $shop_info->shop_id; ?>">
                            <input type="number" name="balance" class="form-control" placeholder="Balance" id="balance" onFocus="startCalc();" value="<?php echo $shop_info->balance; ?>">
                        </div>
                        <div class="form-group">
                            <label>Send (+) </label>
                            <input type="number" name="send" class="form-control" placeholder="Send" id="send" onFocus="startCalc();">
                        </div>
                        <div class="form-group">
                            <label>Received (-) </label>
                            <input type="number" name="received" class="form-control" placeholder="Received" id="received" onFocus="startCalc();">
                        </div>
                        <div class="form-group">
                            <label>Deposit (-) </label>
                            <input type="number" name="deposit" class="form-control" placeholder="Deposit" id="deposit" onFocus="startCalc();">
                        </div>
                        <div class="form-group">
                            <label>Transfer (-) </label>
                            <input type="number" name="transfer" class="form-control" placeholder="Transfer" id="transfer" onFocus="startCalc();">
                        </div>
                        <div class="form-group">
                            <label>Cancelled (-) </label>
                            <input type="number" name="cancelled" class="form-control" placeholder="Cancelled" id="cancelled" onFocus="startCalc();">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>MG Gave in Cash (+) </label>
                            <input type="number" name="MG_gave_in_cash" class="form-control" placeholder="MG Gave in Cash" id="MG_gave_in_cash" onFocus="startCalc();">
                        </div>
                        <div class="form-group">
                            <label>Paid in Cash (-) </label>
                            <input type="number" name="paid_in_cash" class="form-control" placeholder="Paid in Cash" id="paid_in_cash" onFocus="startCalc();">
                        </div>
                        <div class="form-group">
                            <label>Multibank (-) </label>
                            <input type="number" name="multibank" class="form-control" placeholder="Multibank" id="multibank" onFocus="startCalc();">
                        </div>
                        <div class="form-group">
                            <label>Upload Receipt</label>
                            <input type="file" name="upload_receipt" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" name="time" class="form-control" value="<?php echo " " . date("Y/m/d") . " "; ?>" placeholder="Date">
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <textarea name="note" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Add Transection</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>