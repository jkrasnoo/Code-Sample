<!--
	View.ctp
	
-->
<?php
	// Init the place vars.

	$first_name = (!empty($user['User']['first_name'])) ? $user['User']['first_name'] : 'Enter First Name';
	$last_name = (!empty($user['User']['lastt_name'])) ? $user['User']['last_name'] : 'Enter Last Name';
	$email = (!empty($user['User']['email'])) ? $user['User']['email'] : 'Enter Email';
	$password = 'Enter New Password';
	$address = (!empty($user['User']['address'])) ? $user['User']['address'] : 'Enter An Address';
	$city = (!empty($user['User']['city'])) ? $user['User']['city'] : 'Enter Your City';
	$state = (!empty($user['User']['state'])) ? $user['User']['state'] : 'Enter Your State';
	$zip = (!empty($user['User']['zip'])) ? $user['User']['zip'] : 'Enter Your Zip Code';
?>
<div class="container" id="view-container" style="margin-top: 100px;">
	<div class="span12" style="margin-bottom: 25px;">
		<div class="row-fluid">
			<span style="font-weight: bold;"><?php echo $username ?>'s Profile</span>
		</div>
	</div>
	<?php echo $this->Form->create('User', array(
			'default' => false,
			'class' => 'form-horizontal'
		  )); 
	?>
	<?php
		echo $this->Form->input('email', array(
			'format' => array('before', 'label', 'between', 'input', 'after'),
			'div' => array('class' => 'control-group'),
			'label' => array('class' => 'control-label', 'style' => 'font-weight: bold;'),
			'class' => 'fnInput',
			'style' => 'display: none;',
			'between' => "<div class=\"controls\">\n<span data-type=\"editable\" data-for=\".fnInput\" style=\"font-style: italic;\">{$email}</span>",
			'after' => '</div>',
			'error' => false
		));
	?>
	<?php
		echo $this->Form->input('first_name', array(
			'format' => array('before', 'label', 'between', 'input', 'after'),
			'div' => array('class' => 'control-group'),
			'label' => array('class' => 'control-label', 'style' => 'font-weight: bold;'),
			'class' => 'fnInput',
			'style' => 'display: none;',
			'between' => "<div class=\"controls\">\n<span data-type=\"editable\" data-for=\".fnInput\" style=\"font-style: italic;\">{$first_name}</span>",
			'after' => '</div>',
			'error' => false
		));
	?>
	<?php
		echo $this->Form->input('last_name', array(
			'format' => array('before', 'label', 'between', 'input', 'after'),
			'div' => array('class' => 'control-group'),
			'label' => array('class' => 'control-label', 'style' => 'font-weight: bold;'),
			'class' => 'fnInput',
			'style' => 'display: none;',
			'between' => "<div class=\"controls\">\n<span data-type=\"editable\" data-for=\".fnInput\" style=\"font-style: italic;\">{$last_name}</span>",
			'after' => '</div>',
			'error' => false
		));
	?>
	<?php
		echo $this->Form->input('password', array(
			'format' => array('before', 'label', 'between', 'input', 'after'),
			'div' => array('class' => 'control-group'),
			'label' => array('class' => 'control-label', 'style' => 'font-weight: bold;'),
			'class' => 'fnInput',
			'style' => 'display: none;',
			'between' => "<div class=\"controls\">\n<span data-type=\"editable\" data-for=\".fnInput\" style=\"font-style: italic;\">{$password}</span>",
			'after' => '</div>',
			'error' => false
		));
	?>
	<?php
		echo $this->Form->input('address', array(
			'format' => array('before', 'label', 'between', 'input', 'after'),
			'div' => array('class' => 'control-group'),
			'label' => array('class' => 'control-label', 'style' => 'font-weight: bold;'),
			'class' => 'fnInput',
			'style' => 'display: none;',
			'between' => "<div class=\"controls\">\n<span data-type=\"editable\" data-for=\".fnInput\" style=\"font-style: italic;\">{$address}</span>",
			'after' => '</div>',
			'error' => false
		));
	?>
	<?php
		echo $this->Form->input('city', array(
			'format' => array('before', 'label', 'between', 'input', 'after'),
			'div' => array('class' => 'control-group'),
			'label' => array('class' => 'control-label', 'style' => 'font-weight: bold;'),
			'class' => 'fnInput',
			'style' => 'display: none;',
			'between' => "<div class=\"controls\">\n<span data-type=\"editable\" data-for=\".fnInput\" style=\"font-style: italic;\">{$city}</span>",
			'after' => '</div>',
			'error' => false
		));
	?>
	<?php
		echo $this->Form->input('state', array(
			'format' => array('before', 'label', 'between', 'input', 'after'),
			'div' => array('class' => 'control-group'),
			'label' => array('class' => 'control-label', 'style' => 'font-weight: bold;'),
			'class' => 'fnInput',
			'style' => 'display: none;',
			'between' => "<div class=\"controls\">\n<span data-type=\"editable\" data-for=\".fnInput\" style=\"font-style: italic;\">{$state}</span>",
			'after' => '</div>',
			'error' => false
		));
	?>
	<?php
		echo $this->Form->input('zip', array(
			'format' => array('before', 'label', 'between', 'input', 'after'),
			'div' => array('class' => 'control-group'),
			'label' => array('class' => 'control-label', 'style' => 'font-weight: bold;'),
			'class' => 'fnInput',
			'style' => 'display: none;',
			'between' => "<div class=\"controls\">\n<span data-type=\"editable\" data-for=\".fnInput\" style=\"font-style: italic;\">{$zip}</span>",
			'after' => '</div>',
			'error' => false
		));
	?>
	<?php echo $this->Form->end(); ?>
</div>


<!--
	jQuery script for editable in place.
	http://www.tectual.com.au/posts/7/jQuery-Editable-Plugin-Best-In-Place-Editor-.html
-->
<?php echo $this->Html->script('jquery/plugin/jquery.editable-1.0.1'); ?>
<script>
	$("#view-container").editables({
		beforeFreeze : function (display) {
			display.text(this.val());
		},
		onFreeze : function () {
			// function is bound to element
			var element = $(this),
			    data = {};
				
			data[element.attr('name')] = element.val();
			$.post('/users/edit', data,
			function(data, status){
				
			}, 'json');
		}
	});
</script>