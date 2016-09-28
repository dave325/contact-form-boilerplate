<?php
/*
 * The input field that is generated when user selects the text dropdown
 *
 * @since 1.0.0
 */
if ($this->options [$name] ['type'] == 'text') {
	if (isset ( $this->options [$name] ['value'] )) {
		echo "Label Name:<input class='contact-field' name='ddata_contact_options[{$name}][value]' required='required' type='text' value='{$this->options[$name]['value']}'/>";
	} else {
		echo "Label Name:<input id='{$name}' type='text' name='ddata_contact_options[{$name}][value]' required='required'/>";
	}
}
/*
 * The input field that is generated when user selects the password dropdown
 *
 * @since 1.0.0
 */
if ($this->options [$name] ['type'] == 'password') {
	if (isset ( $this->options [$name] )) {
		echo "Label Name:<input class='contact-field' name='ddata_contact_options[$name][value]' required='required' type='text' value='{$this->options[$name]['value']}'/>";
	} else {
		echo "Label Name:<input id='{$name}' type='texr' name='ddata_contact_options[$name][value]' required='required'/>";
	}
}
/*
 * The input field that is generated when user selects the submit dropdown
 *
 * @since 1.0.0
 */
if ($this->options [$name] ['type'] == 'submit') {
	if (isset ( $this->options [$name] )) {
		echo "Label Name:<input class='contact-field' name='ddata_contact_options[$name][value]' required='required' type='text' value='{$this->options[$name]['value']}'/>";
	} else {
		echo "Label Name:<input id='{$name}' type='text' name='ddata_contact_options[$name][value]' required='required'/>";
	}
}
/*
 * The input field that is generated when user selects the radio dropdown
 *
 * @since 1.0.0
 */
if ($this->options [$name] ['type'] == 'radio') {
	$i = 1;
	$input_amount = $this->options [$name] ['amount'];
	if (isset ( $this->options [$name] ['amount'] )) {
		echo "Amount of radio buttons:<input type='number' name='ddata_contact_options[$name][amount]' min='2' max='15' required='required' value='{$this->options[$name]['amount']}'/><br>";
	} else {
		echo "Amount of radio buttons:<input type='number' name='ddata_contact_options[$name][amount]' min='2' max='15' required='required'/>'<br>";
	}
	echo "<h3>Choose the options for each radio field</h3>";
	while ( $i <= $input_amount ) {
		;
		if (isset ( $this->options [$name] )) {
			echo "Option $i: <input type='text' name='ddata_contact_options[$name][value][$i]' required='required' value='{$this->options[$name]['value'][$i]}'><br>";
		} else {
			echo "Option $i: <input type='text' name='ddata_contact_options[$name][value][$i]' required='required' value='' ><br>";
		}
		$i ++;
	}
}
/*
 * The input field that is generated when user selects the checkbox dropdown
 *
 * @since 1.0.0
 */
if ($this->options [$name] ['type'] == 'checkbox') {
	$i = 1;
	if (isset ( $this->options [$name] ['amount'] )) {
		echo "<br/>Amount of Checkbox Fields: <input type='number' name='ddata_contact_options[$name][amount]' min='2' max='15' required='required' value='{$this->options[$name]['amount']}'/><br>";
		$input_amount = $this->options [$name] ['amount'];
	} else {
		echo "<br/>Amount of Checkbox Fields: <input type='number' name='ddata_contact_options[$name][amount]' min='2' max='15' required='required'/>'<br>";
		$input_amount = $this->options [$name] ['amount'];
	}
	if (isset ( $this->options [$name] ['value'] ['label'] )) {
		echo "What would you like the option to be? <input type='text' name='ddata_contact_options[$name][value][label]' value='{$this->options[$name]['value']['label']}'/> <br/>";
	} else {
		echo "What would you like the option to be? <input type='text' name='ddata_contact_options[$name][value][label]'/><br/> ";
	}
	echo "<h3>Choose the options for each checkbox field</h3><br/>";
	while ( $i <= $input_amount ) {
		;
		if (isset ( $this->options [$name] )) {
			echo "Option $i: <input type='text' name='ddata_contact_options[$name][value][$i]' required='required' value='{$this->options[$name]['value'][$i]}'><br>";
		} else {
			echo "Option $i: <input type='text' name='ddata_contact_options[$name][value][$i]' required='required' value='' ><br>";
		}
		$i ++;
	}
}
/*
 * The input field that is generated when user selects the number dropdown
 *
 * @since 1.0.0
 */
