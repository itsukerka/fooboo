//
// COMMON FUNCTIONS
//

function classicSelect (option) {
	var selected = '';
	if (!option.id) {
		return option.text;
	}
	
	if(option.selected){
		selected = 'selected';
	}
	
	var $option = $(
		'<span class="item '+selected+'"><span class="label">' + option.text + '</span></span>'
	);
	return $option;
};
function pa_color_template (option) {
	var selected = '';
	if (!option.id) {
		return option.text;
	}
	if(option.selected){
		selected = 'selected';
	}
	var $option = $(
		'<span class="ui--product-color item '+selected+'"><span class="color color-'+option.id+'"></span><span class="label">' + option.text + '</span></span>'
	);
	return $option;
};

function pa_color_template_selection (option) {
	return pa_color_template (option);
};

try {
	jQuery.fn.selectWoo.amd.define('customSingleSelectionAdapter', [
		'select2/utils',
		'select2/selection/single',
	], function (Utils, SingleSelection) {
		const adapter = SingleSelection;
		adapter.prototype.update = function (data) {
			if (data.length === 0) {
				this.clear();
				return;
			}
			var selection = data[0];
			var $rendered = this.$selection.find('.select2-selection__rendered');
			var formatted = this.display(selection, $rendered);
			$rendered.empty().append(formatted);
			$rendered.prop('title', selection.title || selection.text);
		};
		return adapter;
	});
} catch (e){
	
}

//
// Ленивая загрузка
//
function lazy_load(){
	$('[data-lazy]').each(function(){
		var $this = $(this);
		var type = $(this).attr('data-lazy');
		if(type == 'image'){
			var src = $(this).attr('data-src');
			var image = new Image();
			image.onload = function(){
				$this.css('background', 'url(' + this.src + ')').addClass('load');
			}
			image.src = src;
		}
	});
	
	$('.select2-init').each(function(index, select){
		var params = {
			minimumResultsForSearch: -1,
			templateResult: classicSelect,
			dropdownAutoWidth: true,
			dropdownCssClass: $(this).attr('id')
		};
		
		if(typeof jQuery.fn.selectWoo !== 'undefined'){
			params.selectionAdapter = jQuery.fn.selectWoo.amd.require('customSingleSelectionAdapter');
		}
		
		if($(this).data('template')){
			var template = $(this).data('template');
			if(typeof window[template] === 'function'){
				params.templateResult = window[template];
			}
			
			if(typeof window[template+'_selection'] === 'function'){
				params.templateSelection = window[template+'_selection'];
			}
		}
		jQuery(this).select2(params);
	});
}



