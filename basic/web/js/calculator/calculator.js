$(function() {
	var body = $('body');
	var home = $('section.calculator');

	//$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

		 
	$('#amount-slider').slider({
		min: 100,
		max: 30000,
		value: home.find('div[name = "amount-slider"]').find('span[name = "current-amount"]').text(),
		step:100,
		slide: function(event, ui) {
			displayCurrentAmmount(ui.value);
		},
		change: function(event, ui) {
			calculate();
		}
	}).draggable();
	$('#time-slider').slider({
		min: 1,
		max: 30,
		value: home.find('div[name = "time-slider"]').find('span[name = "current-time"]').text(),
		slide: function(event, ui) {
			displayCurrentTime(ui.value);
		},
		change: function(event, ui) {
			calculate();
		}
	}).draggable();

	function displayCurrentAmmount(value) {
		var block_amount = home.find('div[name = "amount-slider"]').find('span[name = "current-amount"]');
		block_amount.text(value);
	}

	function displayCurrentTime(value) {
		var block_time = home.find('div[name = "time-slider"]').find('span[name = "current-time"]');
		block_time.text(value);
	}

	function calculate() {
		var amount = $('#amount-slider').slider( "option", "value" );
		var time = $('#time-slider').slider( "option", "value" );
		var payment = home.find('select[name = "payment"]');
		var age = home.find('input[name = "age"]');
		var block_reload = home.find('div[name = "list-offers"]');
	    block_reload.empty();
	    block_reload.append('<div class="text-center"><i class = "fa fa-spinner fa-pulse fa-4x"></i></div>');
	    var param = ['amount','time','payment','age'];
	    var value = [amount,time,payment.val(),age.val()];
	    var form = createForm(param,value);
	    $.post(
	        	'/calculate',
	        	{
	        		amount: amount,
	        		time: time,
	        		payment: payment.val(),
	        		age: age.val()
	        	}
	    ).done(function( data ) {
	        	block_reload.html(data);
	        }
	    ).fail( function(xhr, textStatus, errorThrown) {
	    		alert(xhr.responseText);
	       		
          	}
        );
        
	}

	home.on('click', 'i[name = "offer-info"]', function () {
		var home_tr = $(this).parents('tr[name = "offer"]');
		var info_tr = home_tr.next('tr[name = "info"]').toggle();
	});

	home.on('change', 'select[name = "payment"],input[name = "age"]', function () {
		calculate();
	});

	function createForm(param,value) {
		var form = $('form[name = "default-form"]');
		form.find('[type-file = "ex"]').remove();
		for (var i = 0; i < param.length; i++) {
			form.append('<input type = "hidden" name "'+param[i]+'" value = "'+value[i]+'"  type-file = "ex">');
		}
		return form;
	}
	
});