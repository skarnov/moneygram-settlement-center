<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Shop </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Manage Shop</li>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>View TX</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($all_shop as $v_shop)
                                {
                            ?>
                            <tr>
                               <td><img src="<?php echo base_url().$v_shop->shop_image;?>" style="height:50px; width:50px;" /></td>
                                <td><?php echo $v_shop->name;?></td>
                                <td><?php echo $v_shop->mobile_number;?></td>
                                <td><?php echo $v_shop->email;?></td>
                                <td><a href="<?php echo base_url();?>evis_app/view_location/<?php echo $v_shop->shop_id;?>" class="btn btn-info" data-toggle="tooltip" title="View Shop Location in Google Map">View Map</a></td>
                                <td><a href="<?php echo base_url();?>evis_app/view_transection/<?php echo $v_shop->shop_id;?>" class="btn btn-info" data-toggle="tooltip" title="View This Shop Transection">View TX</a></td>
                                <td>
                                    <div class='activation_color'>
                                        <?php
                                            if($v_shop->status=='1') {
                                                echo 'Active';
                                            }
                                        ?> 
                                        <div id='color'>    
                                            <?php
                                                if($v_shop->status==0) {
                                                    echo 'NOT ACTIVE';
                                                }
                                            ?>   
                                        </div>    
                                    </div>
                                </td>
                                <td>
                                    <?php if($v_shop->status=='1')
                                        {
                                    ?>
                                        <a href="<?php echo base_url();?>evis_app/deactive_shop/<?php echo $v_shop->shop_id;?>" class="btn btn-danger" data-toggle="tooltip" title="Deactive Shop"><i class="fa fa-times"></i></a>
                                    <?php
                                        }
                                        else{
                                    ?>
                                        <a href="<?php echo base_url();?>evis_app/active_shop/<?php echo $v_shop->shop_id;?>" class="btn btn-success" data-toggle="tooltip" title="Active Shop"><i class="fa fa-check"></i></a>
                                    <?php
                                        }
                                    ?>
                                    <a href="<?php echo base_url();?>evis_app/edit_shop/<?php echo $v_shop->shop_id;?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Shop"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url();?>evis_app/delete_shop/<?php echo $v_shop->shop_id;?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Shop" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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