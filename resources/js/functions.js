// JavaScript Document
$(window).load(function() {
	
	if($('#survey_Modal').length) show_survey_fields();
	
	$('#advertising_background').animate({
		opacity: 1
	});
	$('#advertising_main_title').click(function(){
		$('#s_tab').click();	
		return false;
	})
	$('.head_expander').click(function(){
		var clase = $(this).attr('class')		
		if( $(this).attr('class').indexOf('closed') !== -1 ){
			$('#head_expandable').animate({
				'height': 190
			})
			$('.head_expander').removeClass('closed').addClass('opened')			
		}
		else{
			$('#head_expandable').animate({
				'height': 0
			})
			$('.head_expander').removeClass('opened').addClass('closed')			
		}
		return false
	})
	$('#s_tab').click(function(){
		var clase=$(this).attr('class')		
		if($(this).attr('class').indexOf('closed')!== -1){
			$('#s_tab').css('background-image', 'url("resources/images/fe/sponsor_arrow_back.png")')
			$('#sponsor').animate({
				'width':'100%'
			})
			$('#s_content').animate({
				'width':'86%'
			})
			$('#s_tab').removeClass('closed').addClass('opened')			
		}
		else{
			$('#sponsor').animate({
				'width': 40
			}, function(){
				$('#s_tab').css('background-image', 'url("resources/images/fe/sponsor_arrow.png")')
			})
			$('#s_content').animate({
				'width':0
			})
			$('#s_tab').removeClass('opened').addClass('closed')			
		}
		return false
	})
	$('#slider').nivoSlider();
	$('#menu_mobile_button').click(function(){
		$('#menu_mobile').toggleClass("hidden").toggleClass("show");
		return false
	});
	$('#close_menu_mobile').click(function(){
		$('#menu_mobile').toggleClass("hidden").toggleClass("show");
		return false
	});
	$('#close_ads_mobile_space').click(function(){
		$('#ads_mobile_space').toggleClass("hidden").toggleClass("show");
		return false
	});
	$('#ads_mobile').click(function(){
		$('#ads_mobile_space').toggleClass("hidden").toggleClass("show");
		return false
	});

	load_ads_click();
});

function load_ads_click(){
	$('.advertising a, .advertising_mobile a').click(function(e){
		$.post( "update_click", {'id': $(this).attr('alt')}, function( data ) {});
	})
}


function show_survey_fields(){
	
	$('#survey_Modal').modal('show'); 

	
	$('input:radio[name="otro_medio"]').change(function(){
		if($(this).val() != 'no_utilizo'){
			$("#utiliza_otro_reporte").removeClass("hidden");
					
		}
		else{
			$("#utiliza_otro_reporte").addClass("hidden");
		}
		
		
	});
	
	$('#recibir_reporte').change(function(){
		
		if ($('#recibir_reporte').prop('checked')) {
		   $("#report_email_block").removeClass("hidden");
		}
		else{
			
			 $("#report_email_block").addClass("hidden");
		}
	});
		
	
	
}