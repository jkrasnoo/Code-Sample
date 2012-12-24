<!--

-->
<div class="container" id="registration-container" style="margin-top: 100px;">
	<?php echo $this->Form->create('User', array(
			'class' => 'form-horizontal',
			'inputDefaults' => array(
				'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
				'div' => array('class' => 'control-group'),
				'label' => array('class' => 'control-label'),
				'between' => '<div class="controls">',
				'after' => '</div>',
				'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))
			)
			
		  )); 
	?>
	<?php echo $this->Form->input('username'); ?>
	<?php echo $this->Form->input('password'); ?>
	<?php echo $this->Form->input('password_verify', array('type' => 'password')); ?>
	<?php echo $this->Form->input('email'); ?>
	<?php echo $this->Form->end('Register'); ?>
</div>