if ($this->options [$name] ['type'] == 'number') {
	if (isset ( $this->options [$name] )) {
		echo "<br/>Label Name: <input class='contact-field' name='ddata_contact_options[$name][value][label]' required='required' type='text' value='{$this->options[$name]['value']['label']}'/><br>";
		echo "Minimum: <input class='contact-field' name='ddata_contact_options[$name][value][min]' required='required' type='number' value='{$this->options[$name]['value']['min']}'/><br>";
		echo "Max: <input class='contact-field' name='ddata_contact_options[$name][value][max]' required='required' type='number' value='{$this->options[$name]['value']['max']}'/> <br>";
		echo "Steps: <input class='contact-field' name='ddata_contact_options[$name][value][steps]' required='required' type='number' value='{$this->options[$name]['value']['steps']}'/>";
	} else {
		echo "<br/>Label Name: <input class='contact-field' name='ddata_contact_options[$name][value][label]' required='required' type='text' value=''/><br>";
		echo "Minimum: <input class='contact-field' name='ddata_contact_options[$name][value][min]' required='required' type='number' value=''/><br>";
		echo "Max: <input class='contact-field' name='ddata_contact_options[$name][value][max]' required='required' type='number' value=''/><br>";
		echo "Steps: <input class='contact-field' name='ddata_contact_options[$name][value][steps]' required='required' type='number' value=''/>";
	}
}

/*
 * The input field that is generated when user selects the date dropdown
 *
 * @since 1.0.0
 */
if ($this->options [$name] ['type'] == 'date') {
	if (isset ( $this->options [$name] )) {
		echo "<br/>Label Name: <input class='contact-field' name='ddata_contact_options[$name][value][label]' required='required' type='text' value='{$this->options[$name]['value']['label']}'/><br>";
	} else {
		echo "<br/>Label Name: <input class='contact-field' name='ddata_contact_options[$name][value][label]' required='required' type='text' value=''/><br>";
	}
}

/*
 * The input field that is generated when user selects the color dropdown
 *
 * @since 1.0.0
 */
if ($this->options [$name] ['type'] == 'color') {
	if (isset ( $this->options [$name] )) {
		echo "Label Name:<input class='contact-field' name='ddata_contact_options[$name][value]' required='required'type='text' value='{$this->options[$name]['value']}'/><br>";
	} else {
		echo "Label Name:<input class='contact-field' name='ddata_contact_options[$name][value]' required='required' type='text' value=''/><br>";
	}
}
/*
 * The input field that is generated when user selects the email dropdown
 *
 * @since 1.0.0
 */
if ($this->options [$name] ['type'] == 'email') {
	if (isset ( $this->options [$name] )) {
		echo "Label Name:<input class='contact-field' name='ddata_contact_options[$name][value]' required='required' type='text' value='{$this->options[$name]['value']}'/><br>";
	} else {
		echo "Label Name:<input class='contact-field' name='ddata_contact_options[$name][value]' required='required' type='text' value=''/><br>";
	}
}
/*
 * The input field that is generated when user selects the seach dropdown
 *
 * @since 1.0.0
 */
if ($this->options [$name] ['type'] == 'search') {
	if (isset ( $this->options [$name] )) {
		echo "<br>Submit Button Name: <input class='contact-field' name='ddata_contact_options[$name][value]' required='required' type='text' value='{$this->options[$name]['value']}'/><br>";
	} else {
		echo "<br>Submit Button Name:  <input class='contact-field' name='ddata_contact_options[$name][value]' required='required' type='text' value=''/><br>";
	}
}
/*
 * The input field that is generated when user selects the telephone dropdown
 *
 * @since 1.0.0
 */
if ($this->options [$name] ['type'] == 'tel') {
	if (isset ( $this->options [$name] )) {
		echo "Label Name:<input class='contact-field' name='ddata_contact_options[$name][value]' required='required' type='text' value='{$this->options[$name]['value']}'/><br>";
	} else {
		echo "Label Name:<input class='contact-field' name='ddata_contact_options[$name][value]' required='required' type='text' value=''/><br>";
	}
}
?>