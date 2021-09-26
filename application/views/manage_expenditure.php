<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Expenditure </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Manage Expenditure</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <form class="navbar-form navbar-right" action="<?php echo base_url() ?>evis_app/expenditure_search" method="POST">
                            <div class="form-group">
                                <select name="month" class="form-control" tabindex="1">
                                    <option value="">Select Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="year" class="form-control" tabindex="1">
                                    <option value="">Select Year</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Search</button>
                        </form>
                    </div>
                </div>
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
                        <th>Month</th>
                        <th>Day</th>
                        <th>Year</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_expenditure as $v_expenditure) {
                                ?>
                                <tr>
                                    <td><?php echo $v_expenditure->month; ?></td>
                                    <td><?php echo $v_expenditure->day; ?></td>
                                    <td><?php echo $v_expenditure->year; ?></td>
                                    <td><?php echo $v_expenditure->description; ?></td>
                                    <td><?php echo $v_expenditure->amount; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>evis_app/edit_expenditure/<?php echo $v_expenditure->expenditure_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Expenditure"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>evis_app/delete_expenditure/<?php echo $v_expenditure->expenditure_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Expenditure" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>