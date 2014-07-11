

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header" style="font-family: Verdana,Arial,sans-serif; font-size: 1.1em;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
      <?php echo $this->Html->link('ANGEL SCVI', array('controller' => 'ventas'),array('class'=> 'navbar-brand','role' => 'button', 'escape'=>false)); ?>
    </div>
    <!-- ANGELS-Sistema de control de ventas e inventarios -->
    <nav class="collapse navbar-collapse">    
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar Clientes o Vendedores">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav">
        <li class="active"><?php echo $this->Html->link('Inicio', array('controller' => ''),array('class'=> '','role' => 'button', 'escape'=>false)); ?></li>
        <li>
          <?php echo $this->Html->link('Ventas', array('controller' => 'ventas'),array('class'=> '','role' => 'button', 'escape'=>false)); ?>
        </li>
        <li>
          <?php echo $this->Html->link('Clientes', array('controller' => 'clientes'),array('class'=> '','role' => 'button', 'escape'=>false)); ?>
        </li>
      </ul>
    </nav>
  </div>
</div>
