	$(function(){
		$('#agreementPopupContainer').fadeIn();
		$('#agreementPopupContainer .agree-button-js').on('click', function(e){
			e.preventDefault();
			e.stopPropagation();
			confirmUserAgreement();
		});
	});
	function confirmUserAgreement(redirect)
	{
		pageLoader('show');
		$.ajax({
			type:   'GET',
			url:    '/ajax/agreement',
			cache:  false,
			data: '',
			success: function(result)
			{
				pageLoader('hide');
				$('#agreementPopupContainer').fadeOut('fast', function(){
					$(this).remove();
				});
				
				if (typeof redirect != 'undefined') {
					window.location = redirect;
					pageLoader('show');
				}
			}
		});
	}