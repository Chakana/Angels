

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header" style="font-family: Verdana,Arial,sans-serif; font-size: 1.1em;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
      <?php echo $this->Html->link('CALL TIC', array('controller' => 'ventas'),array('class'=> 'navbar-brand','role' => 'button', 'escape'=>false)); ?>
    </div>
    <!-- ANGELS-Sistema de control de ventas e inventarios -->
    <nav class="collapse navbar-collapse">    
     
      <ul class="nav navbar-nav">
         <?php if ($this->Session->read('perfil') == 'admin'): ?>
          <li class="active"><?php echo $this->Html->link('Inicio', array('controller' => 'pages', 'action' => 'display','home'),array('class'=> '','role' => 'button', 'escape'=>false)); ?></li>
          <li>
            <?php echo $this->Html->link('Ventas', array('controller' => 'ventas'),array('class'=> '','role' => 'button', 'escape'=>false)); ?>
          </li>
          <li>
            <?php echo $this->Html->link('Clientes', array('controller' => 'clientes'),array('class'=> '','role' => 'button', 'escape'=>false)); ?>
          </li>
         <?php endif; ?>
         <?php if ($this->Session->read('perfil') == 'vendedor'): ?>          
          <li>
            <?php echo $this->Html->link('Ventas', array('controller' => 'ventas','action'=>'addVentaTienda'),array('class'=> '','role' => 'button', 'escape'=>false)); ?>
          </li>
         <?php endif; ?>


      </ul>
       <?php if (AuthComponent::user('id')): ?>
              <p class="navbar-text">
                  Usuario: <?php echo $this->Session->read('Auth.User.username'); ?>
              </p>
              <p class="navbar-text">
                  Rol: <?php echo $this->Session->read('perfil'); ?>
              </p>              
              <p class="navbar-text">
                  <?php echo $this->Html->link('SALIR', array('controller'=>'users', 'action'=>'logout')); ?>
              </p>
          <?php endif; ?>
    </nav>
  </div>
</div>
