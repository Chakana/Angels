<div class="ventadetalles form">
<br/>
	<div class="row">		
		<div class="col-md-12">
			<?php echo $this->Form->create('Ventadetalle', array('role' => 'form')); ?>
			<table>
				<TR>
					<TD>
						<div class="form-group">
							<?php echo $this->Form->input('venta_id', array('class' => 'form-control', 'placeholder' => 'Venta Id','default'=>$ventaId,'type'=>'hidden'));?>
						</div>
					</TD>
					<TD>
						<div class="form-group">
							<?php echo $this->Form->input('producto_id', array('class' => 'form-control', 'placeholder' => 'Producto Id'));?>
						</div>				
					</TD>
					<TD>
						<div class="form-group">
							<?php echo $this->Form->input('cantidad', array('class' => 'form-control', 'placeholder' => 'Cantidad','default'=>'1'));?>
						</div>				
					</TD>
					<TD>
						<div class="form-group">
							<?php echo $this->Form->input('precioUnitario', array('class' => 'form-control', 'placeholder' => 'PrecioUnitario','options'=>$precioUnitario));?>
						</div>
					</TD>
					<TD>
						<div class="form-group">
							<?php echo $this->Form->input('precioTotal', array('class' => 'form-control', 'placeholder' => 'PrecioTotal','readonly' => 'readonly'));?>
						</div>
					</TD>
					<TD>		
						<br/>				
						<div class="form-group">
							<?php echo $this->Js->submit('Grabar', array(  //create 'ajax' save button
						    'update' => '#detallesVenta','class'=>'btn btn-success'  //id of DOM element to update with selector
						    ));?>

						</div>
					</TD>
				</TR>
				
			</table>

			<?php echo $this->Form->end();echo $this->Js->writeBuffer(); ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

<script>
$('#VentadetalleCantidad').change(function() {
  var cantidad=$('#VentadetalleCantidad').val();
  var precioUnitario=$('#VentadetallePrecioUnitario').val();  
  $('#VentadetallePrecioTotal').val(cantidad*precioUnitario);
});
$('#VentadetallePrecioUnitario').on("input", function() {
//.$('input[name=VentadetallePrecioUnitario]').keyup(function(){
	var cantidad=$('#VentadetalleCantidad').val();
	var precioUnitario=$('#VentadetallePrecioUnitario').val();  
	$('#VentadetallePrecioTotal').val(cantidad*precioUnitario);
});

$('#VentadetalleProductoId').change(function() {
    $.ajax({
        url: '/Angels/ventadetalles/obtenerPrecios/'+ $('#VentadetalleProductoId').val(),
        dataType: 'json',
        type: 'GET',
        // This is query string i.e. country_id=123
        data: {},
        success: function(data) {
            $('#VentadetallePrecioUnitario').empty(); // clear the current elements in select box
            for (row in data) {
            	//console.log(data[row]);
                $('#VentadetallePrecioUnitario').append($('<option></option>').attr('value', data[row]).text(data[row]));
                var cantidad=$('#VentadetalleCantidad').val();
				var precioUnitario=$('#VentadetallePrecioUnitario').val();  
				$('#VentadetallePrecioTotal').val(cantidad*precioUnitario);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});

	var cantidad=$('#VentadetalleCantidad').val();
	var precioUnitario=$('#VentadetallePrecioUnitario').val();  
	$('#VentadetallePrecioTotal').val(cantidad*precioUnitario);

	$("#VentadetalleProductoId").select2();

</script>