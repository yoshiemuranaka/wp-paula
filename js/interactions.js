var Interactions = {} || Interactions;

Interactions.expandContent = {
	init: function() {
		this.events();
	},
	events: function() {
		jQuery('.js-expand-content-trigger').one('click', Interactions.expandContent.show);
	},
	show: function() {
		var context = jQuery(this).closest('[data-expand-content]');
		context.find('.js-expand-content-target').removeClass('hidden');
		jQuery(this).addClass('hidden');
	}
}

jQuery(document).ready(function($){
	$('.swipebox').swipebox();
	Interactions.expandContent.init();
});



