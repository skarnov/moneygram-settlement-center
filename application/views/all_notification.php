<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Notification </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">All Notification</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <tbody>
                            <?php
                                foreach($all_notification as $v_notification)
                                {
                            ?>
                            <tr>
                                <td>
                                    <?php 
                                        $check=$v_notification->reference_id;
                                        if($check=='send a message')
                                        {
                                            echo $v_notification->notification_name . ' ' . $v_notification->reference_id;
                                        }
                                        else 
                                        {
                                            echo $v_notification->notification_name . ' update his balance ' . $v_notification->reference_id;
                                        }
                                    ?>
                                </td>
                                <td><?php echo ' at '.$v_notification->notification_time;?></td>
                                <td>
                                    <a href="<?php echo base_url();?>evis_app/delete_notification/<?php echo $v_notification->notification_id;?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Notification" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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