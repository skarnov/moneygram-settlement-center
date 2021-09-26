<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Shop Transection </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_app/add_shop">Add Shop</a></li>
                <li><a href="<?php echo base_url();?>evis_app/manage_shop">Manage Shop</a></li>
                <li class="active">Manage Transection</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="<?php echo base_url() ?>evis_app/transection_search" method="POST">
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
                    <form class="navbar-form navbar-right" action="<?php echo base_url() ?>evis_app/transection_search_time" method="POST">
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
                        <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($category_product as $v_transection) {
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
                                    <td><a href="<?php echo base_url(); ?>evis_app/view_admin_transection/<?php echo $v_transection->transection_id; ?>" class="btn btn-info" data-toggle="tooltip" title="View Details Task">View TX</a></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>evis_app/edit_transection/<?php echo $v_transection->transection_id; ?>/<?php echo $v_transection->shop_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Transection"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>evis_app/delete_transection/<?php echo $v_transection->transection_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Transection" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <?php
                    $number_of_pages = ceil($total_product / $limit);
                    ?>
                    <div class='col-xs-6 pull-right'>
                        <?php if (($start - $limit) >= 0) { ?>
                            <a href="<?php echo base_url(); ?>evis_app/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3); ?>" class='btn btn-sm btn-success'>First</a>
                            <a href="<?php echo base_url(); ?>evis_app/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($start - $limit); ?>" class='btn btn-sm btn-info'>Prev</a>
                        <?php } ?>
                        <?php
                        $page_number = ($start / 5);
                        for ($i = $page_number; $i < $page_number + 5 && $i < $number_of_pages;) {
                            ?>
                            <a href="<?php echo base_url(); ?>evis_app/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($i * $limit); ?>" class='btn btn-sm btn-warning <?php
                            if ($start == ($i * $limit)) {
                                echo "button_style";
                            }
                            ?>'><?php echo ++$i; ?> </a>
                               <?php
                           }
                           ?>
                           <?php if ($start + $limit < $total_product) { ?>
                            <a href="<?php echo base_url(); ?>evis_app/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($start + $limit); ?>" class='btn btn-sm btn-info'>Next</a>
                            <a href="<?php echo base_url(); ?>evis_app/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . (($number_of_pages - 1) * $limit); ?>" class='btn btn-sm btn-success'>Last</a>
                        <?php } ?>
                    </div>
                    <script type="text/javascript">
                        document.forms['pagination'].elements['per_page'].value = '<?php echo $limit ?>';
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>