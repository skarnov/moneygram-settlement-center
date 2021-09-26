<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Categories </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_app/add_expenditure">Add Expenditure</a></li>
                <li class="active">Manage Categories</li>
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
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($all_category as $v_category)
                                {
                            ?>
                            <tr>
                                <td><?php echo $v_category->category_name;?></td>
                                <td>
                                    <a href="<?php echo base_url();?>evis_app/edit_category/<?php echo $v_category->category_id;?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Category"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url();?>evis_app/delete_category/<?php echo $v_category->category_id;?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Category" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                </td>
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