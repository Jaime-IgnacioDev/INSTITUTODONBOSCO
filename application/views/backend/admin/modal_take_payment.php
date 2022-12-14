<?php 
$edit_data	=	$this->db->get_where('invoice' , array('invoice_id' => $param2) )->result_array();
foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title"><?php echo ('Historial de Pago');?></div>
            </div>
            <div class="panel-body">
                
                <table class="table table-bordered table-hover table-striped">
                	<thead>
                		<tr>
                			<td>#</td>
                			<td><?php echo ('Monto');?></td>
                			<td><?php echo ('Metodo');?></td>
                			<td><?php echo ('Fecha');?></td>
                		</tr>
                	</thead>
                	<tbody>
                	<?php 
                		$count = 1;
                		$payments = $this->db->get_where('payment' , array(
                			'invoice_id' => $row['invoice_id']
                		))->result_array();
                		foreach ($payments as $row2):
                	?>
                		<tr>
                			<td><?php echo $count++;?></td>
                			<td><?php echo $row2['amount'];?></td>
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
                			<td><?php echo date('d M,Y', $row2['timestamp']);?></td>
                		</tr>
                	<?php endforeach;?>
                	</tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default panel-shadow" data-collapsed="0">
			<div class="panel-heading">
                <div class="panel-title"><?php echo ('Tomar Pago');?></div>
            </div>
            <div class="panel-body">
				<?php echo form_open(base_url() . 'index.php?admin/invoice/take_payment/'.$row['invoice_id'], array(
					'class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

					<div class="form-group">
		                <label class="col-sm-3 control-label"><?php echo ('Monto Total');?></label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" value="<?php echo $row['amount'];?>" readonly/>
		                </div>
		            </div>

		            <div class="form-group">
		                <label class="col-sm-3 control-label"><?php echo ('Monto Pagado');?></label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" name="amount_paid" value="<?php echo $row['amount_paid'];?>" readonly/>
		                </div>
		            </div>

		            <div class="form-group">
		                <label class="col-sm-3 control-label"><?php echo ('Deuda');?></label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" value="<?php echo $row['due'];?>" readonly/>
		                </div>
		            </div>

		            <div class="form-group">
		                <label class="col-sm-3 control-label"><?php echo ('Pago');?></label>
		                <div class="col-sm-6">
		                    <input type="text" class="form-control" name="amount" value=""
		                    	placeholder="<?php echo ('Enter Payment Amount');?>"/>
		                </div>
		            </div>

		            <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Metodo');?></label>
                        <div class="col-sm-6">
                            <select name="method" class="form-control">
                                <option value="1"><?php echo ('Efectivo');?></option>
                                <option value="2"><?php echo ('Cheque');?></option>
                                <option value="3"><?php echo ('Tarjeta de Credito/Debito');?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
	                    <label class="col-sm-3 control-label"><?php echo ('Fecha');?></label>
	                    <div class="col-sm-6">
	                        <input type="text" class="datepicker form-control" name="timestamp" 
	                            value=""/>
	                    </div>
					</div>

                    <input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id'];?>">
                    <input type="hidden" name="student_id" value="<?php echo $row['student_id'];?>">
                    <input type="hidden" name="title" value="<?php echo $row['title'];?>">
                    <input type="hidden" name="description" value="<?php echo $row['description'];?>">

		            <div class="form-group">
		                <div class="col-sm-5">
		                    <button type="submit" class="btn btn-info"><?php echo ('Tomar Pago');?></button>
		                </div>
		            </div>

				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>


<?php endforeach;?>