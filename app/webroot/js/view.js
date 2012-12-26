$(document).ready(function(){
	$("#view-container").editables({
		beforeFreeze : function (display) {
			console.log(display);
			if (display.name == "data[User][password]") {
				return;
			}
			
			display.text(this.val());
		},
		onFreeze : function () {
			
			// function is bound to element
			var element = $(this),
			    data = {};
			
			if ("" == element.val()) {
				return false;
			}
				
			data[element.attr('name')] = element.val();
			$.post(
				'/users/edit', 
				data,
				
				// callback
				function(){
				},
				
				'json'
			);
		}
	});
	
	$('#delete').click(function(){
		var id = $('#UserId');
		var data = {
			'data[User][id]' : id.val()
		};
		$.post(
			'/users/delete/' + id.val(),
			
			data,
			
			function(){
				
			},
			'json'
		);
	});
});
	
