<style type="text/css">
.btn-lg {
    padding: 20px 26px;
    font-size: 38px;
    line-height: 1.33;
    border-radius: 6px;
}
</style>

<div class="jumbotron">
  <div class="container">
    <h1>SISTEMA DE CONTROL DE INVENTARIOS Y VENTAS</h1>
    <br>
    <p>Controle las entradas y salidas de su inventario, efectue ventas con 2 simples clics y obtenga reportes inmediatos de deudas y ventas.</p>
    <br>
    <p><?php echo $this->Html->link(__('INGRESAR'), array('controller' => 'users' ,'action' => 'login'), array('escape' => false, 'class' => 'btn btn-success btn-lg')); ?></p>
  </div>
</div>