<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Shop </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Add Shop</li>
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
                <form action="<?php echo base_url()?>evis_app/save_shop" method="POST" enctype="multipart/form-data">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Shop Name</label>
                            <input type="text" required name="name" class="form-control" placeholder="Enter Shop Name">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="shop_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address </label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" placeholder="Input Like That 23.8136741, 90.4237867">
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" required name="mobile_number" class="form-control" placeholder="Shop Mobile Number">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" required name="email" class="form-control" placeholder="Shop Email Address">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" required name="password" class="form-control" placeholder="Enter Shop Password">
                        </div>
                        <div class="form-group">
                            <label> Conform Password</label>
                            <input type="password" required name="conform_password" class="form-control" placeholder="Conform The Password">
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
                        <button type="submit" class="btn btn-success">Add Shop</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>