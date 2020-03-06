/**
 * Quick Action Event
 */


 /*
 Note:
	Use this code in the kt-datatable to abstract from the row 
		class: 'kt-datatable--off-click_over_action_btn',
 */
var showQuickAction = false;
$(document).off('click', 'tbody .kt-datatable__row').on('click', 'tbody .kt-datatable__row', function(e){
	$(this).addClass('selected');
})
$(document).off('click','tbody .kt-datatable__cell').on('click','tbody .kt-datatable__cell', function(e) {
	var self = $(this),
		action = self.parent().find('td[data-field="Action"], td[data-field="Actions"]').find('a');
	showQuickAction = true;
	$(this).closest('tbody').find('.kt-datatable__row').removeClass('selected');
	$(this).closest('.kt-datatable__row').addClass('selected');
	/**
	 * Don't Init Quick Actions on these DOM
	 */
	if(self.hasClass('kt-datatable__toggle-detail') ||
		self.find('*[data-route]').length ||
		(self.attr('data-field') && self.hasClass('kt-datatable--off-click_over_action_btn'))||
		(self.attr('data-field') && self.attr('data-field').trim()  == 'Actions') ||
		(self.attr('data-field') && self.attr('data-field').trim() == 'Action')) {
		showQuickAction = false;
	}
	/**
	 * Remove Previous Quick Action
	 */
	$('.action-menu').hide(100, function() {
		$(this).remove();
	});
	if(action.length && showQuickAction) {
	console.log(showQuickAction);
			var quickAction = '<div class="action-menu"><ul>';
			$.each(action, function(index, button) {
				quickAction += '<li class="quickActionList">'+button.outerHTML+'</li>';
			});
			quickAction += '</ul></div>';
			$('body').append(quickAction);
			// self.parent().css({'position': 'relative'});
			var top = e.pageY -  $(this).height();
			var left = e.pageX - $('.action-menu').children('ul').outerWidth() / 2;
			$('.action-menu').find('a').addClass('btn-xs quickActionButton').end().css({
				"top": top,
				position : "absolute",
				"left" : left
			}).show(200);
	}
});

/**
 * Remove QuickAction After Click on action menu buttons
 */
$(document).off('click','.action-menu a').on('click','.action-menu a', function() {
	$('.action-menu').hide(100, function() {
		$(this).remove();
	});
});


/**
 * Remove QuickAction if not in target
 */
$('body').on('click', function(e){
	if(!($(e.target).hasClass('m-datatable__cell') || $(e.target).closest('.m-datatable__cell').length ||
			$(e.target).hasClass('m-datatable__row') || $(e.target).hasClass('quickActionList') || $(e.target).hasClass('quickActionButton'))) {
		$('.action-menu').hide(100, function() {
			$(this).remove();
		});
	}
});

$(window).on('scroll', function(){
	var removeQuickAction = setTimeout(function() {
		$('.action-menu').hide(100, function() {
			$(this).remove();
		});
		clearTimeout(removeQuickAction);
	}, 500);
});