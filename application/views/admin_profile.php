<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Admin Profile </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Admin Profile</li>
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
                <form action="<?php echo base_url() ?>evis_app/update_admin" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Admin Name</label>
                            <input type="text" required name="name" value="<?php echo $admin_info->name; ?>" class="form-control">
                            <input type="hidden" required name="admin_id" value="<?php echo $admin_info->admin_id; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Admin Email</label>
                            <input type="email" required name="email" value="<?php echo $admin_info->email; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" value="<?php echo $admin_info->password; ?>" class="form-control">
                        </div>
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <button type="submit" class="btn btn-success">Update Admin Information</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>