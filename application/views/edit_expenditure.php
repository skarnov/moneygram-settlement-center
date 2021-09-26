<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Expenditure </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_app/manage_expenditure">Manage Expenditure</a></li>
                <li class="active">Edit Expenditure</li>
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
                <form action="<?php echo base_url() ?>evis_app/update_expenditure" method="POST" name="myForm">
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label class="control-label">Month</label>
                            <div class="controls">
                                <select name="month" class="form-control" tabindex="1">
                                    <option value="">Choose</option>
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
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label class="control-label">Day</label>
                            <div class="controls">
                                <select name="day" class="form-control" tabindex="1">
                                    <option value="">Choose</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label class="control-label">Year</label>
                            <div class="controls">
                                <select name="year" class="form-control" tabindex="1">
                                    <option value="">Choose</option>
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
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <select name="description" class="form-control" tabindex="1">
                                    <option value="">Choose</option>
                                    <?php
                                    foreach ($all_category as $v_category) {
                                        ?>
                                        <option value="<?php echo $v_category->category_name; ?>"><?php echo $v_category->category_name; ?></option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" required name="amount" class="form-control" value="<?php echo $expenditure_info->amount; ?>">
                            <input type="hidden" required name="expenditure_id" class="form-control" value="<?php echo $expenditure_info->expenditure_id; ?>">
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>    
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['myForm'].elements['month'].value = '<?php echo $expenditure_info->month; ?>';
    document.forms['myForm'].elements['day'].value = '<?php echo $expenditure_info->day; ?>';
    document.forms['myForm'].elements['year'].value = '<?php echo $expenditure_info->year; ?>';
    document.forms['myForm'].elements['description'].value = '<?php echo $expenditure_info->description; ?>';
</script>