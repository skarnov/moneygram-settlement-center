<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Category Information </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_app/add_expenditure">Add Expenditure</a></li>
                <li><a href="<?php echo base_url();?>evis_app/manage_category">Manage Categories</a></li>
                <li class="active">Edit Category</li>
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
                <form name="myForm" action="<?php echo base_url()?>evis_app/update_category" method="POST">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Shop Name</label>
                            <input type="text" required name="category_name" class="form-control"  value="<?php echo $category_info->category_name;?>">
                            <input type="hidden" required name="category_id" class="form-control" value="<?php echo $category_info->category_id;?>">
                        </div>
                        <button type="submit" class="btn btn-success">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>