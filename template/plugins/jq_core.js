$(document).ready(function($){


	$('.modal-a').magnificPopup({
		type: 'ajax',
		overflowY: 'scroll',
		closeOnBgClick: false,
		callbacks: {
			ajaxContentAdded: function() {
				// Ajax content is loaded and appended to DOM
				rebind();
			}
		}
	});

	rebind();

});

function rebind(){

	$('.form-ajax').unbind('submit');
	$('.form-ajax').submit(function(){
		$form = $(this);
		$form.fadeTo(100,0.2);
		$.post( $form.attr('action'), $form.serialize(), function( data ) {
			$form.html( data ).fadeTo(100,1.0);
		});
		return false;
	});
}