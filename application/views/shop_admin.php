<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $title; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">Evis Moneygram Settlement Center</a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li><i>Welcome! </i><strong><?php echo $this->session->userdata('name'); ?></strong></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php
                            $Today = date('y:m:d');
                            $new = date('l, F d, Y', strtotime($Today));
                            echo $new;
                            ?> 
                        </a>
                    </li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="badge badge-notify btn-danger">
                            <?php echo $info->notification; ?>
                        </span>
                        <i class="fa fa-envelope fa-fw"></i><i class="fa fa-caret-down"></i>
                    </a>
                    <li>
                        <ul class="dropdown-menu dropdown-messages">
                            <?php
                            foreach ($all_info as $v_info) {
                                ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>evis_shop/mail_details/<?php echo $v_info->message_id; ?>">
                                        <div><?php echo $v_info->subject ?><span class="pull-right text-muted small"><?php echo $v_info->time ?></span></div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <?php
                            }
                            ?>
                            <li>
                                <a class="text-center" href="<?php echo base_url(); ?>evis_shop/mailbox">
                                    <strong>Read All Messages</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo base_url(); ?>evis_shop/profile/"><i class="fa fa-user fa-fw"></i> Shop Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>evis_shop/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>evis_shop/mailbox"><i class="fa fa-envelope fa-fw"></i> Mailbox</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>evis_shop/about"><i class="fa fa-home fa-fw"></i> About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php echo $dashboard; ?>
        </div>
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>js/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>js/sb-admin-2.js"></script>
    </body>
</html>