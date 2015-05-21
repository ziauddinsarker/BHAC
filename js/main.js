	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})
	
	$('#dist-barisal').hide();
	$('#thana-Barguna').hide();
	//button show hide	
	$('input[name="division"]').change( function() {
		//Dhaka
		if ($('#barisal').is(":checked")){
			$('#dist-barisal').show();		
			$('#division').hide();	
		} else {			
			$('#dist-barisal').collapse('hide');
		}
	});
	
	$('input[name="district"]').change( function() {
		//Dhaka
		if ($('#Barguna').is(":checked")){
			$('#thana-Barguna').show();		
			$('#dist-barisal').hide();
			$('#division').hide();	
		} else {			
			$('#thana-Barguna').collapse('hide');
		}
	});
	
	