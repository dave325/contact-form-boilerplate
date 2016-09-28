/**
 * 
 */
jQuery(document).ready(function() {
	var j = jQuery;
	var i = 1;
	var ddata_input = [];
	var ddata_input_checkbox = [];
	var ddata_input_radio = [];
	var checkbox_array = {};
	var radio_array = [];
	var ddata_json_array = {};
	var error_message = '';
	var label_name = '';
	j('.ddata-contact-form').submit(function(e, forminfo) {
		e.preventDefault();
		j('.ddata_input_field').each(function() {
			var checkbox_field = j(this).attr('name');
			var field = j(this).attr('id');
			var value = j(this).attr('value');
			var type = j(this).attr('type');
			var required = j(this).attr('required');
			if (type == 'date') {
				j(this).datepicker();
			}
			if (type == 'checkbox') {
				ddata_input_checkbox.push({
					'field_name' : checkbox_field,
					'value' : value,
				});
			} else if (type == 'radio') {
				ddata_input_radio.push({
					'field_name' : checkbox_field,
					'value' : value
				});

			} else {
				ddata_input.push({
					'field' : field,
					'value' : value,
					'type' : type,
					'required' : required
				});
			}
		});
		j(ddata_input_checkbox).each(function(index, obj) {
			var ddata_checkbox_field = j('.' + obj['field_name'] + '_selection_fields_' + i);
			var ddata_checkbox_index = obj['field_name'] + '_selection_fields_' + i;
			var ddata_checkbox_label = j('label[for="' + obj['field_name'] + '"]').text();
			if (ddata_checkbox_field.is(':checked')) {
					ddata_json_array[ddata_checkbox_index] = {'value' : obj['value'], 'type' : 'checkbox', 'label': ddata_checkbox_label};
			} else {
				if (ddata_checkbox_field.attr('required') == 'required') {
					error_message += 'Please check at least one field for' + ddata_checkbox_label;
				}
			}
			i++;
		});
		j(ddata_input_radio).each(function(index, obj) {
			var ddata_radio_field = j('.' + obj['field_name'] + '_selection_fields_' + i);
			var ddata_radio_index = obj['field_name'] + '_selection_fields_' + i;
			var ddata_radio_label = j('label[for="' + obj['field_name'] + '"]').text();
			if (ddata_radio_field.is(':checked')) {
					ddata_json_array[ddata_radio_field] +=  {'value' : obj['value'], 'type' : 'checkbox', 'label': ddata_radio_label};
			} else {
				if (ddata_radio_field.attr('required') == 'required') {
					error_message += 'Please check at least one field for' + ddata_radio_field;
				} else {
					return false;
				}
			}
			i++;
		});
		j(ddata_input).each(function() {
			var label_name = j('label[for="' + j(this)[0]['field'] + '"]').text();
			if (j(this)[0]['type'] == 'text' || j(this)[0]['type'] == 'number' || j(this)[0]['type'] == 'password' || j(this)[0]['type'] == 'search') {
				if (j(this)[0]['required'] == 'required') {
					if (j(this)[0]['value'].length <= 0) {
						error_message += "Please Include the information for the " + label_name + "</br>";
					} else {
						ddata_json_array[j(this)[0]['field']] = {'value' : j(this)[0]['value'], 'type' : j(this)[0]['type'], 'label' : label_name};
					}
				} else {
					if (j(this)[0]['value'].length <= 0) {
						ddata_json_array[j(this)[0]['field']] = {'value' : j(this)[0]['value'], 'type' : j(this)[0]['type'], 'label' : label_name};
					}
				}
			} else if (j(this)[0]['type'] === 'date') {
				if (j(this)[0]['required'] == 'required') {
					if (j(this)[0]['value'].length > 4) {
						ddata_json_array[j(this)[0]['field']] = {'value' : j(this)[0]['value'], 'type' : j(this)[0]['type'], 'label' : label_name};
					} else {
						error_message += label_name + '</br>';
					}
				} else {
					if (j(this)[0]['value'].length > 4) {
						ddata_json_array[j(this)[0]['field']] = {'value' : j(this)[0]['value'], 'type' : j(this)[0]['type'], 'label' : label_name};
					}
				}
			} else if (j(this)[0]['type'] === 'tel') {

				if (j(this)[0]['required'] == 'required') {
					if (j(this)[0]['value'].length !== 10) {
						error_message += label_name + '</br>';
					} else {
						ddata_json_array[j(this)[0]['field']] = {'value' : j(this)[0]['value'], 'type' : j(this)[0]['type'], 'label' : label_name};
					}
				} else {
					if (j(this)[0]['value'].length == 10) {
						ddata_json_array[j(this)[0]['field']] = {'value' : j(this)[0]['value'], 'type' : j(this)[0]['type'], 'label' : label_name};
					}
				}
			}
			else if (j(this)[0]['type'] == 'hidden'){
				ddata_json_array[j(this)[0]['field']] = {'value' : j(this)[0]['value'], 'type' : j(this)[0]['type']};
			}
		});
		if (j('#ddata-honeypot').val() == '' && error_message == '') {
			ddata_json_array['action'] = 'ddata_form_data';
			ddata_json_array['nonce'] = ajaxObj.nonce;
			ddata_json_array['site'] = window.location.href;
			j
				.ajax({
					type : 'post',
					url : ajaxObj.ajaxurl,
					data : ddata_json_array,
					success : function(
						data) {
						j('#ddata-incorrect-box')
							.append(
								'<p> Thank you very much. We will get back to you shortly </p>').fadeIn();

					},
					error : function(data){
						j('#ddata-incorrect-box')
						.append(
							data).fadeIn();
					}
				});
		} else {
			j('#ddata-incorrect-box').html('<p> Please Correct the following:</p> <br />' + error_message).fadeIn();
		}

	});
});