<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */


?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
      CALLTIC-Sistema de control de ventas e inventarios
    </title>
    <?php
        echo $this->Html->meta('icon');

        //echo $this->Html->css('cake.generic');
      

        /*echo $this->Html->script(array(
         
          'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'
          ));*/

        echo $this->Html->script('jquery-2.1.1.min');
        echo $this->Html->script('jquery-ui-1.10.4');
        echo $this->Html->script('bootstrap');
        echo $this->Html->script('printElement');
        echo $this->Html->script('select2');

        echo $this->Html->css('select2');
        echo $this->Html->css('jquery-ui-1.10.4');
        echo $this->Html->css('font-awesome');
        echo $this->Html->css(array('bootstrap'));
        echo $this->Html->css('base');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');

        //Datepicker
        /*
        echo $this->Html->script(array(
          'http://code.jquery.com/jquery-1.10.2.js',
          'http://code.jquery.com/ui/1.10.4/jquery-ui.js'
          ));
          */

    ?>
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">-->

</head>

<body>
  <div id="container">
    <div id="header">
      <?php echo $this->Element('navigation'); ?>
      
      
    </div>
    <div id="content" class="container">
      <br/>
      <br/>
      <?php echo $this->Session->flash(); ?>
     
      <?php echo $this->fetch('content'); ?>
    </div>
    <div id="footer" class="container">      
      CallTic - Sistema de control de Inventarios y Ventas 2014
    </div>
  </div>
  
</body>
</html>
