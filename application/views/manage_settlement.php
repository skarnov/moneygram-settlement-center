<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Settlement </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Manage Settlement</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
                    <div class="col-md-3">
                        <form action="<?php echo base_url() ?>evis_app/settlement_search" method="POST">
                            <div class="input-group"  style="margin-top: 4%;">
                                <input class="form-control" id="system-search" name="text" placeholder="Invoice No." required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <form class="navbar-form navbar-right" action="<?php echo base_url() ?>evis_app/settlement_search_time" method="POST">
                            <div class="form-group">
                                <input type="date" class="form-control" name="first_time">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="last_time">
                            </div>
                            <button type="submit" class="btn btn-success">Search Due</button>
                        </form>
                    </div>
                </div>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('message');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('message');
                    }
                    ?>
                </h3>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>Invoice ID</th>
                        <th>Amount</th>
                        <th>Did Transfer</th>
                        <th>Remarks</th>
                        <th>Due Date</th>
                        <th>On Date</th>
                        <th>Paid</th>
                        <th>Pending</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_settlement as $v_settlement) {
                                ?>
                                <tr>
                                    <td><?php echo $v_settlement->invoice_id; ?></td>
                                    <td><?php echo $v_settlement->amount; ?></td>
                                    <td><?php echo $v_settlement->did_transfer; ?></td>
                                    <td><?php echo $v_settlement->remarks; ?></td>
                                    <td><?php echo $v_settlement->due_date; ?></td>
                                    <td><?php echo $v_settlement->on_date; ?></td>
                                    <td><?php echo $v_settlement->paid; ?></td>
                                    <td><?php echo $v_settlement->pending; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>evis_app/edit_settlement/<?php echo $v_settlement->settlement_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Settlement"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>evis_app/delete_settlement/<?php echo $v_settlement->settlement_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Settlement" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
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