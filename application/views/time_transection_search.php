<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Search Transection </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_app/manage_transection">Manage Transection</a></li>
                <li class="active">Search Transection</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="<?php echo base_url()?>evis_shop/transection_search" method="POST">
                        <div class="input-group">
                            <input class="form-control" id="system-search" name="text" placeholder="Search for" required>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <form class="navbar-form navbar-right" action="<?php echo base_url()?>evis_shop/transection_search_time" method="POST">
                        <div class="form-group">
                            <input type="date" class="form-control" name="first_time">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="last_time">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </div>
            </div>
            <div class="dataTable_wrapper">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>TX ID</th>
                        <th>TX Time</th>
                        <th>Balance</th>
                        <th>Send</th>
                        <th>Received</th>
                        <th>Deposit</th>
                        <th>Transfer</th>
                        <th>Cancelled</th>
                        <th>MG Gave in Cash</th>
                        <th>Paid in Cash</th>
                        <th>Multibank</th>
                        <th>TX Details</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($search_transection as $v_transection) {
                                ?>
                                <tr>
                                    <td>#<?php echo $v_transection->transection_id; ?></td>
                                    <td><?php echo $v_transection->time; ?></td>
                                    <td><?php echo $v_transection->balance; ?></td>
                                    <td><?php echo $v_transection->send; ?></td>
                                    <td><?php echo $v_transection->received; ?></td>
                                    <td><?php echo $v_transection->deposit; ?></td>
                                    <td><?php echo $v_transection->transfer; ?></td>
                                    <td><?php echo $v_transection->cancelled; ?></td>
                                    <td><?php echo $v_transection->MG_gave_in_cash; ?></td>
                                    <td><?php echo $v_transection->paid_in_cash; ?></td>
                                    <td><?php echo $v_transection->multibank; ?></td>
                                    <td><a href="<?php echo base_url(); ?>evis_shop/view_transection/<?php echo $v_transection->transection_id; ?>" class="btn btn-info" data-toggle="tooltip" title="View Details Task">View TX</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr style="color:purple">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Send <?php echo $send->total; ?></td>
                                <td>Received <?php echo $received->total; ?></td>
                                <td>Deposit <?php echo $deposit->total; ?></td>
                                <td>Transfer <?php echo $transfer->total; ?></td>
                                <td>Cancelled <?php echo $cancelled->total; ?></td>
                                <td>MG <?php echo $mg->total; ?></td>
                                <td>Paid <?php echo $paid->total; ?></td>
                                <td>Multibank <?php echo $multibank->total; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>