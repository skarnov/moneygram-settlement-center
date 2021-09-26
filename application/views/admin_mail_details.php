<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mail Details </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_app/mailbox">Mailbox</a></li>
                <li class="active">Mail Details</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="modal-body">
            <form role="form" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2" for="inputSubject">Subject</label>
                    <div class="col-sm-10"><input type="text" class="form-control" id="inputSubject" value="<?php echo $message_info->subject?>"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12" for="inputBody">Message</label>
                    <div class="col-sm-12"><textarea class="form-control" id="inputBody" rows="14"><?php echo $message_info->message; echo ' ->>>Wrotes'; echo ' To You At '; echo $message_info->time; ?></textarea></div>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url(); ?>evis_app/reply_mail/<?php echo $message_info->message_id; ?>" class="btn btn-warning pull-left">Reply <i class="fa fa-arrow-circle-right fa-lg"></i></a>
                    <a href="<?php echo base_url(); ?>evis_app/delete_mail/<?php echo $message_info->message_id; ?>" class="btn btn-danger pull-left">Delete <i class="fa fa-trash fa-lg"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>