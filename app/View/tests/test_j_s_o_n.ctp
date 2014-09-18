<?php

$pagos = json_encode(Set::extract('/Pago/.', $pagos));
echo $pagos;
?>
<script src="../js/jquery-2.1.1.min.js"></script>
<script src="../dist/jquery.handsontable.full.js"></script>
<link rel="stylesheet" media="screen" href="../dist/jquery.handsontable.full.css">

<style type="text/css">
body {
    background-color: white;
    margin: 20px;
}

h2 {
    margin: 20px 0;
}
</style>

<h2>Default Handsontable Demo</h2>

<div id="dataTable"></div>
<script>


objectData=[
{nombrecliente:"Jose Carrasco",direccion:"Otero de la Vega 343",ciudad:"La Paz",total_deuda:400.45},
{nombrecliente:"Luisa Molina",direccion:"antonimo 343",ciudad:"Cochabamba",total_deuda:200.9}
];
/*[{"id":"1","venta_id":"1","fechaPago":"2014-08-16 22:01:00","tipoPago":"PC","montoPago":"10.00","notas":"pago de Venta","saldoVenta":"990.00"}]*/
objectData = <?php echo $pagos;?>;
console.log(objectData);

  $("#dataTable").handsontable({
    data: objectData,
    startRows: 6,
    startCols: 8,
     colHeaders: true,
  minSpareRows: 1,
  colHeaders: ['Id', 'Venta Id', 'Fecha Pago', 'Monto Pago'],
  columns: [
    {data: "id"},
    {data: "venta_id"},
    {data: "fechaPago"},
    {data: "montoPago",
      type: 'numeric',
      format: '$0,0.00',
      language: 'en'}
  ],
  });
</script>
