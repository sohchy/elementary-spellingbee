$(document).ready(function(){

	$screenKeyboardRow_a = $(".screenKeyboardRow a");
	
	$typeWordInputBox_input = $("#typeWordInputBox input");
	
	$typeWordInputBox_input.val('');

	$screenKeyboardRow_a.click(function(){
	
		var keyEntered = $(this).text();
		
		var inputBoxCurrentValue = $typeWordInputBox_input.val();
		
		switch(keyEntered) {
			case 'DELETE':
				$typeWordInputBox_input.val(inputBoxCurrentValue.substring(0,inputBoxCurrentValue.length-1));
				break;
			case 'ENTER':
				console.log('enter');
				break;
			default:
				$typeWordInputBox_input.val(inputBoxCurrentValue+keyEntered);
				break;
		
		}
		
		
		
		
		return false;
	});

});