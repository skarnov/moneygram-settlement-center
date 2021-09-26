<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_app/manage_expenditure">Manage Expenditure</a></li>
                <li class="active">Monthly Expenditure Invoice</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="invoice-title">
                            <h2>Monthly Expenditure Invoice</h2><h3 class="pull-right"></h3>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Month of: <?php echo $data['month'] = $this->input->post('month', true) ?></strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <td><strong>Date</strong></td>
                                                <td class="text-center"><strong>Description</strong></td>
                                                <td class="text-right"><strong>Amount</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($search_expenditure as $v_expenditure) {
                                                ?>
                                                <tr>
                                                    <td class="thick-line"><?php echo $v_expenditure->day . '-' . $v_expenditure->month . '-' . $v_expenditure->year; ?></td>
                                                    <td class="thick-line text-center"><strong><?php echo $v_expenditure->description; ?></strong></td>
                                                    <td class="thick-line text-right"><?php echo $v_expenditure->amount; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line text-center"></td>
                                                <td class="thick-line text-right"><strong><p style="border: 2px solid red;"></p>Subtotal:</strong> <?php echo $amount->total; ?></td>
                                            </tr>
                                        </tbody>
                                        <div class="form-group">
                                            <a href="<?php echo base_url();?>evis_app/print_expenditure/<?php echo $v_expenditure->month.'/'.$v_expenditure->year;?>" class="btn btn-success">Print</a>
                                            <a href="<?php echo base_url();?>evis_app/download_expenditure/<?php echo $v_expenditure->month.'/'.$v_expenditure->year;?>" class="btn btn-success">Download as PDF</a>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>