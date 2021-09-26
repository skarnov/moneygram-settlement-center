<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Transection</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Manage Transection</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
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
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>Name</th>
                            <th>Balance</th>
                            <th>Due</th>
                            <th>Mobile</th>
                            <th>View TX</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($all_shop as $v_shop)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_shop->name;?></td>
                                <td><?php echo $v_shop->balance;?></td>
                                <td><?php echo $v_shop->due;?></td>
                                <td><?php echo $v_shop->mobile_number;?></td>
                                <td><a href="<?php echo base_url();?>evis_app/view_transection/<?php echo $v_shop->shop_id;?>" class="btn btn-info" data-toggle="tooltip" title="View This Shop Transection">View TX</a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <?php echo $this->pagination->create_links();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>