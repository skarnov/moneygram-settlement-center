<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Replay Mail </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_shop/mailbox">Mailbox</a></li>
                <li class="active">Replay Mail</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="modal-body">
            <form role="form" class="form-horizontal" action="<?php echo base_url()?>evis_shop/save_reply" method="POST">
                <div class="form-group">
                    <label class="col-sm-2" for="inputSubject">Subject</label>
                    <div class="col-sm-10">
                        <input type="hidden" required name="message_id" class="form-control" value="<?php echo $message_info->message_id;?>">
                        <input type="text" name="subject" class="form-control" id="inputSubject" value="Reply - <?php echo $message_info->subject?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12" for="inputBody">Message</label>
                    <div class="col-sm-12">
                        <textarea name="message" class="form-control" id="inputBody" rows="14"><?php echo $message_info->message; ?> Reply ->>> [REPLY BY <?php echo $shop = $this->session->userdata('name'); ?>] ->>></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning pull-left">Send <i class="fa fa-arrow-circle-right fa-lg"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>