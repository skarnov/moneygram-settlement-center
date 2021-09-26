<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Shop Profile </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Shop Profile</li>
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
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Shop Name</label>
                        <input type="text" required name="name" class="form-control"  value="<?php echo $shop_info->name; ?>">
                        <input type="hidden" required name="name" class="form-control" value="<?php echo $shop_info->shop_id; ?>">
                    </div>
                    <div class="form-group">
                        <label>Address </label>
                        <textarea name="address" class="form-control"><?php echo $shop_info->address; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" required name="location" class="form-control" value="<?php echo $shop_info->location; ?>">
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="number" required name="mobile_number" class="form-control" value="<?php echo $shop_info->mobile_number; ?>">
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" required name="email" class="form-control" value="<?php echo $shop_info->email; ?>">
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal" role="button">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Change Shop Password</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() ?>evis_shop/change_password" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-4">Current Password</label>
                            <div class="col-sm-6">
                                <input type="hidden" required name="shop_id" class="form-control" value="<?php echo $this->session->userdata('shop_id'); ?>">
                                <input type="password" name="current_password" class="form-control" placeholder="Enter Current Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">New Password</label>
                            <div class="col-sm-6">
                                <input type="password" name="new_password" required class="form-control" placeholder="Enter New Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Conform Password</label>
                            <div class="col-sm-6">
                                <input type="password" name="conform_password" required class="form-control" placeholder="Conform Password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button> 
                        <button type="submit" class="btn btn-primary ">Done <i class="fa fa-arrow-circle-right fa-lg"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>