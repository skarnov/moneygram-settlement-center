<script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=250,height=560');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>
<div id="divToPrint" >
    <div style="text-align: center;">
        <h2>Monthly Expenditure Invoice</h2><h3 class="pull-right"></h3>
    </div>
    <table style="width:75%; margin:0px auto; text-align:center; border:1px solid black;">
        <thead>
            <tr>
                <th style="border:1px solid black;">Date</th>
                <th style="border:1px solid black;">Description</th>
                <th style="border:1px solid black;">Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($print_expenditure as $v_expenditure) {
                ?>
                <tr>
                    <td><?php echo $v_expenditure->day . '-' . $v_expenditure->month . '-' . $v_expenditure->year; ?></td>
                    <td><?php echo $v_expenditure->description; ?></td>
                    <td style="border:1px solid black;"><?php echo $v_expenditure->amount; ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td style="border:1px solid black;">Grand Total<strong>: <?php echo $amount->total; ?></strong></td>
            </tr>
        </tbody>
    </table>
    <table style="width:50%; margin:0px auto; margin-top:10%;">
        <tr>
            <td><input type="button" value="Print" onClick="PrintDiv();" /></td>
            <td><a href="<?php echo base_url(); ?>evis_app/manage_expenditure"><input type="button" value="Back" /></td>
        </tr>
    </table>
    <p>&nbsp;</p>
</div>