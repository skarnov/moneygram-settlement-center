<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mailbox </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Mailbox</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9 col-md-10">
            <h3 style="color:green">
                <?php
                $msg = $this->session->userdata('message');
                if (isset($msg)) {
                    echo $msg;
                    $this->session->unset_userdata('message');
                }
                ?>
            </h3>
        </div>
        <div class="col-sm-3 col-md-2">
            <div class="pull-right">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-sm-3 col-md-2">
        <a class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#myModal" role="button">Compose</a>
        <hr>
    </div>
    <div class="col-sm-9 col-md-10">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a><i class="fa fa-inbox"></i> Recent</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <div class="list-group">
                    <?php
                    foreach ($inbox as $mailbox) {
                        ?>
                        <a href="<?php echo base_url(); ?>evis_shop/mail_details/<?php echo $mailbox->message_id; ?>" class="list-group-item">
                            <span class="name" style="min-width: 120px; display: inline-block;"><?php echo $mailbox->subject; ?></span> 
                            <span class="badge"><?php echo $mailbox->time; ?></span> 
                        </a>
                        <?php
                    }
                    ?>
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
                    <h4 class="modal-title">Compose Message</h4>
                </div>
                <form role="form" class="form-horizontal" action="<?php echo base_url() ?>evis_shop/save_mail" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-2" for="inputTo">To</label>
                            <div class="col-sm-6">
                                <input type="hidden" required name="shop_id" class="form-control" value="<?php echo $this->session->userdata('shop_id'); ?>">
                                <input type="email" class="form-control" readonly value="admin@evis.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="inputSubject">Subject</label>
                            <div class="col-sm-6">
                                <input type="text" required class="form-control" name="subject" placeholder="Enter The Subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="inputBody">Message</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" required name="message" rows="14"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button> 
                        <button type="submit" class="btn btn-primary ">Send <i class="fa fa-arrow-circle-right fa-lg"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>