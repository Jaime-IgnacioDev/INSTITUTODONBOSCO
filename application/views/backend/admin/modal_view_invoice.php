<?php
$edit_data = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>
<center>
    <a onClick="PrintElem('#invoice_print')" class="btn btn-default btn-icon icon-left hidden-print pull-right">
        Imprimir Factura
        <i class="entypo-print"></i>
    </a>
</center>

    <br><br>

    <div id="invoice_print">
        <table width="100%" border="0">
            <tr>
                <td align="right">
                    <h5><?php echo ('Fecha de creación'); ?> : <?php echo date('d M,Y', $row['creation_timestamp']);?></h5>
                    <h5><?php echo ('Titulo'); ?> : <?php echo $row['title'];?></h5>
                    <h5><?php echo ('Descripción'); ?> : <?php echo $row['description'];?></h5>
                    <h5><?php echo ('Estado'); ?> : <?php echo $row['status']; ?></h5>
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%" border="0">    
            <tr>
                <td align="left"><h4><?php echo ('Pago para: '); ?> </h4></td>
                <td align="right"><h4><?php echo ('Cobrar a: '); ?> </h4></td>
            </tr>

            <tr>
                <td align="left" valign="top">
                    <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br>            
                </td>
                <td align="right" valign="top">
                    <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?><br>
                    <?php 
                        $class_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->class_id;
                        echo ('Class') . ' ' . $this->db->get_where('class', array('class_id' => $class_id))->row()->name;
                    ?><br>
                    <?php echo 'roll - ' .  $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->roll; ?><br>
                </td>
            </tr>
        </table>
        <hr>

        <table width="100%" border="0">    
            <tr>
                <td align="right" width="80%"><?php echo ('Monto Total'); ?> :</td>
                <td align="right">$<?php echo $row['amount']; ?></td>
            </tr>
            <tr>
                <td align="right" width="80%"><h4><?php echo ('Monto Pagado'); ?> :</h4></td>
                <td align="right"><h4>$<?php echo $row['amount_paid']; ?></h4></td>
            </tr>
            <?php if ($row['due'] != 0):?>
            <tr>
                <td align="right" width="80%"><h4><?php echo ('Deuda'); ?> :</h4></td>
                <td align="right"><h4>$<?php echo $row['due']; ?></h4></td>
            </tr>
            <?php endif;?>
        </table>

        <hr>

        <!-- payment history -->
        <h4><?php echo ('Historial de Pago'); ?></h4>
        <table class="table table-bordered table-hover" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><?php echo ('Fecha'); ?></th>
                    <th><?php echo ('Monto'); ?></th>
                    <th><?php echo ('Metodo'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $payment_history = $this->db->get_where('payment', array('invoice_id' => $row['invoice_id']))->result_array();
                foreach ($payment_history as $row2):
                    ?>
                    <tr>
                        <td><?php echo date("d M, Y", $row2['timestamp']); ?></td>
                        <td>$<?php echo $row2['amount']; ?></td>
                        <td>
                            <?php 
                                if ($row2['method'] == 1)
                                    echo ('Efectivo');
                                if ($row2['method'] == 2)
                                    echo ('Cheque');
                                if ($row2['method'] == 3)
                                    echo ('Tarjeta de Credito/Debito');
                                if ($row2['method'] == 'paypal')
                                    echo 'Paypal';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tbody>
        </table>
    </div>
<?php endforeach; ?>


<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'invoice', 'height=800,width=1000');
        mywindow.document.write('<html><head><title>Invoice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>