<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Shop Information </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_app/manage_shop">Manage Shop</a></li>
                <li class="active">Edit Shop</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
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
                <form name="myForm" action="<?php echo base_url()?>evis_app/update_shop" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Shop Name</label>
                            <input type="text" required name="name" class="form-control"  value="<?php echo $shop_info->name;?>">
                            <input type="hidden" required name="shop_id" class="form-control" value="<?php echo $shop_info->shop_id;?>">
                        </div>
                        <div class="form-group">
                            <label>Address </label>
                            <textarea name="address" class="form-control"><?php echo $shop_info->address;?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" value="<?php echo $shop_info->location;?>">
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" required name="mobile_number" class="form-control" value="<?php echo $shop_info->mobile_number;?>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" required name="email" class="form-control" value="<?php echo $shop_info->email;?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" required name="password" class="form-control" value="<?php echo $shop_info->password;?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <div class="controls">
                                <select name="status" class="form-control" tabindex="1">
                                    <option value=" ">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div>
                        <button type="submit" class="btn btn-success">Update Shop Info</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['myForm'].elements['status'].value = '<?php echo $shop_info->status; ?>';
</script>