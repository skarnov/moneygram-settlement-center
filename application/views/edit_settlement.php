<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Settlement </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_app/manage_settlement">Manage Settlement</a></li>
                <li class="active">Edit Settlement</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-cubes fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="h3"><?php echo $all_paid->modhu ?></div>
                                        <div>Paid</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-usd fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="h3"><?php echo $all_pending->modhu; ?></div>
                                        <div>Pending</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    function startCalc() {
                        interval = setInterval("calc()", 1);
                    }
                    function calc() {
                        did_transfer = document.myForm.did_transfer.value;
                        document.myForm.paid.value = (did_transfer * 1);
                        amount = document.myForm.amount.value;
                        document.myForm.pending.value = (amount * 1) - (did_transfer * 1);
                    }
                </script>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('message');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('message');
                    }
                    ?>
                </h3>
                <form name="myForm" action="<?php echo base_url() ?>evis_app/update_settlement" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Invoice No.</label>
                            <input type="text" required name="invoice_id" value="<?php echo $settlement_info->invoice_id; ?>" class="form-control">
                            <input type="hidden" required name="settlement_id" value="<?php echo $settlement_info->settlement_id; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" required name="amount" value="<?php echo $settlement_info->amount; ?>" id="amount" onFocus="startCalc();" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Did Transfer</label>
                            <input type="text" name="did_transfer" value="<?php echo $settlement_info->did_transfer; ?>" id="did_transfer" onFocus="startCalc();" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Paid</label>
                            <input type="text" required name="paid" value="<?php echo $settlement_info->paid; ?>" id="paid" onFocus="startCalc();" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Remarks</label>
                            <input type="text" name="remarks" value="<?php echo $settlement_info->remarks; ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Due Date</label>
                            <input type="text" name="due_date" value="<?php echo $settlement_info->due_date; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>On Date</label>
                            <input type="text" required name="on_date" value="<?php echo $settlement_info->on_date; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pending</label>
                            <input type="text" required name="pending" value="<?php echo $settlement_info->pending; ?>" id="pending" onFocus="startCalc();" class="form-control">
                        </div>
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <button type="submit" class="btn btn-success">Update Settlement</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>