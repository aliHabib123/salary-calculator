$(function (){
	$('input[type=radio][name=status]').on('change', function() {
		  switch ($(this).val()) {
		    case 'single':
		      $('.numberofchildren').css('display', 'none');
		      break;
		    case 'married':
		    case 'divorced':
		    case 'widowed':
		    	$('.numberofchildren').css('display', 'block');
		      break;
		  }
		});
});