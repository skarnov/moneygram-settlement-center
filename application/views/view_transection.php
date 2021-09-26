<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="color:red;">Transection Details </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_app/manage_shop">Manage Shop</a></li>
                <li class="active">Transection Details</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Transection ID : <?php echo $transection_info->transection_id; ?>
        </div>
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('message');
                    if (isset($msg)) {
                    echo $msg;
                    $this->session->unset_userdata('message');
                    }
                    ?>
                </h3>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Balance</label>
                        <input type="text" required name="balance" class="form-control" placeholder="Balance" value="<?php echo $transection_info->balance; ?>">
                    </div>
                    <div class="form-group">
                        <label>Send + </label>
                        <input type="text" required name="send" class="form-control" placeholder="Send" value="<?php echo $transection_info->send; ?>">
                    </div>
                    <div class="form-group">
                        <label>Received - </label>
                        <input type="text" required name="received" class="form-control" placeholder="Received" value="<?php echo $transection_info->received; ?>">
                    </div>
                    <div class="form-group">
                        <label>Deposit - </label>
                        <input type="text" required name="deposit" class="form-control" placeholder="Deposit" value="<?php echo $transection_info->deposit; ?>">
                    </div>
                    <div class="form-group">
                        <label>Transfer - </label>
                        <input type="text" required name="transfer" class="form-control" placeholder="Transfer" value="<?php echo $transection_info->transfer; ?>">
                    </div>
                    <div class="form-group">
                        <label>Cancelled - </label>
                        <input type="text" required name="cancelled" class="form-control" placeholder="cancelled" value="<?php echo $transection_info->cancelled; ?>">
                    </div>
                    <div class="form-group">
                        <label>Time - </label>
                        <p style="color:red; font-size: 16px; font-weight: bold; text-shadow: 1px 1px 1px lime"><?php echo $transection_info->time;?></p>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>MG Gave in Cash - </label>
                        <input type="text" required name="MG_gave_in_cash" class="form-control" placeholder="MG Gave in Cash" value="<?php echo $transection_info->MG_gave_in_cash; ?>">
                    </div>
                    <div class="form-group">
                        <label>Paid in Cash - </label>
                        <input type="text" required name="paid_in_cash" class="form-control" placeholder="Paid in Cash" value="<?php echo $transection_info->paid_in_cash; ?>">
                    </div>
                    <div class="form-group">
                        <label>Multibank - </label>
                        <input type="text" required name="multibank" class="form-control" placeholder="Multibank" value="<?php echo $transection_info->multibank; ?>">
                    </div>
                    <div class="form-group">
                        <label>Deposit Upload Receipt</label><br/>
                        <img src="<?php echo base_url() . $transection_info->upload_receipt; ?>" style="height:175px; width:250px;" />
                    </div>
                    <div class="form-group">
                        <label>Note</label>
                        <textarea name="note" class="form-control"><?php echo $transection_info->note; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>