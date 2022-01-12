$(function(){


	$("#search_top").keyup(function(){
		let a = $(this).val();
		let b = a.length;
		if(b>2 ){
			$.ajax({
				url: "controller/busca.php",
				method: "POST",
				data: { busca: a },
				success: function (data) {
					$("#result_search").fadeIn();
					$("#result_search").html(data);
				}
			})
		}
	})


	$("#result_search").on("click","li", function(){
		$("#result_search").fadeOut();
		$("#search_top").val("");
	})
})