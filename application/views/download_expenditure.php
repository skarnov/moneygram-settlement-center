<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Expenditure</title>
    </head>

    <body>
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
                foreach ($search_expenditure as $v_expenditure) {
                    ?>
                    <tr>
                        <td><?php echo $v_expenditure->day . '-' . $v_expenditure->month . '-' . $v_expenditure->year; ?></td>
                        <td><?php echo $v_expenditure->description; ?></td>
                        <td style="width:30%; border:1px solid black;"><?php echo $v_expenditure->amount; ?></td>
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
    </body>
</html>