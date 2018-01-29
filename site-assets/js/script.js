$(document).ready(function() {

	$('.edit-entry').click(function() {
		var id = $(this).attr('data-id');
		$.get(
			path_mdl + "/api/"+ id +"?r=getEntry",
			function(data) {
				data = $.parseJSON(data);
				$('#edit-modal #entry-name').html(data.name);
				$("#edit-modal #inputProject").val(data.project);
				$("#edit-modal #InputName").val(data.name);
				$("#edit-modal #inputIp").val(data.ip);
				$("#edit-modal #inputSystem").val(data.system);
				$("#edit-modal #submit-update").attr('data-id', data.id);
			}
		);
	});

	$('#submit-entry').click(function() {
		$.post(
			path_mdl + "/api/0?r=insertEntry",
			$("#entry-form").serializeObject(),
			function(data) {
				data = $.parseJSON(data);
				if (data.status === true) {
						$("#entry-form")[0].reset();
						setTimeout(function() {
							$("#returnResult").slideUp("slow");
							$("#returnResult").html(data.message);
						}, 4000);
						$('#add-modal').modal('toggle');
						location.reload();
				} else {
					setTimeout(function() {
						$("#returnResult").slideUp("slow");
						$("#returnResult").html(data.message);
					}, 4000);
					$("#returnResult").slideDown("slow");
				}
			}
		);
		return false;
	});

	$('#submit-update').click(function() {
		var id = $(this).attr('data-id');
		$.post(
			path_mdl + "/api/"+ id +"?r=updateEntry",
			$("#update-form").serializeObject(),
			function(data) {
				data = $.parseJSON(data);
				console.log(data);
				if (data.status === true) {
						$("#update-form")[0].reset();
						setTimeout(function() {
							$("#returnResult").slideUp("slow");
							$("#returnResult").html(data.message);
						}, 4000);
						$('#edit-modal').modal('toggle');
						location.reload();
				} else {
					setTimeout(function() {
						$("#returnResult").slideUp("slow");
						$("#returnResult").html(data.message);
					}, 4000);
					$("#returnResult").slideDown("slow");
				}
			}
		);
		return false;
	});

	$('.del-entry').click(function() {
		var id = $(this).attr('data-id');
		if (confirm("Are you sure you want to delete this?")) {
			$.get(
				path_mdl + "/api/"+ id +"?r=deleteEntry",
				function(data) {
					data = $.parseJSON(data);
					if (data.status === true) {
							alert(data.message);
							location.reload();
					} else {
						alert(data.message);
					}
				}
			);
		} else {
			return false;
		}
	});
});
