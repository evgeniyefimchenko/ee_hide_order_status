(function (_, $) {
	$(window).load(function() {
		var curr_status = $('a.dropdown--text-wrap.active').attr('data-ca-list-item');
		$.ceEvent('on', 'ce.ajaxdone', function(elms, inline_scripts, params, data, text) {
			if (typeof params.callback == "string" && params.result_ids && Tygh.current_dispatch == 'orders.details') {
				document.location.reload();
			}
		});
		$(document).click(function(e) {
			if (curr_status != $('a.dropdown--text-wrap.active').attr('data-ca-list-item') && Tygh.current_dispatch == 'order_management.update') {
				$('[name = "dispatch[order_management.place_order.save]"]').click();
			}
		});
	});
})(Tygh, Tygh.$);