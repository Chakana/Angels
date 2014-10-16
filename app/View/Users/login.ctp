
<div class="login form">
	<div class="row">		
		<div class="col-md-4">
			<h2>INGRESAR AL SISTEMA</h2>
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->Form->create('User', array('role' => 'form'), array('url' => array('controller' => 'users','action' => 'login')))?>
				<div class="form-group">
					<?php echo $this->Form->input('User.username', array('class' => 'form-control', 'placeholder' => 'Escriba su Nombre de Usuario', 'title' => 'Indique su Nombre de Usuario','label'=>'usuario'))?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('User.password', array('class' => 'form-control', 'placeholder' => 'Escriba su Nuevo Password', 'title' => 'Indique su Password'))?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Ingresar'), array('class' => 'btn btn-success btn-lg')); ?>
				</div>
			<?php echo $this->Form->end()?>
		</div>
	</div>
</div>
