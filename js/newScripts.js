$(document).ready( function(){	
	$("#prop_submit").click(function(){
		$.post($("#prop_reg").attr("action"),
			$("#prop_reg :input").serializeArray(),
			function(info){
				if(info=="You have been successfully registered.\nThank You"){
					$('#prop_reg').empty();
				}
				$("#prop_ack").empty();
				$("#prop_ack").html(info);

			});

		$("#prop_reg").submit(function(){
			return false;
		});
	});

	$("#prath_submit").click(function(){
		$.post($("#prath_reg").attr("action"),
			$("#prath_reg :input").serializeArray(),
			function(info){
				if(info=="You have been successfully registered.\nThank You"){
					$('#prath_reg').empty();
				}
				$("#prath_ack").empty();
				$("#prath_ack").html(info);

			});

		$("#prath_reg").submit(function(){
			return false;
		});
	});

	$("#cwr_submit").click(function(){
		$.post($("#cwr_reg").attr("action"),
			$("#cwr_reg :input").serializeArray(),
			function(info){
				if(info=="You have been successfully registered.\nThank You"){
					$('#cwr_reg').empty();
				}
				$("#cwr_ack").empty();
				$("#cwr_ack").html(info);

			});

		$("#cwr_reg").submit(function(){
			return false;
		});
	});

	$("#des_submit").click(function(){
		$.post($("#des_reg").attr("action"),
			$("#des_reg :input").serializeArray(),
			function(info){
				if(info=="You have been successfully registered.\nThank You"){
					$('#des_reg').empty();
				}
				$("#des_ack").empty();
				$("#des_ack").html(info);

			});

		$("#des_reg").submit(function(){
			return false;
		});
	});

	$("#contact_submit").click(function(){
		$.post($("#contact_form").attr("action"),
			$("#contact_form :input").serializeArray(),
			function(info){
				
				$("#contact_ack").empty();
				$("#contact_ack").html(info);
				if(info=="Thank you. We will reach out to you at the earliest."){
					$('#success_contact').empty();
					$("#contact_ack").empty();
					$("#contact_form").empty();
					$('#success_contact').html(info);
				}
			});

		$("#contact_form").submit(function(){
			return false;
		});
	});

	$("#prop_login_submit").click(function(){
		$.post($("#prop_login_form").attr("action"),
			$("#prop_login_form :input").serializeArray(),
			function(info){
				if(info=="Success"){
					$('#prop_login_form').addClass('hidden');
					$('#propUploadForm').removeClass('hidden');
					$('#prop_login_ack').addClass('hidden');
				}
				$("#prop_login_ack").empty();
				$("#prop_login_ack").html(info);

			});

		$("#prop_login_form").submit(function(){
			return false;
		});
	});

	$("#prath_login_submit").click(function(){
		$.post($("#prath_login_form").attr("action"),
			$("#prath_login_form :input").serializeArray(),
			function(info){
				if(info=="Success"){
					$('#prath_login_form').addClass('hidden');
					$('#prathUploadForm').removeClass('hidden');
					$('#prath_login_ack').addClass('hidden');
				}
				$("#prath_login_ack").empty();
				$("#prath_login_ack").html(info);

			});

		$("#prath_login_form").submit(function(){
			return false;
		});
	});


	// $("#propUploadForm_submit").click(function(){
	// 	$.post($("#propUploadForm").attr("action"),
	// 		$("#propUploadForm :input").serializeArray(),
	// 		function(info){
					
	// 			$("#propUploadForm_ack").empty();
	// 			$("#propUploadForm_ack").html(info);

	// 		});

	// 		$("#propUploadForm").submit(function(){
	// 			return false;
	// 		});
	// });


});