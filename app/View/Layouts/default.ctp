<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>
		<?php //echo $cakeDescription ?>:
		<?php //echo $this->fetch('title'); ?>
		継続的インテグレーション開発サンプル: <?= $title_for_layout ?>
	</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<header class="page-header">
		    <h1><?= $this->Html->link('継続的インテグレーション開発サンプル', ['action'=>'index'])?></h1>
		</header>
		<article>
		    <header>
    			<?php echo $this->Session->flash(); ?>
            </header>
			<?php echo $this->fetch('content'); ?>
		</article>
		<footer>
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</footer>
	</div><!-- container -->
	<div class="panel panel-default">
	    <?php echo $this->element('sql_dump'); ?>
	</div>
</body>
</html>