function escapeHTML (string) {
	var entityMap = {
		'&': '&amp;',
		'<': '&lt;',
		'>': '&gt;',
		'"': '&quot;',
		"'": '&#39;',
		'`': '&#x60;',
		'=': '&#x3D;'
	};
	return String(string).replace(/[&<>"'`=\/]/g, function (s) {
		return entityMap[s];
	});
}
	
	//
	// ВСПОМОГАТЕЛЬНЫЕ ФУНКЦИИ, которыие используются на всех сайтах сети
	//

	// Валидация форм
	function validateInput(value, type = ''){
		if(type == 'name'){
			return validateName(value);
		}
		
		if(type == 'fullname'){
			return validateName(value);
		}
		
		if(type == 'email'){
			return validateEmail(value);
		}
		
		if(type == 'phone'){
			return validatePhone(value);
		}
		
		if(type == 'smscode'){
			return validateSmsCode(value);
		}
		
		if(type == 'passport'){
			return validatePassport(value);
		}
	}
	
	function validateName(name) {
		if(name != undefined){
			const re = /^[A-zА-яЁё]+$/i;
			name = name.replace(' ', '').replace(' ', '');
			return re.test(name);
		}
		
	}
	
	function validateEmail(email) {
		const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		
		return re.test(email);
	}
	
	function validatePhone(phone) {
		const re = /^[+]?[7-8]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
		if(phone.charAt(0) == '8'){
			phone = phone.replace('8','7');
		}
		phone = phone.replace(/ /g, '').replace(/-/g, '');
		return re.test(phone);
	}
	
	function validateSmsCode(value){
		if(value.length === 4){
			return true;
		}
		
		return false;
	}
	
	function validatePassport(value){
		if(value.replace(/ /g, '').length >= 10){
			return true;
		}
		
		return false;
	}
	
	
	//
	// FORM & FIELDSETS
	//
	
	
	// Собираем все значения полей из формы
	
	function get_form_values(form){
		var inputs = form.find('input, select, textarea');
		var values = {};
		inputs.each(function(index, input){
			if($(this).attr('type') == 'checkbox'){
				values[$(this).attr('name')] = $(this).prop('checked');
			} else {
				values[$(this).attr('name')] = $(this).val();
			}
		});
		
		return values;
	}
	
	// Чекаем форму, говорим ПРАВИЛЬНО ЛИ заполнена форма
	
	function check_form(form){
		var inputs = form.find('input, select, textarea');
		var has_error = false;
		inputs.each(function(index, input){
			if($(this).hasClass('invalid') || (typeof $(this).attr('required') !== 'undefined' && $(this).val() == '')){
				$(this).trigger('keyup').trigger('change').focus();
				has_error = true;
			}
			
			
		});
		
		return has_error;
	}
	
	// Функция, которая отправляет в WP все данные с формы
	// action для WP равен тегу id на форме
	
	$('body').on('click', '.ui-form button[type="submit"]', function(){
		var form = $(this).parent('*').parent('.ui-form');
		var id = form.attr('id');
		var ready = check_form(form);
		var values = get_form_values(form);
		
		// Если одно поле заполнено не верно
		if(ready === true){
			return false;
		} else {
			
			do_send_form($(this), id, values);
		}
		
		return false;
	});
	
	//
	// МОЖНО СОЗДАТЬ JS-функции по определенной маске (указаны в eval() ), 
	// чтобы создать обработчики и пост-обработчики
	//
	
	function do_send_form($this, id, data){
		$.ajax({
			url: CURRENT_SITE+'/wp-admin/admin-ajax.php',
			method: 'POST',
			dataType: 'json',
			data: {
				action: 'ajax_'+id,
				data: JSON.stringify(data)
			},
			beforeSend: function () {
				$this.attr('disabled', true);
				try {
					eval('ajax_before_'+id)();
				} catch (e){
					
				}
			},
			success: function (response) {
				try {
					eval('ajax_success_'+id)(response);
				} catch (e){
					console.log(e);
				}
				if(response.reload === true){
					location.reload();
				}
				if(typeof response.redirect !== 'undefined'){
					setTimeout(function () {
						location = response.redirect;
					}, 2000);
				}
				$this.attr('disabled', false);
			},
			error: function (response) {
				try {
					eval('ajax_error_'+id)(response);
				} catch (e){
					
				}
				$this.attr('disabled', false);
			}
		});
	}
	
	
	//
	// ПРОВЕРЯЕМ ВСЕ ПОЛЯ, ПРОГОНЯЕМ ЧЕРЕЗ ВАЛИДАТОР И ВЫВОДИМ ОШИБКУ
	//
	
	$('body').on('input keyup', 'input', function(e) {
		var input = $(this).parent('.field').parent('.ui_form__fieldset');
		var information = input.children('.information');
		var status_icon = input.children('.status').children('span');
		var error_text = input.attr('data-error');
		var mask = $(this).attr('data-mask');        
		
		var has_value = false;
		var is_required = false;
		if(typeof $(this).attr('required') !== 'undefined'){
			is_required = true;
		}
		
		information.removeClass('shown');
		status_icon.removeClass('icon--success').removeClass('icon--error');
		
		$(this).removeClass('invalid');
		
		if($(this).attr('type') == 'checkbox'){
			var val = $(this).prop('checked');
		} else {
			var val = $(this).val();
		}
		
		if(val != '' || val === true){
			has_value = true;
		}
		
		if(has_value){
			
			if (!validateInput(val, mask) && typeof $(this).attr('data-mask') !== 'undefined') {
				$(this).addClass('invalid');
				input.addClass('invalid');
				status_icon.addClass('icon--error');
				information.html(error_text).addClass('shown');
			} else {
				status_icon.addClass('icon--success');
				input.removeClass('invalid');
				$(this).removeClass('invalid');
			}
			$(this).addClass('not-empty');
			
		} else {
			$(this).removeClass('invalid not-empty');
			input.removeClass('invalid');
			status_icon.addClass('icon--success');
			
		}
		
		if(is_required && has_value === false){
			$(this).addClass('invalid');
			input.addClass('invalid');
			status_icon.addClass('icon--error');
			information.html(error_text).addClass('shown');
		}
		
		if(mask == 'phone'){
			
		}
	});
	
	function update_cart_item(data){
		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			method: 'POST',
			dataType: 'html',
			data: {
				action: 'update_cart_item',
				data: JSON.stringify(data)
			},
			beforeSend: function () {
				
			},
			success: function (response) {
				$('#_page').html(response);
				lazy_load();
			},
			error: function (response) {
				
			}
		});
	}

	$('body').on('click', '.ui--product-select label', function(){
		 
		return false;
	});

	$('body').on('click', '.ui-switch', function(){
		$('.ui-switch').toggleClass('on');
		return false;
	});

	jQuery('body').on('change', '.woocommerce-cart-form select', function(){
		var $field = $(this).parent('div');
		var data = {
			id: $field.data('id'),
			attribute: $field.data('attribute'),
			value: $(this).val()
		};
		update_cart_item(data);
	});

	jQuery('body').on('click', '.woocommerce-cart-form button[type="submit"], .woocommerce-remove-coupon, .remove', function(){
		setTimeout(function () {
			lazy_load();
		}, 1500);
	});

document.addEventListener("DOMContentLoaded", (event) => {
	lazy_load();
});